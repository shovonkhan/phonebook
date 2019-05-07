<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				  		<h2>PROFORMA INVOICE</h2>
				  	</div>
				  	<div class="panel-body">
						<form action="{{ url('/add-to-cart') }}" method="post">
							{{ csrf_field() }}
								<div class="form-group">
									<label>Product ID</label>
									<input type="text" class="form-control" name="product_id" />
								</div>
								<div class="form-group">
									<label>Product Name</label>
									<input type="text" class="form-control" name="product_name"/>
								</div>
								<div class="form-group">
									<label>Product Quantity</label>
									<input type="text" class="form-control" name="product_qty"/>
								</div>
								<div class="form-group">
									<label>Product Price</label>
									<input type="text" class="form-control" name="product_price"/>
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