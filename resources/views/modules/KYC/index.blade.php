@extends('layout.layout')

@section('content')

<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

    <div class="col-xl-12 col-lg-12 col-sm-12 table" >
                            <div class="widget-content widget-content-area br-8 mt-4">

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
                                <table id="individual-col-search" class="table dt-table-hover" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>CNIC</th>
                                            <th>Action</th>
                                            
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $datas)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$datas->user?->name}}</td>
                                            <td>
                                            <?php
                                            if($datas->status=='Approved'){
                                                $status_color='success';
                                            }else if($datas->status=='Pending'){
                                                $status_color='warning';
                                            }else{
                                                $status_color='danger';
                                            }
                                               ?>
                                                 

                                            <span class="badge badge-<?php echo $status_color;?>">{{$datas->status}}</span></td>
                                            <td>{{$datas->cnic}}</td>
                                            <td>
                                              <!-- aprrove button -->
                                            @if($datas->status != 'Approved')
								            <form action="approve-kyc" method="POST">
									        @csrf
									       <input type="hidden" name="id" value="{{$datas->id}}"  />
									       <input type="submit" value="Approve" name="approve" class="m-2 btn btn-success" id="" />
							
								            </form>
								
									        @endif
                                            <!-- Cancell button  -->
                                            @if($datas->status != 'Cancelled')
								            <form action="cancell-kyc" method="POST">
									        @csrf
									       <input type="hidden" name="id" value="{{$datas->id}}"  />
									       <input type="submit" value="Cancell" name="cancell" class="m-2 btn btn-danger" id="" />
							
								            </form>
								
									        @endif
                                            <!-- Pending button  -->
                                            @if($datas->status != 'Pending')
								            <form action="pending-kyc" method="POST">
									        @csrf
									       <input type="hidden" name="id" value="{{$datas->id}}"  />
									       <input type="submit" value="Pending" name="pending" class="m-2 btn btn-warning" id="" />
							
								            </form>
								
									        @endif
                                           <form action="show-kyc" method="POST">
									        @csrf
									        <input type="hidden" name="user_id" value="{{$datas->user_id}}"  />
									        <input type="submit" value="View" name="approve" class="m-2 btn btn-primary" id="" />
							
								            </form>

                                            </td>
                                           
                                            
                                           
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th>SI</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>CNIC</th>
                                            <th class="invisible"></th>
                                            
                                          
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
    

</div>
</div>



@endsection