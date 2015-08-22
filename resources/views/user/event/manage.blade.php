@extends('user.AppUser')
@section('content')
<section class="content-header">
	<h1>
	    Event
	</h1>
</section>
<section class="content">
	<div class="box">

	<div class="box-body">
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
		        <th width="25%">Judul<span style="font-size:11px;"> &nbsp;(click the title to edit questions)</span></th>
		        <th width="30%">Konten</th>
	        	<th width="12.5%">Waktu Mulai</th>
	        	<th width="12.5%">Waktu Akhir</th>
	        	<th width="5%" class="text-center">Kelas</th>
	        	<th width="5%" class="text-center">Action</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	@foreach($event as $eve)
	      	<tr>
	      		<td class="text-center"><?php echo $i++ ?></td>
	      		<td><a href="{{ URL::to('user/question/'. $eve->id) }}" >{{ $eve->judul }}</td>
	      		<td><?php echo nl2br(substr($eve->konten,0,10))." ..."?></td>
	      		<td>{{ $eve->waktu_mulai }}</td>
	      		<td>{{ $eve->waktu_akhir }}</td>
	      		<td class="text-center">{{ $eve->kelas }}</td>
	      		<td>
	      				<a href="{{ URL::to('user/question/'. $eve->id) }}" class="btn btn-twitter"><i class="fa fa-rocket"></i> Pilih
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