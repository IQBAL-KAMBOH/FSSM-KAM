@extends('layout.layout') @section('content')

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
							<th>User</th>
							<th>Amount</th>
							<th>Account</th>
							<th>Account Name</th>
							<th>Account Number</th>
							<th>Status</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $row)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$row->user?->name}}</td>
							<td>{{$row->amount}}</td>
							<td>{{$row->account}}</td>
							<td>{{$row->account_name}}</td>
							<td>{{$row->account_number}}</td>
							<td><?php
                                            if($row->status=='Approved'){
                                                $status_color='success';
                                            }else if($row->status=='Pending'){
                                                $status_color='warning';
                                            }else{
                                                $status_color='danger';
                                            }
											
                                            ?>
								
								<span class="badge badge-<?php echo $status_color;?>">{{$row->status}}</span>
								</td>
							<td>{{$row->created_at}}</td>
							<td>
								<form method="POST" action="DeleteWithdrawTransactionHistory">
									@csrf
									<input type="hidden" name="id" value="{{$row->id}}" />
									<button type="submit" class="btn btn-danger">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr No.</th>
							<th>User</th>
							<th>Amount</th>
							<th>Account</th>
							<th>Account Name</th>
							<th>Account Number</th>
							<th>Status</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
