<?php


namespace App\Http\Controllers\Store;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\CourceCategory;
use App\Models\SubCategory;
use App\Models\Size;
use App\Models\DigitalCource;
use Illuminate\Http\Request;

class DigitalProductController extends Controller
{
    public function index()
    {
        $id=auth()->user()->id;
        if(empty($_REQUEST['cat']) || !isset($_REQUEST['cat'])){
            
            return redirect()->to('/cource-cats')->with('error', 'Category not Found.');
        }
        $cat_id=$_REQUEST['cat'];
        $category = CourceCategory::find($cat_id);
        if(auth()->user()->hasrole('Admin')){
             $digital_cources = DigitalCource::where('category_id',$cat_id)->get();
        }else{
             $digital_cources = DigitalCource::where('category_id',$cat_id)->where('custom_id',$id)->get();
        }
     
        return view('modules.digital_cources.index', compact('digital_cources','category'));
    }
    public function productCats()
    {
        $data = CourceCategory::all();

        return view('modules.digital_cources.index-cats', compact('data'));
    }
    public function create()
    {
       
        if(empty($_REQUEST['cat']) || !isset($_REQUEST['cat'])){
            
            return redirect()->to('/cource-cats')->with('error', 'Category not Found.');
        }
        $cat_id=$_REQUEST['cat'];
        $category = CourceCategory::find($cat_id);
       
        return view('modules.digital_cources.add', compact('category'));
    }
    public static function countProductChunks($id, $chunkSize)
    {
        $totalProducts = DigitalCource::where('category_id', $id)->count();
    
        // Calculate the number of chunks
        $numChunks = ceil($totalProducts / $chunkSize);
    
        return $numChunks;
    }
    
    public function store(Request $request)
    {
        $id=auth()->user()->id;
        if(auth()->user()->hasrole('User')){
      
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
       $product=DigitalCource::create($request->except('file')+['image' =>$pic,'custom_id' => $id]);
          
       

        
       return redirect()->to('digital_cources?cat='.$request->category_id)->with('success', 'Product created successfully.');
       
    }
    public function generateInvoiceId()
    {
        $trackingid = rand(100000, 999999);
        return $this->checkInvoiceId($trackingid);
    }
    public function checkInvoiceId($trackingdid)
    {
        $verifytrackingid = DigitalCource::where('custom_id', $trackingdid)->get();
        if (count($verifytrackingid) == 0) {
            return $trackingdid;
        } else {
            return $this->generateInvoiceId();
        }
    }


    public function show(DigitalCource $product)
    {
        return view('modules.digital_cources.show', compact('product'));
    }

    public function edit($product)
    {
        
        $product=DigitalCource::find($product);
        return view('modules.digital_cources.edit', compact('product'));
    }

    public function update(Request $request, DigitalCource $product)
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
        return redirect()->to('digital_cources?cat='.$request->category_id)->with('success', 'Product updated successfully.');
    }

    public function destroy($product)
    {
        $product =DigitalCource::findOrFail($product);
        $category_id=$product->category_id;
        $product->delete();
        return redirect()->to('digital_cources?cat='.$category_id)->with('success', 'Product deleted successfully.');


       
    }
}
