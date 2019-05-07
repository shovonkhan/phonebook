
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
				url		: '{{ URL::route('findStock') }}',
				dataType: 'json',
				data 	:dataId,
				success : function(data){
					tr.find('.opening_stock').val(data.opening_stock);
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
@endsection