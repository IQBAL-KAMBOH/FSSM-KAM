
@extends('layout.layout')
 @section('content')

<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">

	<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User KYC</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
          <?php
$kyc=App\Http\Controllers\Controller::checkUserKyc(auth()->user()->id);
?>
            <li class="breadcrumb-item"><a href="#"> KYC Status :
              @if($kyc)
                @if($kyc->status=='Approved')
                <span class="badge badge-success">Approved</span> 
                @else
                <span class="badge badge-danger">{{$kyc->status}}</span> 
                @endif
              @else
              <span class="badge badge-danger">Please Complete your KYC </span> 
              @endif
              </a></li>
            
          </ol>
        </nav>
      </div>
    </div>
            
    

    

       <!-- Add KYC Documents section  -->
        @if(!$data)
         <form action="/user_kyc" method="POST" enctype="multipart/form-data">
          @csrf
          @include('modules.KYC.includes.add')
         </form>
        @endif
        
       <!-- Add KYC Documents section End ******************** -->




      <!-- Update KYC Documents section  -->
        @if($data)
         <form action="/user_kyc" method="POST" enctype="multipart/form-data">
          @csrf
          @include('modules.KYC.includes.update')
         </form>
        @endif
       
       <!-- Update KYC Documents section End ******************** -->


			

      

      
  </div>
</section>
	</div>
</div>

@endsection
