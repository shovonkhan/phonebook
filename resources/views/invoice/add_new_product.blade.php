<div class="modal fade" id="new-product-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <!-- Modal content-->
      	<div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
	        </div>
	        <div class="modal-body">

				<div class="panel panel-primary">
				  	<div class="panel-heading">
				  		<h2>Master LC Information For Pacific Group</h2>
				  	</div>
				  	<div class="panel-body">
						<form action="{{ url('/master-lc-info') }}" method="post">
							{{ csrf_field() }}
								<div class="form-group">
									<label>Date</label>
									<input type="date" class="form-control" name="p_date"/>
								</div>
								<div class="form-group">
									<label>Product Name</label>
									<input type="text" class="form-control" name="productname"/>
								</div>
								<div class="form-group">
									<label>Product Category</label>
									<select class="form-control" name="category">
										<option>Select Category</option>
										@foreach($categories as $category)
										<option value="{{ $category->name }}">{{ $category->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Company Name</label>
									<input type="text" class="form-control" name="company"/>
								</div>
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" class="form-control" name="qty"/>
								</div>
								<div class="form-group">
									<label>Price/Rate</label>
									<input type="text" class="form-control" name="price"/>
								</div>
								<div class="form-group">
									<label>Discount</label>
									<input type="text" class="form-control" name="dis"/>
								</div>
								<div class="form-group">
									<label>Amount</label>
									<input type="text" class="form-control" name="amount"/>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea name="designation" class="form-control"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
	        </div>
	        <div class="modal-footer">
	          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
	        </div>
      	</div>
    </div>
</div> 