@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    List Peserta
	</h1>
</section>
<section class="content">
	<div class="box">
		<div ng-app="myApp" ng-controller="accountCtrl">
		<div class="box-body">
			<br><div class="col-xs-3 text-left">
		        <a href="{{ URL::to('event/add/peserta/') }}/{{$id}}" class="btn btn-block btn-social btn-instagram">
	            	<i class="fa fa-plus"></i> Tambah Peserta
	          	</a>
	      	</div><br><br><br>
		  	<table id="data_table" class="table table-bordered table-striped">
		    <thead>
			    <tr>
			        <th width="5%" class="text-center">No</th>
		        	<th width="11%" class="text-center">Nama</th>
		        	<th width="11%" class="text-center">Username</th>
		        	<th width="13%" class="text-center">Status</th>
		        	<th width="13%" class="text-center">Nama Event</th>
		        	<th width="10%" class="text-center">Action</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	<tr ng-repeat="x in names" on-finish-render="ngRepeatFinished">
		      		<td class="text-center">[[$index+1]]</td>
		      		<td>[[ x.nama ]]</td>
		      		<td>[[ x.username ]]</td>
		      		<td>
		      			<div ng-if="[[x.status]] == '1'">
		      				Admin
		      			</div>
		      			<div ng-if="[[x.status]] == '2'">
		      				Peserta
		      			</div>
		      		</td>
		      		<td>[[ x.judul ]]</td>
		      		<td>
		      			<center>
	      					<button ng-click="delet({{$id}},x.id)" class="btn btn-danger del" ><i class="fa fa-times"></i></button>
		      			</center>
		      		</td>
		      	</tr>
		    </tbody>
		  	</table>
		</div><!-- /.box-body -->
	</div>
	<div id="modaldiv" class="modal modal-primary fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                <h4 class="modal-title">Hapus data Event</h4>
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
	<input type="hidden" value="http://localhost:5000/getListParticipant/{{$id}}" id="url">

	<script>
		app.controller('accountCtrl', function($scope, $http) {
			var url = document.getElementById('url').value;
		    $http.get(url)
		    .then(function (response) {$scope.names = response.data.data;});
		    $scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent){
			    $("#data_table").DataTable();
		    });

		    $scope.delet = function (event_id,user_id){
		        $('#modaldiv').modal('show');
		        $('.button_modal').attr({href:'http://localhost:5000/deleteParticipant/'+event_id+'/'+user_id});
			};
		});
	</script>
</section>
@endsection