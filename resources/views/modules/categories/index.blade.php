@extends('layout.layout')
 @section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

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
                        <a href="/categories/create" class="btn btn-primary">Add New</a>
                    </div>
                </div>
				<table id="individual-col-search" class="table dt-table-hover">
				
                <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Total Points</th>
                <th>Priority Level</th>
               
                <th>Copy Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $datas)
                <tr>
                    <td>{{ $datas->id }}</td>
                    <td>{{ $datas->name }}</td>
                    <td>{{$datas->products?->sum('bv')}}</td>
                    <td>{{ $datas->priority }}</td>
                    <td>
                       
                        <input type="hidden" value="{{ url('/all-products')}}/{{$datas->id}}/bxd" name="" id="bxdcopy_{{$datas->id}}">
                        <input type="hidden" value="{{ url('/all-products')}}/{{$datas->id}}/byd" name="" id="bydcopy_{{$datas->id}}">
                        <?php
                        $bxdCopy='bxdcopy_'.$datas->id;
                        $bydCopy='bydcopy_'.$datas->id;
                        ?>
                        <button id="B2B_copy_button_{{$datas->id}}" onclick="copyToClipboard('{{$bxdCopy}}',{{$datas->id}},'B2B')" class="btn btn-secondary">B2B</button>
                        <button id="B2C_copy_button_{{$datas->id}}" onclick="copyToClipboard('{{$bydCopy}}',{{$datas->id}},'B2C')" class="btn btn-secondary">B2C</button>
                    </td>

                    <td>
                        <div class="row">
                            <div class="col">
                            <a href="{{ route('categories.edit', $datas->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col">
                            <form action="{{ route('categories.destroy', $datas->id) }}" method="POST">
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
            <th class="invisible"></th>
            <th class="invisible"></th>
            <th class="invisible"></th>
        </tfoot>
    </table>
   
			</div>
		</div>
	</div>
</div>
<script>
    function copyToClipboard(id, item_id,type) {
        var inputElement = document.getElementById(id);
        var textToCopy = inputElement.value;

        navigator.clipboard.writeText(textToCopy).then(function () {
            console.log('Text copied to clipboard:', textToCopy);
            $("#"+type+"_copy_button_" + item_id).html('Copied!');
            setTimeout(function () {
                $("#"+type+"_copy_button_" + item_id).html(type);
            }, 2000);
        }).catch(function (err) {
            console.error('Unable to copy text to clipboard', err);
            $("#"+type+"_copy_button_" + item_id).html(type);
        });
    }
</script>


<!-- Include Clipboard.js -->



@endsection

