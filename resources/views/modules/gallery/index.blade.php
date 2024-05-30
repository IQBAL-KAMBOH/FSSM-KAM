@extends('layout.layout')
@section('title','Gallery')
@section('content') 
 
<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

    <div class="row layout-top-spacing">


        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Important Information</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->
        @hasrole('Admin')
        <div class="row layout-top-spacing">
          <form action="gallery" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
            <input type="file" name="file" required class="form-control" id="" accept="image/*,.pdf,audio/*">
            </div>
            <input type="hidden" name="file_type" value="gallery" id="">
            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
               <input type="text" name="title" class="form-control" id="">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
               
                
            <input type="submit" value="Upload" class="btn btn-success">
              
            </div>

           </div>
            
         </form>
        </div>
        @endhasrole
        <div class="row">
            @foreach($images as $image)
             <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card style-2 mb-md-0 mb-4" >
                    <?php
                    $pdf='/src/assets/img/default_pdf.png';
                    $audio='/src/assets/img/default_audio.png';
                    $file='/src/assets/img/default_file.png';
                    if (strpos($image->filepath, 'pdf') == false && strpos($image->filepath, 'mp3') == false )
                    {
                        $fpath=$image->filepath;
                    }else if (strpos($image->filepath, 'pdf') != false){
                        $fpath=$pdf;

                    }else if (strpos($image->filepath, 'mp3') != false ){
                        
                        $fpath=$audio;
                    }else{
                        $fpath=$file;
                    }
                    ?>
                    <img src="{{$fpath}}" onclick="window.open('{{$image->filepath}}')" class="card-img-top" alt="...">
                    
                    <div class="card-body px-0 pb-0">
                        <h5 class="card-title mb-3">{{$image->title}}</h5>
                        <div class="media mt-4 mb-0 pt-1">
                        <?php
                          $url='/src/assets/img/default_pic.webp';
                          if($image->userDetail?->profile_pic!=null){
                            $url=$image->userDetail?->profile_pic;
                          }
                        ?>
                            
                            <div class="media-body">
                            @hasrole('Admin')
                              <form action="{{ route('gallery.destroy', $image->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                             @endhasrole
                            </div>
                        </div>
                    </div>
                        </div>
            </div>
            @endforeach
        </div> 


                        </div>    
                        </div>    
                        </div>    
@endsection