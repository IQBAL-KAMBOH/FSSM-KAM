@extends('layout.layout')
 @section('content')

<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">

	<section style="background-color: #eee;">
  <div class="container py-5">
   
    <?php 
    $data=App\Http\Controllers\Admin\AdminAccountDetailsController::globalSettings();
    ?>
    <div class="row">
    
     

      <div class="col-lg-12">
             
          <div class="row">
     
      
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
                 <div class="col-lg-12">
            
      <div class="row">
					<div class="col-sm-6">
					   <label for="account">Bank Name</label>
					  <input type="text" class="form-control" name="bank_name" value="{{$data->bank_name}}" placeholder="" />
					</div>
					<div class="col-sm-6">
					  <label for="account">Account Title</label>
					  <input type="text" class="form-control" name="account_title" value="{{$data->account_title}}" placeholder="" />
					</div>
			</div>
        <hr>
        
        <div class="row">
					<div class="col-sm-6">
					   <label for="account">Account Number</label>
					  <input type="text" class="form-control" name="account_number" value="{{$data->account_number}}" placeholder="" />
					</div>
					<div class="col-sm-6">
					  <label for="account">Account IBAN</label>
					  <input type="text" class="form-control" name="account_iban" value="{{$data->account_iban}}" placeholder="" />
					</div>
			</div>
      
        <hr>
        <div class="row">
					<div class="col-sm-6">
					   <label for="account">EasyPaisa (Name)*</label>
					  <input type="text" class="form-control" name="easypaisa_name" value="{{$data->easypaisa_name}}" placeholder="" />
					</div>
					<div class="col-sm-6">
					  <label for="account">EasyPaisa (Acc#)*</label>
					  <input type="text" class="form-control" name="easypaisa_account" value="{{$data->easypaisa_account}}" placeholder="" />
					</div>
			</div>
        <hr>
        <div class="row">
					<div class="col-sm-6">
					   <label for="account">JazzCash (Name)*</label>
					  <input type="text" class="form-control" name="jazzcash_name" value="{{$data->jazzcash_name}}" placeholder="" />
					</div>
					<div class="col-sm-6">
					  <label for="account">JazzCash (Acc#)*</label>
					  <input type="text" class="form-control" name="jazzcash_account" value="{{$data->jazzcash_account}}" placeholder="" />
					</div>
			</div>
        <hr>
        
      
       

          </div>
        </div>
      
      </div>
    </div>
  
         
        </div>
      
      </div>
      
    </div>
  </div>
</section>
	</div>
</div>

@endsection