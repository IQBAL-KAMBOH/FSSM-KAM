@extends('layout.layout')
 @section('content')


<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		
		<div class="col-xl-12 col-lg-12 col-sm-12 table p-2">

          <h2 class="p-4">All Packages</h2>
        
        @if(isset($_GET['success']))
		<div class="alert alert-success">
			{{ $_GET['success'] }}
		</div>
		<br />
		@endif
         @if(isset($_GET['error']))
		<div class="alert alert-danger">
        {{ $_GET['error'] }}
		</div>
		<br />
		@endif


			<div class="widget-content widget-content-area br-8 mt-4">
                
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
				<table id="individual-col-search" class="table dt-table-hover">
					<thead>
						<tr>
                            <th>#</th>
						    <th>Name</th>
                            <th>Price</th>
                            <th>Package Points</th>
                            <th>Pair Points</th>
                            <th>Commission points</th>
                            <th>Bv</th>
                            <th>Pair Point 2</th>
                            <th>Pair 1</th>
                            <th>Pair limit</th>
                            <th>Future Points Limit</th>
                            <th>Future Points Pair Count</th>
                            <th>Store Wallet Start CBV</th>
                            <th>Store Wallet Add Commission</th>
                            <th>DP %</th>
                            <th>RP %</th>
                            <th>DP Required</th>
                            <th>RP Required</th>
                          
                            <th>Action</th>
                           
						</tr>
					</thead>
					<tbody>
						                @foreach($data as $datas)
					                 	<tr>
						              	<td>{{$loop->iteration}}</td>
                            <td>{{$datas->packages}}</td>
                            <td>{{$datas->package_price}}</td>
                            <td>{{$datas->package_points}}</td>
                            <td>{{$datas->pair_points}}</td>
                            <td>{{$datas->commission_points}}</td>
                            <td>{{$datas->bv}}</td>
                            <td>{{$datas->pair_points_2}}</td>
                            <td>{{$datas->pair_1}}</td>
                            <td>{{$datas->pair_limit}}</td>
                            <td>{{$datas->future_point_limit}}</td>
                            <td>{{$datas->future_point_pair_count}}</td>
                            <td>{{$datas->sotre_wallet_limit}}</td>
                            <td>{{$datas->store_percentage}}</td>
                            <td>{{$datas->direct_points_percent}}</td>
                            <td>{{$datas->register_points_percent}}</td>
                            <td>{{$datas->dp_required}}</td>
                            <td>{{$datas->rp_required}}</td>
                            <td>
                                 <form action="edit-package" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$datas->id}}">
                                   
                                    <button type="submit" class="btn btn-secondary">Edit</button>
                                </form>
                            </td>
                            
							
						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
                            <th>#</th>
						               	<th>Name</th>
                            <th>Price</th>
                            <th>Package Points</th>
                            <th>Pair Points</th>
                            <th>Commission points</th>
                            <th>Bv</th>
                            <th>Pair Point 2</th>
                            <th>Pair 1</th>
                            <th>Pair limit</th>
                            <th>Future Points Limit</th>
                            <th>Future Points Pair Count</th>
                            <th>Store Wallet Limit</th>
                            <th>Store Wallet Percentage</th>
                            <th class="invisible">Action</th>
                            <th class="invisible">Action</th>
                            <th class="invisible">Action</th>
                            <th class="invisible">Action</th>
                            <th class="invisible">Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

