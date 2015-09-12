@extends('admin.AppAdmin')
@section('content')
    <section class="content-header">
        <h1>
        	Create User
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
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
	<form action="" method="POST" class="form-horizontal" >
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="box-body">
			<div class="form-group">
				<label class="col-md-2 control-label">Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Username</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="username" >
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Kelas</label>
				<div class="col-md-6">
					<select class="form-control" name="kelas">
	                        <option selected='selected'> -- </option>
	                        <option value="A">A</option>
	                        <option value="B">B</option>
	                        <option value="C">C</option>
	                        <option value="D">D</option>
	                        <option value="E">E</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Role</label>
				<div class="col-md-6">
					<select class="form-control" name="role_id">
	                        <option selected='selected'> -- </option>
	                    @foreach ($role as $item)
	                        <option value="{{ $item->id }}">{{ $item->nama}}</option>
	                    @endforeach
					</select>
				</div>
			</div>
		</div><!-- /.box-body -->
        <div class=" col-md-6 col-md-offset-2 box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Create</button>
        </div><!-- /.box-footer -->
	</form>
    </section><!-- /.content -->
@endsection
