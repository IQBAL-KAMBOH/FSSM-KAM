
<?php 
                  
                  $posters=App\Http\Controllers\PosterController::getPosters('Store');
                 $globalSettings=App\Http\Controllers\Admin\AdminAccountDetailsController::globalSettings();
                 
              ?>
        @if($globalSettings->store_poster_status=='Active')      
<div class="banner_section layout_padding">
            <div class="container">
               <div id="my_sliderp"  class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <?php $count=1;?>
                     @foreach($posters as $poster)
                     <div class="carousel-item <?php if($count==1){ echo 'active';}?>">
                        <div class="row">
                           <div class="col-sm-12 text-center">
                              <img style="max-width:<?php echo $globalSettings->store_poster_width?>px !important; border-radius: 15px; max-height: <?=$globalSettings->store_poster_height?>px !important; "  src="{{$poster->image}}" alt="">
                           </div>
                        </div>
                     </div>
                     <?php $count++;?>
                    @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#my_sliderp" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_sliderp" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         @endif