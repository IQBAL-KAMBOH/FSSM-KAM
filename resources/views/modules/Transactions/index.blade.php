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
							@hasrole('Admin') 
							<th>User</th>
							@endhasrole
							<th>Amount</th>
							<th>Status</th>
							<th>TID</th>
							<th>Date</th>
							<th>Screen Shot</th>
							@hasrole('Admin') 
							<th>Action</th>
							@endhasrole
						</tr>
					</thead>
					<tbody>
						@foreach($data as $datas)
						<tr>
							<td>{{$loop->iteration}}</td>
							@hasrole('Admin') 
							<td>{{$datas->user->name}}</td>
							@endhasrole
							
							
							<td>{{$datas->amount}}</td>
							<td>
							               <?php
                                            if($datas->status=='Approved'){
                                                $status_color='success';
                                            }else if($datas->status=='Pending'){
                                                $status_color='warning';
                                            }else{
                                                $status_color='danger';
                                            }
											
                                            ?>
								
								<span class="badge badge-<?php echo $status_color;?>">{{$datas->status}}</span></td>
							<td>{{$datas->tid}}</td>
							<td>{{$datas->created_at}}</td>
							<td>
								@if($datas->screenshot)
								
							<img src="{{$datas->screenshot}}" height="100px" width="100px" alt="">
							@endif
						</td>
							@hasrole('Admin')
							<td>
							
								@if($datas->status == 'Pending')
									<div class="col-4">
										<form action="approve_deposit" method="POST">
											@csrf
											<input type="hidden" name="id" value="{{$datas->id}}"  />
											<input type="hidden" name="amount" value="{{$datas->amount}}"  />
											<input type="hidden" name="user_id" value="{{$datas->user_id}}"  />
											<input type="submit" value="Approve" name="approve_deposit" class="m-2 btn btn-success" id="" />
										</form>
									</div>
									<div class="col-4">
										<form action="cancell_deposit" method="POST">
											@csrf
											<input type="hidden" name="id" value="{{$datas->id}}"  />
											<input type="submit" value="Cancell" name="cancell_deposit" class="m-2 btn btn-danger"  />
										</form>
									</div>
								@endif 
								
							</td>
							@endhasrole
						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr No.</th>
							@hasrole('Admin') 
							<th>User</th>
							@endhasrole
							<th>Amount</th>
							<th>Status</th>
							<th>TID</th>
							<th>Date</th>
							<th>Screen Shot</th>
							@hasrole('Admin') 
							<th>Action</th>
							@endhasrole
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

