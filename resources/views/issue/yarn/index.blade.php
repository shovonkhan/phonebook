@extends('layouts.main')

@section('main-contain')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Yarn Issue
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Yarn Issue</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Yarn Issue</h3>

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
              <h3 class="box-title">Yarn Issue</h3>
              <a href="{{ route('yarnIssueCreate') }}" class="btn btn-success pull-right">Add Issue</a>
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
                @foreach($yarnIssue as $yarn)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $yarn->date }}</td>
                  <td>{{ $yarn->bill }}</td>
                  <td>{{ $yarn->department }}</td>
                  <td>{{ $yarn->lot_no }}</td>
                  <td>
                    @if($yarn->status == 0)<button class="btn btn-warning btn-xs">Pandding</button>
                    @else
                    <button class="btn btn-success btn-xs">Complite</button>
                    @endif
                  </td>
                  <td>
                    <a href="{{ URL::to('yarn-issue/show/'.$yarn->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="{{ URL::to('yarn-issue/edit/'.$yarn->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="{{ URL::to('yarn-issue/delete/'.$yarn->id) }}" id="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
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