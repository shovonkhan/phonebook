<!DOCTYPE html>
<html>
 <head>
  <title>Inventory</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Inventory Creation</h3><br />
   <div class="row">
   		<div class="col-md-10 col-md-offset-1">
   			@include('includes.messages')
   			<form action="{{ route('inventory.update', $inventory->id) }}" method="post" enctype="multipart/form-data">
		   		{{ csrf_field() }}
		   		{{ method_field('PUT') }}
		   		<div class="col-md-4">
			   		<div class="form-group">
						<label>Company Name</label>
					    <select name="company" id="company" class="form-control">
						    <option value="">Select Company</option>
						    @foreach($companies as $comp)
						    <option value="{{ $comp->name }}" {{ $comp->name === $inventory->company ? 'selected' : '' }}>{{ $comp->name }}</option>
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
						    <option value="{{ $country->name}}" {{ $country->name === $inventory->bank ? 'selected' : '' }}>{{ $country->name }}</option>
							@endforeach
					    </select>
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Branch Name</label>
					    <select name="branch" id="branch" class="form-control">
						     <option value="">Select Branch</option>
						     @foreach($branchs as $branch)
						     <option value="{{ $branch->name}}" {{ $branch->name === $inventory->branch? 'selected' : '' }}>{{ $branch->name }}</option>
						     @endforeach
					    </select>
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Cheque No</label>
					    <input type="text" name="chq_no" class="form-control" placeholder="Cheque Number" value="{{ $inventory->chq_no }}">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Amount</label>
					    <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{ $inventory->amount }}">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Date</label>
					    <input type="date" name="s_date" class="form-control" placeholder="Date" value="{{ $inventory->s_date }}">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Permission Date</label>
					    <input type="date" name="permission_date" class="form-control" placeholder="Date" value="{{ $inventory->permission_date }}">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Permission By</label>
						<select name="permission_by" class="form-control">
							<option value="1" {{ 1 === $inventory->status? 'selected' : '' }}>Phone</option>
							<option value="2" {{ 2 === $inventory->status? 'selected' : '' }}>Office</option>
							<option value="3" {{ 3 === $inventory->status? 'selected' : '' }}>MD Sir</option>
						</select>
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Current Balence</label>
					    <input type="text" name="c_balence" class="form-control" placeholder="Current Balence" value="{{ $inventory->c_balence }}">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Previous Balence</label>
					    <input type="text" name="o_balence" class="form-control" placeholder="Previous Balence" value="{{ $inventory->o_balence }}">
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control">
							<option value="1" {{ 1 === $inventory->status? 'selected' : '' }}>Approved</option>
							<option value="0" {{ 0 === $inventory->status? 'selected' : '' }}>Hold</option>
							<option value="2" {{ 2 === $inventory->status? 'selected' : '' }}>Cancel</option>
						</select>
					</div>
		   		</div>
		   		<div class="col-md-4">
					<div class="form-group">
						<img src="{{asset((isset($inventory) && $inventory->image!='')?'images/'.$inventory->image:'images/no_mage.jpg')}}" style="width:100px; height:70px;">
						<label>Upload Image</label>
					    <input type="file" name="image" class="form-control" value="{{ $inventory->image }}">
					</div>
		   		</div>
		   		<div class="col-md-12">
					<div class="form-group">
						<label>Purpose</label>
					    <textarea name="purpose" class="form-control" placeholder="Purpose for Cheque">{{ $inventory->purpose }}</textarea>
					</div>
		   		</div>
		   		<div class="col-md-12">
					<div class="form-group">
						<button type="submit" class="btn btn-success">Update Now</button>
						<a href="{{ route('inventory.index') }}" class="btn btn-info">Cancel</a>
					</div>
		   		</div>
		   	</form>
   		</div>
   	</div>
  </div>
 </body>
</html>
