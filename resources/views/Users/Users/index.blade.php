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
							<th>Name</th>
                            <th>Full Name</th>
                            <th>Father Name</th>
                            <th>Email</th>
                            <th>CNIC</th>
                            <th>Change Status</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $datas)
						<tr>
							<td>{{$loop->iteration}}</td>
                            <td>{{$datas->name}}</td>
                            <td>{{$datas->full_name}}</td>
                            <td>{{$datas->father_name}}</td>
                            <td>{{$datas->email}}</td>
                            <td>{{$datas->cnic}}</td>
                            <td>
                                @if($datas->status == 'Active')
                                <form action="deactivate_user" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$datas->id}}">
                                    <input type="hidden" name="status" value="Inactive">
                                    <button type="submit" class="btn btn-success">InActive</button>
                                </form>
                                @else
                                <form action="activate_user" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$datas->id}}">
                                    <input type="hidden" name="status" value="Active">
                                    <button type="submit" class="btn btn-danger">Active</button>
                                </form>
                                @endif
                            </td>
                            <td>
                                <form action="delete_user" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$datas->id}}">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            
							
						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
                             <th>Sr No.</th>
							<th>Name</th>
                            <th>Full Name</th>
                            <th>Father Name</th>
                            <th>Email</th>
                            <th>CNIC</th>
                            <th>Change Status</th>
                            <th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

