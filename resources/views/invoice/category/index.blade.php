
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
    	<!-- Default box -->
	    <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Title</h3>
	          <a href="{{ route('category.create') }}" class="col-lg-offset-5 btn btn-info">Add New</a>

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
		              <h3 class="box-title">Banks List</h3>
		            </div>
					@include('invoice.category.create_p')
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#new-category-add">Add New Category</button>
							<hr/>
							<table id="example1" class="table table-bordered table-responsive table-hover display">
								<thead>
									<tr>
										<th>category ID</th>
										<th>Category Name</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($categories as $category)
									<tr>
										<td>{{ $category->id }}</td>
										<td>{{ $category->name }}</td>
										<td>{!! htmlspecialchars_decode($category->descripiton) !!}</td>
										<td>
											<a href="{{ route('category.show',$category->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
											<a href="{{ route('category.edit',$category->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

											<a class="btn btn-danger btn-xs" href="{{ route('category.destroy', $category->id) }}" id="delete">
													<i class="fa fa-trash" aria-hidden="true"></i> 
											</a>
											
											{{-- <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="post" style="display: none;">
			                          		{{ csrf_field() }}
			                          		{{ method_field('DELETE') }}
			                          
						                    </form>
						                    <a href="" onclick="
						                         if(confirm('Are you sure, You Want to Delete this?'))
						                         {
						                             event.preventDefault();
						                             document.getElementById('delete-form-{{ $category->id }}').submit();
						                         }
						                         else{
						                             event.preventDefault();
						                         }
						                         " class="btn btn-danger btn-xs" id="delete"><i class="fa fa-trash" aria-hidden="true"></i></a> --}}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js')}}"></script>
		<script>
	        $(document).on("click", "#delete", function(e) {
	        	e.preventDefault();
	        	var link = $(this).attr("href");
	            bootbox.confirm("<h2 class='text-center' style='color:red;font-size:25px; font-weight:bold;'><i class='fa fa-trash' aria-hidden='true' style='width:80px; height:80px; border:1px solid red; border-radius: 50%; font-size:30px; line-height:80px; color:red; margin:0 auto;'></i><br> Are you want to DSelete!", function(confirmed) {
	                if (confirmed) {
	                	window.location.href = link;
	                };
	            });
	        });
	    </script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable( {
		        dom: 'Bfrtip',
		        buttons: [
		            {
		                extend: 'print',
		                customize: function ( win ) {
		                    $(win.document.body)
		                        .css( 'font-size', '10pt' )
		                        .prepend(
		                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
		                        );
		 
		                    $(win.document.body).find( 'table' )
		                        .addClass( 'compact' )
		                        .css( 'font-size', 'inherit' );
		                }
		            }
		        ]
		    } );
		} );
	</script>
@endsection

