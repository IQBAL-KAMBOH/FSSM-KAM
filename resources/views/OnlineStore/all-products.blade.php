@include('OnlineStore.includes.header')
          <!-- banner section start -->
@include('OnlineStore.includes.banner')
@include('OnlineStore.includes.poster')
       
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- all loop section start -->
      <?php 
              $point_name='';
              if($b_type=='bxd'){
              $point_name='DP';
             }else{
               $point_name='PV';
              
             }    
                  $sections=App\Http\Controllers\Store\CategoryController::allCategories();
      ?>
      
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          
     
      
      <div class="fashion_section card shadow" style="background-color:silver!important;">
        
         <div id="section_b2b" class="carousel slide main_slider" data-ride="carousel">
           <h1 class="fashion_taital ">{{$section->name}}</h1>
           <div class="row p-0 justify-content-center">
                           
                           @foreach($data as $product)
                        
                           <div onclick="location.href = '/product-details/{{$product->id}}/{{$b_type}}';"  class="col-5 col-md-3 col-lg-2 m-1 rounded card shadow" style="border-radius:10px !important;">
                           <div class="tshirt_img"><img src="/{{$product->image}}"  style="height:80px !important;width:100px !important; border-radius: 10px;"></div>
                           <h6 class="shirt_text" style="font-size:12px;">{{$product->name}}</h6>
                           <p class="price_text"><span style="color: #262626;">{{$product->sale_price}} Rs</span></p>
                                 <!-- <p class="price_text">Dp  <span style="color: #262626;">{{$product->dp}}</span></p> -->
                                 
                                
                                 <div class="row justify-content-center">
                                 @if($product->bv>0)
                                  <div class="col-12 text-center">
                                  <h3 class="badge badge-dark p-1" style="color:#EB984E ;font-size:14px;">{{$point_name}}  {{$product->bv ?? 0}}</h3>
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
      