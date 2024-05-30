<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
     // GalleryController.php
public function index()
{
    $images = Gallery::all();
    return view('modules.gallery.index', compact('images'));
}
public static function getImages($type)
{
    $images = Gallery::where('filestype',$type)->get();
    return $images;
}
public static function getImage($id)
{
    $image = Gallery::find($id);
    return $image;
}
public function store(Request $request)
{
    $filename='';
    $filepath='';
    if ($_FILES['file']['name']) {
        if (!$_FILES['file']['error']) {
            
            $image = $request->file('file');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('src/assets/uploads/Gallery/'), $imageName);
            $imagePath = '/src/assets/uploads/Gallery/' . $imageName;
    
            $filepath=$imagePath;
            $filename=$imageName;
            
            $galleryImage = new Gallery();
            $galleryImage->title = $request->title;
            $galleryImage->filename = $filename;
            $galleryImage->filepath = $filepath;
            $galleryImage->filestype = $request->file_type;
            $galleryImage->user_id = Auth::user()->id;
            $galleryImage->save();
            
        } else {
            
            return response()->json(['message' => 'Error uploading profile picture. Please try again later.'], 400);
        }
    }

    

    return redirect()->back();
}


public function select(Request $request)
{
    $selectedImage = Gallery::find($request->input('image_id'));
    // Use the selected image
}
public function destroy($pdf)
    {
        $pdf=Gallery::find($pdf);
        $pdf->delete();

        return redirect()->route('gallery.index')->with('success', 'Deleted successfully.');
    }
}
