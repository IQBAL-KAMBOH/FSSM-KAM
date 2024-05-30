<?php


namespace App\Http\Controllers\Store;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $id=auth()->user()->id;
        if(empty($_REQUEST['cat']) || !isset($_REQUEST['cat'])){
            
            return redirect()->to('/product-cats')->with('error', 'Category not Found.');
        }
        $cat_id=$_REQUEST['cat'];
        $category = Category::find($cat_id);
        if(auth()->user()->hasrole('Admin')){
            $products = Product::where('category_id',$cat_id)->get();
        }else{
            $products = Product::where('category_id',$cat_id)->where('custom_id',$id)->get();
        }
        
        return view('modules.products.index', compact('products','category'));
    }
    public function productCats()
    {
        $data = Category::all();

        return view('modules.products.index-cats', compact('data'));
    }

    public function create()
    {
        if(empty($_REQUEST['cat']) || !isset($_REQUEST['cat'])){
            
            return redirect()->to('/product-cats')->with('error', 'Category not Found.');
        }
        $cat_id=$_REQUEST['cat'];
        $category = Category::find($cat_id);
        return view('modules.products.add', compact('category'));
    }
    public static function countProductChunks($id, $chunkSize)
    {
        $totalProducts = Product::where('category_id', $id)->count();
    
        // Calculate the number of chunks
        $numChunks = ceil($totalProducts / $chunkSize);
    
        return $numChunks;
    }
    
    public function store(Request $request)
    {
        $id=auth()->user()->id;
        if(auth()->user()->hasrole('User')){
        $id=auth()->user()->id;
        $commingpv=$request->bv ?? 0;
        $wallet_balance=$this->balancePvStorewallet($id);
        if($wallet_balance<$commingpv){
            return redirect()->back()->with('error', 'Store Pv Wallet Balance Low.');
        }
        $this->updatePvStorewallet($id,$commingpv,'down');
      }
        $custom_id=$this->generateInvoiceId();
        $pic='';
        if ($_FILES['file']['name']) {       
            if (!$_FILES['file']['error']) {
                  $image = $request->file('file');
                  $imageName = time() . '_' . $image->getClientOriginalName();  
                  $destination ='uploads/Products/'.$imageName ;
                  $request->file->move(public_path('uploads/Products'), $imageName);
                  $pic = $destination;
            }else{
                echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
           
          }
       $product=Product::create($request->except('file')+['image' =>$pic,'custom_id' => $id]);
          
       

        

        return redirect()->to('products?cat='.$request->category_id)->with('success', 'Product created successfully.');
    }
    public function generateInvoiceId()
    {
        $trackingid = rand(100000, 999999);
        return $this->checkInvoiceId($trackingid);
    }
    public function checkInvoiceId($trackingdid)
    {
        $verifytrackingid = Product::where('custom_id', $trackingdid)->get();
        if (count($verifytrackingid) == 0) {
            return $trackingdid;
        } else {
            return $this->generateInvoiceId();
        }
    }


    public function show(Product $product)
    {
        return view('modules.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
      
        return view('modules.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
    if(auth()->user()->hasrole('User')){
        $id=auth()->user()->id;
        $oldpv=$product->bv ?? 0;
        $commingpv=$request->bv ?? 0;
        $this->updatePvStorewallet($id,$oldpv,'up');
        $wallet_balance=$this->balancePvStorewallet($id);
        if($wallet_balance<$commingpv){
            $this->updatePvStorewallet($id,$oldpv,'down');
            return redirect()->back()->with('error', 'Store Pv Wallet Balance Low.');
        }
       
        $this->updatePvStorewallet($id,$commingpv,'down');
    }
        $product->update($request->all());
        return redirect()->to('products?cat='.$product->category_id)->with('success', 'Product updated successfully.');
    }

    public function destroy($product)
    {
        $product =Product::findOrFail($product);
        $category_id=$product->category_id;
        $product->delete();
        return redirect()->to('products?cat='.$category_id)->with('success', 'Product deleted successfully.');

    }
}
