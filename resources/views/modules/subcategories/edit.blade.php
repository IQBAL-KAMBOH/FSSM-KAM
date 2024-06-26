<!-- resources/views/products/edit.blade.php -->

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
                                    <h4>Edit Sub Category</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                            <form action="{{ route('sub-categories.update',$subcategory->id) }}" class="m-3 p-3" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-6 mb-2">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $subcategory->name }}" placeholder="Enter name">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="name">Category</label>
                                        <select class="form-control" name="category_id" id="" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $c)
                                            <option value="{{$c->id}}" <?php if($c->id==$subcategory->category_id){ echo 'selected';}?>>{{$c->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
                                    <div class="form-group col-6 mb-2">
                                        <input type="submit" name="" value="Save" class="btn btn-primary m-3" id="">
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
    @endsection