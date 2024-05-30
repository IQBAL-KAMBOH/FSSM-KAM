@extends('layout.layout')
 @section('content')

<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">

	<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row bg-light rounded-3 p-3 mb-4">
      <div class="col-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Details</li>
          </ol>
        </nav>
      </div>
      <div class="col-6">
        <div class="d-flex justify-content-end">
          <!-- <a href="{{route('User.edit',$data->id)}}" class="btn btn-secondary">Edit Profile</a> -->
        </div>
        
    </div>
    </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            <br>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                            <br>
                        @endif


    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            @if($data->profile_photo_path)
             <img src="{{$data->profile_photo_path}}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            @else
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            @endif
          
           
            <h5 class="my-3"></h5>
            <p class="text-muted mb-1">{{$data->name}}</p>
            <p class="text-muted mb-4">{{$data->user_type}}</p>
            <div class="d-flex justify-content-center mb-2">
            </div>
          </div>
        </div>
      
      </div>
     

      <div class="col-lg-8">
        <form action="{{route('User.update',$data->id)}}" method="POST">
          @csrf
          @method('PUT')      
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
            <table class="table table-striped">
            <tr><th>User Name</th> <td>{{$data->name}}</td> </tr>
            <tr><th>Full Name</th> <td>{{$data->full_name}}</td> </tr>
            <tr><th>Email</th> <td>{{$data->email}}</td> </tr>
            <tr><th>Password</th> <td>{{$data->string_password}}</td> </tr>
            <tr><th>Father Name</th> <td>{{$data->father_name}}</td> </tr>
            <tr><th>Active Phone</th> <td>{{$data->active_phone}}</td> </tr>
            <tr><th>Refral User Name</th> <td>{{$data->referral?->name}}</td> </tr>
            
          </table>
            </div>
           
           
			 

				</div>

          </div>
          </form>
        </div>
      
      </div>
    </div>
  </div>
</section>
	</div>
</div>

@endsection