<?php


namespace App\Http\Controllers\Store;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SubCategoryController extends Controller
{
    /**
     * Show the form for creating a new subcategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SubCategory::all();

        return view('modules.subcategories.index', compact('data'));
    }
    function getSubCategories(Request $request){
        $data= SubCategory::where('category_id',$request->id)->get();
        return response(['data'=> $data],200);
    }
    public function create()
    {
        $categories = Category::all();
        return view('modules.subcategories.add', compact('categories'));
    }
    /**
     * Store a newly created subcategory in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        SubCategory::create($request->all());
        return redirect()->route('sub-categories.index')
            ->with('success', 'Subcategory created successfully.');
    }

    /**
     * Show the form for editing the specified subcategory.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($subcategory)
    {
        $subcategory = SubCategory::find($subcategory);
        $categories = Category::all();
        return view('modules.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified subcategory in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$subcategory)
    {
         $subcategory=SubCategory ::find($subcategory);
        $subcategory->update($request->all());
        return redirect()->route('sub-categories.index')
            ->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified subcategory from the database.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('sub-categories.index')
            ->with('success', 'Subcategory deleted successfully.');
    }
}
