@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<form class="" method="post" enctype="multipart/form-data" action="{{ url('users/'.$model->id) }}">
    <input type="hidden" name="_method" value="PUT">
	@csrf
    <div class="form-group">
    	<label class="control-label">Name</label>
    	<input type="text" name="name" class="form-control" value="{{ $model->name }}" />
    </div>

    <div class="form-group">
    	<label class="control-label">Email</label>
    	<input type="email" name="email" class="form-control" value="{{ $model->email }}" />
    </div>

    
    <div class="form-group">
    	<label class="control-label">Profile</label>
    	<input type="file" name="profile" class="form-control" />
        <img src="{{ url('storage/'.$model->profile) }}" style="width: 50px;height: 50px;" />
    </div>
    <div class="form-group">
        <button type="submit">Submit</button>
    </div>
</form>
</div>
</div>
</div>
</div>
@stop