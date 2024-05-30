@extends('layout.layout') @section('content')

<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		<div class="col-lg-12">

				<div class="card mb-4">
					

					<div class="card-body">
						<div class="row">
							<div class="form-group mb-4">
								<label for="name">User Name</label>
								<input type="text" name="" onkeyup="getUserDetail(this.value)" id="user_name" class="form-control" placeholder="Enter User Name">
								
								<span class="m-2 p-2 d-none text-success" id="uname">  </span>
							</div>
						</div>
						
						
                         
					</div>
				</div>
			
			<form action="search-all-users" method="post">
                 @csrf
            <input type="hidden" name="user_id" value="" required id="user_id">
						
            <input type="submit" value="Get Data" class="btn btn-primary m-1 d-none" id="perm_btn">
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
            if(dataResult.data.id){
			$('#uname').removeClass('d-none');
			$('#perm_btn').removeClass('d-none');
			$('#uname').html('View for '+ dataResult.data.full_name);
			$('#user_id').val(dataResult.data.id);
			$('#user_name').val(dataResult.data.name);
			}
         }else{
			$('#uname').addClass('d-none');
			$('#perm_btn').addClass('d-none');
         }
     

      }
   });



 
 
}
</script>
@endsection
