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
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
            <?php
               $url='https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp';
               if($data->profile_photo_path){
                $url=$data->profile_photo_path;
               }
            ?>
            <img src="<?=$url;?>" alt="avatar"
              class="rounded img-fluid" style="width:150px;">
            <h5 class="my-3"></h5>
            <p class="text-muted mb-1">{{$data->name}}</p>
            <p class="text-muted mb-4">{{$data->user_type}}</p>
            <div class="d-flex justify-content-center mb-2">
            </div>
          </div>
        </div>
      
      </div>
     

      <div class="col-lg-8">
        <form action="{{route('User.update',$data->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')      
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="form-group mb-4">
                <div class="row">
                  <div class="col">
                      <label for="name">User Name :</label>
                  </div>
                  <div class="col">{{$data->name}}</div>
                </div>
                
                  
                </div>
            </div>
            <div class="row">
              <div class="form-group mb-4">
                  <div class="row">
                    <div class="col"><label for="email">Email : </label></div>
                    <div class="col">{{$data->email}}</div>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="form-group mb-4">
                  <div class="row">
                    <div class="col"><label for="email">Ref By : </label></div>
                    <div class="col">{{$data->referral?->name}}</div>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="form-group mb-4">
                  <div class="row">
                    <div class="col"><label for="email">Plan : </label></div>
                    <div class="col">{{$data->package?->packages}}</div>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="form-group mb-4">
                  <div class="row">
                    <div class="col"><label for="email">Joining Date : </label></div>
                    <div class="col">{{date('Y-m-d',strtotime($data->created_at))}}</div>
                  </div>
                </div>
            </div>
            
            <div class="row">
              <div class="form-group mb-4">
                <div class="row">
                  <div class="col"> <label for="full_name">Full Name:</label></div>
                  <div class="col">{{$data->full_name}}</div>
                </div>
                
                 
                </div>
            </div>
            
            
            <div class="row">
              <div class="form-group mb-4">
                   <div class="row">
                     <div class="col"><label for="father_name">father Name: </label></div>
                     <div class="col">{{$data->father_name}}</div>
                   </div>
                </div>
            </div>
            
            <div class="row">
              <div class="form-group mb-4">
                <div class="row">
                  <div class="col"><label for="cnic">Cnic :</label></div>
                  <div class="col">{{$data->cnic}}</div>
                </div>
                 
                  
                </div>
            </div>
            <div class="row">
              <div class="form-group mb-4">
                <div class="row">
                  <div class="col"><label for="cnic">Active Phone :</label></div>
                  <div class="col">{{$data->active_phone}}</div>
                </div>
                 
                  
                </div>
            </div>
            <div class="row">
              <div class="form-group mb-4">
                <div class="row">
                  <div class="col"><label for="cnic">Profile Pic</label></div>
                  <div class="col"><input type="file" class="form-control"  name="file"></div>
                </div>
                </div>
            </div>
            
			  <button type="submit" class="btn btn-light btn-lg col-md-12 mt-3">Save changes</button>

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