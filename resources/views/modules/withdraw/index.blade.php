@extends('layout.layout') 
@section('content')

<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		@if(session()->has('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
		<br />
		@endif @if(session()->has('error'))
		<div class="alert alert-danger">
			{{ session()->get('error') }}
		</div>
		<br />
		@endif
		<div class="col-xl-12 col-lg-12 col-sm-12 table">
			<div class="widget-content widget-content-area br-8 mt-4">
				<table id="individual-col-search" class="table dt-table-hover">
					<thead>
						<tr>
							<th>Sr No.</th>
							@if(auth()->user()->hasAnyPermission(['withdraw_cancell','withdraw_approve'])) 
							<th>Name</th>
							@endif
							<th>Amount</th>
							<th>Account Title</th>
							<th>Account Number</th>
							<th>Account Type</th>
							<th>Status</th>
							<th>Date</th>
							@if(auth()->user()->hasAnyPermission(['withdraw_cancell','withdraw_approve'])) 
							<th>Action</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach($transaction as $datas)
						<tr>
							<td>{{$loop->iteration}}</td>
							@if(auth()->user()->hasAnyPermission(['withdraw_cancell','withdraw_approve'])) 
							<td>{{$datas->user?->name}}</td>
							@endif
							
							<td>{{$datas->amount}}</td>
							<td>{{$datas->account_name}}</td>
							<td>{{$datas->account_number}}</td>
							<td>{{$datas->account_type}}</td>
							<td>{{$datas->status}}</td>
							<td>{{$datas->created_at}}</td>
							@if(auth()->user()->hasAnyPermission(['withdraw_cancell','withdraw_approve'])) 
							<td>
								@if($datas->status == 'Pending')

								<div class="col-4">
									<form action="approve_withdraw" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{$datas->id}}" id="" />
										<input type="hidden" name="amount" value="{{$datas->amount}}" id="" />
										<input type="hidden" name="user_id" value="{{$datas->user_id}}" id="" />
										<input type="submit" value="Approve" name="approve_deposit" class="m-2 btn btn-success" id="" />
									</form>
								</div>
								<div class="col-4">
									<form action="cancell_withdraw" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{$datas->id}}" id="" />
										<input type="hidden" name="amount" value="{{$datas->amount}}" id="" />
										<input type="hidden" name="points" value="{{$datas->points}}" id="" />
										<input type="hidden" name="user_id" value="{{$datas->user_id}}" id="" />
										<input type="submit" value="Cancell" name="cancell_deposit" class="m-2 btn btn-danger" id="" />
									</form>
								</div>

								@endif
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr No.</th>
							@if(auth()->user()->hasAnyPermission(['withdraw_cancell','withdraw_approve'])) 
							<th>Name</th>
							@endif
							<th>Amount</th>
							<th>Account Title</th>
							<th>Account Number</th>
							<th>Account Type</th>
							<th>Status</th>
							<th>Date</th>
							@if(auth()->user()->hasAnyPermission(['withdraw_cancell','withdraw_approve'])) 
							<th>Action</th>
							@endif
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
