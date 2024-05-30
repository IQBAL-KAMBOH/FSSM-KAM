@extends('layout.layout') @section('content')

<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		<div class="col-lg-12">
			<form action="{{ route('transfer-points.store') }}" method="POST">
				@csrf
				<div class="card mb-4">
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

					<div class="card-body">
						<div class="row">
							<div class="form-group mb-4">
								<label for="name">User Name</label>
								<input type="text" name="" onchange="getUserDetail(this.value)" id="user_name" class="form-control" placeholder="Enter User Name">
								<input type="hidden" name="user_id" id="user_id">
								<span class="m-2 p-2 d-none text-success" id="uname">  </span>
							</div>
						</div>
						<input type="hidden" name="point_type" value="b2c" id="">
						<div class="row">
							<div class="form-group mb-4">
								<label for="name">Select Transfer Type</label>
								<select class="form-control" value="" name="type" id="direct_points" required >
								
								 @hasrole('Admin')
								 <option value="">Choose</option>	
								 <option value="up">Add Points</option>	
								 <option value="down">Remove Points</option>	
								

                                 @endhasrole
								 
							     </select>
							</div>
						</div>
						<hr>
						
						<div class="row">
							<div class="form-group mb-4">
								<label for="register_points">Points</label>
								<input type="number" class="form-control"  name="points" id="register_points" required placeholder="Points" />
							</div>
						</div>
						
            
						<button type="submit" class="btn btn-light btn-lg col-md-12 mt-3">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
	function getUserDetail(name){

		    $('#uname').addClass('d-none');
			$('#uname').html('');
			$('#user_name').html('');
			$('#user_id').val('');
         $.ajax({
         url: "/getUserDetail",
         type: "POST",
         headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
           },
         data:{
         name:name,
         },
         cache: false,
         success: function(dataResult){
         if(dataResult.data){

			$('#uname').removeClass('d-none');
			$('#uname').html('Transfer to '+ dataResult.data.full_name);
			$('#user_id').val(dataResult.data.id);
			
			$('#user_name').val(dataResult.data.name);
         }else{
  
         }
     

      }
   });



 
 
}
</script>
@endsection
