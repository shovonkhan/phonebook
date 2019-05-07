@extends('layouts.main')

@section('main-contain')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Profile
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Profile</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <table class="table table-bordered" border="2">
                		<tr class="text-center">
                			<td colspan="2"><img src="{{ URL::to($profile->avatar) }}" style="width: 300px; height: 300px;"></td>
                		</tr>
                		<tr>
                			<th>Name</th>
                			<td>{{ $profile->name }}</td>
                		</tr>
                		<tr>
                			<th>Email</th>
                			<td>{{ $profile->email }}</td>
                		</tr>
                    <tr>
                      <th>Phone</th>
                      <td>{{ $profile->phone }}</td>
                    </tr>
                		<tr>
                			<th>User Type</th>
                			<td>{{ $profile->user_type }}</td>
                		</tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection