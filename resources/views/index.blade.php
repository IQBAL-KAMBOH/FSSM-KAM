<style>
.kg1 {
    background-image: linear-gradient(to bottom right, #FF61D2, #FE9090);
    color: white !important;
}

.kg2 {
    background-image: linear-gradient(to bottom right, #72FFB6, #10D164);
}

.kg3 {
    background-image: linear-gradient(to bottom right, #FD8451, #FFBD6F);
}

.kg4 {
    background-image: linear-gradient(to bottom right, #305170, #6DFC6B);
}

.kg5 {
    background-image: linear-gradient(to bottom right, #00C0FF, #4218B8);
}

.kg6 {
    background-image: linear-gradient(to bottom right, #009245, #FCEE21);
}

.kg7 {
    background-image: linear-gradient(to bottom right, #FDFCFB, #E2D1C3);
}

.kg8 {
    background-image: linear-gradient(to bottom right, #0100EC, #FB36F4);
}

.kg9 {
    background-image: linear-gradient(to bottom right, #FDABDD, #374A5A);
}

.kg10 {
    background-image: linear-gradient(to bottom right, #38A2D7, #561139);
}

.kg11 {
    background-image: linear-gradient(to bottom right, #121C84, #8278DA);
}

.kg12 {
    background-image: linear-gradient(to bottom right, #5761B2, #1FC5A8);
}

.kg13 {
    background-image: linear-gradient(to bottom right, #FFDB01, #0E197D);
}

.kg14 {
    background-image: linear-gradient(to bottom right, #FF3E9D, #0E1F40);
}

.kg15 {
    background-image: linear-gradient(to right, #8360c3, #2ebf91);
}

.kg16 {
    background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
}

.kg17 {
    background-image: linear-gradient(to right, #870000, #190a05);
}

.kg18 {
    background-image: linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));
}

.kg19 {
    background-image: linear-gradient(to right, #FF61D2, #FE9090);
}

.kg20 {
    background-image: linear-gradient(to right, #0099f7, #f11712);
}

.kg21 {
    background-image: linear-gradient(to right, #0d0530, #00122d, #00151f, #001410, #09110a);
}

.kg22 {
    background-image: linear-gradient(to right, #7f0601, #743300, #614d00, #476000, #216f28);
}

.kg23 {
    background-image: linear-gradient(to right, #7f0601, #743300, #614d00, #476000, #216f28);
}
</style>
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

#second_card {
    background: linear-gradient(to bottom, #a10051, #cc0066, #cc0077);
}

#third_Card {
    background: linear-gradient(to bottom, #ffffcc, #ffff99, #ffcc66);
}
</style>
<style>
#myInput {
    background-image: url('/css/searchicon.png');
    /* Add a search icon to input */
    background-position: 10px 12px;
    /* Position the search icon */
    background-repeat: no-repeat;
    /* Do not repeat the icon image */
    width: 100%;
    /* Full-width */
    font-size: 16px;
    /* Increase font-size */
    padding: 12px 20px 12px 40px;
    /* Add some padding */
    border: 1px solid #ddd;
    /* Add a grey border */
    margin-bottom: 12px;
    /* Add some space below the input */
}


.card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
}

.l-bg-cherry {
    background: linear-gradient(to right, #493240, #f09) !important;
    color: #fff;
}

.l-bg-blue-dark {
    background: linear-gradient(to right, #373b44, #4286f4) !important;
    color: #fff;
}

.l-bg-green-dark {
    background: linear-gradient(to right, #0a504a, #38ef7d) !important;
    color: #fff;
}

.l-bg-orange-dark {
    background: linear-gradient(to right, #a86008, #ffba56) !important;
    color: #fff;
}

.card .card-statistic-3 .card-icon-large .fas,
.card .card-statistic-3 .card-icon-large .far,
.card .card-statistic-3 .card-icon-large .fab,
.card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
}

.card .card-statistic-3 .card-icon {
    text-align: center;
    line-height: 50px;
    margin-left: 15px;
    color: #000;
    position: absolute;
    right: -5px;
    top: 20px;
    opacity: 0.1;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.l-bg-green {
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
    color: #fff;
}

.l-bg-orange {
    background: linear-gradient(to right, #f9900e, #ffba56) !important;
    color: #fff;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
    integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
@extends('layout.layout')
@section('content')

<?php
$dashboard=App\Http\Controllers\Admin\DashboardController::dashboard();
$b2bdashboard=App\Http\Controllers\Admin\DashboardController::b2bdashboard();
$b2cdashboard=App\Http\Controllers\Admin\DashboardController::b2cdashboard();
$copyPerm=App\Http\Controllers\Admin\DashboardController::checkRefralPermission(auth()->user()->name);
?>

@hasanyrole('User|Admin')

<!-- admin dashboard -->
@hasrole('Admin')
@if(session()->has('success'))
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
            <div class="col-12">
                @include('timer.index')
            </div>
            <!-- User Permissions  -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg17">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/users.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">User Permissions</h6>
                                    <p class="text-light">Search</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <form action="/search-permission" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--All User sEARCH  -->
            @if(auth()->user()->hasrole('Admin'))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg13">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/users.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">All Users</h6>
                                    <p class="text-light">Search</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <form action="/search-all-users" method="GET">

                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!--PAID User sEARCH  -->
            @if(auth()->user()->hasrole('Admin'))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg14">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/users.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Paid Users</h6>
                                    <p class="text-light">Search</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <form action="/search-paid-users" method="GET">

                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(auth()->user()->hasrole('Admin'))
            <!--uNPAID User  SEARCH-->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg16">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/users.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Unpaid Users</h6>
                                    <p class="text-light">Search</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <form action="/search-unpaid-users" method="GET">

                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- Total BV  -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg1">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/bv.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Total BV</h6>
                                    <p class="text-light">{{$dashboard['left_bv']+$dashboard['right_bv']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <button class="btn btn-secondary">View All</button>
                                <a href="convert-bv" class="btn btn-secondary">Convert Bv</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //////////////////////  BV LEFT  -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg2">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/bv.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">BV Left</h6>
                                    <p class="text-light">{{$dashboard['left_bv']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /////////////////////   BV Right  -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg3">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/bv.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">BV Right</h6>
                                    <p class="text-light">{{$dashboard['right_bv']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /////////////////////// Total Users  -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg4">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/users.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Total Users</h6>
                                    <p class="text-light">{{ $dashboard['totalMembers'] }}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ///////////  active Users  -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg5">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/auser.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light"> Active Users</h6>
                                    <p class="text-light">{{ $dashboard['activeMembers'] }}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- //////////////   Inactive Users  -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg6">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/iusers.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light"> InActive Users</h6>
                                    <p class="text-light">{{ $dashboard['inactiveMembers'] }}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">

                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <!-- ////////////////////////   Paid USers  -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg16">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/paid.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light"> Paid Users</h6>
                                    <p class="text-light">{{$dashboard['paid']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/paid-users" class="btn btn-secondary">Show All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ///////////////////  Unpaid Users  -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg8">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/upaid.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light"> UnPaid Users</h6>
                                    <p class="text-light">{{$dashboard['unpaid']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/unpaid-users" class="btn btn-secondary">Show All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- //////////////////////  C-Wallet  -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg9">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/wallet.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">C-Wallet</h6>
                                    <p class="text-light">{{number_format($dashboard['c_wallet'],2)}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users-cwallet" class="btn btn-secondary">Show All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /////////////// RP -->

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg10">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/points.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">RP Conversion</h6>
                                    <p class="text-light">{{number_format($dashboard['rp_conversion'],2)}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users-rp" class="btn btn-secondary">Show All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /////////////////// Total Rank Achievers  -->

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg11">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/wallet3.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Rank Achievers</h6>
                                    <p class="text-light">{{number_format($dashboard['rank_ac'],2)}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users-rank-achievers" class="btn btn-secondary">Show All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ////////////////////  Total CBV   -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg12">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/wallet2.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Total CBV</h6>
                                    <p class="text-light">{{number_format($dashboard['cbv'],2)}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users-cbv" class="btn btn-secondary">Show All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg13">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/referal.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Right Refrral Side</h6>
                                    <p class="text-light">{{$dashboard['rightRefralSide']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users" class=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg3">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/ewallet.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <p class="text-light" style="font-size:15px;">Total Unilevel PV</p>
                                    <p class="text-light">{{number_format($dashboard['onlineStoreWallet'],2)}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users-pv" class="btn btn-secondary">Show All</a>
                                <a href="convert-pv" class="btn btn-secondary">Convert Pv</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Unilevel Qualified -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg23">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/ewallet.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <p class="text-light" style="font-size:15px;">Unilevel Qualified</p>
                                    <p class="text-light">{{$dashboard['unilevel_qualified']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users-uni-q" class="btn btn-secondary">Show All</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Unilevel Qualified -->
            <!-- Auto Net Qualified -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg21">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/ewallet.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <p class="text-light" style="font-size:15px;">Auto Net Qualified</p>
                                    <p class="text-light">{{$dashboard['auto_net_qualified']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users-auto-q" class="btn btn-secondary">Show All</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Auto Net Qualified -->
            <!-- Pv Store -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg17">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/ewallet.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <p class="text-light" style="font-size:15px;">Pv Store</p>
                                    <p class="text-light">{{$dashboard['pv_store']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/pv-store-transfer" class="btn btn-secondary">Transfer History</a>
                                <a href="/users-pv-store" class="btn btn-secondary">Pv History</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pv Store -->
            <!-- cPv Store -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg17">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/ewallet.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <p class="text-light" style="font-size:15px;">Cpv</p>
                                    <p class="text-light">{{$dashboard['cpv']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users-cpv" class="btn btn-secondary">Show All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CPv Store -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg15">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/points2.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Direct Points</h6>
                                    <p class="text-light">{{$dashboard['ecoPoints']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users-dp" class="btn btn-primary">Show All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg11">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/points2.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Affiliate Wallet</h6>
                                    <p class="text-light">{{$dashboard['affiliate_wallet']}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/users-affiliate" class="btn btn-primary">Show All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg14">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/ewallet.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <p class="text-light" style="font-size:12px;">All Users Pairs</p>
                                    <p class="text-light">{{number_format($dashboard['all_users_pairs'],2)}}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <a href="/all-users-pairs" class="btn btn-secondary">Show All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- b2b pool  -->
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <?php
                            $percent=$b2bdashboard['b2b_price'];
                            $pkr=$percent/25;
                            $bv=$b2bdashboard['b2b_bv_wallet'];
                            $commission=$bv*$pkr;
                            $users=$b2bdashboard['b2b_users'];
                            $allusersb=$b2bdashboard['b2b_user_names'];
                            if($users>0){
                                $self=$commission/$users;
                            }else{
                                $self=0;
                            }
                            
         
        
        
                             ?>
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>


                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-12 text-left">
                                <h4 class=" text-light">B2B Pool Income</h4>
                            </div>

                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6 text-left">
                                <h6 class=" text-light">25 Bv</h6>
                            </div>
                            <div class="col-6 text-end text-light">
                                <h4 class="text-light">{{$percent}} PKR</h4>
                            </div>
                        </div>

                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6 text-left">
                                <h6 class=" text-light">Total BV:</h6>
                            </div>
                            <div class="col-6 text-end text-light">

                                <h4 class="text-light">{{number_format($bv,2)}} </h4>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6 text-left">
                                <h6 class=" text-light">Total Users:</h6>
                            </div>
                            <div class="col-6 text-end text-light">

                                <h4 class="text-light">{{$users}} </h4>

                            </div>
                        </div>
                        <div class="row">
                            <table class="table bg-light rounded table-hovered">
                                <tr>
                                    <th>User Name</th>
                                </tr>
                                @foreach($allusersb as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{number_format($self,2)}}</td>
                                </tr>

                                @endforeach
                            </table>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6 text-left">
                                <h6 class=" text-light">Total Commission:</h6>
                            </div>
                            <div class="col-6 text-end text-light">

                                <h4 class="text-light">{{number_format($commission,2)}} </h4>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6 text-left">
                                <h6 class=" text-light">Self Commission:</h6>
                            </div>
                            <div class="col-6 text-end text-light">

                                <h4 class="text-light">{{number_format($self,2)}} </h4>
                            </div>
                        </div>
                        <div class="row">
                            <a href="b2b-pool-reset/{{$self}}" class="btn btn-warning col-4">Reset Pool</a>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-cyan" role="progressbar" data-width="{{$percent}}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}%;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- b2b pool  -->
            <!-- b2c pool  -->
            <div class="col-xl-6 col-lg-6">
                <?php
                            $percentc=$b2cdashboard['b2c_price'];
                            $percentage=$b2cdashboard['b2c_percentage'];
                            
                            $pkrc=$percentc;
                            $pv=$b2cdashboard['b2c_pv_wallet'] ?? 0;
                            $commissionc=(10/100*$pv)*$pkrc;
                            $usersc=$b2cdashboard['b2c_users'];
                            $allusersc=$b2cdashboard['b2c_user_names'];
                            if($usersc>0){
                                $selfc=$commissionc/$usersc;
                            }else{
                                $selfc=0;
                            }
                            
         
        
        
                             ?>
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>


                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-12 text-left">
                                <h4 class=" text-light">B2C Pool Income</h4>
                            </div>

                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6 text-left">
                                <h6 class=" text-light">1Pv</h6>
                            </div>
                            <div class="col-6 text-end text-light">
                                <h4 class="text-light">{{$percentc}} PKR</h4>
                            </div>
                        </div>

                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6 text-left">
                                <h6 class=" text-light">Total PV:</h6>
                            </div>
                            <div class="col-6 text-end text-light">

                                <h4 class="text-light">{{$pv}} </h4>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6 text-left">
                                <h6 class=" text-light">Percentage:</h6>
                            </div>
                            <div class="col-6 text-end text-light">

                                <h4 class="text-light">{{$percentage}}%</h4>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6 text-left">
                                <h6 class=" text-light">Total Users:</h6>
                            </div>
                            <div class="col-6 text-end text-light">

                                <h4 class="text-light">{{$usersc}} </h4>

                            </div>
                        </div>
                        <!-- <div class="row">
                        <table class="table bg-light rounded table-hovered">
                            <tr><th>User Name</th></tr>
                            @foreach($allusersc as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{number_format($selfc,2)}}</td>
                            </tr>

                            @endforeach
                        </table>
                    </div> -->
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6 text-left">
                                <h6 class=" text-light">Total Commission:</h6>
                            </div>
                            <div class="col-6 text-end text-light">

                                <h4 class="text-light">{{number_format($commissionc,2)}} </h4>
                            </div>
                        </div>
                        <!-- <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Self Commission:</h6>
                        </div>
                        <div class="col-6 text-end text-light">
                        
                            <h4 class="text-light">{{number_format($selfc,2)}}  </h4>
                        </div>
                    </div> -->
                        <div class="row">
                            <a href="b2c-pool-reset/{{$selfc}}" class="btn btn-warning col-4">Reset Pool</a>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-cyan" role="progressbar" data-width="{{$percentc}}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentc}}%;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- b2c pool  -->



        </div>
    </div>
</div>

@endhasrole
@hasrole('User')


<div class="layout-px-spacing">
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            @if(session()->has('success'))
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
            <?php
          $package=App\Http\Controllers\User\UserController::checkUserPackage(auth()->user()->id);
         echo $package;
          $globalSettings=App\Http\Controllers\Admin\AdminAccountDetailsController::globalSettings();
          $mysponser=App\Http\Controllers\User\UserController::mySponser(auth()->user()->refral_id);
          $refral_paid=$mysponser->plan_id ?? 0;
         ?>
            @if(!$package)

            <div class="row m-1">

                <div class="alert alert-danger">
                    You don't have any Paid Marketer Bundle
                </div>


            </div>

            @if($refral_paid>0)
            <!-- //////////////////////   New User Welcome -->
            <div class="col-12 layout-spacing">

                <div class="widget card" id="">
                    <div class="widget-content p-3">
                        <p>
                        <h1>Wellcome!</h1> to FSSM for financial stability "Start Work From Now"</p>
                        <a href="/packages" class="btn btn-success">Buy Package</a>


                    </div>
                </div>
            </div>

            <!-- //////////////////////   New User Welcome End -->
            @endif
            @endif
            <?php 
                  
                  $posters=App\Http\Controllers\PosterController::getPosters('Pannel');
                 
        ?>
            @if($globalSettings->pannel_poster_status=='Active')
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div id="carouselExampleIndicators"
                        style="max-width:<?=$globalSettings->pannel_poster_width?>px; border-radius: 15px; max-height: <?=$globalSettings->pannel_poster_height?>px; justify:center; text-align:center !important;"
                        class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">

                            <?php $count=1;?>
                            @foreach($posters as $poster)
                            <div class="carousel-item <?php if($count==1){ echo 'active';}?>">
                                <div class="row text-center">
                                    <img class="d-block w-100"
                                        style="max-width:<?=$globalSettings->pannel_poster_width?>px; border-radius: 15px; max-height: <?=$globalSettings->pannel_poster_height?>px; justify:center; "
                                        src="  {{$poster->image}}" alt="First slide">

                                </div>
                            </div>
                            <?php $count++;?>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @if($globalSettings->poster_status=='Active')
            <!-- //////////////////////   New User Welcome -->
            <div class="col-12 layout-spacing ">
                <div class="widget card " id="">
                    <div class="widget-content kg16 p-3">

                        <h1 class="text-light">
                            @if($globalSettings->poster_title!='')
                            {{$globalSettings->poster_title}}
                            @endif
                        </h1>
                        <p class="text-light">
                            @if($globalSettings->poster_message!='')
                            {{$globalSettings->poster_message}}
                            @endif
                        </p>



                    </div>
                </div>
            </div>

            <!-- //////////////////////   New User Welcome End -->
            @endif
            <div class="col-12">
                @include('timer.index')
            </div>
            <!--All User sEARCH  -->
            @if(auth()->user()->hasAnyPermission(['search-all-users']))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg13">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/users.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">All Users</h6>
                                    <p class="text-light">Search</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <form action="/search-all-users" method="GET">

                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!--PAID User sEARCH  -->
            @if(auth()->user()->hasAnyPermission(['search-paid-users']))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg14">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/users.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Paid Users</h6>
                                    <p class="text-light">Search</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <form action="/search-paid-users" method="GET">

                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(auth()->user()->hasAnyPermission(['search-unpaid-users']))
            <!--uNPAID User  SEARCH-->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg16">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/users.png" alt="money-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6 class="text-light">Unpaid Users</h6>
                                    <p class="text-light">Search</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <form action="/search-unpaid-users" method="GET">

                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- //////////////////////  C-Wallet  -->
            @if(auth()->user()->hasAnyPermission(['convert_bv']))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg17">
                    <div class="widget-content">
                        <div class="account-box">
                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/bv.png" alt="money-bag">
                                    </span>
                                </div>
                                <div class="balance-info">
                                    <h6 class="text-light">All User</h6>
                                    <p class="text-light">CBV</p>
                                </div>
                            </div>
                            <div class="card-bottom-section">

                                <a href="convert-bv" class="btn btn-secondary">Convert Bv</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(auth()->user()->plan_id==NULL || auth()->user()->plan_id<1) <div
                class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five kg23">
                    <div class="widget-content">
                        <div class="account-box">
                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="/icons/wallet.png" alt="money-bag">
                                    </span>
                                </div>
                                <div class="balance-info">
                                    <h6 class="text-light">Affiliate Pv</h6>
                                    <p class="text-light"><?=number_format($dashboard->affiliate_wallet,2)?> </p>
                                </div>
                            </div>
                            <div class="card-bottom-section">
                                <div class="col-6 text-left">
                                    <form action="/affiliate-transfer" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{auth()->user()->id}}" id="">
                                        <input type="hidden" name="points"
                                            value="<?=number_format($dashboard->affiliate_wallet,2)?>" id="">
                                        <input type="hidden" name="to" value="C-Wallet" id="">
                                        <button type="submit" class="btn btn-secondary">To C Wallet</button>
                                    </form>

                                </div>
                                <div class="col-6 text-end text-light">

                                    <form action="/affiliate-transfer" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{auth()->user()->id}}" id="">
                                        <input type="hidden" name="points"
                                            value="<?=number_format($dashboard->affiliate_wallet,2)?>" id="">
                                        <input type="hidden" name="to" value="DP" id="">
                                        <button type="submit" class="btn btn-secondary">To DP</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </div>

        @endif
        <!-- Affiliate -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg9">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/wallet.png" alt="money-bag">
                                </span>
                            </div>
                            <div class="balance-info">
                                <h6 class="text-light">C-Wallet</h6>
                                <p class="text-light"><?=number_format($dashboard->c_wallet,2)?> FSD</p>
                            </div>
                        </div>
                        <div class="card-bottom-section">
                            <div class="col-6"><a class="btn btn-light" style="font-size:12px;" data-bs-toggle="modal"
                                    data-bs-target="#modal_rp">Convert to RP</a></div>
                            <div class="col-6"><a class="btn btn-light" style="font-size:12px;" href="withdraw">Withdraw
                                    Now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg1">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/points2.png" alt="money-bag">
                                </span>
                            </div>
                            <div class="balance-info">
                                <h6 class="text-light">Direct Points</h6>
                                <p class="text-light">{{$dashboard->direct_points}}</p>
                            </div>
                        </div>
                        <div class="card-bottom-section">
                            <button class="btn btn-light">View All</button>
                            @if(auth()->user()->hasPermissionTo('direct_points'))
                            <a class="btn btn-light" style="font-size:12px;" href="transfer">Transfer</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg2">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/points.png" alt="money-bag">
                                </span>
                            </div>
                            <div class="balance-info">
                                <h6 class="text-light">Register Points</h6>
                                <p class="text-light">{{$dashboard->register_points}}</p>
                            </div>
                        </div>
                        <div class="card-bottom-section">
                            <button class="btn btn-light">View All</button>
                            <a class="btn btn-light" style="font-size:12px;" href="transfer">Transfer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg3">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/wallet3.png" alt="money-bag">
                                </span>
                            </div>
                            <div class="balance-info">
                                <h6 class="text-light">Rank</h6>
                                <p class="text-light">{{$dashboard->rank}}</p>
                            </div>
                        </div>
                        <div class="card-bottom-section">
                            <button class="btn btn-light">View All</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!-- ////////////////////////////////////////  Total earning -->

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg11">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/wallet2.png" alt="money-bag">
                                </span>
                            </div>
                            <div class="balance-info">
                                <h6 class="text-light">Total Earning</h6>
                                <p class="text-light">{{$dashboard->total_earning}}</p>
                            </div>
                        </div>
                        <div class="card-bottom-section">
                            <!-- <button class="btn btn-light">View All</button> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //////////////////////////////////////////   Total earning nd  -->

        <!-- ////////////////////////// Refral Link-->

        @if($package>0)
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg6">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/referal.png" alt="money-bag">
                                </span>
                            </div>
                            <div class="balance-info">

                                <button value="copy" id="copy_button" class="btn btn-success"
                                    onclick="copyToClipboard('inv_url')">Copy Affiliate marketing Link</button>

                            </div>
                        </div>
                        <div class="card-bottom-section">
                            <?php $inv_url='/register?refral_name='.auth()->user()->name;?>
                            <input type="text" class="form-control" value="<?php echo url('/').$inv_url; ?>" name=""
                                id="inv_url">

                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endif


        <!-- ////////////////////////// Refral LinkEND -->



        <!-- ////////////////////////// Admin WhatsApp -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg8">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/auser.png" alt="money-bag">
                                </span>
                            </div>
                            <div class="balance-info">
                                <h6 class="value text-light">Admin WhatsApp</h6>
                            </div>
                        </div>
                        <div class="card-bottom-section">
                            <a aria-label="Chat on WhatsApp" href="https://wa.me/{{$globalSettings->whats_app}}"><img
                                    src="images/WhatsAppButtonGreenSmall.png" width="200px;" alt=""></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- ////////////////////////// Admin WhatsApp END -->
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg21">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/wallet.png" alt="money-bag">
                                </span>
                            </div>

                            <div class="balance-info">
                                <a href="/unilevel-income" class="btn btn-light">Income</a>
                                <h6 class="text-light mt-2">Earned PV</h6>
                                <p class="text-light"><?=$mypv=number_format($dashboard->store_bv,2)?> </p>
                            </div>
                        </div>
                        <div class="card-bottom-section">
                            <div class="col-6 text-light">
                                <h6 class="text-light">Unilevel
                                    @if($mypv>=$globalSettings->pv_limit)
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                        viewBox="0 0 30 30" style="fill:#40C057;">
                                        <path
                                            d="M14.147,19.267c-0.188,0.188-0.442,0.293-0.707,0.293s-0.52-0.105-0.707-0.293L9.28,15.814 c-0.391-0.391-0.391-1.023,0-1.414c0.391-0.391,1.023-0.391,1.414,0l2.746,2.746L25.674,4.911C25.318,4.364,24.702,4,24,4H6 C4.895,4,4,4.895,4,6v18c0,1.105,0.895,2,2,2h18c1.105,0,2-0.895,2-2V7.414L14.147,19.267z">
                                        </path>
                                    </svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                        viewBox="0 0 24 24" style="fill:#FA5252;">
                                        <path
                                            d="M12,2C6.47,2,2,6.47,2,12c0,5.53,4.47,10,10,10s10-4.47,10-10C22,6.47,17.53,2,12,2z M16.707,15.293 c0.391,0.391,0.391,1.023,0,1.414C16.512,16.902,16.256,17,16,17s-0.512-0.098-0.707-0.293L12,13.414l-3.293,3.293 C8.512,16.902,8.256,17,8,17s-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414L10.586,12L7.293,8.707 c-0.391-0.391-0.391-1.023,0-1.414s1.023-0.391,1.414,0L12,10.586l3.293-3.293c0.391-0.391,1.023-0.391,1.414,0 s0.391,1.023,0,1.414L13.414,12L16.707,15.293z">
                                        </path>
                                    </svg>
                                    @endif
                                </h6>
                            </div>
                           {{-- <div class="col-6 text-light">
                                <h6 class="text-light">Auto Net
                                    @if($dashboard->cpv>=$globalSettings->auto_net_limit)
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                        viewBox="0 0 30 30" style="fill:#40C057;">
                                        <path
                                            d="M14.147,19.267c-0.188,0.188-0.442,0.293-0.707,0.293s-0.52-0.105-0.707-0.293L9.28,15.814 c-0.391-0.391-0.391-1.023,0-1.414c0.391-0.391,1.023-0.391,1.414,0l2.746,2.746L25.674,4.911C25.318,4.364,24.702,4,24,4H6 C4.895,4,4,4.895,4,6v18c0,1.105,0.895,2,2,2h18c1.105,0,2-0.895,2-2V7.414L14.147,19.267z">
                                        </path>
                                    </svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                        viewBox="0 0 24 24" style="fill:#FA5252;">
                                        <path
                                            d="M12,2C6.47,2,2,6.47,2,12c0,5.53,4.47,10,10,10s10-4.47,10-10C22,6.47,17.53,2,12,2z M16.707,15.293 c0.391,0.391,0.391,1.023,0,1.414C16.512,16.902,16.256,17,16,17s-0.512-0.098-0.707-0.293L12,13.414l-3.293,3.293 C8.512,16.902,8.256,17,8,17s-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414L10.586,12L7.293,8.707 c-0.391-0.391-0.391-1.023,0-1.414s1.023-0.391,1.414,0L12,10.586l3.293-3.293c0.391-0.391,1.023-0.391,1.414,0 s0.391,1.023,0,1.414L13.414,12L16.707,15.293z">
                                        </path>
                                    </svg>
                                    @endif

                                </h6>
                            </div>
                            --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg21">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/wallet.png" alt="money-bag">
                                </span>
                            </div>
                            <div class="balance-info">
                                <h6 class="text-light">Remaining</h6>
                                <p class="text-light">
                                    <?php if($dashboard->store_bv<$globalSettings->pv_limit){ echo $globalSettings->pv_limit-$dashboard->store_bv;}else{ echo 0;}?>
                                </p>
                            </div>
                        </div>
                        <div class="card-bottom-section">
                            <!-- <div class="col-6"><a class="btn btn-light" style="font-size:12px;"  data-bs-toggle="modal" data-bs-target="#modal_store_bv" >Transfer</a></div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg21">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/wallet.png" alt="money-bag">
                                </span>
                            </div>
                            <div class="balance-info">
                                <h6 class="text-light">Converted PV</h6>
                                <p class="text-light"><?=number_format($dashboard->cpv,2)?> </p>
                            </div>
                        </div>
                        <div class="card-bottom-section">
                            <!-- <div class="col-6"><a class="btn btn-light" style="font-size:12px;"  data-bs-toggle="modal" data-bs-target="#modal_store_bv" >Transfer</a></div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pv Store -->
        @if(auth()->user()->hasDirectPermission('products') || auth()->user()->hasDirectPermission('courses') ||
        auth()->user()->hasDirectPermission('library'))
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five kg17">
                <div class="widget-content">
                    <div class="account-box">

                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="/icons/ewallet.png" alt="money-bag">
                                </span>
                            </div>

                            <div class="balance-info">
                                <p class="text-light" style="font-size:15px;">Pv Store</p>
                                <p class="text-light"><?=number_format($dashboard->store_pv_wallet,2)?></p>
                            </div>
                        </div>

                        <div class="card-bottom-section">
                            <!-- <a href="/unilevel-settings" class="btn btn-secondary">Update</a> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Pv Store -->


        <!-- ///////////////////   B2B Pool Income -->
        @if(auth()->user()->hasDirectPermission('b2b_permission'))
        <div class="col-xl-6 col-lg-6">
            <?php
                            $percent=$b2bdashboard['b2b_price'];
                            $pkr=$percent/25;
                            $bv=$b2bdashboard['b2b_bv_wallet'] ?? 0;
                            $commission=$bv*$pkr;
                            $users=$b2bdashboard['b2b_users'];
                            if($users>0){
                                $self=$commission/$users;
                            }else{
                                $self=0;
                            }
         
        
        
                             ?>
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>


                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-12 text-left">
                            <h4 class=" text-light">B2B Pool Income</h4>
                        </div>

                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">25 Bv</h6>
                        </div>
                        <div class="col-6 text-end text-light">
                            <h4 class="text-light">{{$percent}} PKR</h4>
                        </div>
                    </div>

                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Total BV:</h6>
                        </div>
                        <div class="col-6 text-end text-light">

                            <h4 class="text-light">{{number_format($bv,2)}} </h4>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Total Users:</h6>
                        </div>
                        <div class="col-6 text-end text-light">

                            <h4 class="text-light">{{$users}} </h4>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Total Commission:</h6>
                        </div>
                        <div class="col-6 text-end text-light">

                            <h4 class="text-light">{{number_format($commission,2)}} </h4>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Self Commission:</h6>
                        </div>
                        <div class="col-6 text-end text-light">

                            <h4 class="text-light">{{number_format($self,2)}} </h4>
                        </div>
                    </div>

                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="{{$percent}}%"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}%;">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif
        <!-- ////////////////////////   B2b pool income  end -->
        <!-- ///////////////////   B2B Pool Income -->
        @if(auth()->user()->hasDirectPermission('b2c_permission'))

        <div class="col-xl-6 col-lg-6">
            <?php
                            $percent=$b2cdashboard['b2c_price'];
                            $percentage=$b2cdashboard['b2c_percentage'];
                            $pkr=$percent;
                            $pv=$b2cdashboard['b2c_pv_wallet'] ?? 0;
                            $commission=(10/100*$pv)*$pkr;
                            $users=$b2cdashboard['b2c_users'];
                            $allusers=$b2cdashboard['b2c_user_names'];
                            if($users>0){
                                $self=$commission/$users;
                            }else{
                                $self=0;
                            }
                            
         
        
        
                             ?>
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>


                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-12 text-left">
                            <h4 class=" text-light">B2C Pool Income</h4>
                        </div>

                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">1Pv</h6>
                        </div>
                        <div class="col-6 text-end text-light">
                            <h4 class="text-light">{{$percent}} PKR</h4>
                        </div>
                    </div>

                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Total PV:</h6>
                        </div>
                        <div class="col-6 text-end text-light">

                            <h4 class="text-light">{{number_format($pv,2)}} </h4>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Percentage:</h6>
                        </div>
                        <div class="col-6 text-end text-light">

                            <h4 class="text-light">{{$percentage}}%</h4>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Total Users:</h6>
                        </div>
                        <div class="col-6 text-end text-light">

                            <h4 class="text-light">{{$users}} </h4>

                        </div>
                    </div>

                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Total Commission:</h6>
                        </div>
                        <div class="col-6 text-end text-light">

                            <h4 class="text-light">{{number_format($commission,2)}} </h4>
                        </div>
                    </div>
                    <!-- <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Self Commission:</h6>
                        </div>
                        <div class="col-6 text-end text-light">
                        
                            <h4 class="text-light">{{number_format($self,2)}}  </h4>
                        </div>
                    </div> -->

                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="{{$percent}}%"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}%;">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @endif
        <!-- ///////// B2C pool income end ///// -->

    </div>
</div>
</div>

<script>
function copyToClipboard(id) {
    document.getElementById(id).select();
    document.execCommand('copy');
    $("#copy_button").html('Copied Successfully!');
    setInterval(function() {
        $("#copy_button").html('Copy Refrral Link');
    }, 2000);
}
</script>
<!-- ///////////////////////     Modal -->

<div class="modal fade" id="modal_rp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Convert To RP</h1>


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('Convert-to-rp.store')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Enter Points</label>
                        <input type="number" name="points" required class="form-control" id="recipient-name">
                    </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                    <input type="hidden" value="Pending" name="status">
                    <input type="submit" name="" id="" class="form-control btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_store_bv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Store Bv to BV Left/Right</h1>


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/store-to-bv" method="POST">
                @csrf
                <div class="modal-body">
                    <?php
      $limit=25;
      $store_bv_ps=number_format($dashboard->store_bv,2);
      ?>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Enter Points</label>
                        <!-- <input type="number" name="points" required class="form-control" id="recipient-name"> -->
                        <select name="points" id="" required class="form-control">

                            <option value="">Select Points</option>
                            <?php for($i=25;$i<=$store_bv_ps;$i+=25){ 
                ?>

                            <option value="<?=$i?>"><?=$i?></option>


                            <?php 
            }
            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Side</label>
                        <select name="side" id="" required class="form-control">

                            <option value="">Select Side</option>
                            <option>Left</option>
                            <option>Right</option>

                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

                    <input type="submit" name="" id="" class="form-control btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_affiliate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Affilate Pv Transfer</h1>


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Enter Points</label>
                        <input type="number" name="points" required class="form-control" id="recipient-name">
                    </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                    <input type="hidden" value="Pending" name="status">
                    <input type="submit" name="" id="" class="form-control btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
@endhasrole
@endhasanyrole
@endsection
<script>
$('.carousel').carousel();
</script>