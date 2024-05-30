@extends('layout.layout')

@section('content')

<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

    
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-8">
                                <table id="individual-col-search" class="table dt-table-hover">
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th>User</th>
                                            <th>BV</th>
                                            <th>Position</th>
                                            <th>Detail</th>
                                            <th>Date</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($bv as $datas)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$datas->user->name}}</td>
                                            <td>{{$datas->bv}}</td>
                                            <td>{{$datas->position}}</td>
                                            <td><?php
                                            
                                            
                                            ?></td>
                                            <td>{{$datas->created_at}}</td>
                                           
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot>
                                         <tr>
                                            <th>SI</th>
                                            <th>User</th>
                                            <th>BV</th>
                                            <th>Position</th>
                                            <th>Detail</th>
                                            <th>Date</th>
                                          
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
    

</div>
</div>



@endsection