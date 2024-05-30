<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\AdminAccountDetails;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function adminOrders(Request $request)
    {
        if(Auth::user()->hasrole('Admin') || Auth::user()->hasDirectPermission('order_apc')){
            $data = Order::orderBy('id','desc')->get();
            return view('modules.orders.index', compact('data'));

        }else{
            $data = Order::orderBy('id','desc')->where('customer_id',Auth::user()->id)->get();
            return view('modules.orders.index', compact('data'));
        }
       
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
        $order->screen_shot = $pic;
        $order->save();
        foreach ($cart as &$item) {
           $orderitem=new OrderItem();
           $orderitem->order_id=$order->id;
           $orderitem->product_id=intval($item['product_id']);
           $orderitem->price=floatval($item['product_price']);
           $orderitem->name=$item['product_name'];
           $orderitem->product_type=$item['product_type'];
           $orderitem->quantity= intval($item['quantity']);
           $orderitem->save();
        }



        unset($item);
       
        session()->forget('cart');
        return redirect()->to('/view-cart');
       
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
            'product_type' => $request->input('product_type'),
            'name' => $request->input('product_name'),
            'price' => $request->input('product_price'),
            'quantity' => $request->input('quantity'),
            's_name' => $request->input('s_name'),
            's_number' => $request->input('s_number'),
            'ac_type' => $request->input('ac_type'),
            'dp' => $request->input('dp'),
            'bv' => $request->input('bv')
        ];

        $cart = session('cart', []);
        $cart[] = $product;
        session(['cart' => $cart]);

        return response()->json(['message' => 'Product added to cart successfully']);
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
    // $this->updateDirectPoints($user->customer_id,$user->total_dp,'up');
    $userId=$user->customer_id;
    $affiliateData = User::find($userId);
    if($affiliateData->plan_id!=NULL && $affiliateData->plan_id>0){
        $this->updateStoreBv($user->customer_id,$user->total_bv,'up');
    }else{
        $settings = AdminAccountDetails::find(1);
        $pvPer=$settings->affiliate_commission ?? 50;
        $sponserPer=$settings->affiliate_sponser_commission ?? 10;
        $sponserPer2=$settings->affiliate_sponser_commission2 ?? 10;
        $sponserPer3=$settings->affiliate_sponser_commission3 ?? 10;
        $comBv=($pvPer/100)*$user->total_bv;
        $comSponser=($sponserPer/100)*$user->total_bv;
        $comSponser2=($sponserPer2/100)*$user->total_bv;
        $comSponser3=($sponserPer3/100)*$user->total_bv;
        $this->updateAffiliateWallet($user->customer_id,$comBv,'up');
        if($affiliateData->refral_id){
            ///////////  Level 1
            $this->updateStoreBv($affiliateData->refral_id,$comSponser,'up');
            $affiliateData2 = User::find($affiliateData->refral_id);
            if($affiliateData2->refral_id){
                ///////////  Level 2
             $refral2 =$affiliateData2->refral_id;
             $this->updateStoreBv($refral2,$comSponser2,'up');
             $affiliateData3 = User::find($refral2);
             if($affiliateData3->refral_id){
                ///////////  Level 3
                $refral3 =$affiliateData3->refral_id;
                $this->updateStoreBv($refral3,$comSponser3,'up');
               }
            }
        }
        
    }
    
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
