@extends('admin.AppAdmin')
@section('content')
    <section class="content-header">
        <h1>
        	Update User
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
	<form action="" method="POST" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id" value="{{ $user->id }}">
		<div class="box-body">
			<div class="form-group">
				<label class="col-md-2 control-label">Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="nama" value="{{ $user->nama }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Username</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="username" value="{{ $user->username }}" >
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Kelas</label>
				<div class="col-md-6">
					<select class="form-control" name="kelas">
	                        <option> -- </option>
	                        <option <?php if ($user->kelas == 'A') echo "selected";?> value="A">A</option>
	                        <option <?php if ($user->kelas == 'B') echo "selected";?>value="B">B</option>
	                        <option <?php if ($user->kelas == 'C') echo "selected";?>value="C">C</option>
	                        <option <?php if ($user->kelas == 'D') echo "selected";?>value="D">D</option>
	                        <option <?php if ($user->kelas == 'E') echo "selected";?>value="E">E</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Role</label>
				<div class="col-md-6">
					<select class="form-control" name="role_id">
	                        <option selected='selected'> -- </option>
	                    @foreach ($role as $item)
	                        <option <?php if ($user->role_id == $item->id) echo "selected";?> value="{{ $item->id }}">{{ $item->nama}}</option>
	                    @endforeach
					</select>
				</div>
			</div>
		</div><!-- /.box-body -->
        <div class=" col-md-6 col-md-offset-2 box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Save</button>
        </div><!-- /.box-footer -->
	</form>
    </section><!-- /.content -->
@endsection
