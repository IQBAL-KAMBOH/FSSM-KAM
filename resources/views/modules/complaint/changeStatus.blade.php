@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">

                        <div class="middle-content container-xxl p-0">

                            <!-- BREADCRUMB -->
                            <div class="page-meta">
                                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/complaint">Complaints</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Status</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- /BREADCRUMB -->

                            <!--- registration form start ---> 

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">                                
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Update Complaint Status</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                   
                                        <form action="{{route('complaint.update',$data->id)}}" method="POST">

                                        @csrf 
                                        @method('PUT')
                                        
                                            
                                            <div class="form-group mb-4">
                                                <?php
                                                $statuses=[
                                                    'Initial',
                                                    'InProcess',
                                                    'Resolved',
                                                    'Cancelled'
                                                ];
                                                ?>
                                                <label for="name">Complaint Status</label>
                                               
                                                <select class="form-control" name="status">
                                                    @foreach($statuses as $st)
                                                    <option value="{{$st}}" <?php if($data->status==$st){ echo 'selected';}?>>{{$st}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="description">Description</label>
                                                <textarea  class="form-control" value="{{$data->description}}"  name="description" cols="20" rows="6">

                                                </textarea>
                                            </div>
                                            
                                            
                                           
                                            <input type="submit" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--- registration form end ---> 
                        
                        <!--- main divs ending start --->
                        </div>
                    </div>
                </div>
            </div>

@include('modules.students.includes.modals')

@endsection            