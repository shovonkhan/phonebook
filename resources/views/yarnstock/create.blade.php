
@extends('layouts.main')

@section('main-contain')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Receive Deshboard
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{URL::to('/yarnstock')}}">Yarn Stock</a></li>
        <li class="active">Add Stock</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
        	<div class="col-md-12">
        		<div class="box box-info">
            		<div class="box box-primary">
		                <div class="box-header with-border">
		                  <h3 class="box-title">Add a new Receive</h3>
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
	  					{{-- @include('includes.messages') --}}
	  					<div class="box-body">
							<form action="{{ route('yarnstock.store') }}" method="post" enctype="multipart/form-data" id="frm-yarn-stock">
						   		{{ csrf_field() }}
						   		<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="date">Receive Date</label>
								   		<input type="date" name="date" class="form-control" placeholder="Yarn Name">
								   	</div>
								</div>
						   		<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="manufacture_id">Company Name</label>
								   		<select name="manufacture_id" class="form-control">
								   			@foreach($manufactures as $company)
											<option value="{{ $company->id }}">{{ $company->manufacture_name }}</option>
								   			@endforeach
								   		</select>
								   	</div>
								</div>
								<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="yarn_id">Yarn Name</label>
								   		<select name="yarn_id" class="form-control select2" id="yarn_id">
								   			<option >Sectect Yarn</option>
								   			@foreach($yarns as $yarn)
											<option value="{{ $yarn->id }}">
												{{ $yarn->yarn_name }}
											</option>
								   			@endforeach
								   		</select>
								   	</div>
								</div>
								<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="rate">Prevus stock</label>
								   		<input type="text" name="rate" class="form-control" placeholder="Rate" id="opening_stock">
								   	</div>
								</div>
								<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="qty">Quantity</label>
								   		<input type="text" name="qty" class="form-control" placeholder="Quantity">
								   	</div>
								</div>
								<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="rate">Rate</label>
								   		<input type="text" name="rate" class="form-control" placeholder="Rate">
								   	</div>
								</div>
								<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="amount">Total Amount</label>
								   		<input type="text" name="amount" class="form-control" placeholder="Total Amount">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="challan">Challan</label>
								   		<input type="text" name="challan" class="form-control" placeholder="Challan">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="bill">Bill Number</label>
								   		<input type="text" name="bill" class="form-control" placeholder="Bill Number">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="lc_no">L/C Number</label>
								   		<input type="text" name="lc_no" class="form-control" placeholder="L/C Number">
								   	</div>
								</div>
								<div class="col-md-12">
								   	<div class="form-group">
								   		<label for="remarks">Remarks</label>
								   		<textarea name="remarks" class="form-control" id="editor1" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
	</section>
</div>

	<script type="text/javascript">
		jQuery(document).ready(function($){
			// alert('hello');
			$('#yarn_id').on('change',function() {
				// var yarn_id = $(this).val();
				alert(this.value);

				// var token = $("input[name='_token']").val();
				// // alert($(this).find(":selected").val());
				// alert(yarn_id);
  		// 		$.ajax({
		  //         url: "{{ route('getPositions') }}",
		  //         method: 'POST',
		  //         data: {yarn_id:yarn_id, _token:token},
		  //         success: function(data) {
		  //           // $("#opening_stock").val('');
		  //           $("#opening_stock").html(data);
		  //           alert(data);
		  //         }
		  //     	});
			});
			
			$.ajaxSetup({
    			headers: {
        			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			}
			});
		})
	</script>
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
