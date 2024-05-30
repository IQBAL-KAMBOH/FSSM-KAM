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
                                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                                <h4>Edit Complaint</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                   
                                        <form action="{{route('complaint.update',$data->id)}}" method="POST">

                                        @csrf 
                                        @method('PUT')
                                        
                                            
                                            <div class="form-group mb-4">
                                                <label for="name">Complaint Status</label>
                                                
                                                <select class="form-control" name="status">
                                                    <option value="Initial">Initial</option>
                                                    <option value="Inprogress">Inprogress</option>
                                                    <option value="Resolved">Resolved</option>
                                                    <option value="Cancelled">Cancelled</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control"   name="description" id="shortname" placeholder="Description">
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