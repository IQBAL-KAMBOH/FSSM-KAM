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
                                    <h4>Create {{$category->name}}</h4>
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
                            <form action="{{ route('digital_cources.store') }}" class="m-3 p-3" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6 mb-2">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" required name="name" id="name" value="{{ old('name') }}" placeholder="Enter name">
                                    </div>
                                    <!-- <div class="form-group col-6 mb-2">
                                        <label for="code">Code</label>
                                        <input type="text" class="form-control" name="code" id="code" value="{{ old('code') }}" placeholder="Enter code">
                                    </div> -->
                                    <div class="form-group col-6 mb-2">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="Enter description">
                                    </div>
                                    <!-- <div class="form-group col-6 mb-2">
                                        <label for="purchase_price">Purchase Price</label>
                                        <input type="text" class="form-control" name="purchase_price" id="purchase_price" value="{{ old('purchase_price') }}" placeholder="Enter purchase price">
                                    </div> -->
                                    <div class="form-group col-6 mb-2">
                                        <label for="sale_price">Sale Price</label>
                                        <input type="text" class="form-control" required name="sale_price" id="sale_price" value="{{ old('sale_price') }}" placeholder="Enter sale price">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="delivery_charges">Delivery Charges</label>
                                        <input type="text" class="form-control" name="delivery_charges" id="delivery_charges" value="{{ old('delivery_charges') }}" placeholder="Delivery Charges">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="quantity">Quantity</label>
                                        <input type="text" class="form-control" name="quantity" id="quantity" value="{{ old('quantity') }}" placeholder="Enter quantity">
                                    </div>
                                    <!-- <div class="form-group col-6 mb-2">
                                        <label for="tax">Tax</label>
                                        <input type="text" class="form-control" name="tax" id="tax" value="{{ old('tax') }}" placeholder="Enter tax">
                                    </div> -->
                                    <!-- <div class="form-group col-6 mb-2">
                                        <label for="dp">Dp Points</label>
                                        <input type="text" class="form-control" required name="dp" id="dp" value="{{ old('dp') }}" placeholder="Enter Dp Points">
                                    </div> -->
                                    <div class="form-group col-6 mb-2">
                                        <label for="dp">Pv Points</label>
                                        <input type="text" class="form-control" required name="bv" id="bv" value="{{ old('bv') }}" placeholder="Enter Bv Points">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="dp">Supplier Name</label>
                                        <input type="text" class="form-control" required name="supplier_name" id="supplier_name" value="{{ old('supplier_name') }}" placeholder="Enter Supplier Name">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="dp">Supplier Number</label>
                                        <input type="number" class="form-control" required name="supplier_number" id="supplier_number" value="{{ old('supplier_number') }}" placeholder="Enter Supplier Number">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="dp">Account Type</label>
                                        <input type="text" class="form-control" required name="account_type" id="account_type" value="{{ old('account_type') }}" placeholder="Enter Account Type">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="tax">Image</label>
                                        <input type="file" class="form-control" name="file" id="image" value="{{ old('tax') }}">
                                    </div>
                                            
                                           
<!--                                             
                                            <div class="col">
                                              
                                              <select class="form-control" name="subcategory_id" id="subcategory_id_1">
                                               <option value="">Select Subcategory</option>
                                               </select>
                                          </div> -->
                                          
                                            
                                       
                                    <div class="form-group col-6 mb-2">
                                    <input type="hidden" name="category_id" value="{{$category->id}}" id="">
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
<script>
 
    function getSubcategories(id,count){
    var option = `<option value="">Choose one.....</option>`;
    $('#subcategory_id_'+count).html(option);
    $.ajax({
		url: "/get-sub-categories",
		type: "POST",
		data: {
			id: id,
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data[0].id);
            dataResult.data.forEach(element => {
                var option = `<option value="${element.id}">${element.name}</option>`;
                $('#subcategory_id_'+count).append(option);
              }); 
           
			
		}
        
    
    }); 

}


</script>
@endsection
