
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- bootstrap datepicker -->
  {{-- <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fabric Deshboard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fabric page</li>
      </ol>
    </section>

	<!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
              		<div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Add a new Fabric</h3>
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
							<form action="{{ route('fabric.update',$fabric->id) }}" method="post" enctype="multipart/form-data">
							   		{{ csrf_field() }}
							   		{{ method_field('PUT') }}
							   		<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="name">Fabric Code</label>
									   		<input type="text" name="fabric_code" class="form-control" placeholder="Fabric Code" value="{{ $fabric->fabric_code }}">
									   	</div>
									</div>
							   		<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="type">Fabric Type</label>
									   		<select name="fabric_type" class="form-control">
									   			<option value="Local" @if($fabric->fabric_type == 'Local') selected @endif>Local</option>
									   			<option value="LC" @if($fabric->fabric_type == 'LC') selected @endif>LC</option>
									   			<option value="Sub-Order" @if($fabric->fabric_type == 'Sub-Order') selected @endif>Sub-Order</option>
									   		</select>
									   	</div>
									</div>
									<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="lot">Lot</label>
									   		<input type="text" name="lot" class="form-control" placeholder="Lot" value="{{ $fabric->lot }}">
									   	</div>
									</div>
									<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="unit">unit</label>
									   		<input type="text" name="unit" class="form-control" placeholder="unit" value="{{ $fabric->unit }}">
									   	</div>
									</div>
							   		<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="type">Buyer</label>
									   		<select name="buyer_id" class="form-control">
									   			@foreach($buyer as $B)
									   			<option value="{{$B->id}}" @if($fabric->buyer_name == $B->buyer_name) selected @endif>{{$B->buyer_name}}</option>
									   			@endforeach
									   		</select>
									   	</div>
									</div>
									<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="color">color</label>
									   		<input type="text" name="color" class="form-control" placeholder="color" value="{{ $fabric->color }}">
									   	</div>
									</div>
									<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="gsm">GSM</label>
									   		<input type="text" name="gsm" class="form-control" placeholder="GSM" value="{{ $fabric->gsm }}">
									   	</div>
									</div>
									<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="grade">Grade</label>
									   		<input type="text" name="grade" class="form-control" placeholder="grade" value="{{ $fabric->grade }}">
									   	</div>
									</div>
									<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="construction">Construction</label>
									   		<input type="text" name="construction" class="form-control" placeholder="construction" value="{{ $fabric->construction }}">
									   	</div>
									</div>
									<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="qty">Quantity</label>
									   		<input type="text" name="qty" class="form-control" placeholder="qty" value="{{ $fabric->qty }}">
									   	</div>
									</div>
									<div class="col-md-12">
									   	<div class="form-group">
									   		<label for="history">Remarks</label>
									   		<textarea name="remarks" class="form-control" id="editor1" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $fabric->remarks }}</textarea>
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
	<script src="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
	
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

