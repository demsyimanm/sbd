@extends('admin.AppAdmin')
@section('content')
    <section class="content-header">
        <h1>
        	Create Event
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
		<div class="box-body">
			<div class="form-group">
				<label class="col-md-2 control-label">Judul event</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="judul" value="{{ old('judul') }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Konten</label>
				<div class="col-md-6">
					<textarea type="text" class="form-control" name="konten" style="resize:vertical;" ></textarea>
				</div>
			</div>

			<div class="form-group input-append date" id="datetimepicker">
				<label class="col-md-2 control-label">Waktu Mulai</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="waktu_mulai">
					<span class="add-on">
			        	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
			      	</span>
				</div>
			</div>
			<br><br>
			<div class="form-group input-append date" id="datetimepicker2">
				<label class="col-md-2 control-label">Waktu Akhir</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="waktu_akhir">
					<span class="add-on">
			        	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
			      	</span>
				</div>
			</div><br><br>
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
			    
		</div><!-- /.box-body -->
        <div class=" col-md-6 col-md-offset-2 box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Create</button>
        </div><!-- /.box-footer -->
	</form>

	<script type="text/javascript" src="{{ URL::to('plugin/datetime/js//bootstrap-datetimepicker.min.js') }}"></script>
	<script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-EN'
      });

      $('#datetimepicker2').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-EN'
      });
    </script>
    </section><!-- /.content -->
@endsection
