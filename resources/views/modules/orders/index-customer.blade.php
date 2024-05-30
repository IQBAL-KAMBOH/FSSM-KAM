@extends('layout.layout')
 @section('content')


<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-3">
		
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
                    <div class="col text-start">
                        <h3>Customer Orders</h3>
                    </div>
                </div>
				<table id="individual-col-search" class="table dt-table-hover">
				
                <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Full Name</th>
                <th>Last Name</th>
                <th>Full Address</th>
                <th>Email</th>
                <th>WhatsApp Number</th>
                <th>Amount</th>
                <th>Delivery Charges</th>
                <th>Grand Total</th>
                <th>DP</th>
                <th>Pv</th>
                <th>Status</th>
                <th>Screen Shot</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $datas)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $datas->customer?->name }}</td>
                    <td>{{ $datas->full_name }}</td>
                    <td>{{ $datas->last_name_name }}</td>
                    <td>{{ $datas->full_address }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>{{ $datas->whatsapp_number }}</td>
                    <td>{{ $datas->total_amount }}</td>
                    <td>{{ $datas->delivery_charges }}</td>
                    <td>{{ $datas->total_amount+$datas->delivery_charges }}</td>
                    <td>{{ $datas->total_dp }}</td>
                    <td>{{ $datas->total_bv }}</td>
                    <td>{{ $datas->status }}</td>
                    <td><a href="{{ $datas->screen_shot }}" target="_blank"><img src="{{ $datas->screen_shot }}" alt="" width="100px;"></a></td>
                    
                    <td>                  
                    @if(auth()->user()->hasDirectPermission('order_apc'))
                                           @if($datas->status ==NULL)
								            <form action="approve-order-status" method="POST">
									        @csrf
									       <input type="hidden" name="id" value="{{$datas->id}}"  />
									       <input type="submit" value="Approve" name="approve" class="btn btn-success" id="" />
							
								            </form>
                                            <form action="cancell-order-status" method="POST">
									        @csrf
									       <input type="hidden" name="id" value="{{$datas->id}}"  />
									       <input type="submit" value="Cancell" name="cancell" class="btn btn-danger" id="" />
							
								            </form>
								
									        @endif
                            @endif
                                           
                        <form action="/order-details" method="post">
                            @csrf 
                            <input type="hidden" name="id" value="{{$datas->id}}" id="">
                            <input type="submit" class="btn btn-outline-warning" value="View" name="" id="">
                        </form>
                       
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

