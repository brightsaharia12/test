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
              <h3 class="box-title">Users lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
 		@if(\Auth::user() && \Auth::user()->role != 2)
		<div class="row">
			<div class="col-sm-12">
				<a href="{{ url('users/create') }}" class="btn btn-primary">Create user</a>
			</div>
		</div>
		@endif
		<div class="col-sm-12">
			<table class="table table-bordered table-hovered datatable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Profile</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td><img src="{{ url('storage/'.$user->profile) }}" style="width: 50px;height: 50px;"></td>
							<td>
								<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary">Edit</a>
								<a href="javascript:;" class="btn btn-danger jsDelete">Delete</a>
								<form method="post" action="{{ url('users/'.$user->id) }}">
									<input type="hidden" name="_method" value="DELETE">
									@csrf
								</form>
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
<script type="text/javascript">

</script>
@stop