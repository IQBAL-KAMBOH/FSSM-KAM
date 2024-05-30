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
       <div class="row">
            <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                 <div class="row">
                  <div class="col-12">
                     <div class="card p-4 shadow" style="background-color:silver!important;">
                        <h2></h2>
                        
                        <a href="#section_b2b" class="form-control">
                        B2B
                        </a>
                        <a href="#section_b2c" class="form-control">
                        @if(auth()->user() && auth()->user()->plan_id>0)
                        B2C
                        @else
                        C2C
                        @endif
                        </a>
                      
                     </div>
                  </div>
                 </div>
            </div>
            <div class="col-12 col-sm-10 col-md-10 col-lg-10">
          
     
      
      <div class="fashion_section card shadow" style="background-color:silver!important;">
        
         <div id="section_b2b" class="carousel slide main_slider" data-ride="carousel">
           <h1 class="fashion_taital ">{{$section->name}} B2B</h1>
           <div class="row p-0 justify-content-center">
                           
                           @foreach($datab2b as $product)
                        
                           <div onclick="location.href = '/cource-details/{{$product->id}}/bxd';"  class="col-5 col-md-3 col-lg-2 m-1 rounded card shadow" style="border-radius:10px !important;">
                           <div class="tshirt_img"><img src="/{{$product->image}}"  style="height:80px !important;width:100px !important; border-radius: 10px;"></div>
                           <h6 class="shirt_text" style="font-size:12px;">{{$product->name}}</h6>
                           <p class="price_text"><span style="color: #262626;">{{$product->sale_price}} Rs</span></p>
                                 <!-- <p class="price_text">Dp  <span style="color: #262626;">{{$product->dp}}</span></p> -->
                                 
                                
                                 <div class="row justify-content-center">
                                 @if($product->dp>0)
                                  <div class="col-12 text-center">
                                  <h3 class="badge badge-dark p-1" style="color:#EB984E ;font-size:14px;">DP  {{$product->dp ?? 0}}</h3>
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
      </div>
      <div class="fashion_section card shadow" style="background-color:silver!important;">
        
        <div id="section_b2c" class="carousel slide main_slider" data-ride="carousel">
          <h1 class="fashion_taital ">{{$section->name}}  @if(auth()->user() && auth()->user()->plan_id>0)
                        B2C
                        @else
                        C2C
                        @endif</h1>
          <div class="row  justify-content-center">
                          
                          @foreach($datab2c as $product)
                       
                          <div onclick="location.href = '/cource-details/{{$product->id}}/byd';"  class="col-5 col-md-3 col-lg-2 m-1 rounded card shadow" style="border-radius:10px !important;">
                          <div class="tshirt_img"><img src="/{{$product->image}}"  style="height:80px !important;width:100px !important; border-radius: 10px;"></div>
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
     </div>
     
            </div>
         </div>
     

@include ('OnlineStore.includes.footer')
      