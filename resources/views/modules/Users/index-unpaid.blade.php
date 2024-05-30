@extends('layout.layout')
 @section('content')


<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		
		<div class="col-xl-12 col-lg-12 col-sm-12 table p-2">

          <h2 class="p-4">All Unpaid Users</h2>
        
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
							<th>Sr No.</th>
							<th>Name</th>
                            <th>Full Name</th>
                            <th>Father Name</th>
                            <th>Email</th>
                            <th>CNIC</th>
                            <th>Status</th>
                            <th>Premium/Normal</th>
                            <th>Edit </th>
                            <th>Update Password</th>
                            <th>View</th>
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
                            <td>{{$datas->status}}</td>
                            <td>
                                @if($datas->is_premium == 1)
                                <form action="premium-user" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$datas->id}}">
                                    <input type="hidden" name="is_premium" value="0">
                                    <button type="submit" class="btn btn-danger">Make Normal</button>
                                </form>
                                @else
                                <form action="premium-user" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$datas->id}}">
                                    <input type="hidden" name="is_premium" value="1">
                                    <button type="submit" class="btn btn-success">Make Premium</button>
                                </form>
                                @endif
                            </td>
                            <td>
                                <form action="user-edit" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$datas->id}}">
                                   
                                    <button type="submit" class="btn btn-secondary">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="user-password" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$datas->id}}">
                                   
                                    <button type="submit" class="btn btn-info">Password</button>
                                </form>
                            </td>
                            <td>
                                <form action="user-show" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$datas->id}}">
                                   
                                    <button type="submit" class="btn btn-warning">View</button>
                                </form>
                            </td>
                            <td>
                                @if($datas->status == 'Active')
                                <form action="deactivate_user" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$datas->id}}">
                                    <input type="hidden" name="status" value="Inactive">
                                    <button type="submit" class="btn btn-danger">InActivate</button>
                                </form>
                                @else
                                <form action="activate_user" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$datas->id}}">
                                    <input type="hidden" name="status" value="Active">
                                    <button type="submit" class="btn btn-success">Activate</button>
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
                            <th>Status</th>
                            <th>Premium/Normal</th>
                            <th>Edit</th>
                            <th>Update Password</th>
                            <th>View</th>
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

