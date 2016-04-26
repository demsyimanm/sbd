@extends('admin.AppAdmin')
@section('content')
    <section class="content-header">
        <h1>
        	Delete User
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	<form action="" method="POST" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id" value="{{ $user->id }}">
		<div class="example-modal">
            <div class="example-modal">
            <div class="modal modal-danger">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Yakin Ingin Menghapus?</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
						<label class="col-md-2 control-label">Name</label>
						<div class="col-md-6">
							<input disabled="" type="text" class="form-control" name="nama" value="{{ $user->nama }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Username</label>
						<div class="col-md-6">
							<input disabled="" type="text" class="form-control" name="username" value="{{ $user->username }}" >
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Kelas</label>
						<div class="col-md-6">
							<select disabled="" class="form-control" name="kelas">
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
							<select disabled="" class="form-control" name="role_id">
			                        <option selected='selected'> -- </option>
			                    @foreach ($role as $item)
			                        <option <?php if ($user->role_id == $item->id) echo "selected";?> value="{{ $item->id }}">{{ $item->nama}}</option>
			                    @endforeach
							</select>
						</div>
					</div>
                  </div>
                  <div class="modal-footer">
                    <a type="button" href="{{URL::to('admin/user')}}" class="btn btn-default pull-left" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger" >Delete</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
      </div>
	</form>
    </section><!-- /.content -->
@endsection
