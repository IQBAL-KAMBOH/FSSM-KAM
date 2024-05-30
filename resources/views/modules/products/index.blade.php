@extends('layout.layout')
 @section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
 


<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		
		<div class="col-xl-12 col-lg-12 col-sm-12 table">
        
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
			<div class="widget-content widget-content-area br-8 mt-4">
                <div class="row p-3">
                    <div class="col">
                       <h3>{{$category?->name}}</h3>
                    </div>
                    <div class="col text-end">
                        <a href="/products/create?cat={{$category?->id}}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
				<table id="individual-col-search" class="table dt-table-hover">
				
                <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Sale Price</th>
                <!-- <th>Dp Points</th> -->
                <th>Pv Points</th>
                <th>Supplier Name</th>
                <th>Supplier Number</th>
                <th>Account Type</th>
                <th>Image</th>
                <th>Link Copy</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->sale_price}}</td>
                    <!-- <td>{{ $product->dp}}</td> -->
                    <td>{{ $product->bv}}</td>
                    <td>{{ $product->supplier_name}}</td>
                    <td>{{ $product->supplier_number}}</td>
                    <td>{{ $product->account_type}}</td>
                    <td><img src="{{ $product->image }}" height="60px" width="60px" alt=""></td>
                    
                    <td>
                       
                        <input type="hidden" value="{{ url('/product-details')}}/{{$product->id}}/bxd" name="" id="bxdcopy_{{$product->id}}">
                        <input type="hidden" value="{{ url('/product-details')}}/{{$product->id}}/byd" name="" id="bydcopy_{{$product->id}}">
                        <?php
                        $bxdCopy='bxdcopy_'.$product->id;
                        $bydCopy='bydcopy_'.$product->id;
                        ?>
                        
                        <button id="B2B_copy_button_{{$product->id}}" onclick="copyToClipboard('{{$bxdCopy}}',{{$product->id}},'B2B')" class="btn btn-secondary">B2B</button>
                       
                          <button id="B2C_copy_button_{{$product->id}}" onclick="copyToClipboard('{{$bydCopy}}',{{$product->id}},'B2C')" class="btn btn-secondary">B2C</button>
                        
                        
                       
                    </td>
                    <td>
                        <div class="row">
                            <div class="col">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col mt-2">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                            </div>
                        </div>
                        
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
      
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                       
        </tfoot>
    </table>
    
			</div>
		</div>
	</div>
</div>
<script>
    function copyToClipboard(id, item_id,type) {
        var inputElement = document.getElementById(id);
        var textToCopy = inputElement.value;

        navigator.clipboard.writeText(textToCopy).then(function () {
            console.log('Text copied to clipboard:', textToCopy);
            $("#"+type+"_copy_button_" + item_id).html('Copied!');
            setTimeout(function () {
                $("#"+type+"_copy_button_" + item_id).html(type);
            }, 2000);
        }).catch(function (err) {
            console.error('Unable to copy text to clipboard', err);
            $("#"+type+"_copy_button_" + item_id).html(type);
        });
    }
</script>

@endsection

