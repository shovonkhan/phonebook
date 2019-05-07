
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$chemicalInventory->name}}
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
    	<div class="panel panel-primary">
    		<div class="panel-heading">
    			<h1>{{ $chemicalInventory->name }}<a href="{{ route('chemical-inventory.index')}}" class="pull-right btn btn-default">Back</a></h1>
    			
    		</div>
    		<div class="panel-body">
    			<table class="table table-bordered table-responsive">
    					<tr>
	    					<th>Date</th>
	    					<td>{{ $chemicalInventory->date }}</td>
    					</tr>
    					<tr>

	    					<th>Chemical</th>
    						<td>{{ $chemicalInventory->name }}</td>
	    				</tr>
    					<tr>
	    					<th>Bill Number</th>
    						<td>{{ $chemicalInventory->bill }}</td>
	    				</tr>
    					<tr>
	    					<th>Challan Number</th>
    						<td>{{ $chemicalInventory->challan }}</td>
	    				</tr>
    					<tr>
	    					<th>LC Number</th>
    						<td>{{ $chemicalInventory->lc_no }}</td>
	    				</tr>
    					<tr>
	    					<th>Quantity</th>
    						<td>{{ $chemicalInventory->qty }}</td>
	    				</tr>
    					<tr>
	    					<th>Rate</th>
    						<td>{{ $chemicalInventory->rate }}</td>
	    				</tr>
    					<tr>
	    					<th>Amount</th>
    						<td>{{ $chemicalInventory->amount }}</td>
	    				</tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! htmlspecialchars_decode($chemicalInventory->description) !!}</td>
                        </tr>
    			</table>
    		</div>
    	</div>
    </section>
</div>
@endsection