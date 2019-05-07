@extends('layouts.main')

@section('main-contain')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Deshboard
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

      <!-- Default box -->
    	<div class="box box-primary">
        	<div class="box-header with-border">
	          <h3 class="box-title">Profile Update</h3>
	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
	              <i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
	              <i class="fa fa-times"></i></button>
	          </div>
        	</div>
        	<div class="box-body">
		        <div class="box">
		            <div class="box-header">
		              <h3 class="box-title">Profile</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form class="form-horizontal" action="{{ URL::to('profile/update') }}" method="post" enctype="multipart/form-data">
		            	@csrf
		              	<div class="box-body">
			              	<div class="col-md-6 col-md-offset-3">
				                <div class="form-group">
				                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

				                  <div class="col-sm-10">
				                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Name" value="{{$profile->name}}">
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="email" class="col-sm-2 control-label">Email</label>

				                  <div class="col-sm-10">
				                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{$profile->email}}">
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="phone" class="col-sm-2 control-label">Phone</label>

				                  <div class="col-sm-10">
				                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{$profile->phone}}">
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="avatar" class="col-sm-2 control-label">Profile Image</label>

				                  <div class="col-sm-10">
				                  	<img src="{{ URL::to($profile->avatar) }}" style="width:80px; height: 80px;">
				                    <input type="file" name="avatar" class="form-control" id="phpto" accept="image/*" onchange="readURL(this);">
				                    <img id="image" src="#" />
				                  </div>
				                </div>
				                <div class="form-group">
		                            <input type="hidden" name="old_photo" value="{{ $profile->avatar }}">
		                        </div>
				                <div class="form-group">
				                  <label for="email" class="col-sm-2 control-label">facebook</label>

				                  <div class="col-sm-10">
				                    <input type="facebook" name="facebook" class="form-control" id="facebook" placeholder="facebook">
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="email" class="col-sm-2 control-label">twitter</label>

				                  <div class="col-sm-10">
				                    <input type="twitter" name="twitter" class="form-control" id="twitter" placeholder="twitter">
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="email" class="col-sm-2 control-label">linkedin</label>

				                  <div class="col-sm-10">
				                    <input type="linkedin" name="linkedin" class="form-control" id="linkedin" placeholder="linkedin">
				                  </div>
				                </div>
				                <div class="form-group">
				                  <label for="email" class="col-sm-2 control-label">google_plus</label>

				                  <div class="col-sm-10">
				                    <input type="google_plus" name="google_plus" class="form-control" id="google_plus" placeholder="google_plus">
				                  </div>
				                </div>
			              	</div>
		              	</div>
		              <!-- /.box-body -->
		              <div class="box-footer">
		                <a href="#" class="btn btn-default">Cancel</a>
		                <button type="submit" class="btn btn-info pull-right">Update</button>
		              </div>
		              <!-- /.box-footer -->
		            </form>
		        </div>
    		</div>
		</div>
	</section>
</div>
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
@endsection
