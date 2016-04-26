@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    User
	</h1>
</section>
<section class="content">
	<div class="box">

	<div class="box-body">
		<br><div class="col-xs-2 text-left">
	        <a href="{{ URL::to('admin/user/create') }}" class="btn btn-block btn-social btn-instagram">
            	<i class="fa fa-plus"></i> Tambah User
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
		        <th width="25%">Username</th>
		        <th width="25%">Nama</th>
	        	<th width="25%">Role</th>
	        	<th width="10%" class="text-center">Kelas</th>
	        	<th width="10%">Action</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	@foreach($users->data as $user)
	      	<tr>
	      		<td class="text-center"><?php echo $i++ ?></td>
	      		<td><a href="{{ URL::to('admin/user/update/'. $user->id) }}" >{{ $user->username }}</td>
	      		<td>{{ $user->nama }}</td>
	      		<td>{{ $user->role_nama }}</td>
	      		<td class="text-center">{{ $user->kelas }}</td>
	      		<td>
	      				<a href="{{ URL::to('admin/user/update/'. $user->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>

	      				<a href="{{ URL::to('admin/user/delete/'. $user->id) }}" class="btn btn-danger" ><i class="fa fa-times"></i></a>
	      		</td>
	      	</tr>
	      	@endforeach
	    </tbody>
	    <tfoot>
	      	<tr>
	       		<th class="text-center">No</th>
		        <th>Nama</th>
		        <th>Username</th>
	        	<th>Role</th>
	        	<th class="text-center">Kelas</th>
	        	<th>Action</th>
	      	</tr>
	    </tfoot>
	  	</table>
	</div><!-- /.box-body -->
</section>
@endsection