@extends('layouts.main')

@section('main-contain')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chemical Issue
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Chemical Issue</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Chemical Issue</h3>

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
              <h3 class="box-title">Chemical Issue</h3>
              <a href="{{ route('ChemicalIssueCreate') }}" class="btn btn-success pull-right">Add Issue</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Date</th>
                  <th>Bill Number</th>
                  <th>Department</th>
                  <th>Lot No</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($chemicalIssue as $chemical)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $chemical->date }}</td>
                  <td>{{ $chemical->bill }}</td>
                  <td>{{ $chemical->department }}</td>
                  <td>{{ $chemical->lot_no }}</td>
                  <td>
                    @if($chemical->status == 0)<button class="btn btn-warning btn-xs">Pandding</button>
                    @else
                    <button class="btn btn-success btn-xs">Complite</button>
                    @endif
                  </td>
                  <td>
                    <a href="{{ URL::to('chemical-issue/show/'.$chemical->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="{{ URL::to('chemical-issue/edit/'.$chemical->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="{{ URL::to('chemical-issue/delete/'.$chemical->id) }}" id="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</section>
</div>
@endsection