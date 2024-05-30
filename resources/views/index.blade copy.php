<style>

#user_card {
    background: linear-gradient(to bottom, #0051a1, #0066CC, #0077CC);
}
#user_card .widget-content {
  position: relative;
}

/* #user_card .w-earnings {
  position: absolute;
  bottom: 100;
  right: 0;
  padding: 5px;
}

#user_card .w-earnings img {
  height: 40px;
} */

#second_card{
	background: linear-gradient(to bottom, #a10051, #cc0066, #cc0077);
}
#third_Card{
	background: linear-gradient(to bottom, #ffffcc, #ffff99, #ffcc66);
}







</style>
@extends('layout.layout')
 @section('content')

<?php
$dashboard=App\Http\Controllers\Admin\DashboardController::dashboard();
?>

@hasanyrole('User|Admin')

<!-- admin dashboard -->
@hasrole('Admin') @if(session()->has('success'))
<div class="alert alert-success">
	{{ session()->get('success') }}
</div>
<br />
@endif @if(session()->has('error'))
<div class="alert alert-danger">
	{{ session()->get('error') }}
</div>
<br />
@endif

<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		<div class="row layout-top-spacing">
			
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="user_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Total BV</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{$dashboard['left_bv']+$dashboard['right_bv']}} <span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
							<a href="convert-bv" class="btn btn-light">Convert Bv</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="third_Card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">BV Left</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{ $dashboard['left_bv'] }}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="user_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">BV Right</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{ $dashboard['right_bv'] }}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>

			
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="second_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Total Users</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{ $dashboard['totalMembers'] }}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="user_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Active users</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{ $dashboard['activeMembers']}}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="third_Card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">InActive users</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{$dashboard['inactiveMembers']}}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="user_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Total CBV</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{$dashboard['cbv']}}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="second_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Left Refral Side</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{$dashboard['leftRefralSide']}}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="third_Card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Right Refral Side</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{$dashboard['rightRefralSide']}}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="user_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">E-wallet</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{$dashboard['e_wallet']}}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="third_Card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Online Store Wallet</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{$dashboard['onlineStoreWallet']}}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="user_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Eco Points</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value">
									{{$dashboard['ecoPoints']}}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
						</div>
					</div>
				</div>
			</div>
			
			</div>
				</div>
			</div>
			
			@endhasrole @hasrole('User')

			<div class="layout-px-spacing">
			<div class="middle-content container-xxl p-0">
			<div class="row layout-top-spacing">

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="second_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Register Points</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value" style="color:blue">
									{{$dashboard->register_points}} <span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
							<!-- <button class="btn btn-light">Convert to RP</button> -->
						</div>
					</div>
				</div>
			</div>
			

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="user_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Direct Points</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value" style="color:blue">
									{{$dashboard->direct_points}}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
							<!-- <button class="btn btn-light">Convert to RP</button> -->
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="third_Card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Total Earning</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value" style="color:green">
									<?=number_format($dashboard->total_earining,2)?> FSD <span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
							<!-- <button class="btn btn-light">Convert to RP</button> -->
						</div>
					</div>
				</div>
			</div>

			
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="user_card">
					<div class="widget-content">
					

						<div class="w-header">
							<div class="w-info">
								<h6 class="value">C-Wallet</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value" style="color:white">
									<?=number_format($dashboard->c_wallet,2)?> FSD <span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
							<button class="btn btn-light">Convert to RP</button>
						</div>
					</div>
				</div>
			</div>

		
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="second_card">
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Enjoy Store Discount</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info">
								<p class="value" style="color:white" >
									{{$dashboard->enjoy_store_discount}}<span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
							<!-- <button class="btn btn-light">Convert to RP</button> -->
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
				<div class="widget widget-card-four" id="third_Card" >
					<div class="widget-content">
						<div class="w-header">
							<div class="w-info">
								<h6 class="value">Rank</h6>
							</div>
						</div>

						<div class="w-content">
							<div class="w-info" style="color:green">
								<p class="value">
									{{$dashboard->rank}} <span></span>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="currentColor"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-trending-up"
									>
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg>
								</p>
							</div>
						</div>

						<div class="w-action">
							<button class="btn btn-light">View All</button>
							<!-- <button class="btn btn-light">Convert to RP</button> -->
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endhasrole
@endhasanyrole 
 @endsection
