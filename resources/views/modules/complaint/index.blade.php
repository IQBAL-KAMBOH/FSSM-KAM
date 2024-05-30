@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">

                     

                        <div class="row" style="margin-bottom: 1em">
                            <div class="col-6 text-left"><h3>Complaints</h3></div>
                            <div class="col-6 text-end"><a href="/create_complaint" class="btn btn-primary">Add New</a></div>
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
                                               <th>user_name</th>
                                                <th>complaint_name</th>
                                                <th>description</th>
                                                <th>status</th>
                                                <th>Action</th>
                                                <th>Action2</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($complaints as $data)
                                            <tr id="item_{{$data->id}}">
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$data->user_name}}</td>
                                                <td>{{$data->complaint_name}}</td>
                                                <td>{{$data->description}}</td>
                                                <td>{{$data->status}}</td>
                                                <td>

                                                @if(auth()->user()->hasRole('admin'))
                                                    <div class="row">
                                                        <div class="col-4">
                                                        <form action="approve_complaint" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$data->id}}" id="">
                                                        <input type="hidden" name="name" value="{{$data->user_name}}" id="">
                                                        <input type="hidden" name="complaint_name" value="{{$data->complaint_name}}" id="">
                                                        <input type="submit" value="Approve"  name="approve_deposit" class="m-2 btn btn-success" id="">

                                                        </form>

                                                        </div>
                                                        <div class="col-4">
                                                        <form action="cancell_complaint" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$data->id}}" id="">
                                                        <input type="submit" value="Cancell"  name="cancell_deposit" class="m-2 btn btn-danger" id="">

                                                        </form>

                                                        </div>
                                                    </div>
                                                @endif    
                                        </td>
                                        <td>

                                        <form action="{{ route('complaint.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete"  name="approve_deposit" class="m-2 btn btn-danger" id="">
                                         
                                    </form>


                                        </td>
                                        
                                    

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>

@endsection            