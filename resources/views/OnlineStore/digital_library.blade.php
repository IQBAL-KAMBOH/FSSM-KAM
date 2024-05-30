@include('OnlineStore.includes.header3')
<!-- banner section start -->
@include('OnlineStore.includes.banner')
@include('OnlineStore.includes.poster')
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- all loop section start -->
      <?php 
                  
                  $sections=App\Http\Controllers\Store\LibraryCategoryController::allCategories();
      ?>
      @foreach($sections as $section)
      <?php 
                  
          $countproducts=App\Http\Controllers\Store\DigitalLibraryController::countProductChunks($section->id,3);
         
      ?>
      
      <div class="fashion_section">
         <div id="section_{{$section->name}}" class="carousel slide main_slider" data-ride="carousel">
           <h1 class="fashion_taital card shadow ">{{$section->name}}</h1>
           <div class="row justify-content-center">
                           <?php 
                  
                                $getproducts=App\Http\Controllers\Store\StoreController::getLibraryProductsAll($section->id);
                
                          ?>
                           @foreach($getproducts as $product)
                           
                           <div onclick="location.href = 'all-digital-products/{{$section->id}}';"  class="col-5 col-md-3 col-lg-2 m-2 p-1 rounded card shadow">
                          
                           <div class="tshirt_img"><img src="{{$product->image}}"  style="max-height:100px !important;max-width:100px !important; border-radius: 10px;"></div>
                           <h6 class="shirt_text" style="font-size:12px;">{{$product->name}}</h6>
                           <p class="price_text"><span style="color: #262626;">{{$product->sale_price}} Rs</span></p>
                                 <!-- <p class="price_text">Dp  <span style="color: #262626;">{{$product->dp}}</span></p> -->

                                
                                 <div class="row justify-content-center">
                                 @if($product->bv>0)
                                  <div class="col-12 text-center">
                                  <h3 class="badge badge-dark p-1" style="color:#EB984E ;font-size:14px;">Pv  {{$product->bv ?? 0}}</h3>
                                  </div>
                                
                                 @endif 
                                 @if($product->delivery_charges)
                                
                                 @else
                                 
                                 <div class="col-12 text-center">
                                 <h3 class="badge badge-success p-1" style="color:black ;font-size:14px;">Free Delivery</h3>
                                 </div>
                                 @endif
                                    <!-- <div class="col-12 justify-content-center"><button  class="form-control bg-warning" onclick="checkLogin({{$product->id}},'physical_product','{{$product->name}}',{{$product->sale_price}},{{$product->dp ?? 0}},{{$product->bv ?? 0}},'{{$product->supplier_name}}','{{$product->supplier_number}}','{{$product->account_type}}')">Buy Now</button></div> -->
                                    <!-- <div class="col-12 justify-content-center"><a class="form-control bg-info"  href="product-details/{{$product->id}}">See More</a></div> -->
                                 </div>
                           </div>

                           @endforeach
                           
                        </div>
         </div>
         <div class="row">
                           <div class="col-12">
                              <center>
                                 <a href="/all-digital-products/{{$section->id}}" class="btn btn-primary mt-4">
                                    View More

                                 </a>
                                  </center>
                           </div>
                        </div>
      </div>
      @endforeach
      <!-- all loop section end -->
     
@include ('OnlineStore.includes.footer')
      