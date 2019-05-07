
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bank Deshboard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

	<!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
              		<div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Add a new Employee</h3>
			            </div>
			            <!-- /.box-header -->
			            <!-- /.box-header -->
			            @include('employee.includes.messages')
			            @if ($errors->any())
			                <div class="alert alert-danger">
			                    <ul>
			                        @foreach ($errors->all() as $error)
			                            <li>{{ $error }}</li>
			                        @endforeach
			                    </ul>
			                </div>
			            @endif
			            <div class="box-body">
			            <!-- form start -->
						<form action="{{ route('bank.update',$banks->id) }}" method="post" enctype="multipart/form-data">
						   		@csrf
   								{{ method_field('PUT') }}
						   		<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="name">Bank Name</label>
								   		<input type="text" name="name" class="form-control" placeholder="Bank Name" value="{{ $banks->name }}">
								   	</div>
								</div>
						   		<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="type">Type</label>
								   		<input type="text" name="type" class="form-control" placeholder="Type" value="{{ $banks->type }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="bank_type">Bank Type</label>
								   		<select name="bank_type" class="form-control">
								   			<option>Select One</option>
								   			<option value="1" @if($banks->bank_type == 1) selected @endif >Govment</option>
								   			<option value="2" @if($banks->bank_type == 2) selected @endif >Privet</option>
								   		</select>
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="chairman">Chairman</label>
								   		<input type="text" name="chairman" class="form-control" placeholder="Chairman" value="{{ $banks->chairman }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="managing_director">Managing Director</label>
								   		<input type="text" name="managing_director" class="form-control" placeholder="Managing Director" value="{{ $banks->managing_director }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="established">Established</label>
								   		<input type="date" name="established" class="form-control" placeholder="Established" value="{{ $banks->established }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="headquarters">Headquarters</label>
								   		<input type="text" name="headquarters" class="form-control" placeholder="Headquarters" value="{{ $banks->headquarters }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="phone">Phone Number</label>
								   		<input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ $banks->phone }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="website">Website</label>
								   		<input type="text" name="website" class="form-control" placeholder="Website Address" value="{{ $banks->website }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="image">Logo</label>
								   		<br>
								   		<img id="image" src="#" />
								   		<br>
								   		<input type="file" name="image" class="form-control" id="photo"  accept="image/*" onchange="readURL(this);">
								   	</div>
	                                <div class="form-group">
	                                	<img src="{{ URL::to($banks->image) }}"  style="height: 80px; width: 80px;">
	                                    <input type="hidden" name="old_photo" value="{{ $banks->image }}">
	                                </div>
								</div>
								<div class="col-md-12">
								   	<div class="form-group">
								   		<label for="history">History</label>
								   		<textarea name="history" class="form-control" id="editor1" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $banks->history }}</textarea>
								   	</div>
								</div>
								<div class="col-md-12">
								   	<div class="form-group">
								   		<input type="submit" class="btn btn-success">
								   	</div>
								</div>
						</form>
  					</div>
  					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	<script src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript">
		function readURL(input) {
	      if (input.files && input.files[0]) {
	          var reader = new FileReader();
	          reader.onload = function (e) {
	              $('#image')
	                  .attr('src', e.target.result)
	                  .width(80)
	                  .height(80);
	          };
	          reader.readAsDataURL(input.files[0]);
	      }
	   }
	</script>
		<script>
		  $(function () {
		    // Replace the <textarea id="editor1"> with a CKEditor
		    // instance, using default configuration.
		    CKEDITOR.replace('editor1')
		    //bootstrap WYSIHTML5 - text editor
		    $('.textarea').wysihtml5()
		  })
		</script>
@endsection

