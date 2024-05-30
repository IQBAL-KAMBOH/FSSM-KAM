@extends('layout.layout')

@section('content')

<style>

#user_card {
    background: linear-gradient(to bottom, #0051a1, #0066CC, #0077CC);
}
#user_card .widget-content {
  position: relative;
}

/* #user_card .w-earnings {
  position: absolute;
  bottom: 100;
  right: 0;
  padding: 5px;
}

#user_card .w-earnings img {
  height: 40px;
} */

#second_card{
	background: linear-gradient(to bottom, #a10051, #cc0066, #cc0077);
}
#third_Card{
	background: linear-gradient(to bottom, #ffffcc, #ffff99, #ffcc66);
}


</style>
<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

    <div class="row layout-top-spacing">
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four" id="user_card">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Total BV</h6>
                        </div>
                    </div>

                    <div class="w-content">
                     <div class="w-info">
                            <p class="value">
                                <?php 
                                $total_bv=$dashboard->bv_left+$dashboard->bv_right;
                                ?>
                                {{$total_bv}}
                            <span></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                        </div>
                        
                    </div>

                 <div class="w-action">
                    <button class="btn btn-light">View All</button>
                    </div>

               </div>
            </div>
        </div> 

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four" id="second_card">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Left BV</h6>
                        </div>
                    </div>

                    <div class="w-content">
                     <div class="w-info">
                            <p class="value">{{$dashboard->bv_left}}<span></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                        </div>
                        
                    </div>

                 <div class="w-action">
                    <button class="btn btn-light">View All</button>
                    </div>

               </div>
            </div>
        </div> 


        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four" id="user_card">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Right BV</h6>
                        </div>
                    </div>

                    <div class="w-content">
                     <div class="w-info">
                            <p class="value">{{$dashboard->bv_right}}<span></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                        </div>
                        
                    </div>

                 <div class="w-action">
                    <button class="btn btn-light">View All</button>
                    </div>

               </div>
            </div>
        </div> 


       
        
    </div>

    <div class="row layout-top-spacing">
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four" id="third_Card">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Converted Bv</h6>
                        </div>
                    </div>

                    <div class="w-content">
                     <div class="w-info">
                            <p class="value">{{$dashboard->cbv}} <span></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                        </div>
                        
                    </div>

                 <div class="w-action">
                    <button class="btn btn-light">View All</button>
                    </div>

               </div>
            </div>
        </div> 



       
        
    </div>

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-8">
                                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th>BV</th>
                                            <th>Position</th>
                                            <th>Detail</th>
                                            <th>Date</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <!-- @foreach($bv as $datas)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$datas->bv}}</td>
                                            <td>{{$datas->position}}</td>
                                            <td><?php
                                            
                                            
                                            ?></td>
                                            <td>{{$datas->created_at}}</td>
                                           
                                        </tr>
                                        @endforeach
                                         -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
    

</div>
</div>



@endsection