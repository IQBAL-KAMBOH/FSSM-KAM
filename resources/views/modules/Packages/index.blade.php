@extends('layout.layout')

@section('content')

<style>
  #b2{
    width: 100%;
    margin-top:10rem;
  }
</style>
<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

<div class="container">

    <div class="row">
        <div class="col-md-12">
            
            <div class="card">
                       
                <div class="card-body">
              
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-start text-danger fw-bold">Important Note:</h3>
                            <p>FSSM never allows money to be sent to personal accounts. Please do not send money to anyone other than the Money Stockist or company bank account.</p>
                            <p >Note:Before sending money to the money stockist contact to Admin Whatsapp Number verify the money stockist</p>
                           <h4 class="text-start">Thanks</h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      
<?php
$package=App\Http\Controllers\User\UserController::checkUserPackage(auth()->user()->id);
?>
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
        <div class="col-md-3">
        <div class="card" >
        
        <img class="card-img-top" src="/assets/src/assets/img/offer.jpg" height="240px" alt="Card image cap">
        <hr>
        <h4 class="text-center fw-bold">Package</h4>
        @if($package)
        <div class="card-body text-center">
        <span class="badge badge-success">{{$package->package?->packages}}</span>
            
        </div>
        @else
        <?php
        
          $mysponser=App\Http\Controllers\User\UserController::mySponser(auth()->user()->refral_id);
          $refral_paid=$mysponser->plan_id ?? 0;
        ?>
        <div class="card-body">
          @if($refral_paid>0)
            <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal1" id="button">Buy Now</a>
          @else
              <span class="text-danger">You have Unpaid Sponser!</span>
          @endif
        </div>

        @endif
        </div>
        </div>

        

    



    </div>
   

        </div>
    </div>
    </div>


    <!-- ........modal..... -->

<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Buy Package</h1>

        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
 
 <form action="{{route('purchased-plans.store')}}" method="POST">
  @csrf

 
   <div class="mb-12">
      <label for="account-id" class="col-form-label">Account ID</label>
      <input type="text" class="form-control text-light bg-dark" value="{{$userName->name}}" id="account-id" readonly>
      <input type="hidden" value="{{$userName->id}}" name="id">
    
    </div>

    <div class="mb-12">
      <label for="account-id" class="col-form-label">Referrer ID</label>
      <input type="text" class="form-control text-light bg-dark" name="refral_name" value="{{$userName->referral?->name}}"  id="account-id" readonly >
      <input type="hidden" name="refral_id" value="{{$userName->refral_id}}">
    </div>
    
    <div class="mb-12">
    <label for="referrer-id" class="col-form-label">Position</label>
    <select class="form-select" name="position" required id="referrer-id">
        <option value="">Select positions</option>
        <option value="Left">Left</option>
        <option value="Right">Right</option>
       
        <!-- Add more options as needed -->
    </select>
</div>


    <div class="mb-12">
    <label for="referrer-id" class="col-form-label">Package</label>
    <select class="form-select" name="package_id" onchange="getPackageDetails(this.value)" required id="Package">
        <option value="">Packages</option>
        @foreach($packages as $package)
            <option value="{{ $package->id }}">{{ $package->packages }}-{{ $package->package_points }}</option>
            
         

        @endforeach
        <!-- Add more options as needed -->
    </select>
</div>

   <div class="row">
    <div class="col-8 mt-2">
      <label for="account-id" class="col-form-label">Direct  Point(DP)(Balance: {{number_format($userName->direct_points,2)}})</label>
      <input type="number" class="form-control" onkeyup="totalAmount()" required id="d_points" name="direct_points">
    </div>
    <div class="col-4 mt-5">
    <h5 class="text-end">( <span id="dp_percent"></span> %) END</h5>
    </div>
   </div>

   <div class="row">
    <div class="col-8 mt-2">
      <label for="account-id" class="col-form-label">Register Point(RP)(Balance: {{number_format($userName->register_points,2)}})</label>
      <input type="number" class="form-control" onkeyup="totalAmount()" required id="r_points"  name="register_points">
    </div>
    <div class="col-4 mt-5">
    <h5 class="text-end">( <span id="rp_percent"></span> %) END</h5>
    </div>
   </div>

   <div class="mb-12">
      <label for="account-id" class="col-form-label">Total Amount</label>
      <input type="number" class="form-control" id="total_amount"   name="total_amount">
    </div><br>
    

    <button type="submit" class="btn btn-success">Buy Now</button>
    </form>
</div>


      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<script>
  
  function totalAmount(){
    $('#total_amount').val('');
    var d=$('#d_points').val();
    var r=$('#r_points').val();
    var t=+d + +r;
    
    var amount=t*100;
    $('#total_amount').val(amount);


  }

  function getPackageDetails(id){
  
                    $("#dp_percent").html('');
                    $("#rp_percent").html('');
$.ajax({
url: "/get-package",
type: "POST",
headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
  },
data:{
id:id,
},
cache: false,
success: function(dataResult){
if(dataResult.data){

                    if(dataResult.data.direct_points_percent){
                    $("#dp_percent").html(dataResult.data.direct_points_percent);
                     
                    }
                    if(dataResult.data.register_points_percent){
                      $("#rp_percent").html(dataResult.data.register_points_percent);
                     
                    }
  
}else{
  
}
     

}
});



 
 
}
</script>

@endsection