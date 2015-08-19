@extends('admin.AppAdmin')
@section('content')
<div class="panel-heading">
	<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;&nbsp;Event
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
			<a href="{{URL::to('/admin/event')}}" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;&nbsp;&nbsp;Kembali</a>
			<br>
	    </div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Judul Event</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="judul" value="{{ old('judul') }}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Konten</label>
			<div class="col-md-6">
				<textarea type="text" class="form-control" style="resize:vertical" name="konten" ></textarea> 
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Tanggal Mulai</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="tanggal_mulai">
			</div>
		</div>

		<div class="form-group ui-widget-content" id="sample1">
			<label class="col-md-4 control-label">Waktu Mulai</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="waktu_mulai" >
			</div>
		</div>

		<div class="form-group ui-widget-content" id="sample1">
			<label class="col-md-4 control-label">Waktu Akhir</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="waktu_akhir">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Tanggal Akhir</label>
			<div class="col-md-6">
				<input type="texxt" class="form-control" name="tanggal_akhir">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Kelas</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="kelas" value="{{ old('kelas') }}">
			</div>
		</div>

    
    
    
        <script type="text/javascript">
        $(document).ready(function(){
            // find the input fields and apply the time select to them.
            $('#sample1 input').ptTimeSelect();
        });
    </script>


		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					Submit
				</button>
			</div>
		</div>
	</form>
     
</div>
@endsection
