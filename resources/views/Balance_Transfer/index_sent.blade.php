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
			<h2 class="p-2 m-2">Balance Sent</h2>
				<table id="individual-col-search" class="table dt-table-hover">
					<thead>
						<tr>
							<th>Sr No.</th>
							
							<th>Sended To</th>
							<th>Points</th>
							<th>Date</th>
							<th>Point Type</th>
							
							
						</tr>
					</thead>
					<tbody>
						@foreach($data as $row)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$row->user?->name}}</td>
							<td>{{$row->points}}</td>
							<td>{{$row->created_at}}</td>
							<td>{{$row->point_type}} Points</td>
							
							
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
						    <th>Sr No.</th>
							<th>Sended To</th>
							<th>Points</th>
							<th>Date</th>
							<th>Point Type</th>
							
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
