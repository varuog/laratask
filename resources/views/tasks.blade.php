@extends('layouts.laratask')
<!-- Content Header (Page header) -->
@section('content')
<section class="content-header">
    <h1>
        Mailbox
        <small>13 new messages</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <a href="{{action('TaskController@create', ['sheet' => $sheet])}}" class="btn btn-primary btn-block margin-bottom">Add Task</a>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Actions</h3>

                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#"><i class="fa fa-trash-o"></i> Trash <span class="label label-warning pull-right">65</span></a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Priority</h3>

                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li @if($priority=='any') class="active" @endif>
                             <a href="{{action('SheetController@show', ['sheet'=> $sheet, 'priority'=>'any'])}}">
                                <i class="fa fa-circle-o text-black"></i> Any {{request('priority')}}
                                <span class="label label-primary pull-right">{{$totalByPriority['all']}}</span>
                            </a>
                        </li>
                        <li @if($priority=='urgent') class="active" @endif>
                             <a href="{{action('SheetController@show', ['sheet'=>$sheet, 'priority'=>'urgent'])}}">
                                <i class="fa fa-circle-o text-red"></i> Urgent
                                <span class="label label-primary pull-right">{{$totalByPriority['urgent']}}</span>
                            </a>
                        </li>
                        <li @if($priority=='high') class="active" @endif>
                             <a href="{{action('SheetController@show', ['sheet'=>$sheet, 'priority'=>'high'])}}">
                                <i class="fa fa-circle-o text-yellow"></i> High
                                <span class="label label-primary pull-right">{{$totalByPriority['high']}}</span>
                            </a>
                        </li>
                        <li @if($priority=='medium') class="active" @endif>
                             <a href="{{action('SheetController@show', ['sheet'=>$sheet, 'priority'=>'medium'])}}">
                                <i class="fa fa-circle-o text-green"></i> Medium
                                <span class="label label-primary pull-right">{{$totalByPriority['medium']}}</span>
                            </a>
                        </li>
                        <li @if($priority=='low') class="active" @endif>
                             <a href="{{action('SheetController@show', ['sheet'=>$sheet, 'priority'=>'low'])}}">
                                <i class="fa fa-circle-o text-light-blue"></i> Low
                                <span class="label label-primary pull-right">{{$totalByPriority['low']}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Inbox</h3>

                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            <div class="btn-group">
                                {{ $tasks->links() }}
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>
                            <td colspan="2">Task</td>
                            <td>Priority</td>
                            <td>Due Date</td>
                            <td>Status</td>
                            <td>Date</td>
                            </th>
                            </thead>
                            <tbody>
                                @each('part.task', $tasks, 'task')
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            <div class="btn-group">
                                {{ $tasks->links() }}
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection