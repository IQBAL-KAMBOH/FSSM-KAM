

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
" rel="stylesheet">


<script src="assets/layouts/Auth/js/jquery.min.js"></script>
  <script src="assets/layouts/Auth/js/popper.js"></script>
  <script src="assets/layouts/Auth/js/bootstrap.min.js"></script>
  <script src="assets/layouts/Auth/js/main.js"></script>
	<title>Sign Up</title>

	
</head>
<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/layouts/Auth/css/style.css">

<style>
		body{
			background: #000428;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #004e92, #000428);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #004e92, #000428); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}
		.mygg{
			background-color: #FF3CAC;
background-image: linear-gradient(225deg, #FF3CAC 0%, #784BA0 50%, #2B86C5 100%);
       border-radius:30px 0px 30px 0px;
		}
	</style>
<section class="ftco-section">
			<div class="container mybg">
				<div class="row justify-content-center">
					<div class="col-md-12 col-sm-12 col-lg-12 justify-content-center">
						<div class=" bg-light">
							<div class="justify-content-center">
							<div class="justify-content-center p-4 " style="background-color:white !important;border-radius:20px;">
							<div class="mygg p-4 p-lg-5 text-center  align-items-center order-md-last">
								<div class="text w-100">
									<h2 class="text-light">Welcome to Future Secure  Sales & Marketing</h2>
									<p class="text-light">Haven't login yet?Don't worry just fill all the information below and get account now</p>
									<a href="/login" class="btn btn-white btn-outline-white">Login</a>
								</div>
							</div>
							    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
										<div class="alert alert-danger" role="alert">
                                            {{ $error }}
										</div>
                                        @endforeach
                                @endif
								<div class=" justify-content-center p-4">
								
									<div class="w-100">
										<h3 class="">Sign Up</h3>
									</div>
									<div class="w-100">
										<p class="social-media d-flex justify-content-end">
										<a href="https://www.facebook.com/profile.php?id=100092421189735&notif_id=1683526984495623&notif_t=page_user_activity&ref=notif" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="https://www.youtube.com/@FSSM786" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-youtube"></span></a>
									</p>
										</p>
									</div>
								</div>

								<div>
								<form method="POST" action="{{ route('register') }}" class="signin-form p-4 bg-light">
                                @csrf
									<div class="container">
									<div class="col-12">
												<div class="form-group mb-3">
													<label class="label" for="name">Sponser Username</label>
													<?php 
													    if(isset($_REQUEST['refral_name'])){
														
														?>
														  
                                                          <input type="text" readonly onchange="checkRef(this.value)"  id="refral_name" value="{{$_REQUEST['refral_name']}}" name="refral_name" required  class="bg-light form-control" placeholder="Referral Name"  />
														   <script>
															$(document).ready(function(){
                                                                checkRef('<?=$_REQUEST['refral_name']?>');
                                                              });
														  
														   </script>
														<?php
														
														}else{
														?>
                                                          <input type="text" readonly id="refral_name" name="refral_name" required onchange="checkRef(this.value)" class="form-control" placeholder="Referral Name"  />
														<?php

														}
													?>
													
												</div>
											</div>
											<div class="col-12">
												<div class="form-group mb-3">
													<label class="label" for="full_name">Full Name (According to Cnic)</label>
													<input  type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name"  />
												</div>
											</div>
											<div class="col-12">
												<div class="form-group mb-3">
													<label class="label" for="name"> Active Email</label>
													<input  type="email" name="email" class="form-control" placeholder="Email" required />
												</div>
											</div>

												
											<div class="col-12">
    <div class="form-group mb-3">
        <label class="label" for="name">User Name (Without Spaces)</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" oninput="removeSpaces(this)" />
        <small id="name-error" class="text-danger"></small>
    </div>
</div>

<script>
    function removeSpaces(input) {
        input.value = input.value.replace(/\s/g, '');
        checkNameValidity(input.value);
    }

    function checkNameValidity(value) {
        var nameError = document.getElementById("name-error");
        if (value.includes(" ")) {
            nameError.textContent = "Spaces are not allowed in the name.";
            nameError.style.display = "block";
        } else {
            nameError.textContent = "";
            nameError.style.display = "none";
        }
    }
</script>

											
										
										
											<div class="col-12">
												<div class="form-group mb-3">
													<label class="label" for="name">Father Name</label>
													<input type="text" name="father_name" class="form-control" placeholder="Father  Name" />
												</div>
											</div>
											<!-- <div class="col-12">
												<div class="form-group mb-3">
													<label class="label" for="name">CNIC No</label>
													<input type="text" name="cnic" class="form-control" placeholder="CNIC NO"  />
												</div>
											</div> -->
											<div class="col-12">
												<div class="form-group mb-3">
													<label class="label" for="active_phone">Active Phone Number</label>
													<input type="text" name="active_phone" class="form-control" placeholder="ctive Phone Number"  />
												</div>
											</div>
								
											
																							
											
											<div class="col-12">
                                                <div class="form-group mb-3">
                                                    <label class="label" for="password">Password</label>
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" minlength="4" required>
                                                    <div id="password-strength-meter"></div>
                                                    <div id="password-strength-text"></div>
                                                </div>
                                            </div>

										<div class="col-12">
									         <div class="form-group mb-3">
										       <label class="label" for="password">Confirm Password</label>
									            <input type="password" name="password_confirmation" class="form-control" placeholder="Password" required>
									        </div>

										</div>
										<input type="hidden" name="refral_id" value="" id="refral_id">
									<div class="col-12">
									     <div class="form-group">
										   <button type="submit" class="form-control btn btn-primary submit px-3">Create Account</button>
									    </div>
									</div>
											
												
										  </div>
										  </div>
									    </div>
                                        
									<div class="form-group d-md-flex">
										<div class="w-50 text-left"></div>
										
									</div>
								</form>

								<div class="row">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		

 
  
   <script>
	   
															
   
	   function checkRef(name){
		$("#refral_id").val(null);
		$("#refral_name").val(null);
		$.ajax({
		url: "/checkRefral",
		type: "POST",
		headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		data:{
			name:name,
		},
		cache: false,
		success: function(dataResult){
			if(dataResult.data==null){
				// swal("Oops!", "User Not Found!", "error")
				Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Spnser Not Found!',
                footer: '<a href>A working refral link is required from sponser!</a>'
               })
			}else{
			
				if(dataResult.s4>0){
					$("#refral_id").val(dataResult.data.id);
                    $("#refral_name").val(dataResult.data.name);
				}else{
					Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Spnser of this Sponser is Unpaid!',
                    footer: '<a href>A working refral link is required from sponser!</a>'
                  })
				}
				
			}
           
			
		}
	    });
	   }
   </script>
   <script>
    // Function to update the password strength meter and text
    function updatePasswordStrength() {
        var password = document.getElementById("password").value;
        var strengthMeter = document.getElementById("password-strength-meter");
        var strengthText = document.getElementById("password-strength-text");
        
        // Use zxcvbn to calculate the password strength score
        var result = zxcvbn(password);
        var score = result.score; // Password strength score from 0 to 4
        
        // Update the strength meter's class based on the score
        var strengthMeterClass;
        switch (score) {
            case 0:
                strengthMeterClass = "progress-bar-danger";
                break;
            case 1:
                strengthMeterClass = "progress-bar-danger";
                break;
            case 2:
                strengthMeterClass = "progress-bar-warning";
                break;
            case 3:
                strengthMeterClass = "progress-bar-info";
                break;
            case 4:
                strengthMeterClass = "progress-bar-success";
                break;
            default:
                strengthMeterClass = "";
        }
        
        // Update the strength meter's width and class
        strengthMeter.style.width = (score * 25) + "%";
        strengthMeter.className = "progress-bar " + strengthMeterClass;
        
        // Update the strength text based on the score
        var strengthTextContent;
        switch (score) {
            case 0:
                strengthTextContent = "Very Weak";
                break;
            case 1:
                strengthTextContent = "Weak";
                break;
            case 2:
                strengthTextContent = "Fair";
                break;
            case 3:
                strengthTextContent = "Good";
                break;
            case 4:
                strengthTextContent = "Strong";
                break;
            default:
                strengthTextContent = "";
        }
        strengthText.textContent = strengthTextContent;
    }
    
    // Add an event listener to the password input field
    document.getElementById("password").addEventListener("input", updatePasswordStrength);
</script>

	
</body>
</html>


 

