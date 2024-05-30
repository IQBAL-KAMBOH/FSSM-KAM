
    




    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"></h5>
            <p class="text-muted mb-1">{{$user->name}}</p>
            <p class="text-muted mb-4"></p>
            <div class="d-flex justify-content-center mb-2">
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="user_id" value="{{$user->id}}" id="">
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <!-- <div class="row">
             <div class="mb-12">
              <label for="Id_Card" class="form-label">ID Card Front</label>
              <input class="form-control" type="file" name="card_f" id="Id_Card">
             </div>
            </div>
            <hr> -->
      
            
            <!-- <div class="row">
            <div class="mb-3">
            <label for="Id_Card" class="form-label">ID Card Back</label>
            <input class="form-control" type="file" name="card_b" id="Id_Card">
          </div>
            </div>
            <hr>
            <div class="row">
               <div class="mb-12">
                 <label for="Id_Card" class="form-label">Upload Undertaking For Underage Form</label>
                 <input class="form-control" type="file" name="under_age" id="Id_Card">
                </div>
            </div>
            <hr> -->
           
            <div class="row">
            <div class="mb-3">
            <label for="CNIC" class="form-label">CNIC#</label>
            <input type="Number" class="form-control" name="cnic"  id="CNIC" placeholder="38403-000-00-1">
          </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
              <label for="datePicker" class="form-label">Date of birth:</label>
                <input type="date" class="form-control"  id="datePicker" name="dob">
            </div>
             
              <div class="col-sm-6">
              <label for="datePicker" class="form-label">Expiry Date:</label>
              <input type="date" class="form-control" id="datePicker" name="expiry_date">

              </div>
            </div>
            <hr>
            <!-- <div class="row">
            <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="admin@mail.com">
          </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"></p>
              </div>
            </div> -->
			<!-- <hr>

				<div class="row">
					<div class="col-sm-3">
					<label for="name">City</label>
					<input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" />
					</div>
					<div class="col-sm-3">
					<label for="name">State</label>
					<input type="text" class="form-control" id="state" name="state" placeholder="Enter your state" />

					</div>
					<div class="col-sm-3">
					<label for="name">Zip/Postal</label>
					<input type="text" class="form-control" id="zip" name="postal_code" placeholder="Enter your zip" />

					</div>
					<div class="col-sm-3">
					<label for="name">Country</label>
					<input type="text" class="form-control" id="country" name="country" placeholder="Enter your country" />

					</div>
				</div>
        <hr> -->
        <!-- <div class="row">
					
					<div class="col-sm-6 mb-1">
					<label for="name">Bank Name</label>
					<input type="text" class="form-control"  name="bank_name" placeholder="Bank Name" />

					</div>
					<div class="col-sm-6 mb-1">
					<label for="name">Account Title</label>
					<input type="text" class="form-control" name="account_title" placeholder="Account Title" />

					</div>
					<div class="col-sm-6 mb-1">
					<label for="name">Account Number</label>
					<input type="text" class="form-control"  name="bank_details" placeholder="Account Number"/>

					</div>
				</div>
        <hr> -->
        

      <div class="row">
					<div class="col-sm-6">
					   <label for="account">EasyPaisa (Name)*</label>
					  <input type="text" class="form-control" name="easypaisa_name" placeholder="" />
					</div>
					<div class="col-sm-6">
					  <label for="account">EasyPaisa (Acc#)*</label>
					  <input type="text" class="form-control" name="easypaisa_account" placeholder="" />
					</div>
			</div>
        <hr>
        <div class="row">
					<div class="col-sm-6">
					   <label for="account">JazzCash (Name)*</label>
					  <input type="text" class="form-control" name="jazzcash_name" placeholder="" />
					</div>
					<div class="col-sm-6">
					  <label for="account">JazzCash (Acc#)*</label>
					  <input type="text" class="form-control" name="jazzcash_account" placeholder="" />
					</div>
			</div>
      <input type="hidden" name="status" value="Pending" id="">
        <hr>
        <button type="submit" class="btn btn-light btn-lg col-md-12">Save changes</button>

          </div>
        </div>
      
      </div>
    </div>
  