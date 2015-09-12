@extends('user.AppUser')
@section('content')
<section class="content-header">
	<h1>
	    Question {{$eve->judul}} Kelas {{$eve->kelas}}
	</h1>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-body">
			{{$eve->konten}}
		</div>
	</div>
	<div class="box box-warning">
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
			        <th width="35%">Judul</th>
			        <th width="50%">Pertanyaan</th>
		        	<th width="10%">Action</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	@foreach($question as $quest)
		      	<tr>
		      		<td class="text-center"><?php echo $i++ ?></td>
		      		<td><a href="{{ URL::to('user/question/'. $eve->id.'/submit/'.$quest->id) }}" >{{ $quest->judul }}</td>
		      		<td><?php echo nl2br(substr($quest->konten,0,30))." ..."?></td>
		      		<td>
		      			<a href="{{ URL::to('user/question/'. $eve->id.'/submit/'.$quest->id) }}" class="btn btn-twitter" ><i class="fa  fa-check-square-o"></i> Jawab</a>
		      		</td>
		      	</tr>
		      	@endforeach
		    </tbody>
		    <tfoot>
		      	<tr>
		       		<th class="text-center">No</th>
			        <th>Judul</th>
			        <th>Pertanyaan</th>
		        	<th>Action</th>
		      	</tr>
		    </tfoot>
		  	</table>
		  </div>
	</div><!-- /.box-body -->
</section>
@endsection