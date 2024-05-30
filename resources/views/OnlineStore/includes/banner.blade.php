<?php
    if($b_type=='bxd'){
      $plan='B2B';
    }else{
      if(auth()->user() && auth()->user()->plan_id>0){
         $plan='B2C';
     }else{
        $plan='C2C';
     }
    }

?>
<div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your <span style="color: #040b67;">Favourite</span> shoping</h1>
                              <div  class="buynow_bt"><a href="#">{{$plan}}</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your <span style="color: #040b67;">Favourite</span> shoping</h1>
                              <div class="buynow_bt"><a href="#">{{$plan}}</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your <span style="color: #040b67;">Favourite</span> shoping</h1>
                              <div class="buynow_bt"><a href="#">{{$plan}}</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>