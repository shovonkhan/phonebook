<!DOCTYPE html>
<html>
	<head>
	  <title>Bank Add</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" /> --}}
	  <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
	  <script src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
	  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" /> --}}
	  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" /> --}}
	  {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
	  {{-- <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script> --}}
	  {{-- <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script> --}}
	  {{-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> --}}
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			{{-- Main Navbar start --}}
			@include('navbar')
			{{-- Main Navbar end --}}
		</div>
	<div class="container box">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<section class="panel">
					<div class="panel panel-footer">
						<header id="header" class="panel panel-default">
							<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#new-product-add">Add New Product</button> <h2>If Your not add product please first add</h2>
						</header><!-- /header -->
					</div>
					<div class="panel panel-footer">
						@include('invoice.add_new_product')
						<form action="{{URL::route('insert') }}" method="post" accept-charset="utf-8">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label>LC Type</label>
										<input type="text" class="form-control" name="lc_type" placeholder="LC Type">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Master LC</label>
										<input type="text" class="form-control" name="master_lc_no" placeholder="LC NO">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>LC Date</label>
										<input type="date" class="form-control" name="lc_date" placeholder="LC Date">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Customer Name</label>
										<select class="form-control" name="customer">
											<option>Select Customer</option>
											@foreach($product_list as $product)
											<option value="{{ $product->company }}">{{ $product->company }}</option>
											@endforeach
										</select>
										{{-- <input type="text" class="form-control" name="customer" placeholder="Customer Name"> --}}
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>LC Value</label>
										<input type="text" class="form-control" name="lc_value" placeholder="LC Value">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Buyer Name</label>
										<input type="text" class="form-control" name="pi_to" placeholder="PI From">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>PI Date</label>
										<input type="date" class="form-control" name="pi_date" placeholder="PI Date">
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<label>PI NO</label>
										<input type="text" class="form-control" name="pi_no" placeholder="PI NO">
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<label>PI Value</label>
										<input type="number" class="form-control" name="total_amount" placeholder="PI Total Value">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Authoraization</label>
										<input type="text" class="form-control" name="auth_date" placeholder="Authoraization Date">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<textarea name="description" class="form-control" id="editor1" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<input type="submit" class="btn btn-info btn-sm" value="Save">
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
													<th>Dis</th>
													<th>Amount</th>
													<th style="text-align: center; background: #eee"><a class="addRow" title="" style="cursor:pointer;"><i class="fa fa-plus"></i>add</a></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td width="25%">
														<select name="productname[]" class="form-control productname" id="productname">
															<option value="0" selected="ture" disabled="true">Select Product</option>
															@foreach($product_list as $product)
															<option value="{{ $product->id }}">{{ $product->productname }}</option>
															@endforeach
														</select>

													</td>
													<td><input type="text" name="qty[]" class="form-control qty"></td>
													<td><input type="text" name="price[]" class="form-control price"></td>
													<td><input type="text" name="dis[]" class="form-control dis"></td>
													<td><input type="text" name="amount[]"  readonly="readonly" class="form-control amount" style="background:#fff; cursor: default;"></td>
													<td><a href="#" class="btn btn-danger btn-sm remove"><i class="glyphicon glyphicon-remove"></i></a></td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td style="border:none;"></td>
													<td style="border:none;"></td>
													<td style="border:none;"></td>
													<td><b>Total</b></td>
													<td><b class="total"></b></td>
													<td></td>
												</tr>
											</tfoot>
										</table>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3>Demo - Convert Number Into Words</h3>
											</div>
											<div class="panel-body">
												<div class="col1-md-3">
													<label for="ex1">Enter Your Number Below</label>
													<input class="form-control get_num total" type="number" style="max-width: 250px;">
													<br>
													<span class="btn btn-success btn_get_word">Convert To Word</span>
												</div>
												<br>
												<div class="num_converted">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</section>
				
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$('tbody').delegate('.productname','change',function(){
			var tr = $(this).parent().parent();
			var id = tr.find('.productname').val();
			var dataId = {'id':id};
			$.ajax({
				type 	: 'GET',
				url		: '{{ URL::route('findPrice') }}',
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
		$('tbody').delegate('.qty,.price,.dis','keyup',function(){
			var tr = $(this).parent().parent();
			var qty = tr.find('.qty').val();
			var price = tr.find('.price').val();
			var dis = tr.find('.dis').val();
			var amount = (qty * price) - (qty * price * dis)/100;
			tr.find('.amount').val(amount);
			total();
		});
		$('.addRow').on('click', function(){
			addRow();
		});
		// call funtion number ==============================================
		findRowNumOnly('.qty');
		findRowNum('.price');
		findRowNumOnly('.dis');
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
							'<select name="productname[]" class="form-control productname" id="productname">'+
								'<option value="0" selected="true" disabled="true">Select Product</option>'+
								'@foreach($product_list as $product)'+
									'<option value="{{ $product->id }}">{{ $product->productname }}</option>'+
								'@endforeach'+
							'</select>'+

						'</td>'+
						'<td><input type="text" name="qty[]" class="form-control qty"></td>'+
						'<td><input type="text" name="price[]" class="form-control price"></td>'+
						'<td><input type="text" name="dis[]" class="form-control dis"></td>'+
						'<td><input type="text" name="amount[]" class="form-control amount" readonly="readonly" style="background:#fff; cursor: default;"></td>'+
						'<td><a href="#" class="btn btn-danger btn-sm remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
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

	<script src="{{ asset('admin/numberToWord.js') }}"></script>
	
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

 </body>
</html>

