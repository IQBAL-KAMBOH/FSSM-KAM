<?php


namespace App\Http\Controllers\Store;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\LibraryCategory;
use App\Models\CourceCategory;
use App\Models\DigitalCource;
use App\Models\DigitalLibrary;
use App\Models\AdminAccountDetails;
use App\Models\DigitalProduct;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $b_type= 'bxd';
       
        $sections = Category::orderBy('priority', 'asc')->with('products')->get();
        
       

        return view('OnlineStore.index',compact('b_type','sections'));
    }
    public function index2()
    {   
         
        $b_type= 'byd';
        $sections = Category::orderBy('priority', 'asc')->get();
    
       
        return view('OnlineStore.index',compact('b_type','sections'));
    }
    public function productByCategory($id,$b_type)
    {
       
       $section=Category::find($id);
      
        $data = Product::orderBy('id', 'desc')->where('category_id', $id)->get();
        return view('OnlineStore.all-products',compact('data','b_type','section'));
    }
    
    
    
    public function cart()
    {
        
        return view('OnlineStore.cart');
    }
    
   
    public static function getProductsAll($id)
    {   $chunkSize = 4;
        $settings = AdminAccountDetails::find(1);
        
        $chunkSize=$settings->chunk_size ?? 4;
        $data = Product::orderBy('id', 'desc')->where('category_id', $id)->limit($chunkSize)->get();
 
        return $data;
    }
   
   
   
   
    public function detail($id,$type)
    {
        $data=Product::find($id);

        return view('OnlineStore.product_details',compact('data','type'));
    }
    
   

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.categories.add');
    }
    public function shopNow()
    {
        return 1;
    }


    /**
     * Store a newly created category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Category::create($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('modules.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from the database.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
