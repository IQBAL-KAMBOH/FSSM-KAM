@extends('layout.layout')

@section('content')

<?php
 $globalSettings=App\Http\Controllers\Admin\AdminAccountDetailsController::globalSettings();

?>
<style>
    .kg21{
        background-image: linear-gradient(to right, #0d0530, #00122d, #00151f, #001410, #09110a);
    }
</style>
<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

    <div class="row layout-top-spacing p-4">
        <div class="col-12 text-end">
            <a href="/affiliate-income" class="btn btn-primary">Back</a>
        </div>
        <div class="col-12 card shadow p-3 rounded mb-3">
          <h3>{{$dashboard->name}}</h3>
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
                                                <h6 class="text-light">Earned PV</h6>
                                                <p class="text-light"><?=number_format($dashboard->store_bv,2)?> </p>
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
                                                <h6 class="text-light">Remaining</h6>
                                                <p class="text-light"><?php if($dashboard->store_bv<$globalSettings->pv_limit){ echo $globalSettings->pv_limit-$dashboard->store_bv;}else{ echo 0;}?> </p>
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
           
        
    </div>

    
</div>
</div>

@endsection