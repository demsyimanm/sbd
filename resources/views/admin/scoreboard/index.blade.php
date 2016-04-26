@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    Scoreboard
	</h1>
</section>
<section class="content">
	<div class="box box-primary">
	<div class="box-body">
		<h4>Pilih Event :</h4>
		<form action="" method="POST" class="form-horizontal" >
			<div class="col-xs-6">
			<div class="box-body">
			  	<div class="form-group">
					<label class="col-md-2 control-label">Event</label>
					<div class="col-md-6">
						<select onchange="this.form.submit()" class="form-control" name="event">
		                        <option value="0" selected='selected'> -- </option>
		                        @foreach( $events->data as $eve)
		                        <option value="{{ $eve->id }}" >{{ $eve->judul }} Kelas {{ $eve->kelas }}</option>
		                        @endforeach
						</select>
					</div>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</div>
			</div>
		</form>
	</div><!-- /.box-body -->
</section>
@endsection