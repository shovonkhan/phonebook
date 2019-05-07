@extends('layouts.main')

@section('main-contain')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Deshboard
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
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
            <!-- form start -->
            <form role="form" action="{{ url('/update-employee/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="col-lg-offset-2 col-lg-8">
                    <div class="form-group">
                      <label for="employee_name">Employee Name</label>
                      <input type="text" name="employee_name" class="form-control" id="employee_name" placeholder="Employee Name" value="{{ $edit->employee_name }}">
                    </div>
                    <div class="form-group">
                      <label for="email">Employee Email</label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Employee email">
                    </div>
                    <div class="form-group">
                      <label for="phone">Employee Phone</label>
                      <input type="text" name="phone" class="form-control" id="phone" placeholder="Employee Phone">
                    </div>
                    <div class="form-group">
                      <label for="address">Employee Address</label>
                      <input type="text" name="address" class="form-control" id="address" placeholder="Employee Address">
                    </div>
                    <div class="form-group">
                      <label for="expeience">Expeience</label>
                      <input type="text" name="experience" class="form-control" id="expeience" placeholder="Expeience">
                    </div>
                    <div class="form-group">
                      <label for="dip_id">Dipartment</label>
                      <select  name="dip_id" class="form-control">
                      	<option>Select One</option>
                      	@foreach($dipartment as $dip)
                      	<option value="{{$dip->id}}">{{$dip->name}}</option>
                      	@endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="expeience">Designation</label>
                      <select  name="disg_id" class="form-control">
                      	<option>Select One</option>
                      	@foreach($designation as $desi)
                      	<option value="{{$desi->id}}">{{$desi->name}}</option>
                      	@endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nid_no">NID</label>
                      <input type="text" name="nid_no" class="form-control" id="nid_no" placeholder="NID">
                    </div>
                    <div class="form-group">
                      <label for="salary">Salary</label>
                      <input type="text" name="salary" class="form-control" id="salary" placeholder="Salary">
                    </div>
                    <div class="form-group">
                      <label for="vacation">Vacation</label>
                      <input type="text" name="vacation" class="form-control" id="vacation" placeholder="Vacation">
                    </div>
                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" name="city" class="form-control" id="city" placeholder="City">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea id="editor1" name="description" placeholder="Place some text description here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="photo">Profile Picture</label>
                      <br>
                      <img id="image" src="#" />
                      <input type="file" name="photo" class="form-control" id="photo" accept="image/*"  required onchange="readURL(this);">
                    </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-primary">Update</button>
                     <a href="{{ route('bank.index')}}" class=" btn btn-warning">Back</a>
                   </div>
                </div>
              </div>
              <!-- /.box-body -->

              
            </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
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
