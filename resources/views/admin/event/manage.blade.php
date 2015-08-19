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

      	<script> 
		    $(function () {
		    	$("#data_table").DataTable();
		    });
	    </script>
	  	<table id="data_table" class="table table-bordered table-striped">
	  	<?php $i = 1;?>
	    <thead>
		    <tr>
		        <th width="5%" class="text-center">No</th>
		        <th width="25%">Judul</th>
		        <th width="25%">Konten</th>
	        	<th width="12.5%">Waktu Mulai</th>
	        	<th width="12.5%">Waktu Akhir</th>
	        	<th width="10%" class="text-center">Kelas</th>
	        	<th width="10%">Action</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	@foreach($event as $eve)
	      	<tr>
	      		<td class="text-center"><?php echo $i++ ?></td>
	      		<td><a href="" >{{ $eve->judul }}</td>
	      		<td>{{ $eve->konten }}</td>
	      		<td>{{ $eve->waktu_mulai }}</td>
	      		<td>{{ $eve->waktu_akhir }}</td>
	      		<td class="text-center">{{ $eve->kelas }}</td>
	      		<td>
	      				<a href="{{ URL::to('admin/event/update/'. $eve->id) }}" class="btn btn-default"><i class="fa fa-pencil"></i>
	      				<a href="{{ URL::to('admin/event/delete/'. $eve->id) }}" class="btn btn-default" ><i class="fa fa-times"></i>
	      		</td>
	      	</tr>
	      	@endforeach
	    </tbody>
	    <tfoot>
	      	<tr>
	       		<th class="text-center">No</th>
		        <th>Judul</th>
		        <th>Konten</th>
	        	<th>Waktu Mulai</th>
	        	<th>Waktu Akhir</th>
	        	<th class="text-center">Kelas</th>
	        	<th>Action</th>
	      	</tr>
	    </tfoot>
	  	</table>
	</div><!-- /.box-body -->
</section>
@endsection