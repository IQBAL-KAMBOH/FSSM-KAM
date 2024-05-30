<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>FSSM</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.js"></script> -->
   <style>
     td{
        border:1px solid black;
     }
   </style>
</head>
<body style="margin:0px;padding:0px;margin-right:20px;">
    <div class="justify-content-start">
        <h2 class="text-start">Paid Users</h2>
       
        <table id="userTable"  class="">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Father Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">CNIC</th>
                    <th scope="col">Sponser</th>
                    <th scope="col">Ref.Side</th>
                    <th scope="col">CBV</th>
                    <th scope="col">Package</th>
                    <th scope="col">Rank</th>
                    <!-- <th scope="col">Status</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($data as $datas)
				<tr>
					<td>{{$loop->iteration}}</td>
                    <td>{{$datas['name']}}</td>
                    <td>{{$datas['full_name']}}</td>
                    <td>{{$datas['father_name']}}</td>
                    <td>{{$datas['email']}}</td>
                    <td>{{$datas['cnic']}}</td>
                    <td>{{$datas->referral?->name}}</td>
                    <td>
                    <?php
                         echo $side=App\Http\Controllers\User\UserController::getUserJoiningSide($datas['id']);
                    ?>
                    </td>
                    <td>{{$datas->cbv}}</td>
                    <td>{{$datas->package?->packages}}</td>
                    <td>{{$datas['rank']}}</td>
                    <!-- <td>{{$datas['status']}}</td> -->
				</tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</body>
</html>
