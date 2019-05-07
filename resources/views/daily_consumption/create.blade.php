<!DOCTYPE html>
<html>
  <head>
    <title>Chemical Add</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <!-- Select2 -->
      <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Select2 -->
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
  </head>
  <body>
    <br />
    <div class="container box">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h2>Chemical Consumption Information</h2>
                <a href="{{ route('consumption.index') }}" class="btn btn-success">Back</a>
              </div>
              <div class="panel-body">
                @include('includes.messages')
              	<form action="{{ route('consumption.store') }}" method="post" enctype="multipart/form-data">
                	{{ csrf_field() }}

				  	<div class="col-md-12 text-center">
                		<h3>Program Information</h3>
                		<hr/>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                			<label for="date">Date</label>
                			<input type="date" name="date" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                			<label for="lot_no">Lot No</label>
                			<input type="text" name="lot_no" class="form-control" placeholder="Lot Number">
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                			<label for="color">Color</label>
                			<input type="text" name="color" class="form-control" placeholder="Color">
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                			<label for="buyer">Buyer Name</label>
                			<input type="text" name="buyer" class="form-control" placeholder="Buyer Name">
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                			<label for="total_yarn">Total End</label>
                			<input type="nunbar" name="total_yarn" class="form-control" placeholder="Total Yarn">
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                			<label for="yarn_count">Yarn Count</label>
                			<input type="text" name="yarn_count" class="form-control" placeholder="Total Yarn">
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                			<label for="wp_length">Warpping Length</label>
                			<input type="nunbar" name="wp_length" class="form-control" placeholder="Warpping Length">
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                			<label for="yarn_weight">Yarn Weight</label>
                			<input type="text" name="yarn_weight" class="form-control" placeholder="Warpping Length">
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                			<label for="t_stop_mark">Stop Mark Length</label>
                			<input type="nunbar" name="t_stop_mark" class="form-control" placeholder="Warpping Length">
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div class="form-group">
                			<label for="dyeing_length">Dyeing Length</label>
                			<input type="nunbar" name="dyeing_length" class="form-control" placeholder="Warpping Length">
                		</div>
                	</div>
                	<div class="col-md-12 text-center">
                		<h3>Work Information</h3>
                		<hr/>
                	</div>

				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="shift_officer">Shift Officer</label>
					  		<input type="text" name="shift_officer" class="form-control" placeholder="shift_officer">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="shift_oparetor">Sr. Oparetor</label>
					  		<input type="text" name="shift_oparetor" class="form-control" placeholder="shift_oparetor">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="start_time">Start Time</label>
					  		<input type="text" name="start_time" class="form-control" placeholder="start_time">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="end_time">End Time</label>
					  		<input type="text" name="end_time" class="form-control" placeholder="end_time">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="total_shift">Total Shift</label>
					  		<input type="text" name="total_shift" class="form-control" placeholder="total_shift">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="total_time">Total Time</label>
					  		<input type="text" name="total_time" class="form-control" placeholder="total_time">
				  		</div>
				  	</div>

                	<div class="col-md-12 text-center">
                		<h3>Dying Chemical Consumption</h3>
                		<hr/>
                	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="indigo">Indigo</label>
					  		<input type="text" name="indigo" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="hydrose">Hydrose</label>
					  		<input type="text" name="hydrose" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="s_black">S.Black</label>
					  		<input type="text" name="s_black" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="caustic">caustic Soda</label>
					  		<input type="text" name="caustic" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="sodium">Sodium Sulphide</label>
					  		<input type="text" name="sodium" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="acid">Acetic Acid</label>
					  		<input type="text" name="acid" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="agent">R Agent</label>
					  		<input type="text" name="agent" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="trilon">Trilon</label>
					  		<input type="text" name="trilon" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="setamol">Setamol</label>
					  		<input type="text" name="setamol" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="premasol">Primasol</label>
					  		<input type="text" name="premasol" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="glucose">Glocos</label>
					  		<input type="text" name="glucose" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="l_black">Liq Black</label>
					  		<input type="text" name="l_black" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-12 text-center">
                		<h3>Sizing Chemical Consumption</h3>
                		<hr/>
                	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="modifide_starch">Modifide Starch</label>
					  		<input type="text" name="modifide_starch" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="apple_starch">Apple Starch</label>
					  		<input type="text" name="apple_starch" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="t_size">Tetra Size</label>
					  		<input type="text" name="t_size" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="uni_soft">Uni-Soft</label>
					  		<input type="text" name="uni_soft" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="pva">PVA</label>
					  		<input type="text" name="pva" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="wax">Wax</label>
					  		<input type="text" name="wax" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
				  	<div class="col-md-6">
				  		<div class="form-group">
					  		<label for="cms">CMS</label>
					  		<input type="text" name="cms" class="form-control" placeholder="Indigo use as Kg">
				  		</div>
				  	</div>
	                <div class="col-md-12">
	                    <div class="form-group">
	                      <label for="remark">Remarks</label>
	                      <textarea name="remark" class="form-control" id="editor1" placeholder="Place some text here"
	                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
	                    </div>
	                </div>
	                <div class="col-md-12">
	                    <div class="form-group">
	                      <button type="submit" class="btn btn-success">Save</button>
	                    </div>
	                </div>
                </form>
              </div>
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
    
  </body>
</html>

