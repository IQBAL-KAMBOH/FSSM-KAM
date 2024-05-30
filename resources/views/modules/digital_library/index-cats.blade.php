@extends('layout.layout')
 @section('content')


<div class="layout-px-spacing">
	<div class="middle-content container-xxl p-0">
		
		<div class="col-xl-12 col-lg-12 col-sm-12 table">
        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <br />
        @endif
         @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        <br />
        @endif
			<div class="widget-content widget-content-area br-8 mt-4">
              
            <div class="row">
               @foreach($data as $datas)
               <div class="col-12 col-md-4 col-sm-4 col-lg-4">
                     <a href="/digital_library?cat={{$datas->id}}">
                       
                            <div class="card shadow p-3 text-center">
                                <span>{{$datas->name}}</span>
                            </div>
                       
                    </a>
                </div>
               @endforeach
               </div>
    
			</div>
		</div>
	</div>
</div>

@endsection

