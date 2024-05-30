@extends('layout.layout')

@section('content')

<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

    <div class="col-xl-12 col-lg-12 col-sm-12 table" >
                            <div class="widget-content widget-content-area br-8 mt-4">
                               
                            <form action="/network" method="POST">
				                    @csrf
                            <div class="row">
							                <div class="col-6">
                              <div class="form-group mb-4">
								               
								                  <input type="text" name="user_name"  id="user_name" class="form-control" placeholder="Enter User Name">
								
								
							                </div>
                              </div>
                              <div class="col-6 form-group mb-4">
                                <input type="submit" name="" class="btn btn-sucess" value="Search"  id="">
                              </div>
						                 </div>
                           </form>
          @if(!empty($network))
          <table class="table table-striped p-4 m-4">
            <tr><td class="bg-success shadow" colspan="2">
              <div class="row">
                <div class="col-6 justify-content-start"> 
                
                     <img src="{{asset('assets/img/new.png')}}"  class="img-fluid myborder" alt=""  width="60px">
           
                </div>
                <div class="col-6 justify-content-end">
                  <h3 class="text-light" id="user_name_own">{{$network['user_name_own'] ?? ''}}</h3>
                  <p class="text-light" id="user_package_own">{{$network['user_package_own'] ?? ''}}</p>
                </div>
              </div>
            </td></tr>
            <tr><td  colspan="2" class="text-success"> <h4 class="text-success">Referred By : <span id="referred_by">{{$network['referred_by'] ?? ''}} </span></4> </td></tr>
            <tr><th>Paid Left</th> <td id="paid_left">{{$network['paid_left'] ?? ''}}</td></tr>
            <tr><th>Paid Right</th> <td id="paid_right">{{$network['paid_right'] ?? ''}}</td></tr>
            <tr><th>Bv Left</th> <td id="bv_left">{{$network['bv_left'] ?? ''}}</td></tr>
            <tr><th>Bv Right</th> <td id="bv_right">{{$network['bv_right'] ?? ''}}</td></tr>
            <tr><th>Ref Left</th> <td id="ref_left">{{$network['ref_left'] ?? ''}}</td></tr>
            <tr><th>Ref Right</th> <td id="ref_right">{{$network['ref_right'] ?? ''}}</td></tr>
            <tr><th>CBV</th> <td id="cbv">{{$network['cbv'] ?? ''}}</td></tr>
            <tr><th>Rank</th> <td id="rank">{{$network['rank'] ?? ''}}</td></tr>
      
          </table>

          @else


             <h4 class="text-center">Data Not Found!....</h4>
          @endif
    
 

          

    

</div>
</div>
</div>
 </div>


@endsection