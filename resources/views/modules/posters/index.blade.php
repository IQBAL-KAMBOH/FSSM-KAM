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
                    <div class="col text-end">
                        <a href="/posters/create" class="btn btn-primary">Add New</a>
                    </div>
                </div>
				<table id="individual-col-search" class="table dt-table-hover">
				
                <thead>
            <tr>
               
                <th>Image</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posters as $posters)
                <tr>
                   
                    <td><img src="{{ $posters->image }}" height="200px" width="200px" alt=""></td>
                    <td>{{ $posters->type }}</td>
                    <td>
                        <div class="row">
                          
                            <div class="col mt-2">
                            <form action="{{ route('posters.destroy', $posters->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                            </div>
                        </div>
                        
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
      
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                       
                       
        </tfoot>
    </table>
    
			</div>
		</div>
	</div>
</div>

@endsection

