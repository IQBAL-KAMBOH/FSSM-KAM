<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posters = Poster::all();
        return view('modules.posters.index', compact('posters'));
    }

    public function create()
    {
        return view('modules.posters.add');
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pic='';
        if ($_FILES['file']['name']) {       
            if (!$_FILES['file']['error']) {
                  $image = $request->file('file');
                  $imageName = time() . '_' . $image->getClientOriginalName();  
                  $destination ='uploads/Posters/'.$imageName ;
                  $request->file->move(public_path('uploads/Posters'), $imageName);
                  $pic = $destination;
            }else{
                echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
           
          }
       $posters=Poster::create($request->except('file')+['image' =>$pic]);
          
       

        

        return redirect()->route('posters.index')->with('success', 'Poster created successfully.');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function show(Poster $poster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function edit(Poster $poster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poster $poster)
    {
        //
    }
    public static function getPosters($type)
    {
        $data = Poster::where('type',$type)->get();

        return $data;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poster $poster)
    {
        $poster->delete();

        return redirect()->route('posters.index')->with('success', 'Poster deleted successfully.');
    }
}
