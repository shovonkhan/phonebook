
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
                      	<form action="{{ route('stock.store') }}" method="post" enctype="multipart/form-data">
                        	{{ csrf_field() }}

        				  	<div class="col-md-12 text-center">
                        		<h3>Program Information</h3>
                        		<hr/>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="date">Date</label>
                        			<input type="text" name="date" class="form-control" value="{{ date("d/m/Y") }}">
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="department">Department</label>
                        			<input type="text" name="department" class="form-control" placeholder="Department">
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="items">Items</label>
                        			<select name="items" class="form-control">
                        				@foreach($chemicals as $chemical)
                        					<option value="{{ $chemical->name }}">{{ $chemical->name }}</option>
                        				@endforeach
                        				
                        			</select>
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="invoic_no">invoic_no Name</label>
                        			<input type="text" name="invoic_no" class="form-control" placeholder="invoic_no Name">
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="company">company</label>
                        			<input type="nunbar" name="company" class="form-control" placeholder="Total Yarn">
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="weight">weight</label>
                        			<input type="text" name="weight" class="form-control" placeholder="Total weight">
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="as_weight">Warpping Length</label>
                        			<select name="as_weight" class="form-control">
                        				<option value="kg">Kg</option>
                        				<option value="ton">Ton</option>
                        				<option value="dram">Dram</option>
                        				<option value="liter">Liter</option>
                        				<option value="ml">ml</option>
                        			</select>
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="opping_stock">opping_stockt</label>
                        			<input type="text" name="opping_stock" class="form-control" placeholder="opping_stock">
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="closing_stock">closing_stock</label>
                        			<input type="text" name="closing_stock" class="form-control" placeholder="closing_stock">
                        		</div>
                        	</div>
        	                <div class="col-md-12">
        	                    <div class="form-group">
        	                      <label for="remark">Remarks</label>
        	                      <textarea name="remark" class="form-control" id="editor1" placeholder="Place some text here"
        	                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
        $('tbody').delegate('.productname','change',function(){
            var tr = $(this).parent().parent();
            var id = tr.find('.productname').val();
            var dataId = {'id':id};
            $.ajax({
                type    : 'GET',
                url     : '{{ URL::route('findStock') }}',
                dataType: 'json',
                data    :dataId,
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

