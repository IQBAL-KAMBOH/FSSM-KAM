@extends('layout.layout')

@section('content')

<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">
<?php
$kyc=App\Http\Controllers\Controller::checkUserKyc(auth()->user()->id);
?>
<div class="container">
        <div class="row m-4 p-4">
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
        </div>
    <div class="row">
        <div class="col-md-3">
        <div class="card" >
        <img class="card-img-top" src="/assets/src/assets/img/j1.jpg" height="240px" alt="Card image cap">
        <hr>
        
        <div class="widget-content widget-content-area ">
        <ul class="list-group ">
           <li class="list-group-item">Limit : 13 - 1000 FSD</li>
             <li class="list-group-item">Charge - 0 FSD+ 10%</li>
             <li class="list-group-item">Processing Time -  2 -3 working days</li>
        </ul>

        </div>
      <div class="card-body ">
             @if($kyc)
                @if($kyc->status=='Approved')
                <a href="#" class="btn btn-danger" onclick="openModal('Jazzcash','{{$kyc->jazzcash_name}}','{{$kyc->jazzcash_account}}')">Withdraw Now</a> 
                @else
                <span class="badge badge-danger">KYC {{$kyc->status}}</span> 
                @endif
              @else
              <span class="badge badge-danger">Please Complete your KYC </span> 
              @endif
        
        </div>
        </div>
        </div>


        <div class="col-md-3">
        <div class="card" >
        <img class="card-img-top" src="/assets/src/assets/img/easypessa.jpg" height="240px" alt="Card image cap">
        <hr>
        
        <div class="widget-content widget-content-area ">
        <ul class="list-group">
           <li class="list-group-item">Limit : 13 - 1000 FSD</li>
             <li class="list-group-item">Charge - 0 FSD+ 10%</li>
             <li class="list-group-item">Processing Time - 02-03 Working days</li>
        </ul>

        </div>
      <div class="card-body ">
              @if($kyc)
                @if($kyc->status=='Approved')
                <a href="#" class="btn btn-danger" onclick="openModal('Easypaisa','{{$kyc->easypaisa_name}}','{{$kyc->easypaisa_account}}')">Withdraw Now</a>  
                @else
                <span class="badge badge-danger">KYC {{$kyc->status}}</span> 
                @endif
              @else
              <span class="badge badge-danger">Please Complete your KYC </span> 
              @endif
       
      </div>
        </div>
        </div>

      

    </div>

        </div>
    </div>
    </div>


    <!-- ........modal..... -->

<!-- ........modal..... -->

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="withdrawModalLabel"></h1>

        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
 
      <form action="{{route('withdraw.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-12 m-1">
        <label for="">Account Name</label>
        <input type="text" readonly class="form-control" name="account_name" required value="" id="account_name">
        
      </div>
      <div class="mb-12 m-1">
         <label for="">Account Number</label>
        <input type="text" readonly class="form-control" name="account_number" required value="" id="account_number">
        <input type="hidden" readonly class="form-control" name="account_type" required value="" id="account_type">
      </div>
      <div class="mb-12">
        <label for="account-id" class="col-form-label">Enter Amount</label>
        <input type="number" class="form-control" value="0" min="13" name="points" value="" id="account-id">
        
      </div>


      <button type="submit" class="btn btn-success mt-3">Confirm</button>
    </form>

</div>


      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

     <script>
      function openModal(type,account_name,number){
        $('#withdrawModalLabel').html(''); 
        $('#account_name').val(''); 
        $('#account_name').val(account_name); 
        $('#account_number').val(''); 
        $('#account_number').val(number); 
        $('#account_type').val(''); 
        $('#account_type').val(type); 
        $('#withdrawModalLabel').html(type);  
        $('#modal').modal('show'); 
      }
    </script>
@endsection