@extends('admin.AppAdmin')
@section('content')
<div class="panel-heading">
	<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;&nbsp;Akun
		<span class="badge pull-right">42</span>
	</h3>
</div>
<div class="panel-body">
    @if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form class="form-horizontal" role="form" method="POST" action="">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label class="col-md-4 control-label"></label>
			<div class="col-md-6">
		<div class="btn-group">
			<a href="{{URL::to('/admin/user')}}" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;&nbsp;&nbsp;Kembali</a>
			<br>
	    </div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Name</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Username</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="username" >
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Password</label>
			<div class="col-md-6">
				<input type="password" class="form-control" name="password">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Confirm Password</label>
			<div class="col-md-6">
				<input type="password" class="form-control" name="password_confirmation">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Kelas</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="kelas" value="{{ old('kelas') }}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Role</label>
			<div class="col-md-6">
				<select class="selected cover closed" name="role_id">
                        <option selected='selected'>Tanpa Topic</option>
                    @foreach ($role as $item)
                        <option value="{{ $item->id }}">{{ $item->nama}}</option>
                    @endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					Register
				</button>
			</div>
		</div>
	</form>
     
</div>
@endsection
