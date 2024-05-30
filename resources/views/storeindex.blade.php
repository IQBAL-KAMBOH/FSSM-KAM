<style>
    .kg1 {
      background-image: linear-gradient(to bottom right, #FF61D2, #FE9090);
	  color:white !important;
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

#second_card{
	background: linear-gradient(to bottom, #a10051, #cc0066, #cc0077);
}
#third_Card{
	background: linear-gradient(to bottom, #ffffcc, #ffff99, #ffcc66);
}







</style>
@extends('layout.layout-store')
 @section('content')

<?php
$dashboard=App\Http\Controllers\Admin\DashboardController::dashboard();
?>




<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		<div class="row layout-top-spacing">
			         
			
		




		</div>
	</div>
</div>

 @endsection
