<!DOCTYPE html>
<html>
	<head>
	  <title>Branch</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
 <body>
  <br />
	<div class="container box">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="{{ route('consumption.create') }}" class="btn btn-primary">Add New</a>
				<a href="{{ route('consumption.index') }}" class="btn btn-info">Back</a>
				<a href="{{ route('consumption.edit',$consumption->id) }}" class="btn btn-info">Update</a>
				<hr/>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2>Lot NO : {{ $consumption->lot_no }}</h2>
						<strong>Buyer : {{ $consumption->buyer }}</strong>
					</div>
					<div class="panel-body">
						<div>
						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Program info</a></li>
						    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Dyeing</a></li>
						    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Sizing</a></li>
						    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Shift info</a></li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="home">
						    	<ul class="list-group">
								  <li class="list-group-item list-group-item-success"><span class="badge">{{ $consumption->lot_no }}</span><strong> Lot Number</strong></li>
								  <li class="list-group-item list-group-item-warning"><span class="badge">{{ $consumption->date }}</span><strong>Run Date</strong></li>
								  <li class="list-group-item list-group-item-info"><span class="badge">{{ $consumption->buyer }}</span><strong>Buyer Name</strong></li>
								  <li class="list-group-item list-group-item-danger"><span class="badge">{{ $consumption->color }}</span><strong>Color</strong></li>
								  <li class="list-group-item list-group-item-success"><span class="badge">{{ $consumption->yarn_count }}</span><strong>Yarb Count</strong></li>
								  <li class="list-group-item list-group-item-warning"><span class="badge">{{ $consumption->wp_length }}</span><strong>Warpping Length</strong></li>
								  <li class="list-group-item list-group-item-info"><span class="badge">{{ $consumption->total_yarn }}</span><strong>Total Ends</strong></li>
								  <li class="list-group-item list-group-item-danger"><span class="badge">{{ $consumption->yarn_weight }}</span><strong>Yarn Weight</strong></li>
								  <li class="list-group-item list-group-item-success"><span class="badge">{{ $consumption->t_stop_mark }}</span><strong>Stop Mark</strong></li>
								  <li class="list-group-item list-group-item-warning"><span class="badge">{{ $consumption->dyeing_length }}</span><strong>Dyeing Length</strong></li>
								</ul>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="profile">
						    	<ul class="list-group">
								  <li class="list-group-item list-group-item-success"><span class="badge">{{ $consumption->indigo }}</span><strong>Indigo</strong></li>
								  <li class="list-group-item list-group-item-info"><span class="badge">{{ $consumption->hydrose }}</span><strong>Hydrose</strong></li>
								  <li class="list-group-item list-group-item-warning"><span class="badge">{{ $consumption->s_black }}</span><strong>Sulphar Black</strong></li>
								  <li class="list-group-item list-group-item-danger"><span class="badge">{{ $consumption->caustic }}</span><strong>Caustic Soda</strong></li>
								  <li class="list-group-item list-group-item-success"><span class="badge">{{ $consumption->sodium }}</span><strong>Sodium Sulphaid</strong></li>
								  <li class="list-group-item list-group-item-info"><span class="badge">{{ $consumption->acid }}</span><strong>Acetic Acid</strong></li>
								  <li class="list-group-item list-group-item-warning"><span class="badge">{{ $consumption->agent }}</span><strong>Hydrogen peroxide</strong></li>
								  <li class="list-group-item list-group-item-danger"><span class="badge">{{ $consumption->trilon }}</span><strong>Trilon</strong></li>
								  <li class="list-group-item list-group-item-success"><span class="badge">{{ $consumption->setamol }}</span><strong>Setamol</strong></li>
								  <li class="list-group-item list-group-item-info"><span class="badge">{{ $consumption->premasol }}</span><strong>Premasol</strong></li>
								  <li class="list-group-item list-group-item-warning"><span class="badge">{{ $consumption->glucose }}</span><strong>Glucose</strong></li>
								  <li class="list-group-item list-group-item-danger"><span class="badge">{{ $consumption->l_black }}</span><strong>Liquid Black</strong></li>
								</ul>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="messages">
						    	<ul class="list-group">
								  <li class="list-group-item list-group-item-success"><span class="badge">{{ $consumption->modifide_starch }}</span><strong>Modifide_starch</strong></li>
								  <li class="list-group-item list-group-item-info"><span class="badge">{{ $consumption->apple_starch }}</span><strong>Apple_starch</strong></li>
								  <li class="list-group-item list-group-item-warning"><span class="badge">{{ $consumption->t_size }}</span><strong>T_size</strong></li>
								  <li class="list-group-item list-group-item-danger"><span class="badge">{{ $consumption->uni_soft }}</span><strong>Uni_soft</strong></li>
								  <li class="list-group-item list-group-item-success"><span class="badge">{{ $consumption->pva }}</span><strong>PVA</strong></li>
								  <li class="list-group-item list-group-item-info"><span class="badge">{{ $consumption->wax }}</span><strong>Wax</strong></li>
								  <li class="list-group-item list-group-item-warning"><span class="badge">{{ $consumption->cms }}</span><strong>CMS</strong></li>
								</ul>
							</div>
						    <div role="tabpanel" class="tab-pane" id="settings">
						    	<ul class="list-group">
								  <li class="list-group-item list-group-item-success"><span class="badge">{{ $consumption->shift_officer }}</span><strong>Shift Officer</strong></li>
								  <li class="list-group-item list-group-item-info"><span class="badge">{{ $consumption->shift_oparetor }}</span><strong>Shift Oparetor</strong></li>
								  <li class="list-group-item list-group-item-warning"><span class="badge">{{ $consumption->start_time }}</span><strong>Start Time</strong></li>
								  <li class="list-group-item list-group-item-danger"><span class="badge">{{ $consumption->end_time }}</span><strong>End Time</strong></li>
								  <li class="list-group-item list-group-item-success"><span class="badge">{{ $consumption->total_shift }}</span><strong>Total Shift</strong></li>
								  <li class="list-group-item list-group-item-info"><span class="badge">{{ $consumption->total_time }}</span><strong>Total Time</strong></li>
								  <li class="list-group-item list-group-item-info">{!! htmlspecialchars_decode($consumption->remark) !!}</li>
								</ul>
							</div>
						  </div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>

