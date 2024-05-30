@include('OnlineStore.includes.header')

                               
                                <style>
                                    body{
                                        background-color:none;
                                    }

.hedding {
    font-size: 20px;
    color: #ab8181`;
}
/* 
.main-sectionmy {
    position: absolute;
    left: 50%;
    right: 50%;
    transform: translate(-50%, 5%);
} */

.left-side-product-box img {
    width: 100%;
}

.left-side-product-box .sub-img img {
    margin-top: 5px;
    width: 83px;
    height: 100px;
}

.right-side-pro-detail span {
    font-size: 15px;
}

.right-side-pro-detail p {
    font-size: 25px;
    color: #a1a1a1;
}

.right-side-pro-detail .price-pro {
    color: #E45641;
}

.right-side-pro-detail .tag-section {
    font-size: 18px;
    color: #5D4C46;
}

.pro-box-section .pro-box img {
    width: 100%;
    height: 200px;
}

@media (min-width:360px) and (max-width:640px) {
    .pro-box-section .pro-box img {
        height: auto;
    }
}</style>
                                  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
                                <?php 
              $point_name='';
              if($type=='bxd'){
              $point_name='DP';
             }else{
               $point_name='PV';
              
             }    
      ?>
             
                           
                            <div class="">
    <div class="col-lg-8 border p-3 main-section bg-white mt-4" style="margin:auto;border-radius:20px;">
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
            Product Detail
        </div>
        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
                <img src="/{{$data?->image}}" class="border p-3">
                
                <span class="sub-img">
                    <img src="/{{$data?->image}}" class="border p-2">
                    <img src="/{{$data?->image}}" class="border p-2">
                    <img src="/{{$data?->image}}" class="border p-2">
                </span>
                <a href="/{{$data?->image}}" download="{{$data->name}}" class="btn btn-info">Download</a>
            </div>
            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <p class="m-0 p-0">{{$data->name}}</p>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro">Rs{{$data->sale_price}}</p>
                            <hr class="p-0 m-0">
                        </div>
                         <!-- <div class="col-lg-12 pt-2">
                            <h5>DP</h5>
                            <span class=" price-pro">{{$data->dp}}</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>  -->
                        <div class="col-lg-12 pt-2">
                            <h5>Delivery Charges</h5>
                            <span class=" price-pro">{{$data->delivery_charges ?? 0}} Rs</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>{{$point_name}}</h5>
                            <span class=" price-pro">{{$data->bv}}</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-lg-12 pt-2">
    <h5>Product Detail</h5>
    <span id="productDescription">{{$data->description}}</span>
    <button id="copyButton" class="btn btn-warning">Copy Text</button>
    <hr class="m-0 pt-2 mt-2">
</div>

                        
                        <div class="col-lg-12">
                            <h6>Quantity :</h6>
                            <input type="number" class="form-control text-center w-100" id="product_quantity_{{$data->id}}" value="1">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-lg-6 pb-2">
                                    
                                    <!-- <a type="button" class="btn btn-danger w-100 text-light" onclick="checkLogin({{$data->id}},'physical_product','{{$data->name}}',{{$data->sale_price}},{{$data->dp ?? 0}},{{$data->bv ?? 0}},'{{$data->supplier_name}}','{{$data->supplier_number}}','{{$data->account_type}}',0,{{$data->custom_id ?? 1}},{{$data->delivery_charges ?? 0}} )">Add To Cart</a> -->
                                </div>
                                <div class="col-lg-6">
                                    <a type="button" onclick="checkLogin({{$data->id}},'physical_product','{{$data->name}}',{{$data->sale_price}},{{$data->bv ?? 0}},'{{$data->supplier_name}}','{{$data->supplier_number}}','{{$data->account_type}}',1,{{$data->custom_id ?? 1}},{{$data->delivery_charges ?? 0}},'{{$type}}' )" class="btn btn-success w-100 text-light">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <br><br>
    </div>
</div><!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $("#copyButton").on("click", function () {
            // Select the text inside the span
            var textToCopy = $("#productDescription").text();

            // Create a temporary input element
            var tempInput = $("<input>");

            // Append the input element to the body
            $("body").append(tempInput);

            // Set the input value to the text to be copied
            tempInput.val(textToCopy);

            // Select the text inside the input
            tempInput.select();

            // Copy the text to the clipboard
            document.execCommand("copy");

            // Remove the temporary input element
            tempInput.remove();
            Swal.fire(
                           'Text copied to clipboard:',
                             textToCopy,
                           '!!!!'
                         );
            // Optionally, provide some feedback to the user
           
        });
    });
</script>

@include ('OnlineStore.includes.footer')
      