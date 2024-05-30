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
            <li class="breadcrumb-item"><a href="#">Affiliate Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Affiliate Settings</li>
          </ol>
        </nav>
      </div>
      <div class="col-6">
        <div class="d-flex justify-content-end">
         
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
                        

                    
@if(Auth::user()->hasrole('Admin'))
 
@else 
  <script>window.location = "/dashboard";</script>
@endif
    <?php 
    $data=App\Http\Controllers\Admin\AdminAccountDetailsController::globalSettings();
    ?>
    <div class="row">
    
     

      <div class="col-lg-12">
        <form action="{{route('account-details.update',$data->id)}}" method="POST">
          @csrf
          @method('PUT')      
          <div class="row">
     
      
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
                 <div class="col-lg-12 p-2">
                 
            
      <div class="row m-2">
              <!-- <h3>Direct Affiliate Commission</h3>
          <div class="col-6 col-md-4 col-lg-4">
					   <label for="affiliate_commission">Affiliate Commission (%)</label>
					  <input type="text" id="affiliate_commission" class="form-control bg-primary text-light" name="affiliate_commission" placeholder="" value="{{$data->affiliate_commission}}" />
					</div>
          <hr> -->
          <!-- <h3>Paid Sponser Commission</h3>
          <div class="col-6 col-md-4 col-lg-4 mb-4">
					   <label for="affiliate_sponser_commission">Level 1 Sponser Commission (%)</label>
					  <input type="text" id="affiliate_sponser_commission" class="form-control bg-secondary text-light" name="affiliate_sponser_commission" placeholder="" value="{{$data->affiliate_sponser_commission}}" />
					</div>
          <div class="col-6 col-md-4 col-lg-4 mb-4">
					   <label for="affiliate_sponser_commission2">level 2 Sponser Commission (%)</label>
					  <input type="text" id="affiliate_sponser_commission2" class="form-control bg-secondary text-light" name="affiliate_sponser_commission2" placeholder="" value="{{$data->affiliate_sponser_commission2}}" />
					</div>
          <div class="col-6 col-md-4 col-lg-4 mb-4">
					   <label for="affiliate_sponser_commission3">Level 3 Sponser Commission (%)</label>
					  <input type="text" id="affiliate_sponser_commission3" class="form-control bg-secondary text-light" name="affiliate_sponser_commission3" placeholder="" value="{{$data->affiliate_sponser_commission3}}" />
					</div>
          <div class="col-6 col-md-4 col-lg-4 mb-4">
					   <label for="affiliate_sponser_commission4">Level 4 Sponser Commission (%)</label>
					  <input type="text" id="affiliate_sponser_commission4" class="form-control bg-secondary text-light" name="affiliate_sponser_commission3" placeholder="" value="{{$data->affiliate_sponser_commission3}}" />
					</div> -->
          </div>
        
          
          
					
			</div>
        





      <hr>




      <h3>Unpaid Sponser Commission</h3>
            
      <div class="row m-2">
				
          <div class="col-6 col-md-4 col-lg-4">
					   <label for="u_affiliate_commission">Affiliate Commission (%)</label>
					  <input type="text" id="u_affiliate_commission" class="form-control bg-primary text-light" name="u_affiliate_commission" placeholder="" value="{{$data->u_affiliate_commission}}" />
					</div>
          <hr>
          <div class="col-6 col-md-4 col-lg-4 mb-4">
					   <label for="u_affiliate_sponser_commission">Level 1 Sponser (UnPaid) (%)</label>
					  <input type="text" id="u_affiliate_sponser_commission" class="form-control bg-secondary text-light" name="u_affiliate_sponser_commission1" placeholder="" value="{{$data->u_affiliate_sponser_commission1}}" />
					</div>
          
          
          <div class="col-6 col-md-4 col-lg-4 mb-4">
					   <label for="u_affiliate_sponser_commission2">level 2 Sponser(UnPaid) (%)</label>
					  <input type="text" id="u_affiliate_sponser_commission2" class="form-control bg-secondary text-light" name="u_affiliate_sponser_commission2" placeholder="" value="{{$data->u_affiliate_sponser_commission2}}" />
					</div>
          <div class="col-6 col-md-4 col-lg-4 mb-4">
					   <label for="u_affiliate_sponser_commission3">Level 3 Sponser(UnPaid) (%)</label>
					  <input type="text" id="u_affiliate_sponser_commission3" class="form-control bg-secondary text-light" name="u_affiliate_sponser_commission3" placeholder="" value="{{$data->u_affiliate_sponser_commission3}}" />
					</div>
          <hr>
          <div class="col-6 col-md-4 col-lg-4 mb-4">
					   <label for="u_affiliate_sponser_commission4">Level 4 Sponser(Paid) (%) Unilevel</label>
					  <input type="text" id="u_affiliate_sponser_commission4" class="form-control bg-secondary text-light" name="u_affiliate_sponser_commission4" placeholder="" value="{{$data->u_affiliate_sponser_commission4}}" />
					</div>
          </div>
        
          
          
					
			</div>
        
        
        <button type="submit" class="btn btn-light btn-lg col-md-12 mt-4">Save changes</button>
       

          </div>
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