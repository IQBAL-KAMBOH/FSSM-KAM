<?php


namespace App\Http\Controllers\Store;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\LibraryCategory;
use App\Models\SubCategory;
use App\Models\Size;
use App\Models\DigitalLibrary;
use Illuminate\Http\Request;

class DigitalLibraryController extends Controller
{
    public function index()
    {
        $id=auth()->user()->id;
        if(empty($_REQUEST['cat']) || !isset($_REQUEST['cat'])){
            
            return redirect()->to('/library-cats')->with('error', 'Category not Found.');
        }
        $cat_id=$_REQUEST['cat'];
        $category = LibraryCategory::find($cat_id);
        if(auth()->user()->hasrole('Admin')){
            $digital_library = DigitalLibrary::where('category_id',$cat_id)->get();
        }else{
            $digital_library = DigitalLibrary::where('category_id',$cat_id)->where('custom_id',$id)->get();
        }
      
        return view('modules.digital_library.index', compact('digital_library','category'));
    }
    public function productCats()
    {
        $data = LibraryCategory::all();

        return view('modules.digital_library.index-cats', compact('data'));
    }

    public function create()
    {
        
        if(empty($_REQUEST['cat']) || !isset($_REQUEST['cat'])){
            
            return redirect()->to('/library-cats')->with('error', 'Category not Found.');
        }
        $cat_id=$_REQUEST['cat'];
        $category = LibraryCategory::find($cat_id);
        return view('modules.digital_library.add', compact('category'));
    }
    public static function countProductChunks($id, $chunkSize)
    {
        $totalProducts = DigitalLibrary::where('category_id', $id)->count();
    
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
       $product=DigitalLibrary::create($request->except('file')+['image' =>$pic,'custom_id' => $id]);
          
       

        
       return redirect()->to('digital_library?cat='.$request->category_id)->with('success', 'Product created successfully.');
       
    }
    public function generateInvoiceId()
    {
        $trackingid = rand(100000, 999999);
        return $this->checkInvoiceId($trackingid);
    }
    public function checkInvoiceId($trackingdid)
    {
        $verifytrackingid = DigitalLibrary::where('custom_id', $trackingdid)->get();
        if (count($verifytrackingid) == 0) {
            return $trackingdid;
        } else {
            return $this->generateInvoiceId();
        }
    }


    public function show(DigitalLibrary $product)
    {
        return view('modules.digital_library.show', compact('product'));
    }

    public function edit($DigitalLibrary)
    {
       
        $DigitalLibrary=DigitalLibrary::find($DigitalLibrary);

        return view('modules.digital_library.edit', compact('DigitalLibrary'));
    }

    public function update(Request $request, DigitalLibrary $DigitalLibrary)
    {
        if(auth()->user()->hasrole('User')){
        $id=auth()->user()->id;
        $oldpv=$DigitalLibrary->bv ?? 0;
        $commingpv=$request->bv ?? 0;
        $this->updatePvStorewallet($id,$oldpv,'up');
        $wallet_balance=$this->balancePvStorewallet($id);
        if($wallet_balance<$commingpv){
            $this->updatePvStorewallet($id,$oldpv,'down');
            return redirect()->back()->with('error', 'Store Pv Wallet Balance Low.');
        }
       
        $this->updatePvStorewallet($id,$commingpv,'down');
    }
        $DigitalLibrary->update($request->all());
        return redirect()->to('digital_library?cat='.$request->category_id)->with('success', 'Product updated successfully.');
       
    }

    public function destroy($DigitalLibrary)
    {
        $DigitalLibrary=DigitalLibrary::find($DigitalLibrary);
        $category_id=$DigitalLibrary->category_id;
        $DigitalLibrary->delete();
        return redirect()->to('digital_library?cat='.$category_id)->with('success', 'Product deleted successfully.');
    }
}
