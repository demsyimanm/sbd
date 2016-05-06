@extends('admin.AppAdmin')
@section('content')
    <section class="content-header">
        <h1>
        	Update Event
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
	<form action="http://localhost:5000/updateEvent/{{Auth::user()->paket->id}}" method="POST" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id" value="{{ $eve->id }}">
		<div class="box-body">
			<div class="form-group">
				<label class="col-md-2 control-label">Judul Event</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="judul" value="{{ $eve->judul }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Konten</label>
				<div class="col-md-6">
					<textarea type="text" class="form-control" name="konten" style="resize:vertical;"  >{{ $eve->konten }}</textarea>
				</div>
			</div>
			<?php
				$timestamp1 = $eve->waktu_mulai;
				$datetime1 = explode(" ", $timestamp1);
				$date1 = $datetime1[0];
				$time1 = $datetime1[1];

				$timestamp2 = $eve->waktu_akhir;
				$datetime2 = explode(" ", $timestamp2);
				$date2 = $datetime2[0];
				$time2 = $datetime2[1];
			?>
			<div class="form-group">
				<label class="col-md-2 control-label">Tanggal Mulai</label>
				<div class="col-md-6">
					<input type="text" name="tgl_mulai" class="form-control datepicker" value="  {{$date1}}">
				</div>
			</div>

			<div class="input-group bootstrap-timepicker timepicker" style="margin-left: 4.5%">
				<label class="col-md-5 control-label">Waktu Mulai</label>
				<div class="col-md-7">
					<input class="form-control" name="wkt_mulai" id="timepicker1" data-provide="timepicker" 
						data-minute-step="1" value="{{$time1}}">
				</div>
			</div><br>
			
			<div class="input-group bootstrap-timepicker timepicker" style="margin-left: 4.5%">
				<label class="col-md-5 control-label">Waktu Akhir</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="wkt_akhir" id="timepicker2" data-minute-step="1" 
					snapToStep="false" value="{{$time2}}">
				</div>
			</div><br>

			<div class="form-group">
				<label class="col-md-2 control-label">Tanggal Akhir</label>
				<div class="col-md-6">
					<input type="text" class="form-control datepicker" name="tgl_akhir" value="  {{$date2}}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Kelas</label>
				<div class="col-md-6">
				@if($user == 1)
					<select class="form-control" name="kelas">
	                        <option> -- </option>
	                        <option <?php if ($eve->kelas == 'A') echo "selected";?> value="A">A</option>
	                        <option <?php if ($eve->kelas == 'B') echo "selected";?>value="B">B</option>
	                        <option <?php if ($eve->kelas == 'C') echo "selected";?>value="C">C</option>
	                        <option <?php if ($eve->kelas == 'D') echo "selected";?>value="D">D</option>
	                        <option <?php if ($eve->kelas == 'E') echo "selected";?>value="E">E</option>
					</select>
				@else
					<input type="text" class="form-control" name="kelas" value="{{$kelas}}" disabled="">
				@endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Database IP</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="ip" value="{{$eve->ip}}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Connection Username</label>
				<div class="col-md-6">
					<input type="text" class="form-control " name="conn_username" value="{{$eve->db_username}}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Connection Password</label>
				<div class="col-md-6">
					<input type="text" class="form-control " name="conn_password" value="{{$eve->db_password}}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Database Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control " name="db_name" value="{{$eve->db_name}}">
				</div>
			</div>

			 <div class=" col-md-6 col-md-offset-2 box-footer">
            	<button type="submit" class="btn btn-primary pull-right">Save</button>
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
			    format: 'yyyy-mm-dd',
			    startDate: '-3d',
			    clearBtn: true,
			    autoclose: true
			});
    </script>
    </section><!-- /.content -->
@endsection
