@extends('layouts.main')

@section('main-contain')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chemical Stock
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Chemical Stock</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Stock Update</h3>
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
            	<form action="{{ route('chemical_stock.update', $chemicals->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					{{-- {{ method_field('PUT') }} --}}
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Chemical Name</label>
							<input type="text" class="form-control" placeholder="{{ $chemicals->name }}" readonly="readonly">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Opening Stock</label>
							<input type="text" id="opening_stock" class="form-control" placeholder="Yarn Name" readonly="readonly" value="{{ $chemicals->opening_stock }}">
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
							<input type="text" id="new_stock" name="opening_stock" class="form-control" readonly="readonly" placeholder="New Stock" value="{{ $chemicals->opening_stock }}">
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