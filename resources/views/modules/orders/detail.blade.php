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
                    <div class="col text-center">
                        <h3>Customer : {{$data->customer?->name}}</h3>
                        <h3>Order Id : {{$data->custom_id}}</h3>
                    </div>
                </div>
				<table id="" class="table table-responsive border">
				
                <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>QTY</th>
                <th>Type</th>
               
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->orderItems as $datas)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $datas->name}}</td>
                    <td>{{ $datas->price}}</td>
                    <td>{{ $datas->quantity}}</td>
                    <td>
                        <?php
                        $type='';
                        if($datas->product_type=='physical_product'){
                            $type='Physical Product';
                        }else if($datas->product_type=='digital_library'){
                            $type='Library Product';
                        }else if($datas->product_type=='digital_course'){
                            $type='Digital Course';
                        }
                        ?>
                        
                    
                    
                    {{$type}}</td>
                    
                    
                    <td></td>
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
        </tfoot>
    </table>

			</div>
		</div>
	</div>
</div>

@endsection

