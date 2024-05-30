@include('OnlineStore.includes.header2')
        <!-- banner section start -->
        @include('OnlineStore.includes.banner')
        @include('OnlineStore.includes.poster')
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- all loop section start -->
      <?php 
                  
                $sections=App\Http\Controllers\Store\CourceCategoryController::allCategories();
      ?>
      @foreach($sections as $section)
      <?php 
            
         $countproducts=App\Http\Controllers\Store\DigitalProductController::countProductChunks($section->id,3);
         
      ?>
      
      <div class="fashion_section">
         <div id="section_{{$section->name}}" class="carousel slide main_slider" data-ride="carousel">
            <div class="carousel-inner">
               <?php for($i=0;$i<$countproducts;$i++){?>
               <div class="carousel-item <?php if($i==0){ echo 'active';}?>">
                  <div class="container">
                     <h1 class="fashion_taital">{{$section->name}}</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <?php 
                  
                                $getproducts=App\Http\Controllers\Store\StoreController::getCources($section->id,3,$i);
                
                          ?>
                           @foreach($getproducts as $product)
                           
                           <div class="col-lg-4 col-sm-4 col-12">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{$product->name}}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">Rs {{$product->sale_price}}</span></p>
                                 <p class="price_text">Dp  <span style="color: #262626;">{{$product->dp}}</span></p>
                                 <p class="price_text">Pv  <span style="color: #262626;">{{$product->bv}}</span></p>
                                 <div class="tshirt_img"><img src="{{$product->image}}" style="max-height:200px !important;max-width:200px !important; border-radius: 10px;
    box-shadow: 5px 5px 5px black;"></div>
                                 <div class="btn_main">
                                 <div class="buy_bt"><a class="btn" onclick="checkLogin({{$product->id}},'digital_course','{{$product->name}}',{{$product->sale_price}},{{$product->dp ?? 0}},{{$product->bv ?? 0}},'{{$product->supplier_name}}','{{$product->supplier_number}}','{{$product->account_type}}')">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="cource-details/{{$product->id}}">See More</a></div>
                                 </div>
                              </div>
                           </div>

                           @endforeach
                           
                        </div>
                     </div>
                  </div>
               </div>
               <?php 
               }
               ?>
               
            </div>
            @if($countproducts>0)
            <a class="carousel-control-prev" href="#section_{{$section->name}}" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#section_{{$section->name}}" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
            @endif
         </div>
      </div>
      @endforeach
      <!-- all loop section end -->
     
@include ('OnlineStore.includes.footer')
      