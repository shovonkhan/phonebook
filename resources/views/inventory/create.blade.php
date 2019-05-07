<!DOCTYPE html>
<html>
 <head>
  <title>Inventory</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Inventory Creation</h3><br />
   <div class="row">
   		<div class="col-md-10 col-md-offset-1">
   			@include('includes.messages')
   			<form action="{{ route('inventory.store') }}" method="post" enctype="multipart/form-data">
		   		{{ csrf_field() }}
		   		<div class="col-md-4">
			   		<div class="form-group">
						<label>Company Name</label>
					    <select name="company" id="company" class="form-control">
						     <option value="">Select Company</option>
						     @foreach($companies as $company)
						     <option value="{{ $company->name}}">{{ $company->name }}</option>
						     @endforeach
					    </select>
					</div>
		   		</div>
		   		<div class="col-md-4">
			   		<div class="form-group">
						<label>Bank Name</label>
					    <select name="bank" id="bank" class="form-control">
						     <option value="">Select Bank</option>
						     @foreach($banks as $country)
						     <option value="{{ $country->name}}">{{ $country->name }}</option>
						     @endforeach
					    </select>
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Branch Name</label>
					    <select name="branch" id="branch" class="form-control">
						     <option value="">Select Branch</option>
						     @foreach($branch as $bran)
						     <option value="{{ $bran->name}}">{{ $bran->name }}</option>
						     @endforeach
					    </select>
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Cheque No</label>
					    <input type="text" name="chq_no" class="form-control" placeholder="Cheque Number">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Amount</label>
					    <input type="text" name="amount" class="form-control" placeholder="Amount">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Date</label>
					    <input type="date" name="s_date" class="form-control" placeholder="Date">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Permission Date</label>
					    <input type="date" name="permission_date" class="form-control" placeholder="Date">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Permission By</label>
						<select name="permission_by" class="form-control">
							<option value="0">Phone</option>
							<option value="1">Office</option>
							<option value="2">MD Sir</option>
						</select>
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Current Balence</label>
					    <input type="text" name="c_balence" class="form-control" placeholder="Current Balence">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Previous Balence</label>
					    <input type="text" name="o_balence" class="form-control" placeholder="Previous Balence">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control">
							<option value="1">Approved</option>
							<option value="0">Hold</option>
							<option value="2">Cancel</option>
						</select>
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Upload Image</label>
					    <input type="file" name="image" class="form-control">
					</div>
		   		</div>
		   		<div class="col-md-12">
					<div class="form-group">
						<label>Purpose</label>
					    <textarea name="purpose" class="form-control" placeholder="Purpose for Cheque"></textarea>
					</div>
		   		</div>
		   		<div class="col-md-12">
					<div class="form-group">
						<button type="submit" class="btn btn-success">Save Now</button>
					</div>
		   		</div>
		   	</form>
   		</div>
   	</div>
  </div>
 </body>
</html>
