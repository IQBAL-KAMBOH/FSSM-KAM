@extends('layout.layout')
 @section('content')


<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		
		<div class="col-xl-12 col-lg-12 col-sm-12 table p-2">

          <h2 class="p-4">Edit Package</h2>
        
            <div class="form">
                <form action="/update-package" method="POST">
                     @csrf 
                     <div class="row">
                        <div class="col">
                               <label for="">Name</label>
                               <input type="text" class="form-control" name="packages" value="{{$data->packages}}" placeholder="Package Name" id="">
                        </div>
                        <div class="col">
                        <label for="">Price</label>
                               <input type="text" class="form-control" name="package_price" value="{{$data->package_price}}" placeholder="Package Price" id="">

                        </div>
                        <div class="col">
                              <label for="">Package Points</label>
                               <input type="text" class="form-control" name="package_points" value="{{$data->package_points}}" placeholder="Package Points" id="">

                             
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                               <label for="">Pair Points</label>
                               <input type="text" class="form-control" name="pair_points" value="{{$data->pair_points}}" placeholder="Pair Points" id="">
                        </div>
                        <div class="col">
                        <label for="">Commission Points</label>
                               <input type="text" class="form-control" name="commission_points" value="{{$data->commission_points}}" placeholder="Commission Points" id="">

                        </div>
                        <div class="col">
                              <label for="">BV</label>
                               <input type="text" class="form-control" name="bv" value="{{$data->bv}}" placeholder="BV" id="">

                             
                        </div>
                     </div>

                     <div class="row">
                        <!-- <div class="col">
                               <label for="">Pair Points 2</label>
                               <input type="text" class="form-control" name="pair_points_2" value="{{$data->pair_points_2}}" placeholder="Pair Points 2" id="">
                        </div>
                        <div class="col">
                        <label for="">Pair 1</label>
                               <input type="text" class="form-control" name="pair_1" value="{{$data->pair_1}}" placeholder="Pair 1" id="">

                        </div> -->
                        <div class="col">
                              <label for="">Pair Points Limit</label>
                               <input type="text" class="form-control" name="pair_limit" value="{{$data->pair_limit}}" placeholder="Pair Points" id="">

                              
                        </div>
                     </div>
                     <div class="row">
                        <!-- <div class="col">
                               <label for="">Store Wallet Start CBV</label>
                               <input type="text" class="form-control" name="sotre_wallet_limit" value="{{$data->sotre_wallet_limit}}" placeholder="example : 3000 CBV" id="">
                        </div>
                        <div class="col">
                               <label for="">Store Wallet Add Commission</label>
                               <input type="text" class="form-control" name="store_percentage" value="{{$data->store_percentage}}" placeholder="example : 10" id="">
                        </div> -->
                        
                        <div class="col">
                               <label for="">Future Points Pair Count</label>
                               <input type="text" class="form-control" name="future_point_pair_count" value="{{$data->future_point_pair_count}}" placeholder="example :  4" id="">
                        </div>
                       
                     </div>
                     <div class="row">
                        <div class="col-4">
                               <label for="">Future Points Limit</label>
                               <input type="text" class="form-control" name="future_point_limit" value="{{$data->future_point_limit}}" placeholder="Future Points Limit" id="">
                        </div>
                        <div class="col-4">
                               <label for="">DP %</label>
                               <input type="text" class="form-control" name="direct_points_percent" value="{{$data->direct_points_percent}}" placeholder="DP %" id="">
                        </div>
                        <div class="col-4">
                               <label for="">RP %</label>
                               <input type="text" class="form-control" name="register_points_percent" value="{{$data->register_points_percent}}" placeholder="RP %" id="">
                        </div>
                       
                     </div>
                     <div class="row">
                        
                        <div class="col-4">
                               <label for="">DP Required</label>
                               <input type="text" class="form-control" name="dp_required" value="{{$data->dp_required}}" placeholder="DP " id="">
                        </div>
                        <div class="col-4">
                               <label for="">RP Required</label>
                               <input type="text" class="form-control" name="rp_required" value="{{$data->rp_required}}" placeholder="RP" id="">
                        </div>
                       
                     </div>
                     <div class="row">
                        <div class="col-4">
                            <input type="hidden" name="id" value="{{$data->id}}" id="">
                          <input type="submit"  name="" value="Save" class="btn btn-primary" id="">
                        </div>
                     </div>
                </form>
            </div>


					
			
		</div>
	</div>
</div>

@endsection

