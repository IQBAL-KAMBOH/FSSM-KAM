@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">

                     

                        <div class="row" style="margin-bottom: 1em">
                            <div class="col-6 text-left"><h3>Complaints</h3></div>
                            <div class="col-6 text-end"><a href="complaint/create" class="btn btn-primary">Add New</a></div>
                        </div>
                        
                        <div class="row layout-spacing">
                        <div class="col-lg-12">

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            <br>
                        @endif

                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    
                                    <table id="individual-col-search" class="table dt-table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Tracking ID</th>
                                                <th>Complainant Name</th>
                                                <th>Student Name</th>
                                                
                                                <th>WhatsApp</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Status</th>
                                                <th>Category</th>
                                                <th>Message</th>
                                                <th>Description</th>
                                                <th class="text-center dt-no-sorting">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $datas)
                                            <tr id="item_{{$datas->id}}">
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                
                                                <td>{{$datas->tracking_id}}</td>
                                                <td>{{$datas->complainant_name}}</td>
                                                <td>{{$datas->student_name}}</td>
                                                                                     
                                                <td>{{$datas->complainant_whatsapp_number}}</td>                                         
                                                <td>{{$datas->class?->class_name}}</td>                                         
                                                <td>{{$datas->classsection?->section_name}}</td>                                         
                                                <td>{{$datas->status}}</td>                                         
                                                <td>{{$datas->category}}</td>                                         
                                                <td>{{$datas->message}}</td>                                         
                                                <td>{{$datas->description}}</td>                                         
                                                <td class="text-center">
                                                    <div class="action-btns">
                                                       
                                                        <a href="javascript:void(0);"  onclick="deleteItem({{$datas->id}}, 'complaint/')" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        </a>
                                                        <form action="complaintstatus" method="post">
                                                           @csrf
                                                            <input type="hidden" name="id" value="{{$datas->id}}" id="">
                                                            
                                                           <input type="submit" value="Status" class="btn btn-warning m-1">
                                                        </form>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Tracking ID</th>
                                                <th>Complainant Name</th>
                                                <th>Student Name</th>
                                                
                                                <th>WhatsApp</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Status</th>
                                                <th>Category</th>
                                                <th>Message</th>
                                                <th>Description</th>
                                               
                                                <th class="invisible"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>

@endsection            