@extends('user.AppUser')
@section('content')
<style type="text/css">
	.not-active {
	   pointer-events: none;
	   cursor: default;
	}
</style>
<section class="content-header">
	<h1>
	    Event
	</h1>
</section>
<section class="content">
	<div class="box box-primary">

	<div class="box-body">
      	<script> 
		    $(function () {
		    	$("#data_table").DataTable();
		    });
	    </script>
	    <div class="col-md-12">
		    	<div class="col-md-3"></div>
		    	<div class="col-md-6">
				    <div class="info-box bg-aqua">
					  <span class="info-box-icon"><i class="fa fa-get-pocket"></i></span>
					  <div class="info-box-content">
					    <span class="info-box-text">Today Submitted Queries</span>
					    <?php
					    	$jumlah = $sum->data[0]->sum;
					    	$persen = $jumlah / Auth::user()->paket->jumlah_query *100;
					    	
					    ?>
					    <span class="info-box-number">{{$jumlah}} Queries</span>
					    <!-- The progress section is optional -->
					    <div class="progress">
					      <div class="progress-bar" style="width: {{$persen}}%"></div>
					    </div>
					    <span class="progress-description">
					    	Today you have submitted {{$jumlah}} Queries from <b>{{Auth::user()->paket->jumlah_query }}</b> queries
					    </span>
					  </div><!-- /.info-box-content -->
					</div>
				</div>
			</div>
	  	<table id="data_table" class="table table-bordered table-striped">
	  	<?php $i = 1;?>
	    <thead>
		    <tr>
		        <th width="5%" class="text-center">No</th>
		        <th width="25%">Judul<span style="font-size:11px;"></span></th>
		        <th width="30%">Konten</th>
	        	<th width="12.5%">Waktu Mulai</th>
	        	<th width="12.5%">Waktu Akhir</th>
	        	<th width="5%" class="text-center">Action</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	<?php
      			date_default_timezone_set('Asia/Jakarta'); // CDT

				$current_date = date("D, d M Y G:i:s e", time());;

      		?>
	    	@foreach($events->data as $eve)
	      	<tr>
	      		<td class="text-center"><?php echo $i++ ?></td>
	      		@if($eve->waktu_mulai < $current_date && $eve->waktu_akhir < $current_date || $current_date < $eve->waktu_mulai || $jumlah >= Auth::user()->paket->jumlah_query)
	      			<td><a href="{{ URL::to('user/question/'. $eve->id) }}" class="not-active">{{ $eve->judul }}</td>
	      		@else
	      			<td><a href="{{ URL::to('user/question/'. $eve->id) }}" >{{ $eve->judul }}</td>
	      		@endif
	      		<td><?php echo nl2br(substr($eve->konten,0,10))." ..."?></td>
	      		<td>{{ $eve->waktu_mulai }}</td>
	      		<td>{{ $eve->waktu_akhir }}</td>
	      		<td>
	      		
	      		@if($eve->waktu_mulai < $current_date && $eve->waktu_akhir < $current_date || $current_date < $eve->waktu_mulai || $jumlah >= Auth::user()->paket->jumlah_query)
	      			<a href="{{ URL::to('user/question/'. $eve->id) }}" class="btn btn-twitter disabled"><i class="fa fa-rocket"></i> Pilih
	      		@else
	      			<a href="{{ URL::to('user/question/'. $eve->id) }}" class="btn btn-twitter"><i class="fa fa-rocket"></i> Pilih
	      		@endif
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
	        	<th>Action</th>
	      	</tr>
	    </tfoot>
	  	</table>
	</div><!-- /.box-body -->


</section>
@endsection