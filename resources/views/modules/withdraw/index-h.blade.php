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
							
							<th>Amount</th>
							<th>Account Type</th>
							<th>Status</th>
							<th>Date</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($transaction as $datas)
						<tr>
							<td>{{$loop->iteration}}</td>
							
							
							<td>{{$datas->amount}}</td>
							<td>{{$datas->account_type}}</td>
							<td>{{$datas->status}}</td>
							<td>{{$datas->created_at}}</td>
							
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr No.</th>
							
							<th>Amount</th>
							<th>Account Type</th>
							<th>Status</th>
							<th>Date</th>
							
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
