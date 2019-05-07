
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
		<div class="container box box-info">
  			<div class="row">
  				<div class="col-md-10 col-md-offset-1">
  					<div class="panel panel-primary">
  						<div class="panel-heading">
  							<h2>Branch Information</h2>
  						</div>
  						<div class="panel-body">
  							@include('includes.messages')
							<form action="{{ route('branch.store') }}" method="post">
						   		{{ csrf_field() }}
						   		<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="name">Branch Name</label>
								   		<input type="text" name="name" class="form-control" placeholder="Branch Name">
								   	</div>
								</div>
						   		<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="type">Bank Name</label>
								   		<select name="bank" class="form-control">

								   			<option>Select Bank</option>
								   			@foreach($banks as $bank)
								   			<option value="{{ $bank->name }}" <?php if($branch->bank==$bank->name) { echo "selected";} ?>>{{ $bank->name }}</option>
								   			@endforeach
								   		</select>
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="maneger">Manager Name</label>
								   		<input type="text" name="maneger" class="form-control" placeholder="Manager Name">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="phone">Phone Number</label>
								   		<input type="text" name="phone" class="form-control" placeholder="Phone Number">
								   	</div>
								</div>
								<div class="col-md-12">
								   	<div class="form-group">
								   		<label for="address">Branch Address</label>
								   		<textarea name="address" class="form-control" id="editor1" placeholder="Place Enter Branch Address here"tyle="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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

