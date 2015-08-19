@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    Event
	</h1>
</section>
<section class="content">
	<div class="box">

	<div class="box-body">
		<br><div class="col-xs-2 text-left">
	        <a href="{{ URL::to('admin/event/create') }}" class="btn btn-block btn-social btn-instagram">
            	<i class="fa fa-plus"></i> Tambah Event
          	</a>
      	</div><br><br><br>
	</div><!-- /.box-body -->
	</div>
</section>
@endsection