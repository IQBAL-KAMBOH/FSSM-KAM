<?php


namespace App\Http\Controllers\Store;
use App\Http\Controllers\Controller;
use App\Models\CourceCategory;
use Illuminate\Http\Request;

class CourceCategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CourceCategory::all();

        return view('modules.cource_categories.index', compact('data'));
    }
    public static function allCategories()
    {
        $data = CourceCategory::all();

        return $data;
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.cource_categories.add');
    }

    /**
     * Store a newly created category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        CourceCategory::create($request->all());
        return redirect()->route('cource_categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\CourceCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $category=CourceCategory::find($category);
        return view('modules.cource_categories.edit', compact('category'));
    }

    /**
     * Update the specified category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourceCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $category=CourceCategory::find($category);

        $category->update($request->all());

        return redirect()->route('cource_categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from the database.
     *
     * @param  \App\Models\CourceCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
    
        $category = CourceCategory::findOrFail($category);
        $category->delete();

        return redirect()->route('cource_categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
