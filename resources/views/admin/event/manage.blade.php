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
		        <th width="25%" class="text-center">Judul<span style="font-size:11px;"> &nbsp;(click the title to edit questions)</span></th>
	        	<th width="11%" class="text-center">Waktu Mulai</th>
	        	<th width="11%" class="text-center">Waktu Akhir</th>
	        	<th width="3%" class="text-center">Kls</th>
	        	<th width="13%" class="text-center">IP</th>
	        	<th width="10%" class="text-center">DB</th>
	        	<th width="11%" class="text-center">Parser</th>
	        	<th width="9%" class="text-center">Action</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	@foreach($events->data as $eve)
	      	<tr>
	      		<td class="text-center"><?php echo $i++ ?></td>
	      		<td><a href="{{ URL::to('admin/question/'. $eve->id) }}" >{{ $eve->judul }}</td>
	      		<td>{{ $eve->waktu_mulai }}</td>
	      		<td>{{ $eve->waktu_akhir }}</td>
	      		<td class="text-center">{{ $eve->kelas }}</td>
	      		<td>{{ $eve->ip }}</td>
	      		<td>{{ $eve->db_name }}</td>
	      		<td>
	      			@if($eve->status == '0')
	      				<a href="{{URL::to('admin/event/parser/start/'.$eve->id)}}" class="btn btn-success btn-sm">Start</a>
	      				<a href="#" class="btn btn-danger btn-sm" disabled="">Stop</a>
	      			@else
	      				<a href="#" class="btn btn-success btn-sm" disabled="">Start</a>
	      				<a href="{{URL::to('admin/event/parser/stop/'.$eve->id)}}" class="btn btn-danger btn-sm" >Stop</a>
	      			@endif
	      		</td>
	      		<td>
      				<a href="{{ URL::to('admin/event/update/'. $eve->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>

      				<a href="{{ URL::to('admin/event/delete/'. $eve->id) }}" class="btn btn-danger" ><i class="fa fa-times"></i></a>
	      		</td>
	      	</tr>
	      	@endforeach
	    </tbody>
	    <tfoot>
	      	<tr>
	       		<th class="text-center">No</th>
		        <th>Judul</th>
	        	<th>Waktu Mulai</th>
	        	<th>Waktu Akhir</th>
	        	<th>Kls</th>
	        	<th class="text-center">IP</th>
	        	<th class="text-center">DB</th>
	        	<th class="text-center">Parser</th>
	        	<th>Action</th>
	      	</tr>
	    </tfoot>
	  	</table>
	</div><!-- /.box-body -->
</section>
@endsection