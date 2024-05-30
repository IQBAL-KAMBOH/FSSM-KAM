@include('OnlineStore.includes.header')
          <!-- banner section start -->
@include('OnlineStore.includes.banner')
@include('OnlineStore.includes.poster')
       
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- all loop section start -->
      
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            @foreach($sections as $section)
           

      <?php  $point_name='';
                                if($b_type=='bxd'){
                                $point_name='DP';
                               }else{
                                 $point_name='PV';
                                
                               }    ?>
      
      <div class="fashion_section card shadow">
        
         <div id="section_{{$section->name}}" class="carousel slide main_slider" data-ride="carousel">
           <h1 class="fashion_taital pt-2">{{$section->name}} </h1>
           <div class="row  justify-content-center">
                           <?php 
                  
                                $getproducts=App\Http\Controllers\Store\StoreController::getProductsAll($section->id);
                               
                          ?>
                           @foreach($getproducts as $product)
                        
                           <div onclick="location.href = 'all-products/{{$section->id}}/{{$b_type}}';"  class="col-5 col-md-3 col-lg-2 m-1 rounded card shadow" style="border-radius:10px !important;">
                           <div class="tshirt_img"><img src="{{$product->image}}"  style="height:80px !important;width:100px !important; border-radius: 10px;"></div>
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
         <div class="row">
                           <div class="col-12">
                              <center>
                                 <a href="/all-products/{{$section->id}}/{{$b_type}}" class="btn btn-primary mt-4">
                                    View More

                                 </a>
                                  </center>
                           </div>
                        </div>
      </div>
      
      @endforeach
     
            </div>
         </div>
     

@include ('OnlineStore.includes.footer')
      