@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    View Submissions of Event {{$event->nama}}
	</h1>
</section>
<section class="content">
	<div class="box">

	<div class="box-body">
		<br>

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
		        <th width="10%" class="text-center">NRP</th>
				 <th width="20%" class="text-center">Nama</th>
	        	<th width="15%" class="text-center">Nama Soal</th>
	        	<th width="50%" class="text-center">Jawaban</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	@foreach($submissions as $submission)
	      	<tr>
	      		<td class="text-center"><?php echo $i++ ?></td>
	      		<td>{{ $submission->users->username }}</td>
				<td>{{ $submission->users->nama }}</td>
	      		<td>{{ $submission->question->judul }}</td>
	      		<td>{{ $submission->jawaban }}</td>
	      	</tr>
	      	@endforeach
	    </tbody>
	  	</table>
	</div><!-- /.box-body -->
</section>
@endsection