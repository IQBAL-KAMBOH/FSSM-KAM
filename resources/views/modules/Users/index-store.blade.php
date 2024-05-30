@extends('layout.layout')
 @section('content')


<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		
		<div class="col-xl-12 col-lg-12 col-sm-12 table m-2">
		<h2 class="p-3">Pv Transfer History</h2>
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
		<h1 class="p-3">Store PV</h1>
			<div class="widget-content widget-content-area br-8 mt-4">
				<table id="individual-col-search" class="table dt-table-hover">
					<thead>
						<tr>
							<th>Sr No.</th>
							<th>Name</th>
                            <th>Email</th>
                            <th>Points</th>
                           
                           
                           
						</tr>
					</thead>
					<tbody>
						@foreach($data as $datas)
						<tr>
							<td>{{$loop->iteration}}</td>
                            <td>{{$datas->name}}</td>
                            <td>{{$datas->email}}</td>
                            <td>{{number_format($datas->online_store_wallet,2)}}</td>
                           
                            
                            
                           
                            
							
						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
                             <th>Sr No.</th>
							<th>Name</th>
                            <th>Email</th>
                            <th>Points</th>
                           
                           
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

