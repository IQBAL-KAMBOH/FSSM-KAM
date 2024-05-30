<!-- footer section start -->
<?php
$globalSettings=App\Http\Controllers\Admin\AdminAccountDetailsController::globalSettings();?>
<div class="footer_section layout_padding">
         <div class="container">
         <div class="col-sm-12 text-center">
                              
              
                              <img src="/OnlineStore/images/fssm-logo.png" width="200px">
                                
                              
                                            
                                          </div>
            <div class="input_bt">
               
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
            @include('OnlineStore.includes.menu')
            </div>
            <div class="location_main">Contact  Number : <a href="https://wa.me/{{$globalSettings->whats_app}}">{{$globalSettings->whats_app}}</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <!-- <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div> -->
      <!-- copyright section end -->
      <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="orderLoginModal" tabindex="-1" role="dialog" aria-labelledby="orderLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="" class="signin-form" >
                            @csrf
			      		<div class="form-group mb-3 mt-4">
			      			<label class="label" for="loginname">Email / Username</label>
			      			<input type="text" name="loginname" id="customloginname" class="form-control" placeholder="User Name" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" id="custompassword" class="form-control" placeholder="Password" required>
		            </div>
					
					<br>
		            <div class="form-group">
		            	<button type="button" onclick="customLogin()" class="form-control btn btn-primary submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            
									</div>
									<div class="w-50 text-md-right">
										<!-- <a href="#">Forgot Password</a> -->
									</div>
		            </div>
		          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Login</button> -->
      </div>
    </div>
  </div>
</div>
      <!-- Javascript files-->
      <script src="OnlineStore/js/jquery.min.js"></script>
      <script src="OnlineStore/js/popper.min.js"></script>
      <script src="OnlineStore/js/bootstrap.bundle.min.js"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <script src="OnlineStore/js/plugin.js"></script>
      <script src="/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
        <script src="/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
      <!-- sidebar -->
      <script src="OnlineStore/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="OnlineStore/js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }


        function checkLogin(product,type,name,price,bv,s_name,s_number,ac_type,shop_now=0,supplier_id,delivery_charges,b_type){
          var loginId=$("#store_user_id").val();
        
          if(loginId==0){
           
            $('#orderLoginModal').modal('show');
           
          }else{

            var customer_id =loginId // Replace with the desired session key
            var product_id =product; // Replace with the value you want to store
            var product_type =type; // Replace with the value you want to store
            var dp=0;
          
         
            if(b_type=='bxd'){
              dp=bv;
              bv=0;
            }else{
              dp=0;
            }
         
           var quantity=1;
           var quant=$('#product_quantity_'+product_id).val();
           if(quant>0){
            quantity=quant;
           }
           $.ajax({
              type: 'POST',
              url: '/add-to-cart',
              data: {
                customer_id: customer_id,
                product_id: product_id,
                supplier_id:supplier_id,
                product_type: product_type,
                product_name: name,
                product_price: price,
                quantity:quantity,
                s_name:s_name,
                s_number:s_number,
                ac_type:ac_type,
                b_type:b_type,
                dp:dp,
                bv:bv,
                delivery_charges:delivery_charges,
                _token: '{{ csrf_token() }}'
              },
              success: function(response) {
                // if(shop_now==1){
                  window.location.href = "/view-cart";
                // }else{
                //         Swal.fire(
                //            'Product Added To Cart!',
                //            'Success.',
                //            '!!!!'
                //          );
                // }
                
              }
           });
          }
        }

function customLogin(){
   
   var login=$('#customloginname').val();
   var password=$('#custompassword').val();
    $.ajax({
               url:'/custom-login',
               type: 'POST',
               data:{
                   login:login,
                   password:password,
                   _token: '{{ csrf_token() }}'
               },
              
               success: function(response){
                   if(response.message=='success'){
                       
                       $("#store_user_id").val(response.user.id);
                       $('#orderLoginModal').modal('hide');

                   }else{
                        Swal.fire(
                           'Authentication Error!',
                           'Please provide correct details.',
                           '!!!!'
                         );
                        
                         $('#orderLoginModal').modal('hide');
                   }
                  
       
                  
               },
               error: function (xhr, ajaxOptions, thrownError) {
                   console.log(xhr.status);
                   console.log(thrownError);
                   }
               });
   

}



$(".remove-item").click(function() {
    var productId = $(this).data("product-id");
    var productType = $(this).data("product-type");
    var row = $(this).closest("tr");

    if (confirm("Are you sure you want to remove this item from the cart?")) {
        $.ajax({
            method: "POST",
            url: "/remove-from-cart",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productId,
                product_type: productType
            },
            success: function(response) {
                if (response.success) {
                    row.remove();
                } else {
                    alert("Failed to remove item from cart.");
                }
            },
            error: function() {
                alert("An error occurred while processing your request.");
            }
        });
    }
});

      </script>
      
   </body>
</html>