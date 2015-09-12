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
		        <th width="23%">Judul<span style="font-size:11px;"> &nbsp;(click the title to edit questions)</span></th>
		        <th width="20%">Konten</th>
	        	<th width="13%">Waktu Mulai</th>
	        	<th width="13%">Waktu Akhir</th>
	        	<th width="3%">Kls</th>
	        	<th width="13%" class="text-center">Parser</th>
	        	<th width="9%">Action</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	@foreach($event as $eve)
	      	<tr>
	      		<td class="text-center"><?php echo $i++ ?></td>
	      		<td><a href="{{ URL::to('admin/question/'. $eve->id) }}" >{{ $eve->judul }}</td>
	      		<td><?php echo nl2br(substr($eve->konten,0,10))." ..."?></td>
	      		<td>{{ $eve->waktu_mulai }}</td>
	      		<td>{{ $eve->waktu_akhir }}</td>
	      		<td class="text-center">{{ $eve->kelas }}</td>
	      		<td>
	      			@if($eve->status == '0')
	      				<a href="{{URL::to('admin/event/parser/start/'.$eve->id)}}" class="btn btn-success">Start</a>
	      				<a href="#" class="btn btn-danger" disabled="">Stop</a>
	      			@else
	      				<a href="#" class="btn btn-success" disabled="">Start</a>
	      				<a href="{{URL::to('admin/event/parser/stop/'.$eve->id)}}" class="btn btn-danger" >Stop</a>
	      			@endif
	      		</td>
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
	        	<th>Kls</th>
	        	<th class="text-center">Parser</th>
	        	<th>Action</th>
	      	</tr>
	    </tfoot>
	  	</table>
	</div><!-- /.box-body -->
</section>
@endsection