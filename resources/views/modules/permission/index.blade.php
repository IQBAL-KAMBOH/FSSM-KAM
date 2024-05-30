@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">


                        <div class="row" style="margin-bottom: 1em">
                            <div class="col-6 text-left"><h3>Permissions</h3>
                            </div>
                            <div class="col-6 text-end">
                            <form action="/search-permission" method="POST" class="mt-4">
                                            @csrf
										   <button  type="submit" class="btn btn-secondary">Search Permission</button>
                                      </form>
                        
                        
                          </div>
                            @if(auth()->user()->hasRole('Super Admin'))
                            <div class="col-6 text-end"><a href="permissions/create" class="btn btn-primary">Add New</a></div>
                            @endif
                        </div>


                        <div class="row layout-spacing">
                        <div class="col-lg-12">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            <br>
                        @endif
                            <div class="">
                                <div class="widget-content widget-content-area">
                                  
                                           <div class="row">

                                          
                                            @foreach($permissions as $datas)
                                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 m-2 p-2 shadow rounded" style="border-radius: 50px;">

                                           
                                            <div class="switch form-switch-custom switch-inline form-switch-success">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                    <label class="switch-label text-end" for="form-custom-switch-success"><?php echo strtoupper($datas->name)?></label>
                                                   

                                                    <input  id="user_id" value="{{$user_id}}" type="hidden" >
                                                    <input  id="permission_id" value="{{$datas->id}}" type="hidden" >
                                                    <input onclick="changep({{$user_id}},{{$datas->id}})" class="switch-input checkbox" <?php foreach($user_permissions as $up){if($datas->id==$up->permission_id){ echo 'checked';}}?> type="checkbox" role="switch" id="p-status_{{$datas->id}}">
                                                    </div>
                                                </div>
                                              
                                        
                                            </div>
                                            </div>
                                            @endforeach
                                            </div>
                                            
                                        
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
<script>
    
function changep(id,p){
    
    if($("#p-status_"+p).prop('checked') == true){
       var action='add';
    }else{
        var action='remove';
    }

    $.ajax({
		url: "/change-user-permission",
		type: "POST",
		data: {
			user_id: id,
		    action: action,
			permission: p,
			
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data.id);
            Swal.fire({
                icon: 'success',
                title: 'Pemission Updated Successfully!',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Done!'
            }).then((result) => {
                location.reload();
            }); 
            
			
		}
	});


}

</script>
@endsection            