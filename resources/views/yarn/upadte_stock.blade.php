@extends('layouts.main')

@section('main-contain')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Department
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Yarn Stock</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>
          <a href="{{ URL::to('yarnstock/create')}}" class="col-lg-offset-5 btn btn-info">Add New</a>

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
              <h3 class="box-title">Yarn Stock</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<form action="{{ route('yarnstock.update', $yarn->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					{{-- {{ method_field('PUT') }} --}}
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Yarn Name</label>
							<input type="text" class="form-control" placeholder="{{ $yarn->yarn_name }}" readonly="readonly">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Manufacture Name</label>
							<input type="text" class="form-control" placeholder="{{ $yarn->company_name }}" readonly="readonly" value="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Opening Stock</label>
							<input type="text" id="opening_stock" class="form-control" placeholder="Yarn Name" readonly="readonly" value="{{ $yarn->opening_stock }}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Add Stock</label>
							<input type="text" id="add_new_stock" class="form-control"  onkeyup=" add_stock(); " onkeypress="return numbersonly(event);" placeholder="Add Stock">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">New Stock</label>
							<input type="text" id="new_stock" name="opening_stock" class="form-control" readonly="readonly" placeholder="New Stock" value="{{ $yarn->opening_stock }}">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-success">Add Stock</button>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
</section>
</div>

<script type="text/javascript">
	function add_stock(){
		if (document.getElementById('opening_stock').value != "" && document.getElementById('add_new_stock').value != "") {
			data = parseFloat(document.getElementById('opening_stock').value);
                document.getElementById('new_stock').value = data + parseFloat(document.getElementById('add_new_stock').value);

		}else {
                document.getElementById('new_stock').value = "";
        }
	}
</script>
@endsection