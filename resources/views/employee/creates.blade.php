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
          <!-- Custom Tabs -->
          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Employee Info</a></li>
              <li><a href="#tab_2" data-toggle="tab">Office Info</a></li>
              <li><a href="#tab_3" data-toggle="tab">Bank Info</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>

            <form action="{{ url('/update-employee/'.$edit->id) }}" method="post" enctype="multipart/form-data">
            	@csrf
            	{{-- {{ method_field('PUT') }} --}}
            <div class="tab-content">
            	
            	<div class="tab-pane active" id="tab_1">
                	<div class="box-body">
	                    <div class="col-lg-offset-1 col-lg-10">
	                        <div class="form-group">
	                          <label for="employee_name">Employee Name</label>
	                          <input type="text" name="employee_name" class="form-control" id="employee_name" placeholder="Employee Name" value="{{ $edit->employee_name }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="email">Employee Email</label>
	                          <input type="text" name="email" class="form-control" id="email" placeholder="Employee email" value="{{ $edit->email }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="phone">Employee Phone</label>
	                          <input type="text" name="phone" class="form-control" id="phone" placeholder="Employee Phone" value="{{ $edit->phone }}">
	                        </div>
	                        <div class="form-group col-md-4">
	                        	<label for="street">Street</label>
	                        	<input type="text" name="street" class="form-control" id="street" placeholder="Employee street" value="{{ $edit->street }}">
	                        </div>
	                        <div class="form-group col-md-3">
	                          <label for="town">City</label>
	                          <input type="text" name="town" class="form-control" id="town" placeholder="Employee City" value="{{ $edit->town }}">
	                        </div>
	                        <div class="form-group col-md-3">
	                          <label for="district">District</label>
	                          <input type="text" name="district" class="form-control" id="district" placeholder="Employee district" value="{{ $edit->district }}">
	                        </div>
	                        <div class="form-group col-md-2">
	                          <label for="postcode">Postal Code</label>
	                          <input type="number" name="postcode" class="form-control" id="postcode" placeholder="postcode" value="{{ $edit->postcode }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="dob">Date Of Birth</label>
	                          <input type="text" name="dob" class="form-control" id="datepicker" placeholder="Date Of Birth" autocomplete="off" value="{{ $edit->dob }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="nid_no">NID</label>
	                          <input type="text" name="nid_no" class="form-control" id="nid_no" placeholder="NID" value="{{ $edit->nid_no }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="description">Description</label>
	                          <textarea id="editor1" name="description" placeholder="Place some text description here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
	                          	{{ $edit->description }}
	                          </textarea>
	                        </div>
	                        <div class="form-group">
	                          <label for="photo">Profile Picture</label>
	                          <br>
	                          <img id="image" src="#" />
	                          <input type="file" name="photo" class="form-control" id="photo" accept="image/*" onchange="readURL(this);">
	                          <img src="{{URL::to($edit->photo)}}" class="thumbnail" style="width: 80px; height: 100px;">
	                        </div>
	                        
	                    </div>
	                </div>
            	</div>
              <!-- /.tab-pane -->
            	<div class="tab-pane" id="tab_2">
                	<div class="box-body">
	                    <div class="col-lg-offset-2 col-lg-8">
	                        <div class="form-group">
	                          <label for="emp_no">Employee ID</label>
	                          <input type="text" name="emp_no" class="form-control" id="emp_no" placeholder="Employee ID" value="{{ $edit->emp_no }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="id_no">Identification No</label>
	                          <input type="text" name="id_no" class="form-control" id="id_no" placeholder="Identification No" value="{{ $edit->id_no }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="join_date">Joining Date</label>
	                          <input type="text" name="join_date" class="form-control" id="datepickerJ" placeholder="Joining Date" autocomplete="off" value="{{ $edit->join_date }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="concern">Concern</label>
	                          <input type="text" name="concern" class="form-control" id="concern" placeholder="Concern" value="{{ $edit->concern }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="experience">Expeience</label>
	                          <input type="text" name="experience" class="form-control" id="experience" placeholder="Expeience" value="{{ $edit->experience }}">
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
	                          <input type="checkbox" name="dept_head" value="1"> Department Head
	                        </div>
	                        <div class="form-group">
	                          <label for="salary">Salary</label>
	                          <input type="text" name="salary" class="form-control" id="salary" placeholder="Salary" value="{{ $edit->salary }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="vacation">Vacation</label>
	                          <input type="text" name="vacation" class="form-control" id="vacation" placeholder="Vacation" value="{{ $edit->vacation }}">
	                        </div>
	                    </div>
	                </div>
            	</div>
              <!-- /.tab-pane -->
            	<div class="tab-pane" id="tab_3">
                	<div class="box-body">
	                    <div class="col-lg-offset-2 col-lg-8">
	                        <div class="form-group">
	                          <label for="account_holder">Bank Name</label>
	                          <input type="text" name="account_holder" class="form-control" id="account_holder" placeholder="Bank Name" value="{{ $edit->account_holder }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="acc_no">Account No</label>
	                          <input type="number" name="acc_no" class="form-control" placeholder="Account No" value="{{ $edit->acc_no }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="branch">Branch</label>
	                          <input type="text" name="branch" class="form-control" placeholder="Branch Name" value="{{ $edit->branch }}">
	                        </div>
	                        <div class="form-group">
	                          <label for="city">City</label>
	                          <input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{ $edit->city }}">
	                        </div>
	                    </div>
	                </div>
            	</div>
              <!-- /.tab-pane -->
	            <button type="submit" class="btn btn-primary">Update</button>
	            <a href="{{ route('employee')}}" class=" btn btn-warning pull-right">Back</a>
            </div>
            <!-- /.tab-content -->
        	</form>
          </div>
          <!-- nav-tabs-custom -->
        </div>

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