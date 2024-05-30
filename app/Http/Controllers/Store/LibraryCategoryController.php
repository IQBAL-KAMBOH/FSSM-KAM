<?php


namespace App\Http\Controllers\Store;
use App\Http\Controllers\Controller;
use App\Models\LibraryCategory;
use Illuminate\Http\Request;

class LibraryCategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LibraryCategory::all();

        return view('modules.library_categories.index', compact('data'));
    }
    public static function allCategories()
    {
        $data = LibraryCategory::all();

        return $data;
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.library_categories.add');
    }

    /**
     * Store a newly created category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        LibraryCategory::create($request->all());
        return redirect()->route('library_categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\LibraryCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $category=LibraryCategory::find($category);
        return view('modules.library_categories.edit', compact('category'));
    }

    /**
     * Update the specified category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LibraryCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $category=LibraryCategory::find($category);

        $category->update($request->all());

        return redirect()->route('library_categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from the database.
     *
     * @param  \App\Models\LibraryCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $category = LibraryCategory::findOrFail($category);
        $category->delete();

        return redirect()->route('library_categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
