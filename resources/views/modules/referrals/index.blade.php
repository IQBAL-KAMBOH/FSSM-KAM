@extends('layout.layout')

@section('content')

<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

    <div class="col-xl-12 col-lg-12 col-sm-12 table" >
                            <div class="widget-content widget-content-area br-8 mt-4">
                                <table id="individual-col-search" class="table dt-table-hover" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Join Date</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $datas)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$datas->name}}</td>
                                            <td>{{$datas->email}}</td>
                                            <td>{{$datas->created_at}}</td>
                                           
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th>SI</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Join Date</th>
                                          
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
    

</div>
</div>



@endsection