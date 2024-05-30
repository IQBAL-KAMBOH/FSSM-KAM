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
                                    <h4>Edit Product</h4>
                                </div>
                            </div>
                        </div>
                        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <br />
        @endif
         @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        <br />
        @endif
                        <div class="widget-content widget-content-area">
                            <form action="{{ route('digital_cources.update', $product->id) }}" class="m-3 p-3" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-6 mb-2">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" required name="name" id="name" value="{{ $product->name }}" placeholder="Enter name">
                                    </div>
                                    <!-- <div class="form-group col-6 mb-2">
                                        <label for="code">Code</label>
                                        <input type="text" class="form-control" name="code" id="code" value="{{ $product->code }}" placeholder="Enter code">
                                    </div> -->
                                    <div class="form-group col-6 mb-2">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" name="description" id="description" value="{{ $product->description }}" placeholder="Enter description">
                                    </div>
                                    <!-- <div class="form-group col-6 mb-2">
                                        <label for="purchase_price">Purchase Price</label>
                                        <input type="text" class="form-control" name="purchase_price" id="purchase_price" value="{{ $product->purchase_price }}" placeholder="Enter purchase price">
                                    </div> -->
                                    <div class="form-group col-6 mb-2">
                                        <label for="sale_price">Sale Price</label>
                                        <input type="text" class="form-control" required name="sale_price" id="sale_price" value="{{ $product->sale_price }}" placeholder="Enter sale price">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="delivery_charges">Delivery Charges</label>
                                        <input type="text" class="form-control" name="delivery_charges" id="delivery_charges" value="{{ $product->delivery_charges}}" placeholder="Delivery Charges">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="quantity">Quantity</label>
                                        <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $product->quantity }}" placeholder="Enter quantity">
                                    </div>
                                    <!-- <div class="form-group col-6 mb-2">
                                        <label for="tax">Tax</label>
                                        <input type="text" class="form-control" name="tax" id="tax" value="{{ $product->tax }}" placeholder="Enter tax">
                                    </div> -->
                                    <!-- <div class="form-group col-6 mb-2">
                                        <label for="dp">Dp Points</label>
                                        <input type="text" class="form-control" required name="dp" id="dp" value="{{ $product->dp}}" placeholder="Enter Dp Points">
                                    </div> -->
                                    <div class="form-group col-6 mb-2">
                                        <label for="bv">Pv Points</label>
                                        <input type="text" class="form-control" required name="bv" id="bv" value="{{ $product->bv }}" placeholder="Enter Bv Points">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="dp">Supplier Name</label>
                                        <input type="text" class="form-control" required name="supplier_name" id="supplier_name" value="{{ $product->supplier_name}}" placeholder="Enter Supplier Name">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="dp">Supplier Number</label>
                                        <input type="number" class="form-control" required name="supplier_number" id="supplier_number" value="{{ $product->supplier_number}}" placeholder="Enter Supplier Number">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="dp">Account Type</label>
                                        <input type="text" class="form-control" required name="account_type" id="account_type" value="{{ $product->account_type}}" placeholder="Enter Account Type">
                                    </div>
                                   
                                    <div class="form-group col-6 mb-2">
                                    <input type="hidden" name="category_id" value="{{$product->category_id}}" id="">
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
    @endsection