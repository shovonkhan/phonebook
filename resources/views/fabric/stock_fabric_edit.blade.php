
@extends('layouts.main')

@section('main-contain')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- bootstrap datepicker -->
  {{-- <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fabric Deshboard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fabric page</li>
      </ol>
    </section>

	<!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
              		<div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Add a new Fabric</h3>
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
							<form action="{{ route('fabric_stock.update',$fabric_stock->id) }}" method="post">
							   {{ csrf_field() }}
							   {{ method_field('PUT') }}
							   	<table class="table table-bordered">
									<thead>
										<tr>
											<th>Date</th>
											<th>Fabric Code</th>
											<th>Receive</th>
											<th>Openign Stock</th>
											<th>Grade</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input type="text" name="date" class="form-control" placeholder="Date" id="datepicker" autocomplete="off" value="{{ $fabric_stock->date }}">
											</td>
											<td width="25%">
											   	<select name="fabric_code" class="form-control productname" id="productname">
											   		<option value="0" selected="ture" disabled="true">Select Fabric Code</option>
											   		@foreach($fabrics as $fabric)
											   		<option value="{{ $fabric->id }}" @if($fabric_stock->fabric_code == $fabric->id) selected @endif >{{ $fabric->fabric_code }}</option>
											   		@endforeach
											   	</select>
											</td>
											<td><input type="text" name="receive" class="form-control receive" value="{{ $fabric_stock->receive }}"></td>
											<td><input type="text" name="opening_stock" class="form-control opening_stock" value="{{ $fabric_stock->opening_stock }}"></td>
											<td>
											   	<select name="grade" class="form-control">
											   		<option value="A" @if($fabric_stock->grade == 'A') selected @endif >A</option>
											   		<option value="B" @if($fabric_stock->grade == 'B') selected @endif >B</option>
											   		<option value="C" @if($fabric_stock->grade == 'C') selected @endif >C</option>
											   		<option value="Cut Pices" @if($fabric_stock->grade == 'Cut Pices') selected @endif >Cut Pices</option>
											   		<option value="Sort Pices" @if($fabric_stock->grade == 'Sort Pices') selected @endif >Sort Pices</option>
											   	</select>
											   	</td>
											<td><input type="text" name="total_stock"  readonly="readonly" class="form-control total_stock" style="background:#fff; cursor: default;" value="{{ $fabric_stock->total_stock }}"></td>
										</tr>
									</tbody>
								</table>
								<div class="col-md-12">
								   	<div class="form-group">
								   		<input type="submit" class="btn btn-success">
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
	<script src="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
	
	<script type="text/javascript">
		$('tbody').delegate('.productname','change',function(){
			var tr = $(this).parent().parent();
			var id = tr.find('.productname').val();
			var dataId = {'id':id};
			$.ajax({
				type 	: 'GET',
				url		: '{{ URL::route('findFbric') }}',
				dataType: 'json',
				data 	:dataId,
				success : function(data){
					tr.find('.opening_stock').val(data.opening_stock);
				}
			});
			tr.find('.receive').focus();
		});
		$('tbody').delegate('.productname','change',function(){
			var tr = $(this).parent().parent();
			tr.find('.receive').focus();
		});
		$('tbody').delegate('.receive,.opening_stock','keyup',function(){
			var tr = $(this).parent().parent();
			var receive = tr.find('.receive').val();
			var opening_stock = tr.find('.opening_stock').val();
			// var dis = tr.find('.dis').val();
			var total_stock = parseInt(receive) + parseInt(opening_stock);
			tr.find('.total_stock').val(total_stock);
			total();
		});
		// call funtion number ==============================================
		findRowNumOnly('.receive');
		findRowNum('.opening_stock');
		// findRowNumOnly('.dis');
		numberOnly('#phone');
		// create function by user ==========================================
		function total(){
			var total = 0;
			$('.total_stock').each(function(i,e){
				var total_stock = $(this).val()-0;
				total += total_stock;
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
		
	</script>

@endsection

