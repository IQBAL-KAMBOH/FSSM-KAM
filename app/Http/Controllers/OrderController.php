<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\DigitalCource;
use App\Models\DigitalLibrary;
use App\Models\AdminAccountDetails;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function adminOrders(Request $request)
    {
       

            if(Auth::user()->hasrole('Admin') || Auth::user()->hasDirectPermission('order_apc')){
                if($request->st==1){
                   
                        $data = Order::orderBy('id','desc')->where('status','Approved')->get();
                }else{
                        $data = Order::orderBy('id','desc')->whereNull('status')->get();
                }
            }else{
                $data = Order::orderBy('id','desc')->where('customer_id',Auth::user()->id)->get(); 
            }
        
        
        return view('modules.orders.index', compact('data'));
    }
    public function customerOrders(Request $request)
{
    if (Auth::user()->hasDirectPermission('order_apc')) {
        if ($request->st == 1) {
            $data = Order::with('orderItems')
                ->whereHas('orderItems', function ($query) {
                    $query->where('supplier_id', auth()->user()->id);
                })
                ->where('status', 'Approved')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $data = Order::with('orderItems')
                ->whereHas('orderItems', function ($query) {
                    $query->where('supplier_id', auth()->user()->id);
                    $query->whereNotNull('supplier_id');
                })
                ->whereNull('status')
                ->orderBy('id', 'desc')
                ->get();
        }
    }

    return view('modules.orders.index-customer', compact('data'));
}

    public function adminOrderDetails(Request $request)
    {
        $data = Order::where('id',$request->id)->with('orderItems')->first();
        return view('modules.orders.detail', compact('data'));
    }






    public function createOrder(Request $request)
    {
        $cart = $request->input('cart');
        $totalAmount = 0;

        // Calculate total amount and update cart
       
        foreach ($cart as &$item) {
            $item['product_id'] = intval($item['product_id']);
            $item['quantity'] = intval($item['quantity']);
            $item['product_price'] = floatval($item['product_price']);
            $totalAmount += $item['product_price'] * $item['quantity'];
        }
        $pic='';
        if ($_FILES['file']['name']) {       
            if (!$_FILES['file']['error']) {
                  $image = $request->file('file');
                  $imageName = time() . '_' . $image->getClientOriginalName();  
                  $destination ='uploads/Orders/'.$imageName ;
                  $request->file->move(public_path('uploads/Orders'), $imageName);
                  $pic = $destination;
            }else{
                echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
           
          }
          $custom_id=$this->generateInvoiceId();
        $order = new Order();
        $order->customer_id = $request->input('customer_id');
        $order->custom_id = $custom_id;
        $order->total_amount = $request->input('total_amount');
        $order->full_name = $request->input('full_name');
        $order->last_name = $request->input('last_name');
        $order->full_address = $request->input('full_address');
        $order->email = $request->input('email');
        $order->whatsapp_number = $request->input('whatsapp_number');
        $order->total_dp = $request->input('total_dp');
        $order->total_bv = $request->input('total_bv');
        $order->b_type = $request->input('b_type');
        $order->delivery_charges = $request->input('delivery_charges');
        $order->screen_shot = $pic;
        $order->save();
        foreach ($cart as &$item) {
            $product_type=$item['product_type'];
            $supplier_id=$item['supplier_id'];
         
           $orderitem=new OrderItem();
           $orderitem->order_id=$order->id;
           $orderitem->product_id=intval($item['product_id']);
           $orderitem->price=floatval($item['product_price']);
           //$orderitem->delivery_charges=floatval($item['delivery_charges']);
           $orderitem->name=$item['product_name'];
           $orderitem->product_type=$product_type;
           $orderitem->supplier_id=$supplier_id;
           $orderitem->quantity= intval($item['quantity']);
           $orderitem->save();
        }



        unset($item);
       
        session()->forget('cart');
        return redirect()->to('/view-cart?done=1');
       
    }
    public function generateInvoiceId()
    {
        $trackingid = rand(100000, 999999);
        return $this->checkInvoiceId($trackingid);
    }
    public function checkInvoiceId($trackingdid)
    {
        $verifytrackingid = Order::where('custom_id', $trackingdid)->get();
        if (count($verifytrackingid) == 0) {
            return $trackingdid;
        } else {
            return $this->generateInvoiceId();
        }
    }
    public function addToCart(Request $request)
{
    $product = [
        'customer_id' => $request->input('customer_id'),
        'product_id' => $request->input('product_id'),
        'supplier_id' => $request->input('supplier_id'),
        'product_type' => $request->input('product_type'),
        'name' => $request->input('product_name'),
        'price' => $request->input('product_price'),
        'quantity' => $request->input('quantity'),
        's_name' => $request->input('s_name'),
        's_number' => $request->input('s_number'),
        'ac_type' => $request->input('ac_type'),
        'b_type' => $request->input('b_type'),
        'dp' => $request->input('dp'),
        'bv' => $request->input('bv'),
        'delivery_charges' => $request->input('delivery_charges')
    ];

    $cart = session('cart', []);

    // Check if the cart is not empty
    if (!empty($cart)) {
        return response()->json(['message' => 'Only one product can be added to the cart.']);
    }

    // Check if the product already exists in the cart
    $existingProductKey = $this->findProductKeyInCart($cart, $product['product_id']);

    if ($existingProductKey !== false) {
        // Product already exists, update the quantity to the new quantity
        $cart[$existingProductKey]['quantity'] = $product['quantity'];
    } else {
        // Product does not exist in the cart, add it
        $cart[] = $product;
    }

    session(['cart' => $cart]);

    return response()->json(['message' => 'Product added to cart successfully']);
}

// Helper function to find the key of a product in the cart based on its ID
private function findProductKeyInCart($cart, $productId)
{
    foreach ($cart as $key => $item) {
        if ($item['product_id'] == $productId) {
            return $key;
        }
    }

    return false; // Product not found in the cart
}


    public function viewCart()
    {
       
        $cart = session('cart', []);

        return view('OnlineStore.cart', ['cart' => $cart]);
    }
    public function emptyCart(){
        unset($item);
       
        session()->forget('cart');
        return redirect()->to('/view-cart');
    }
    public function removeFromCart(Request $request)
{
 
    $productId = $request->product_id;
    $productType = $request->product_type;

    $cart = session('cart', []);
    $productIdToRemove =$productId; // Change this to the desired product_id
    $productTypeToRemove =$productType; // Change this to the desired product_type
    
    foreach ($cart as $index => $item) {
        if ($item['product_id'] === $productIdToRemove && $item['product_type'] === $productTypeToRemove) {
            unset($cart[$index]);
            break; // If you only want to remove the first matching item
        }
    }
    
    // Update the session with the modified cart
    session(['cart' => $cart]);
    
      return response()->json(['success' => true]);
}

public function approveOrder(Request $request){
    $user = Order::find($request->id);
    ///b2b start//
  
    if($user->b_type=='bxd'){
           $this->updateDirectPoints($user->customer_id,$user->total_dp,'up');
            ///b2b end////
    }else{
    
     $userId=$user->customer_id;
    /////b2c start//////
    $affiliateData = User::find($userId);
    if($affiliateData->plan_id!=NULL && $affiliateData->plan_id>0){
        ///// unilevel Income
        $this->updateStoreBv($user->customer_id,$user->total_bv,'up');
         ////////////////////////////// Update B2C Wallet
         $this->updateB2CWallet($user->customer_id,$user->total_bv,'up');
         ////////////////////////////// Update B2C Wallet
        
    }else{
        ////////  Affiliate Incom

        $settings = AdminAccountDetails::find(1);
        /////////// Percentages
        $selftPer=$settings->u_affiliate_commission ?? 0;
        $s1Per=$settings->u_affiliate_sponser_commission1 ?? 0;
        $s2Per=$settings->u_affiliate_sponser_commission2 ?? 0;
        $s3Per=$settings->u_affiliate_sponser_commission3 ?? 0;
        $s4Per=$settings->u_affiliate_sponser_commission4 ?? 0;
        /////////// Percentages End

        /////////// Commissions 
        $selfCom=($selftPer/100)*$user->total_bv;
        $s1Com=($s1Per/100)*$user->total_bv;
        $s2Com=($s2Per/100)*$user->total_bv;
        $s3Com=($s3Per/100)*$user->total_bv;
        $s4Com=($s4Per/100)*$user->total_bv;
        /////////// Commissions End

        ////// Self Commission
        $this->updateAffiliateWallet($user->customer_id,$selfCom,'up');
        ////// Self Commission End
     
        if($affiliateData->refral_id){
            $s1 = User::where('id', $affiliateData->refral_id)->where('user_type','User')->first();
           
            if($s1){
                $paid1=$s1->plan_id ?? 0;
                $s1id =$s1->id;
                if($paid1>0){
                    $this->updateStoreBv($s1id,$s4Com,'up');
                     ////////////////////////////// Update B2C Wallet
                     $this->updateB2CWallet($s1id,$s4Com,'up');
                     ////////////////////////////// Update B2C Wallet
                }else{
                    $this->updateAffiliateWallet($s1id,$s3Com,'up');
                    if($s1->refral_id){
                        $s2 = User::where('id', $s1->refral_id)->where('user_type','User')->first();
                        if($s2){
                            $paid2=$s2->plan_id ?? 0;
                            $s2id =$s2->id;
                            if($paid2>0){
                                $this->updateStoreBv($s2id,$s4Com,'up');
                                 ////////////////////////////// Update B2C Wallet
                                 $this->updateB2CWallet($s2id,$s4Com,'up');
                                 ////////////////////////////// Update B2C Wallet
                            }else{
                                $this->updateAffiliateWallet($s2id,$s2Com,'up');
                                if($s2->refral_id){
                                    $s3 = User::where('id', $s2->refral_id)->where('user_type','User')->first();
                                    if($s3){
                                        $paid3=$s3->plan_id ?? 0;
                                        $s3id =$s3->id;
                                        if($paid3>0){
                                            $this->updateStoreBv($s3id,$s4Com,'up');
                                             ////////////////////////////// Update B2C Wallet
                                             $this->updateB2CWallet($s3id,$s4Com,'up');
                                             ////////////////////////////// Update B2C Wallet
                                        }else{
                                            $this->updateAffiliateWallet($s3id,$s1Com,'up');
                                            if($s3->refral_id){
                                                $s4 = User::where('id', $s3->refral_id)->where('user_type','User')->first();
                                                if($s4){
                                                    $paid4=$s4->plan_id ?? 0;
                                                    $s4id =$s4->id;
                                                    if($paid4>0){
                                                        $this->updateStoreBv($s4id,$s4Com,'up');
                                                         ////////////////////////////// Update B2C Wallet
                                                         $this->updateB2CWallet($s4id,$s4Com,'up');
                                                         ////////////////////////////// Update B2C Wallet
                                                    }
                                                    
                                                }
                                            }
                                            
                                        }
                                        
                                    }
                                }
                                
                            }
                            
                        }

                    }
                   
                }
                
            }
        }
        
    }}
    /////b2c end/////
    $user->status = 'Approved';
    $user->save();

    return redirect()->back()->with('success','Order Approved Successfully');
}
public function cancellOrder(Request $request){
$user = Order::find($request->id);
$user->status = 'Cancelled';
$user->save();
return redirect()->back()->with('success','Order Cancelled Successfully');
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
