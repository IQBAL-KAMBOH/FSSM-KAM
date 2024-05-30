@extends('layout.layout')

@section('content')

<div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">
@if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            <br>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                            <br>
                        @endif
<div class="container">
    <div class="row">
        <div class="col-md-3">
        <div class="card" >
        <img class="card-img-top" src="/assets/src/assets/img/j1.jpg" height="240px" alt="Card image cap">
        <hr>
        <div class="card-body">
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal" id="button">Deposit Now</a>
        </div>
        </div>
        </div>

        <div class="col-md-3">
        <div class="card">
        <img class="card-img-top" src="/assets/src/assets/img/m1.jpg" height="240px" alt="Card image cap" width="10px">
        <hr>
        <div class="card-body">
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal" id="button">Deposit Now</a>
        </div>
        </div>
        </div>
        
        <div class="col-md-3">
        <div class="card">
        <img class="card-img-top" src="/assets/src/assets/img/easy.jpg" alt="Card image cap">
        <hr>
        <div class="card-body">
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal" id="button">Deposit Now</a>
        </div>
        </div>
        </div>


    </div>

        </div>
    </div>
    </div>


    <!-- ........modal..... -->

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deposit Transaction</h1>

        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('transactions.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
       
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Enter Amount</label>
            <input type="number" name="amount" required class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">TID</label>
            <input type="string" name="tid" required class="form-control" id="recipient-name">
          </div>
          <div class="mb-12">
          <label for="file-input" class="col-form-label">Upload File</label>
          <input type="file" class="form-control" name="file" id="file-input">
          </div>
          <div class="mb12">
              <p> Please Send Your Deposit Details To Admin WhatsApp</p>
          </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
        <input type="hidden" value="Pending" name="status">
        <input type="submit" name="" id="" class="form-control btn btn-danger">
      </div>
      </form>
    </div>
  </div>
</div>


@endsection