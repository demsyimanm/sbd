@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    Question {{$eve->data[0]->judul}}
	</h1>
</section>
<section class="content">
	<div class="box">

	<div class="box-body">
		<br><div class="col-xs-3 text-left">
	        <a href="{{ URL::to('admin/question/'.$eve->data[0]->id.'/create') }}" class="btn btn-block btn-social btn-instagram">
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
		        <th width="25%">Judul</th>
		        <th width="25%">Pertanyaan</th>
	        	<th width="12.5%">Jawaban</th>
	        	<th width="10%">Action</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	@foreach($question->data as $quest)
	      	<tr>
	      		<td class="text-center"><?php echo $i++ ?></td>
	      		<td><a href="{{ URL::to('admin/question/'. $eve->data[0]->id.'/update/'.$quest->id) }}" >{{ $quest->judul }}</td>
	      		<td><?php echo nl2br(substr($quest->konten,0,30))." ..."?></td>
	      		<td><?php echo nl2br(substr($quest->jawaban,0,30))." ..."?></td>
	      		<td>
	      				<a href="{{ URL::to('admin/question/'. $eve->data[0]->id.'/update/'.$quest->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
	      				<button class="btn btn-danger del" onclick="dele('{{url('http://localhost:5000/deleteQuestion/'.$eve->data[0]->id.'/'.$quest->id)}}')"><i class="fa fa-times"></i></button>
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
	<div id="modaldiv" class="modal modal-primary fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                <h4 class="modal-title">Hapus data Question</h4>
	            </div>
	            <div class="modal-body">
	                <p>Anda yakin ingin menghapus data tersebut?</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
	                <a type="submit" id="delete_link"  class="btn btn-danger button_modal">Hapus</a>
	            </div>
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div>
</section>
<script type="text/javascript">
	function dele(link){
        $('#modaldiv').modal('show');
        $('.button_modal').attr({href:link});
	};
</script>
@endsection