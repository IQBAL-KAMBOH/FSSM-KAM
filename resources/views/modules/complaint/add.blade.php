<style>
.justify-content-center{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
    width: 100%;
    border:solid;
    border-color: transparent;
    border-radius:20px;
    background: #f5f5f5;
}
.form-floating>.form-control{
  border-radius:20px;
  background:transparent;
  
}

.button{
  margin-left:18rem;
  width:150px;
  height:40px;
  border-radius:30px;
  text-align:center;
  background-color:black;
  color:white;
  margin-top:20px;

}

.button:hover{
  background-color: #4CAF50;
  color: white;
  border:none;
}

</style>

@extends('layout.layout')

@section('content')

<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
        <form method="POST" action="{{ route('complaint.store') }}">
        @csrf
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" />
					<label for="name">Name</label>
				</div>

                <div class="form-floating mb-3">
					<input type="text" class="form-control" id="name" name="complaint_name" placeholder="Enter your complaint name" />
					<label for="name">Complaint Name</label>
				</div>
		
				<div class="form-floating mb-3">
					<textarea class="form-control" placeholder="Enter your description here" name="description" id="description" style="height: 100px"></textarea>
					<label for="complaint">Description</label>
				</div>
				<button type="submit" class="button">Submit</button>
			</form>
		</div>
	</div>
</div>

</div>
</div>

@endsection

