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
							<th>user_name</th>
							<th>user_agent</th>
							<th>login_at</th>
							<th>logout_at</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $loginHistories)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$loginHistories->user->name}}</td>
							<td style="max-width: 150px; overflow: hidden; text-overflow: ellipsis;">{{$loginHistories->user_agent}}</td>
							<td>{{$loginHistories->login_at}}</td>
							<td>{{$loginHistories->logout_at}}</td>
							<td>
								<form method="POST" action="DeleteLoginHistory">
									@csrf
									<input type="hidden" name="id" value="{{$loginHistories->id}}" />
									<button type="submit" class="btn btn-danger">Delete</button>
								</form>
							</td>
						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr No.</th>
							<th>user_name</th>
							<th>user_agent</th>
							<th>login_at</th>
							<th>logout_at</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
