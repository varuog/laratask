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
        <div class="col-md-12">
            <form method="post" action="{{action('TaskController@store', ['sheet' => $sheet])}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Task Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content" rows="3" placeholder="Enter ..."></textarea>
                </div>

                <div class="form-group">
                    <label>Task Due Date:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="dueDate" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                    </div>
                    <!-- /.input group -->
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <div class="checkbox">
                        <label>
                            <input name="isComplete" type="checkbox">
                            Complete
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <label>Priority</label>
                    @foreach($priorityOptions as $priorityOption)
                    <div class="radio">
                        <label>
                            <input type="radio" name="priority" id="optionsRadios1" value="{{$priorityOption}}" checked="">
                            {{ucwords($priorityOption)}}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="box-footer">
                    <button type="submit" name="doAddTask" value="addTask" class="btn btn-primary">Add Task</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection