<div class="modal fade" id="new-category-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <!-- Modal content-->
      	<div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
	        </div>
	        <div class="modal-body">
				<section class="panel">
					<div class="panel panel-footer">
						<header id="header" class="panel panel-default">
							<h2>If Your not add product please first add</h2>
						</header><!-- /header -->
					</div>
					<div class="panel panel-footer">
						<form action="{{ route('category.store') }}" method="post">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="name">Category Name</label>
										<input type="text" class="form-control" name="name" placeholder="Category Name">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="descripiton" class="form-control" id="editor1" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" class="btn btn-info btn-sm" value="Save">
									</div>
								</div>
							</div>
						</form>
					</div>
				</section>
			</div>
	        <div class="modal-footer">
	          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
	        </div>
      	</div>
    </div>
</div> 
	<script>
		  $(function () {
		    // Replace the <textarea id="editor1"> with a CKEditor
		    // instance, using default configuration.
		    CKEDITOR.replace('editor1')
		    //bootstrap WYSIHTML5 - text editor
		    $('.textarea').wysihtml5()
		  })
	</script>