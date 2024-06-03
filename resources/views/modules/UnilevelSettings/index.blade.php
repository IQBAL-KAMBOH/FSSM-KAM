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
            <li class="breadcrumb-item"><a href="#">Unilevel Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Unilevel Settings</li>
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
                  <h3>Level Percentage</h3>
            
      <div class="row m-2">
					<!-- <div class="col-6 col-md-4 col-lg-4">
					   <label for="store_pv_wallet"> PV Store Wallet</label>
					  <input type="text" id="store_pv_wallet" class="form-control bg-dark text-light" name="store_pv_wallet" placeholder="" value="{{$data->store_pv_wallet}}" />
					</div> -->
          <div class="col-6 col-md-4 col-lg-4">
					   <label for="pv_limit">Unilevel PV Limit</label>
					  <input type="text" id="pv_limit" class="form-control bg-primary text-light" name="pv_limit" placeholder="" value="{{$data->pv_limit}}" />
					</div>
          <div class="col-6 col-md-4 col-lg-4 mb-4">
					   <label for="auto_net_limit">Auto Net Limit</label>
					  <input type="text" id="auto_net_limit" class="form-control bg-secondary text-light" name="auto_net_limit" placeholder="" value="{{$data->auto_net_limit}}" />
					</div>
          </div>
          <div class="row">
          <div class="col-6 col-md-2 col-lg-2">
					   <label for="l1">Level 1(%)</label>
					  <input type="text" id="l1" class="form-control" name="l1" placeholder="%" value="{{$data->l1}}" />
					</div>
          <div class="col-6 col-md-2 col-lg-2">
					   <label for="l2">Level 2(%)</label>
					  <input type="text" id="l2" class="form-control" name="l2" placeholder="%" value="{{$data->l2}}" />
					</div>
          <div class="col-6 col-md-2 col-lg-2">
					   <label for="l3">Level 3(%)</label>
					  <input type="text" id="l3" class="form-control" name="l3" placeholder="%" value="{{$data->l3}}" />
					</div>
          <div class="col-6 col-md-2 col-lg-2">
					   <label for="l4">Level 4(%)</label>
					  <input type="text" id="l4" class="form-control" name="l4" placeholder="%" value="{{$data->l4}}" />
					</div>
          <div class="col-6 col-md-2 col-lg-2">
					   <label for="l5">Level 5(%)</label>
					  <input type="text" id="l5" class="form-control" name="l5" placeholder="%" value="{{$data->l5}}" />
					</div>
         {{-- <div class="col-6 col-md-2 col-lg-2">
					   <label for="l6">Level 6(%)</label>
					  <input type="text" id="l6" class="form-control" name="l6" placeholder="%" value="{{$data->l6}}" />
					</div>
          <div class="col-6 col-md-2 col-lg-2">
					   <label for="l7">Level 7(%)</label>
					  <input type="text" id="l7" class="form-control" name="l7" placeholder="%" value="{{$data->l7}}" />
					</div>
          <div class="col-6 col-md-2 col-lg-2">
					   <label for="l8">Level 8(%)</label>
					  <input type="text" id="l8" class="form-control" name="l8" placeholder="%" value="{{$data->l8}}" />
					</div>
          <div class="col-6 col-md-2 col-lg-2">
					   <label for="l9">Level 9(%)</label>
					  <input type="text" id="l9" class="form-control" name="l9" placeholder="%" value="{{$data->l9}}" />
					</div>
          <div class="col-6 col-md-2 col-lg-2">
					   <label for="l10">Level 10(%)</label>
					  <input type="text" id="l10" class="form-control" name="l10" placeholder="%" value="{{$data->l10}}"  />
					</div>
          --}}
					
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