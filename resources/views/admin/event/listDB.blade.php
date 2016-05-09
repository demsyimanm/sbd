@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    Database List
	</h1>
</section>
<section class="content">
	<div class="box">
		<div class="box-body">
			<br><div class="col-xs-2 text-left">
		        <a href="{{ URL::to('create/db') }}" class="btn btn-block btn-social btn-instagram">
	            	<i class="fa fa-plus"></i> Tambah Database
	          	</a>
	      	</div><br><br><br>
	      	<script> 
			    $(function () {
			    	$("#data_table").DataTable();
			    });
		    </script>
		    <?php
		    	if (isset($_GET['status']))
		    	{
		    		if ($_GET['status'] == 'gagal')
		    		{
		    			?>
		    				<div class="col-md-12">
						    	<div class="col-md-2"></div>
						    	<div class="col-md-8">
								    <div class="callout callout-danger text-center">
									  <h3>Peringatan!</h3>
									  <h5>Database Anda melebihi kapasitas paket Anda</h5>
									</div>
								</div>
							</div>
		    			<?php
		    		} 
		    	}
		    ?>
		    <div class="col-md-12">
		    	<div class="col-md-3"></div>
		    	<div class="col-md-6">
				    <div class="info-box bg-blue">
					  <span class="info-box-icon"><i class="fa fa-database"></i></span>
					  <div class="info-box-content">
					    <span class="info-box-text">Used Database</span>
					    <?php
					    	$capacity = $cap->data[0]->ukuran/1000;
					    	$kuota = Auth::user()->paket->ukuran_db;
					    	$used = $capacity / $kuota *100;
					    ?>
					    <span class="info-box-number">{{$capacity}} MB</span>
					    <!-- The progress section is optional -->
					    <div class="progress">
					      <div class="progress-bar" style="width: {{$used}}%"></div>
					    </div>
					    <span class="progress-description">
					      {{$used}}% from {{$kuota}} MB
					    </span>
					  </div><!-- /.info-box-content -->
					</div>
				</div>
			</div>
			
		  	<table id="data_table" class="table table-bordered table-striped">
		    <thead>
			    <tr>
			        <th width="5%" class="text-center">No</th>
		        	<th width="11%" class="text-center">Nama DB</th>
		        	<th width="11%" class="text-center">User</th>
		        	<th width="13%" class="text-center">Upload at</th>
		        	<th width="13%" class="text-center">Size</th>
		        	<th width="10%" class="text-center">Action</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	<?php $i = 1;?> 
		    	@foreach($dbs->data as $db)
			    	<tr>
			      		<td class="text-center">{{$i++}}</td>
			      		<td>{{$db->db_name}}</td>
			      		<td>{{$db->nama}}</td>
			      		<td>{{$db->created_at}}</td>
			      		<td>{{$db->size}}</td>
			      		<td>
			      			<center>
		      					<button class="btn btn-danger del" onclick="dele('{{url('http://10.151.63.181:5000/deleteDb/'.$db->id.'/'.$db->db_name)}}')"><i class="fa fa-times"></i></button>
			      			</center>
			      		</td>
			      	</tr>
			    @endforeach
		    </tbody>
		  	</table>
		</div><!-- /.box-body -->
	</div>


	<!--script>
		app.controller('accountCtrl', function($scope, $http) {
			var url = document.getElementById('url').value;
		    $http.get(url)
		    .then(function (response) {$scope.names = response.data.data;});
		    $scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent){
			    $("#data_table").DataTable();
		    })
		});
	</script-->
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
	<script type="text/javascript">
	function dele(link){
        $('#modaldiv').modal('show');
        $('.button_modal').attr({href:link});
	};
</script>
</section>
@endsection