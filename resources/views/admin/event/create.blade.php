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

			<div class="form-group">
				<label class="col-md-2 control-label">Tanggal Mulai</label>
				<div class="col-md-6">
					<input type="text" name="tgl_mulai" class="form-control datepicker" id="">
				</div>
			</div>

			<div class="input-group bootstrap-timepicker timepicker" style="margin-left: 4.5%">
				<label class="col-md-5 control-label">Waktu Mulai</label>
				<div class="col-md-7">
					<input class="form-control" name="wkt_mulai" id="timepicker1" data-provide="timepicker" 
						data-minute-step="1" >
				</div>
			</div><br>
			
			<div class="input-group bootstrap-timepicker timepicker" style="margin-left: 4.5%">
				<label class="col-md-5 control-label">Waktu Akhir</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="wkt_akhir" id="timepicker2" data-minute-step="1" showMeridian="false" snapToStep="false">
				</div>
			</div><br>

			<div class="form-group">
				<label class="col-md-2 control-label">Tanggal Akhir</label>
				<div class="col-md-6">
					<input type="text" class="form-control datepicker" name="tgl_akhir">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Kelas</label>
				<div class="col-md-6">
				@if($user == 1)
					<select class="form-control" name="kelas">
	                        <option selected='selected'> -- </option>
	                        <option value="A">A</option>
	                        <option value="B">B</option>
	                        <option value="C">C</option>
	                        <option value="D">D</option>
	                        <option value="E">E</option>
					</select>

				@else
					<input type="text" class="form-control" name="kelas" value="{{$kelas}}" disabled="">
				@endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Database IP</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="ip">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Connection Username</label>
				<div class="col-md-6">
					<input type="text" class="form-control " name="conn_username">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Connection Password</label>
				<div class="col-md-6">
					<input type="text" class="form-control " name="conn_password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Database Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control " name="db_name">
				</div>
			</div>
			 <div class=" col-md-6 col-md-offset-2 box-footer">
            	<button type="submit" class="btn btn-info pull-right">Create</button>
        	 </div><!-- /.box-footer -->
		</div><!-- /.box-body -->
        
	</form>
	<script type="text/javascript">
            $('#timepicker1').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false
            });
    </script>
    <script type="text/javascript">
            $('#timepicker2').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false
            });
    </script>
    <script type="text/javascript">
	    	$('.datepicker').datepicker({
			    format: 'yyyy/mm/dd',
			    clearBtn: true,
			     autoclose: true
			});
    </script>
    </section><!-- /.content -->
@endsection
