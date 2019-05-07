
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
		                  <h3 class="box-title">Add a new Receive</h3>
		                </div>
		                <!-- /.box-header -->
		                <!-- /.box-header -->
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
							<form action="{{route('fabric_delivery.store')}}" method="post" accept-charset="utf-8">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-lg-2">
									<div class="form-group">
										<label>Date</label>
										<input type="text" class="form-control" name="date" placeholder="Date" id="datepicker" autocomplete="off" value="<?php echo date('d/m/Y'); ?>">
										<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label>Bill Number</label>
										<input type="text" class="form-control" name="bill_number" placeholder="Bill Number" value="BF-<?php echo mt_rand(100000,999999);?>">
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label>Challan Number</label>
										<input type="text" class="form-control" name="challan_number" placeholder="Challan Number" value="CF-<?php echo mt_rand(100000,999999);?>">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>LC Number</label>
										<input type="text" class="form-control" name="lc_no" placeholder="LC NO">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Customer Name</label>
										<select class="form-control select2" name="manufacture_id">
											<option>Select Customer</option>
											{{-- @foreach($manufacture as $manufacture)
											<option value="{{ $manufacture->id }}">{{ $manufacture->manufacture_name }}</option>
											@endforeach --}}
										</select>
										{{-- <input type="text" class="form-control" name="customer" placeholder="Customer Name"> --}}
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>Qty</th>
													<th>Price</th>
													<th>Amount</th>
													<th style="text-align: center; background: #eee"><a class="addRow" title="" style="cursor:pointer;"><i class="fa fa-plus"></i></a></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td width="25%">
														<select name="fabric_id[]" class="form-control productname" id="productname">
															<option>Select Product</option>
															@foreach($fabrics as $product)
															<option value="{{ $product->id }}">{{ $product->fabric_code }}</option>
															@endforeach
														</select>

													</td>
													<td><input type="text" name="qty[]" class="form-control qty"></td>
													<td><input type="text" name="price[]" class="form-control price"></td>
													{{-- <td><input type="text" name="dis[]" class="form-control dis"></td> --}}
													<td><input type="text" name="amount[]"  readonly="readonly" class="form-control amount" style="background:#fff; cursor: default;"></td>
													<td><a class="btn btn-danger btn-sm remove"><i class="glyphicon glyphicon-remove"></i></a></td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td style="border:none;"></td>
													<td style="border:none;"></td>
													<td style="border:none;"></td>
													<td><b>Total</b></td>
													<td><b class="total"></b></td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<input type="submit" class="btn btn-info btn-sm" value="Save">
									</div>
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
		$('tbody').delegate('.productname','change',function(){
			var tr = $(this).parent().parent();
			var id = tr.find('.productname').val();
			var dataId = {'id':id};
			$.ajax({
				type 	: 'GET',
				url		: '{{ URL::route('findPrices') }}',
				dataType: 'json',
				data 	:dataId,
				success : function(data){
					tr.find('.price').val(data.price);
				}
			});
			tr.find('.qty').focus();
		});
		$('tbody').delegate('.productname','change',function(){
			var tr = $(this).parent().parent();
			tr.find('.qty').focus();
		});
		$('tbody').delegate('.qty,.price','keyup',function(){
			var tr = $(this).parent().parent();
			var qty = tr.find('.qty').val();
			var price = tr.find('.price').val();
			// var dis = tr.find('.dis').val();
			var amount = (qty * price);
			// var amount = (qty * price) - (qty * price * dis)/100;
			tr.find('.amount').val(amount);
			total();
		});
		$('.addRow').on('click', function(){
			addRow();
		});
		// call funtion number ==============================================
		findRowNumOnly('.qty');
		findRowNum('.price');
		// findRowNumOnly('.dis');
		numberOnly('#phone');
		// create function by user ==========================================
		function total(){
			var total = 0;
			$('.amount').each(function(i,e){
				var amount = $(this).val()-0;
				total += amount;
			})
			$('.total').html(total.formatMoney(2,',','.') + " $");
			
		};
		// Number Format ==============================================================
		Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator){
			var n = this,
				decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
				decSeparator = decSeparator == undefined ? "." : decSeparator,
				thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
				sign = n < 0 ? "-" : "",
				i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
				j = (j = i.length) > 3 ? j % 3 : 0;
			return sign + (j ? i.substr(0, j) + thouSeparator : "")
			+ i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator)
			+ (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
		};
		// Find Element by row ===========================================
		function findRowNum(input)
		{
			$('tbody').delegate(input,'keydown',function(){
				var tr = $(this).parent().parent();
				number(tr.find(input));
			});
		};
		function findRowNumOnly(input)
		{
			$('tbody').delegate(input,'keydown',function(){
				var tr = $(this).parent().parent();
				numberOnly(tr.find(input));
			});
		}
		// number and dot ============================================================
		function number(input){
			$(input).keypress(function(evt){
				var theEvent = evt || window.event;
				var key = theEvent.keyCode || theEvent.which;
				key = String.fromCharCode(key);
				var regex = /[-\d\.]/;
				var objRegex = /^-?\d*[\.]?\d*$/;
				var val = $(evt.target).val();
				if(!regex.test(key) || !objRegex.test(val+key) || 
					!theEvent.keyCode == 46 || !theEvent.keyCode ==8){
					theEvent.returnValue = false;
					if (theEvent.preventDefault) theEvent.preventDefault();
				};

			});
		};
		// number only =====================================================
		function numberOnly(input){
			$(input).keypress(function(evt){
				var e = event || evt;
				var charCode = e.which || e.keyCode;
				if(charCode > 31 && (charCode < 48 || charCode > 57))
					return false;
					return true;
			});
		};
		// ====================================================================
		function addRow()
		{
			var tr = '<tr>'+
						'<td>'+
							'<select name="fabric_id[]" class="form-control productname" id="productname">'+
								'<option value="0" selected="true" disabled="true">Select Product</option>'+
								'@foreach($fabrics as $product)'+
									'<option value="{{ $product->id }}">{{ $product->fabric_code }}</option>'+
								'@endforeach'+
							'</select>'+

						'</td>'+
						'<td><input type="text" name="qty[]" class="form-control qty"></td>'+
						'<td><input type="text" name="price[]" class="form-control price"></td>'+
						'<td><input type="text" name="amount[]" class="form-control amount" readonly="readonly" style="background:#fff; cursor: default;"></td>'+
						'<td><a class="btn btn-danger btn-sm remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
					'</tr>';
			$('tbody').append(tr);
		};
		// End function created by user ==========================================
		// $('.remove').live('click', function(){
		// 	$(this).parent().parent().remove();
		// 	// alert('Ok Done!');
		// });

		$('body').delegate('.remove','click',function(){
			// alert('Ok Done!');
			var l = $('tbody tr').length;
			if (l==1) {
				alert('You can not Remove last one');
			}else{
				$(this).parent().parent().remove();
				total();
			}
		});
	</script>

	<script src="{{ asset('public/admin/numberToWord.js') }}"></script>
	
	<script>

	$(document).ready(function($)
	{

		$(document).on('click', '.btn_get_word', function(event) 
		{
			event.preventDefault();
			
			var get_num = $('.get_num').val();
			
			if(get_num)
			{
				//will convert numbers into words:
				var num_to_words = toWords(get_num);
				
				var d = '<div class="num_converted text-success bg-primary" style="padding:5px;">'+num_to_words+'</div>'
				$(document).find('.num_converted').html(d)
			}


		})
		 

	});
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

