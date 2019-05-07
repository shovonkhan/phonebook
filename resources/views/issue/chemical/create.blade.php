@extends('layouts.main')

@section('main-contain')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chemical Issue Create
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Chemical Issue Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Chemical Issue Create</h3>
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
	              <h3 class="box-title">Chemical Issue Create</h3>
	            </div>
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
	            <!-- /.box-header -->
	            <div class="box-body">
					<form action="{{route('chemicalIssueStore') }}" method="post" accept-charset="utf-8">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label>Date</label>
									<input type="text" class="form-control" name="date" placeholder="Date" id="datepicker" autocomplete="off" value="<?php echo ( date("d/m/Y")) ?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Bill Number</label>
									<input type="text" class="form-control" name="bill" placeholder="Bill Number" readonly="readonly" value="C-<?php echo(rand(100000,999999)); ?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>LOT Number</label>
									<input type="text" class="form-control" name="lot_no" placeholder="LOT NO">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Department Name</label>
									<select class="form-control" name="department">
										<option>Select Department</option>
										<option value="Washing">Washing</option>
										<option value="Finishing">Finishing</option>
										<option value="Dyeing">Dyeing</option>
										<option value="Utility">Utility</option>
									</select>
								</div>
								<input type="hidden" name="status" value="0">
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Product Name</th>
												<th>Qty</th>
												<th style="text-align: center; background: #eee"><a class="addRow" title="" style="cursor:pointer;"><i class="fa fa-plus"></i></a></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<select name="productname[]" class="form-control productname" id="productname">
														<option>Select Product</option>
														@foreach($chemicals as $product)
														<option value="{{ $product->id }}">{{ $product->name }}</option>
														@endforeach
													</select>

												</td>
												<td><input type="text" name="qty[]" class="form-control qty"></td>
												<td><a class="btn btn-danger btn-sm remove"><i class="glyphicon glyphicon-remove"></i></a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<textarea name="remarks" class="form-control" id="editor1" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
	</section>
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
							'<select name="productname[]" class="form-control productname" id="productname">'+
								'<option value="0" selected="true" disabled="true">Select Product</option>'+
								'@foreach($chemicals as $product)'+
									'<option value="{{ $product->id }}">{{ $product->name }}</option>'+
								'@endforeach'+
							'</select>'+

						'</td>'+
						'<td><input type="text" name="qty[]" class="form-control qty"></td>'+
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