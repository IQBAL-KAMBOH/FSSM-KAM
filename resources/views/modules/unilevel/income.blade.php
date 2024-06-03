@extends('layout.layout')

@section('content')

<style>
    #myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
.card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
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

.card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

    <div class="row layout-top-spacing">
       
 <?php
 
 $settings=App\Http\Controllers\Admin\AdminAccountDetailsController::globalSettings();
 ?>     

<div class="container">
    <div class="row ">
         @for($i=1;$i<=5;$i++)
         <?php
         $percent=0;
         if($i==1){
            $percent=$settings->l1;
         }
         if($i==2){
             $percent=$settings->l2;
          }
          if($i==3){
             $percent=$settings->l3;
          }
          if($i==4){
             $percent=$settings->l4;
          }
          if($i==5){
             $percent=$settings->l5;
          }
        //   if($i==6){
        //      $percent=$settings->l6;
        //   }
        //   if($i==7){
        //      $percent=$settings->l7;
        //   }
        //   if($i==8){
        //      $percent=$settings->l8;
        //   }
        //   if($i==9){
        //      $percent=$settings->l9;
        //   }
        //   if($i==10){
        //      $percent=$settings->l10;
        //   }
         
        
         
         ?>
         <?php $commission=App\Http\Controllers\UnilevelController::incomeAll(auth()->user()->id,$i);?>
         <?php $pv=App\Http\Controllers\UnilevelController::getDirectRefralsComm(auth()->user()->id);
                 $usersPv=number_format($pv[$i],2);
                 $com_per=($percent/100)*$usersPv;
         ?>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                        <h2 class="card-title mb-0 text-light">Level : {{$i}}</h2>
                        </div>
                        <div class="col-6 text-end text-light">
                           <button class="btn btn-secondary" onclick="getUnilevelTeam({{$i}})"  data-bs-toggle="modal" data-bs-target="#modal_unilevel">Show</button>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Commission:</h6>
                        </div>
                        <div class="col-6 text-end text-light">
                            <h4 class="text-light">{{number_format($com_per,2)}} </h4>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Percent:</h6>
                        </div>
                        <div class="col-6 text-end text-light">
                            <h4 class="text-light">{{$percent}} %</h4>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Total Users:</h6>
                        </div>
                        <div class="col-6 text-end text-light">
                            <?php $ref=App\Http\Controllers\Controller::getDirectRefrals(auth()->user()->id);
                                 
                            ?>
                            <h4 class="text-light">{{number_format($ref[$i])}}  </h4>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6 text-left">
                            <h6 class=" text-light">Total Pv:</h6>
                        </div>
                        <div class="col-6 text-end text-light">
                        
                            <h4 class="text-light">{{$usersPv;}}  </h4>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="{{$percent}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}%;"></div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>

      

       
        
    </div>

    
   

        



       
        
    
    
    

</div>
</div>

<div class="modal fade" id="modal_unilevel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Direct Refrals</h1>

        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-body">
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
      <table id="myTable" class="table dt-table-hover">
					
					
				</table>
         
       
      </div>
      <div class="modal-footer">
        
        <input type="submit" value="Done" name="" id="" class="form-control btn btn-danger">
      </div>
     
    </div>
  </div>
</div>

<script>
	function getUnilevelTeam(id){

		   
			$('#myTable').html('');
			
         $.ajax({
         url: "/get-unilevel-team",
         type: "POST",
         headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
           },
         data:{
         id:id
         },
         cache: false,
         success: function(dataResult){
         if(dataResult.data){
        
            dataResult.data.forEach(data => {
                var newr=`<tr><td>${data.name}</td><td>
                <form action="/unilevel-network-summary" method="post">
 @csrf 
 <input type="hidden" name="id" value="${data.id}" class="btn btn-primary" id="">
 <input type="submit" name="" value="Summary" class="btn btn-primary" id="">
</form>
                </td></tr>`;
			    $('#myTable').append(newr);
            
            })
         }else{
  
         }
     

      }
   });



 
 
}

</script>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
@endsection