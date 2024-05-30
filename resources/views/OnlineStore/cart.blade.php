@include('OnlineStore.includes.header')
<style>
        #imageContainer {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #imageContainer img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        #imageContainer .icon {
            font-size: 48px;
            color: #aaa;
        }
    </style>
                               
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
          $globalSettings=App\Http\Controllers\Admin\AdminAccountDetailsController::globalSettings();
    ?>          
                           
                            <div class=" m-4">
    <div class="col-lg-10 border p-3 main-section bg-white mt-4" style="margin:auto;border-radius:20px;">
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
           Cart 
        </div>
      
                       
                 
                    <form action="/create-order" method="post" enctype="multipart/form-data">
    @csrf
   
    <table class="table table-striped table-responsive-md table-responsive-lg m-1 p-1">
        <tr>
            <th>Code</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>
            
            <th>DP</th> 
             
            <th>PV</th>
            
           
           
            <th>Supplier Name</th>
            <th>Supplier Number</th>
            <th>Account Type</th>
            <th>Action</th>
        </tr>
        <?php $total_amount=0;?>
        <?php $total_dp=0;?>
        <?php $total_bv=0;?>
        <?php $b_type=0;?>
        <?php $delivery_charges=0;?>
        @foreach($cart as $item)
        <tr>
            <td>{{ $item['product_id'] }}</td>
            <td>{{ $item['name'] }}</td>
          
            <td>{{ $item['price'] }}</td>
            <td >
                <!-- <input type="number" min="1" required onchange="calcAmount(this.value,{{$loop->iteration}},{{ $item['price'] }},{{ $item['dp'] }},{{ $item['bv'] }})" name="cart[{{ $item['product_id'] }}][quantity]" value="{{ $item['quantity'] }}">
             -->
             <div>
    <button type="button" class="btn btn-warning" onclick="decreaseQuantity({{$loop->iteration}}, {{ $item['price'] }}, {{ $item['dp'] }}, {{ $item['bv'] }},{{ $item['product_id'] }})">-</button>
    <input type="number" style="width:50px;" min="1" required id="am_{{ $item['product_id'] }}" onchange="calcAmount(this.value,{{$loop->iteration}},{{ $item['price'] }},{{ $item['dp'] }},{{ $item['bv'] }})" name="cart[{{ $item['product_id'] }}][quantity]" value="{{ $item['quantity'] }}">
    <button type="button" class="btn btn-success" onclick="increaseQuantity({{$loop->iteration}}, {{ $item['price'] }}, {{ $item['dp'] }}, {{ $item['bv'] }},{{ $item['product_id'] }})">+</button>
</div>


                <input type="hidden" name="cart[{{ $item['product_id'] }}][product_id]" value="{{ $item['product_id'] }}">
                <input type="hidden" name="cart[{{ $item['product_id'] }}][supplier_id]" value="{{ $item['supplier_id'] }}">
                <input type="hidden" name="cart[{{ $item['product_id'] }}][product_name]" value="{{ $item['name'] }}">
                <input type="hidden" name="cart[{{ $item['product_id'] }}][product_price]" value="{{ $item['price'] }}">
                <input type="hidden" name="cart[{{ $item['product_id'] }}][product_type]" value="{{ $item['product_type'] }}">
                <input type="hidden" name="cart[{{ $item['product_id'] }}][dp]" value="{{ $item['dp'] }}">
                <input type="hidden" name="cart[{{ $item['product_id'] }}][bv]" value="{{ $item['bv'] }}">
                <input type="hidden" name="cart[{{ $item['product_id'] }}][delivery_charges]" value="{{ $item['delivery_charges'] }}">
                <?php $delivery_charges+=$item['delivery_charges'];?>
                <input type="hidden" name="customer_id" value="{{ $item['customer_id'] }}">
            </td>
            <?php 
            $price=$item['price'];
            $qty=$item['quantity'];
            $amount=$price*$qty;
            $dp=(int)$item['dp']*(int)$qty;
             $bv=(int)$item['bv']*(int)$qty;
            $total_amount+=$amount;
            $total_dp+=$dp;
            $total_bv+=$bv;
            $b_type=$item['b_type'];
           
    
            ?>
            <td id="product_amount_{{$loop->iteration}}" class="amount"><?php  echo $amount;?> </td>
            <td id="product_dp_{{$loop->iteration}}" class="single_dp "><?php  echo $dp;?> </td>
            <td id="product_bv_{{$loop->iteration}}" class="single_bv"><?php  echo $bv;?> </td>
            <td>{{ $item['s_name'] }}</td>
            <td>{{ $item['s_number'] }}</td>
            <td>{{ $item['ac_type'] }}</td>
            <td>
            <button type="button" class="btn btn-danger remove-item" data-product-id="{{ $item['product_id'] }}" data-product-type="{{ $item['product_type'] }}">Remove</button>
            </td>
        </tr>
        @endforeach
        <tr>
            <th colspan="3">Delivery charges: {{$delivery_charges}} /- <input type="hidden" name="delivery_charges" id="delivery_charges" value="{{$delivery_charges}}"> </th>
            
         
            <th colspan="2" class="text-right">Amount : <span id="total_amount">{{$total_amount+$delivery_charges}} /-</span> <input type="hidden" name="total_amount" value="{{$total_amount}}" id="total_amount_inp"></th>
            <th>DP: <span id="total_dp">{{$total_dp}}</span>  <input type="hidden" name="total_dp" value="{{$total_dp}}" id="total_dp_inp"></th>
            <th colspan="3">PV: <span id="total_bv">{{$total_bv}}</span>  <input type="hidden" name="total_bv" value="{{$total_bv}}" id="total_bv_inp"></th>
           
            <th></th>
          
            <th></th>
            
          
           
        </tr>

     
      
    
    </table>
     <div class="row p-1">
     <div class="col-12 col-md-6 col-lg-6">
      <label for="">Payment Screen Shot</label>
      <input type="file" class="form-control" required name="file" id="fileInput">
      <div id="imageContainer" style="margin-top: 20px;">
            <div class="icon" style="height:250px;width:250px;">&#128247;</div>
      </div>
    </div>


       <div class="col-12 col-md-6 col-lg-6">
           <label for="">Full Name</label>
           <input type="text" class="form-control " required name="full_name" id="">
      </div>
        <div class="col-12 col-md-6 col-lg-6">
        <!-- <label for="">Last Name</label>
        <input type="text" class="form-control "  name="last_name" id=""> -->
        <label for="">Full Address</label>
        <input type="text" class="form-control " required name="full_address" id="">
      </div>
        <div class="col-12 col-md-6 col-lg-6">
        <label for="">Active Email</label>
        <input type="email" class="form-control " required name="email" id="">
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <label for="">Whatsapp Number</label>
        <input type="text" class="form-control " required name="whatsapp_number" id="">
        </div>
     </div>
    <div class="col-12 col-md-6 col-lg-6">
        <div class="row">
            <input type="hidden" name="b_type" value="{{$b_type}}" id="">
        <button type="submit" class="col btn btn-outline-succes m-4 p-2 shadow">Place Order</button>
    <a href="/cancell-order" class="col btn btn-outline-danger m-4 p-2 shadow">Cancell</a>
        </div>
    
    </div>
   
   
</form>
    <table class="table table-striped table-responsive-md m-1 p-1">
        <tr>
            <th></th>
            <th>Jazzcash</th>
            <th>Easypaisa</th>
            <th colspan="2">Bank Account</th>
        </tr>
        <tr>
            <td>Title</td>
            <td>{{$globalSettings->jazzcash_name}} </td>
            <td>{{$globalSettings->easypaisa_name}}</td>
            <td colspan="2">{{$globalSettings->account_title}}</td>
            
        </tr>
        <tr>
            <td>Account</td>
            <td>{{$globalSettings->jazzcash_account}}</td>
            <td>{{$globalSettings->easypaisa_account}}</td>
            <td> Iban Number  {{$globalSettings->account_iban}}</td>
            <td> A/N  {{$globalSettings->account_number}}</td>
        </tr>
        <tr>
            <td colspan="2">
            <a aria-label="Chat on WhatsApp" href="https://wa.me/{{$globalSettings->whats_app}}"><img src="images/WhatsAppButtonGreenSmall.png" width="200px;" alt=""></a>

            </td>
            <td colspan="3">WhatsApp : {{$globalSettings->whats_app}}</td>
        </tr>
</table>
 
       
        
    </div>
</div>
<script>
    $(document).ready(function () {
        // Listen for changes in the file input
        $('#fileInput').change(function () {
            displayImage(this);
        });

        function displayImage(input) {
            // Check if a file is selected
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Display the selected image
                    $('#imageContainer').html('<img style="height:250px;width:250px;" src="' + e.target.result + '" alt="Selected Image">');
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                // No file selected, show the image icon
                $('#imageContainer').html('<div style="height:250px;width:250px;" class="icon">&#128247;</div>');
            }
        }
    });
</script>

<script>
  function calcAmount(qty,i,price,dp,bv){
    var newval=qty*price;
    var newvaldp=qty*dp;
    var newvalbv=qty*bv;
    $('#product_amount_'+i).html(newval);
    $('#product_dp_'+i).html(newvaldp);
    $('#product_bv_'+i).html(newvalbv);
    var sum_amount =parseInt($("#delivery_charges").val());
  $('.amount').each(function(){
    sum_amount += +$(this).html();
    $('#total_amount').html(sum_amount);
    $('#total_amount_inp').val(sum_amount);
  });
  var sum_dp = 0;
  $('.single_dp').each(function(){
    sum_dp += +$(this).html();
    $('#total_dp').html(sum_dp);
    $('#total_dp_inp').val(sum_dp);
  });

  var sum_bv = 0;
  $('.single_bv').each(function(){
    sum_bv += +$(this).html();
    $('#total_bv').html(sum_bv);
    $('#total_bv_inp').val(sum_bv);
  });

  }
  
</script>
<script>
    $(document).ready(function () {
        // Get the value of the 'done' variable from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const doneValue = urlParams.get('done');

        // Check the value and show an alert
        if (doneValue !== null) {
                       Swal.fire(
                           'Order Placed Successfully!',
                           'Thanks for shoping.',
                           '!!!!'
                         );
        }
    });
</script>
<script>
    console.log("Script loaded successfully.");

    function decreaseQuantity(iteration, price, dp, bv,prid) {
        var inputElement =$("#am_"+prid).val();
        var currentValue = parseInt(inputElement);
       
       

        if (currentValue > 1) {
            var newval=currentValue - 1;
            $("#am_"+prid).val(newval);
            calcAmount(newval, iteration, price, dp, bv);
        }
    }

    function increaseQuantity(iteration, price, dp, bv,prid) {
        var inputElement =$("#am_"+prid).val();
        var currentValue = parseInt(inputElement);
        var newval=currentValue + 1;
        $("#am_"+prid).val(newval);
        calcAmount(newval, iteration, price, dp, bv);
    }
</script>


@include ('OnlineStore.includes.footer')
      