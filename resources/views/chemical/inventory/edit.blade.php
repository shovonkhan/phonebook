
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- bootstrap datepicker -->
  {{-- <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Receive Create
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
                    <h3 class="box-title">Add Chemical Receive</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- /.box-header -->
                  {{-- @include('employee.includes.messages') --}}
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
              <form action="{{ route('chemical-inventory.update',$chemicalInventory->id) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="date">Date</label>
                      <input type="text" name="date" class="form-control" placeholder="Received Date" id="datepicker" value="{{ $chemicalInventory->date }}">
                    </div>
                </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="chemical_id">Name</label>
                      <select name="chemical_id" class="form-control select2">
                      	<option>Select one</option>
                        @foreach($chemical as $chemi)
                        <option value="{{ $chemi->id }}" <?php if($chemicalInventory->chemical_id == $chemi->id){ echo "selected"; } ?> > {{ $chemi->name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="bill">Bill Number</label>
                      <input type="text" name="bill" class="form-control" placeholder="Bill Number" value="{{ $chemicalInventory->bill }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="challan">Challan Number</label>
                      <input type="text" name="challan" class="form-control" placeholder="Challan Number" value="{{ $chemicalInventory->challan }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="department">Use For Department</label>
                      <select  name="department" class="form-control select2">
                      	<option>Select one</option>
                      @foreach($department as $depart)
                      <option value="{{ $depart->name }}" <?php if($chemicalInventory->department == $depart->name){ echo "selected"; } ?> >{{ $depart->name }}</option>
                      @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="lc_no">LC Number</label>
                      <input type="text" name="lc_no" class="form-control" placeholder="LC Number" value="{{ $chemicalInventory->lc_no }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="qty">Quantity</label>
                      <input type="text" name="qty" class="form-control" placeholder="Quantity" value="{{ $chemicalInventory->qty }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="rate">Rate</label>
                      <input type="text" name="rate" class="form-control" placeholder="Rate" value="{{ $chemicalInventory->rate }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="amount">Amount</label>
                      <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{ $chemicalInventory->amount }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="bags">Bags</label>
                      <input type="text" name="bags" class="form-control" placeholder="Bags" value="{{ $chemicalInventory->bags }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" class="form-control" id="editor1" placeholder="Place some text here"style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      	{{ $chemicalInventory->description }}
                      </textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Update</button>
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

