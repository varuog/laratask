@extends('layouts.laratask')
<!-- Content Header (Page header) -->
@section('content')
<section class="content-header">
    <h1>
        Add New Sheet
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add new sheet</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{action('SheetController@store')}}">
                {{ csrf_field() }}
            <div class="form-group">
                  <label>Sheet Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter ...">
                </div>
            
            <div class="form-group">
                  <label>Sheet Description</label>
                  <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </form>
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection