@extends('layout.layout')
 @section('content')


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
                <div class="row">
                    
                    <div class="col">
                       <h3>{{$category?->name}}</h3>
                    </div>
                    <div class="col text-end">
                        <a href="/digital_library/create?cat={{$category?->id}}" class="btn btn-primary">Add New</a>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($digital_library as $product)
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
                        <div class="row">
                            <div class="col">
                            <a href="{{ route('digital_library.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col mt-2">
                            <form action="{{ route('digital_library.destroy', $product->id) }}" method="POST">
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
                        <!-- <th class="invisible"></th> -->
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                       
        </tfoot>
    </table>
    
			</div>
		</div>
	</div>
</div>

@endsection

