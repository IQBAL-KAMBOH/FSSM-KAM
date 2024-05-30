<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>FSSM</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="/assets/src/plugins/src/sweetalerts2/sweetalerts2.css">
      <link rel="stylesheet" type="text/css" href="/OnlineStore/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="/OnlineStore/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="/OnlineStore/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="/OnlineStore/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="/OnlineStore/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="/OnlineStore/css/owl.carousel.min./OnlineStore/">
      <link rel="stylesoeet" href="/OnlineStore/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
   @include('OnlineStore.includes.login_checker')
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top" style="background-color: #212529;">
               <div class="row ">
                 
                  <div class="col-sm-12 text-center">
                     <div class="custom_menu  " style="background: linear-gradient(to top, #000C40, #181e4d)">
                        <div class="row">
                           <div class="col-sm-12 text-center">
                              
              
              <img src="/OnlineStore/images/fssm-logo.png" width="200px">
                
              
                            
                          </div>
                        </div>
                       
                        @include('OnlineStore.includes.menu')
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="container">
            <div class="row">
              
                 <!-- <strong> <h1 style="color: rgb(229, 229, 239);" class="text-center">F<span class="text-light">S</span>S<span class="text-light">M</span></h1></strong> -->
              
            </div>
         </div>
     
           
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section mt-4">
            <div class="container">
               <div class="containt_main">
               <?php 
                  
                  $categories=App\Http\Controllers\Store\LibraryCategoryController::allCategories();

                  
                  ?>
               @include('OnlineStore.includes.menu-mobile')
                  
                  <span class="toggle_icon" onclick="openNav()"><img src="/OnlineStore/images/toggle-icon.png"></span>
                  <div class="dropdown">
                     <button class="btn dropdown-toggle text-light" style=" background-color: #040b67;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                       @foreach($categories as $link)
                        <a class="dropdown-item" href="#section_{{$link->name}}">{{$link->name}}</a>
                       @endforeach
                        
                     </div>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="">
                        <div class="input-group-append">
                           <button style="background: linear-gradient(to top, #000C40, #181e4d)" class="btn text-light" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                          <i ></i>
                        </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="images/flag-france.png" class="mr-2" alt="flag">
                           ......
                           </a>
                        </div>
                     </div>
                     <div class="login_menu">
                        <ul>
                           <li><a href="/view-cart">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="/user-profile">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Profile</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
   