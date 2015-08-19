@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    Question {{$eve->judul}} Kelas {{$eve->kelas}}
	</h1>
</section>
<section class="content">
	<div class="box">

	<div class="box-body">
		<br><div class="col-xs-3 text-left">
	        <a href="{{ URL::to('admin/question/'.$eve->id.'/create') }}" class="btn btn-block btn-social btn-instagram">
            	<i class="fa fa-plus"></i> Tambah Pertanyaan
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
		        <th width="25%">Judul<span style="font-size:11px;"> &nbsp;(click the title to edit questions)</span></th>
		        <th width="25%">Pertanyaan</th>
	        	<th width="12.5%">Jawaban</th>
	        	<th width="10%">Action</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	@foreach($question as $quest)
	      	<tr>
	      		<td class="text-center"><?php echo $i++ ?></td>
	      		<td><a href="{{ URL::to('admin/question/'. $quest->id) }}" >{{ $quest->judul }}</td>
	      		<td><?php echo nl2br(substr($quest->konten,0,30))." ..."?></td>
	      		<td><?php echo nl2br(substr($quest->jawaban,0,30))." ..."?></td>
	      		<td>
	      				<a href="{{ URL::to('admin/question/'. $eve->id.'/update/'.$quest->id) }}" class="btn btn-default"><i class="fa fa-pencil"></i>
	      				<a href="{{ URL::to('admin/question/'. $eve->id.'/delete/'.$quest->id) }}" class="btn btn-default" ><i class="fa fa-times"></i>
	      		</td>
	      	</tr>
	      	@endforeach
	    </tbody>
	    <tfoot>
	      	<tr>
	       		<th class="text-center">No</th>
		        <th>Judul</th>
		        <th>Pertanyaan</th>
	        	<th class="text-center">Jawaban</th>
	        	<th>Action</th>
	      	</tr>
	    </tfoot>
	  	</table>
	</div><!-- /.box-body -->
</section>
@endsection