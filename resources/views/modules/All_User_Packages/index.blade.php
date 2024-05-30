
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
							<th>User</th>
							<th>Position</th>
							<th>Package_name</th>
							<th>Package_Price</th>
							<th>Packages_Points</th>
							<th>Pair_Points</th>
							<th>Commission_Points</th>
							<th>Bv</th>
							<th>Direct_Points</th>
							<th>Register_Points</th>
							<th>Total_amount</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($plans as $datas)
						<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$datas->user?->name}}</td>
						<td>{{$datas->position_id}}</td>
						<td>{{$datas->packages?->packages}}</td>
						<td>{{$datas->packages?->package_price}}</td>
						<td>{{$datas->packages?->package_points}}</td>
						<td>{{$datas->packages?->pair_points}}</td>
						<td>{{$datas->packages?->commission_points}}</td>
						<td>{{$datas->packages?->bv}}</td>
						<td>{{$datas->direct_points}}</td>
						<td>{{$datas->register_points}}</td>
						<td>{{$datas->total_amount}}</td>
						
							
						
							
							
						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
						<th>Sr No.</th>
							<th>User</th>
							<th>Position</th>
							<th>Package_name</th>
							<th>Package_Price</th>
							<th>Packages_Points</th>
							<th>Pair_Points</th>
							<th>Commission_Points</th>
							<th>Bv</th>
							<th>Direct_Points</th>
							<th>Register_Points</th>
							<th>Total_amount</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

