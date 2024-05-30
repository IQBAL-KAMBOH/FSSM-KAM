

<!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

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
<section class="ftco-section justify-content-center">
		<div class="container justify-content-center">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
			
			<div class="row justify-content-center">
				<div class="col-md-12 col-sm-12 col-xm-12 col-lg-12 justify-content-center " style="margin:auto !important;">
					<div class="justify-content-center p-4 " style="min-height:600px;background-color:white !important;border-radius:20px;">
					        <div class="mygg p-4 p-lg-5 text-center  align-items-center order-md-last">
								<div class="text w-100">
									<h2 class="text-light">Welcome to Future Secure  Sales & Marketing</h2>
									<p class="text-light">Haven't login yet?Don't worry just fill all the information below and get account now</p>
									<a href="/register" class="btn btn-white btn-outline-white">Signup</a>
								</div>
							</div>
						<div class="">
						        @if ($errors->any())
                                        @foreach ($errors->all() as $error)
										<div class="alert alert-danger" role="alert">
                                            {{ $error }}
										</div>
                                        @endforeach
                                @endif
			      	<div class="d-flex p-4">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="https://www.facebook.com/profile.php?id=100092421189735&notif_id=1683526984495623&notif_t=page_user_activity&ref=notif" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="https://www.youtube.com/@FSSM786" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-youtube"></span></a>
									</p>
								</div>
			      	</div>
					<form method="POST" action="{{ route('login') }}" class="signin-form" >
                            @csrf
			      		<div class="form-group mb-3 mt-4">
			      			<label class="label" for="loginname">Email / Username</label>
			      			<input type="text" name="loginname" class="form-control" placeholder="User Name" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
					
					<br>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
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
		      </div>
				</div>
			</div>
		</div>
	</section>

    <script src="assets/layouts/Auth/js/jquery.min.js"></script>
  <script src="assets/layouts/Auth/js/popper.js"></script>
  <script src="assets/layouts/Auth/js/bootstrap.min.js"></script>
  <script src="assets/layouts/Auth/js/main.js"></script>

	
 </body>
 </html>






