
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- bootstrap datepicker -->
  {{-- <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"> --}}
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
			            <div class="box-body">
				            <!-- form start -->
					  		<?php 
					  		$contents = Cart::content();
								//echo "<pre>";
								//print_r($contents);
								//echo "</pre>";
							?>
		  					<div class="panel panel-primary">
		  						<div class="panel-heading">
		  							<h2>PROFORMA INVOICE</h2>
		  						</div>
		  						<div class="panel-body">
		  							@include('includes.messages')
		  							@include('lc.add_cart')
		  							@include('lc.master_lc_info')
									<form action="{{ route('lc.store') }}" method="post" enctype="multipart/form-data">
								   		{{ csrf_field() }}
										<div class="col-md-12">
											<table class="table table-condensed table-bordered">
												<thead>
													<tr class="cart_menu">
														<td class="id">Product ID</td>
														<td class="description">Name</td>
														<td class="price">Price</td>
														<td class="quantity">Quantity</td>
														<td class="total">Total</td>
														<td>Action</td>
													</tr>
												</thead>
												<tbody>
													@foreach($contents as $content)
													<tr>
														<td class="cart_id">
															<input type="text" readonly="readonly" name="product_id[]" value="{{ $content->id }}">
														</td>
														<td class="cart_description">
															<input type="text" readonly="readonly" class="cart_total_price" name="items[]" value="{{ $content->name }}">
														</td>
														<td class="cart_price">
															<input type="text" readonly="readonly" class="cart_total_price" name="rate[]" value="{{ $content->price }}">
															<p> tk</p>
														</td>
														<td class="cart_quantity">
															<input class="cart_quantity_input" type="number" name="qty[]" value="{{ $content->qty }}" autocomplete="off" size="2" style="width: 50px;">
														</td>
														<td class="cart_total">
															<input type="text" readonly="readonly" class="cart_total_price" name="amount[]" value="{{ $content->total }}">
														</td>
														<td class="cart_delete">
															<a class="cart_quantity_delete" href="{{ URL::to('/delete-to-cart/'.$content->rowId) }}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>Delete</a>
														</td>
													</tr>
													@endforeach
													<tr>
														<td colspan="4">Total</td>
														<td><input type="text" readonly="readonly" name="total_amount[]" value="{{ Cart::subtotal() }}"></td>
														<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add</button></td>
													</tr>
												</tbody>
											</table>
										</div>
										{{-- <div class="col-md-12">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Master LC</button>
										</div> --}}
								   		<div class="col-md-4">
										   	<div class="form-group">
										   		<label for="lc_type">LC Type</label>
										   		<input type="text" name="lc_type" class="form-control" placeholder="LC Type">
										   	</div>
										</div>
										<div class="col-md-3">
										   	<div class="form-group">
										   		<label for="master_lc_no">Master LC No</label>
										   		<select name="master_lc_no" class="form-control">
										   			<option value="">select one</option>
										   			@foreach($master_lc_no as $master)
														<option value="{{ $master->master_lc_id }}">{{ $master->customer }}</option>
										   			@endforeach
										   		</select>
										   	</div>
										</div>
										<div class="col-md-1">
											<div style="padding-top: 25px;">
												<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#master-lc-info">new create</button>
											</div>
										</div>
										<div class="col-md-4">
										   	<div class="form-group">
										   		<label for="lc_date">LC Date</label>
										   		<input type="text" name="lc_date" class="form-control" placeholder="lc_date">
										   	</div>
										</div>
										<div class="col-md-4">
										   	<div class="form-group">
										   		<label for="customer">Customer</label>
										   		<input type="text" name="customer" class="form-control" placeholder="Customer Name">
										   	</div>
										</div>
										<div class="col-md-4">
										   	<div class="form-group">
										   		<label for="lc_value">lc_value</label>
										   		<input type="text" name="lc_value" class="form-control" placeholder="lc_value">
										   	</div>
										</div>
										<div class="col-md-4">
										   	<div class="form-group">
										   		<label for="pi_to">PI From</label>
										   		<input type="text" name="pi_to" class="form-control" placeholder="PI From">
										   	</div>
										</div>
										<div class="col-md-4">
										   	<div class="form-group">
										   		<label for="pi_no">PI NO</label>
										   		<input type="text" name="pi_no" class="form-control" placeholder="PI NO">
										   	</div>
										</div>
										<div class="col-md-4">
										   	<div class="form-group">
										   		<label for="pi_date">PI Date</label>
										   		<input type="text" name="pi_date" class="form-control" placeholder="PI Date">
										   	</div>
										</div>
										<div class="col-md-4">
										   	<div class="form-group">
										   		<label for="auth_date">Authoraization Date</label>
										   		<input type="text" name="auth_date" class="form-control" placeholder="Authoraization Date">
										   	</div>
										</div>
										<div class="col-md-12">
										   	<div class="form-group">
										   		<label for="description">Description</label>
										   		<textarea name="description" class="form-control" id="editor1" placeholder="Place some text here"style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
										   	</div>
										</div>
										<div class="col-md-12">
										   	<div class="form-group">
										   		<button type="submit" class="btn btn-success">Save</button>
										   	</div>
										</div>
								   	</form>
		  						</div>
		  					</div>
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

