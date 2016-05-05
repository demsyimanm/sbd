@extends('admin.AppAdmin')
@section('content')
    <section class="content-header">
        <h1>
        	Create Database
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
	<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="box-body">
			<div class="form-group">
				<label class="col-md-2 control-label">Database Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control " name="db_name">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Select sql file to import:</label>
				<div class="col-md-6">
			    	<input type="file" name="fileToUpload" id="fileToUpload" class="form-control ">
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
