<div class="modal fade" id="master-lc-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				  		<h2>Master LC Information</h2>
				  	</div>
				  	<div class="panel-body">
						<form action="{{ url('/master-lc-info') }}" method="post">
							{{ csrf_field() }}
								<div class="form-group">
									<label>Customer Name</label>
									<input type="text" class="form-control" name="customer"/>
								</div>
								<div class="form-group">
									<label>LC Number</label>
									<input type="text" class="form-control" name="lc_no"/>
								</div>
								<div class="form-group">
									<label>LC Velue</label>
									<input type="text" class="form-control" name="lc_value"/>
								</div>
								<div class="form-group">
									<label>LC Date</label>
									<input type="text" class="form-control" name="lc_date"/>
								</div>
								<div class="form-group">
									<label>LC Expire Date</label>
									<input type="text" class="form-control" name="lc_ex_date"/>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea name="designation" class="form-control"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Add to Cart</button>
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