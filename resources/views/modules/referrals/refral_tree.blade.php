@extends('layout.layout')

@section('content')
<style>
   .iqbal svg {
  display: block;
  margin: auto;
  width: 100vmin;
}
.shadow {
  -webkit-filter: drop-shadow( 2px 2px 2px rgba(0,0,0,0.5) );
          filter: drop-shadow( 2px 2px 2px rgba(0,0,0,0.5) );
}
.line {
  stroke: purple;
}
.ellipse {
  fill: lightblue;
}
.circle {
  fill: lightgreen;
}

   .mycard{
      text-align:center !important;
      background-color:purple;
      color:white !important;
      width:150px !important;
      height:150px !important;
      padding:10px;
      border-radius:50%;
      border:1px dotted black;
      box-shadow:5px 5px 5px black;
   }
   .myborder{
      text-align:center !important;
      width:50px !important;
      height:50px !important;
      border-radius:50%;
    
   }
</style>


<div class="layout-px-spacing mt-4 text-center">

<div class="middle-content container-xxl p-0">
<form action="referral_tree" method="POST">
    <div class="row card">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0 justify-content-end">
         
            @csrf
            <li class="breadcrumb-item"> <input type="text" class="form-control" placeholder="User Name" name="user_name" id=""></li>
            <li class="breadcrumb-item"> <input type="submit" name="" value="Search" class="btn btn-success" id=""></li>
         
         </ol>
        </nav>
      </div>
    </div>
   </form> 

  @if($data) 
   <div class="iqbal">
     <div class="row m-2 ">
        <div class="col-4"></div>
        <div class="col-4 d-flex justify-content-center ">
           <div class=" mycard" >
            @if($data->profile_photo_path)
           <img src="{{$data->profile_photo_path}}" onclick="showSummary({{$data->id}})"  class="img-fluid myborder" alt=""  width="100%">
           @else
           <img src="{{asset('assets/img/new.png')}}" onclick="showSummary({{$data->id}})"  class="img-fluid myborder" alt=""  width="100%">
           @endif
           <p class="text-light">
            {{$data->name}} 
           </p>
         
          </div>
        </div>
        <div class="col-4"></div>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="295" height="205" viewBox="0 0 400 305" class="">
  <line x1="195" y1="10" x2="10" y2="200" stroke-width="4" class="line"/>
  <circle cx="10" cy="250" r="50" class="circle"/>
  <text x="10" y="250" text-anchor="middle" dy=".3em">L</text>
  
  
  <line x1="195" y1="10" x2="370" y2="200" stroke-width="4" class="line"/>
  <circle cx="370" cy="250" r="50" class="circle"/>
  <text x="370" y="250" text-anchor="middle" dy=".3em">R</text>
  
      

</svg>
     </div>

   
     
    
     <div class="row m-2 text-center">
    
      
     
        <div class="col-4 d-flex justify-content-end ">
       
        <div class="mycard text-center" >
        
           <form action="referral_tree" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{$data->left?->id}}" id="">
            @if($data->left?->profile_photo_path)
             <img src="{{$data->left?->profile_photo_path}}" onclick="showSummary({{$data->left?->id}})"  class="img-fluid myborder" alt=""  width="100%">
            @else
             <img src="{{asset('assets/img/new.png')}}" onclick="showSummary({{$data->left?->id}})"  class="img-fluid myborder" alt=""  width="100%">
            @endif
          
           <p class="text-light">
            {{$data->left?->name}} 
           </p>
           @if($data->left?->name)
           <input type="submit" name="" value="Show" class="btn btn-light" id="">
           @endif
           </form>
        </div>
        </div>
        <div class="col-4">
         
        </div>
        <div class="col-4 d-flex justify-content-start ">
       
        <div class="mycard ">
        
        <form action="referral_tree" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{$data->right?->id}}" id="">
            @if($data->right?->profile_photo_path)
             <img src="{{$data->right?->profile_photo_path}}" onclick="showSummary({{$data->right?->id}})"  class="img-fluid myborder" alt=""  width="100%">
            @else
            <img src="{{asset('assets/img/new.png')}}"  onclick="showSummary({{$data->right?->id}})" class="img-fluid myborder" alt=""  width="100%">
            @endif
              
              <p class="text-light">
            {{$data->right?->name}} 
           </p>
           @if($data->right?->name)
           <input type="submit" name="" value="Show" class="btn btn-light" id="">
           @endif
        </form>
        </div>
        </div>

        
     </div>   
        
</div>
@else

<h1 class="m-4 p-4">No Data Found!</h1>

@endif

<!-- ////////////////////// Modal -->

<div class="modal fade" id="modal_summary" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
           <div class="modal-header">
             <h1 class="modal-title fs-5" id="withdrawModalLabel">User Details</h1>

        
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
          <div class="modal-body">

          <table class="table table-striped">
            <tr><td class="bg-success shadow" colspan="2">
              <div class="row">
                <div class="col-4"> 
                
                     <img src="{{asset('assets/img/new.png')}}"  class="img-fluid myborder" alt=""  width="100%">
           
                </div>
                <div class="col-8">
                  <h3 class="text-light" id="user_name_own"></h3>
                  <p class="text-light" id="user_package_own"></p>
                </div>
              </div>
            </td></tr>
            <tr><td  colspan="2" class="text-success"> <h4 class="text-success">Referred By : <span id="referred_by"> </span></4> </td></tr>
            <tr><th>Paid Left</th> <td id="paid_left"></td></tr>
            <tr><th>Paid Right</th> <td id="paid_right"></td></tr>
            <tr><th>Bv Left</th> <td id="bv_left"></td></tr>
            <tr><th>Bv Right</th> <td id="bv_right"></td></tr>
            <tr><th>Ref Left</th> <td id="ref_left"></td></tr>
            <tr><th>Ref Right</th> <td id="ref_right"></td></tr>
            <tr><th>CBV</th> <td id="cbv"></td></tr>
            <tr><th>Rank</th> <td id="rank"></td></tr>
          </table>
    
 

          </div>


         <div class="modal-footer">
         </div>
    </div>
  </div>
</div>



<script>
  function showSummary(id){
    
    $.ajax({
		url: "/networkSummaryRefrals",
		type: "POST",
		headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		data:{
			user_id:id,
		},
		cache: false,
		success: function(dataResult){
			if(dataResult.data){
   
        $('#paid_left').html(dataResult.data.paid_left);              
        $('#paid_right').html(dataResult.data.paid_right);              
        $('#bv_left').html(dataResult.data.bv_left);              
        $('#bv_right').html(dataResult.data.bv_right);              
        $('#ref_left').html(dataResult.data.ref_left);              
        $('#ref_right').html(dataResult.data.ref_right);              
        $('#cbv').html(dataResult.data.cbv);              
        $('#rank').html(dataResult.data.rank);              
        $('#referred_by').html(dataResult.data.referred_by);              
        $('#user_name_own').html(dataResult.data.user_name_own);              
        $('#user_package_own').html(dataResult.data.user_package_own);              
        $('#modal_summary').modal('show');              
				
			}else{
				
			}
           
			
		}
	    });



     
  }
</script>
</div>
</div>
<!-- /////////////////////    Network  Tree -->


@endsection