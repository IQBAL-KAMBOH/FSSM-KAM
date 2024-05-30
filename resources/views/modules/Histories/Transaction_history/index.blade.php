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
							<th>refral_id</th>
							<th>amount</th>
							<th>account</th>
							<th>account_name</th>
							<th>account_number</th>
							<th>tid</th>
							<th>status</th>
							<th>type</th>
							<th>date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $row)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$row->user->referral_id}}</td>
							<td>{{$row->amount}}</td>
							<td>{{$row->account}}</td>
							<td>{{$row->account_name}}</td>
							<td>{{$row->account_number}}</td>
							<td>{{$row->tid}}</td>
							<td>
							               <?php
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
							<td>{{$row->type}}</td>
							<td>{{$row->date}}</td>
							<td>
								<form method="POST" action="DeleteTransactionHistory">
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
							<th>refral_id</th>
							<th>amount</th>
							<th>account</th>
							<th>account_name</th>
							<th>account_number</th>
							<th>tid</th>
							<th>status</th>
							<th>type</th>
							<th>date</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
