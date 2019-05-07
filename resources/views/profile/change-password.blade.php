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
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title" >
							Change Password
						</div>
					</div>
					<div class="panel-body">
						<div class="col-md-8">
							@if (session('error'))
							    <div class="alert alert-warning">
							        {{ session('error') }}
							    </div>
							@endif
							@if (session('success'))
								<div class="alert alert-success">
							        {{ session('success') }}
							    </div>
							@endif
							<form action="{{ URL::to('profile/updatepassword') }}" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								@csrf
								<div class="form-group">
									<label class="col-sm-3 control-label">Old Password</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" name="oldpassword" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">New Password</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" name="password" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Confirm Password</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-info">Update Password</button>
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
@endsection

