<!-- resources/views/products/create.blade.php -->

@extends('layout.layout')

@section('content')

<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-top-spacing">

            <div class="middle-content container-xxl p-0">
                <!--- registration form start --->
                <div class="col-lg-12 col-12  layout-spacing">

                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Add Posters</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                            <form action="{{ route('posters.store') }}" class="m-3 p-3" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                    <div class="form-group col-6 mb-2">
                                        <label for="tax">Image</label>
                                        <input type="file" class="form-control" name="file" id="image" value="{{ old('tax') }}">
                                    </div>
                                    <div class="form-group mb-2 col-6">
                                        <label for="category">Type</label>

                                             <select class="form-control" required name="type" id="">
                                               <option value="">Select Type</option>
                                               <option value="Store">Store</option>
                                               <option value="Pannel">User Pannel</option>
                                                
                                             </select>
                                            </div>
                                            
                                        
                                          
                                            
                                       
                                    <div class="form-group col-6 mb-2">
                                        <input type="submit" name="" value="Save" class="btn btn-primary m-3" id="">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--- registration form end --->
            </div>
            <!--- main divs ending start --->
        </div>
    </div>
</div>

@endsection
