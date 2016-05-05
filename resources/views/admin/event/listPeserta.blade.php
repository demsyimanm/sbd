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
	      					<a href="{{ URL::to('peserta/delete/')}}/[[ x.id ]]" class="btn btn-danger" ><i class="fa fa-times"></i></a>
		      			</center>
		      		</td>
		      	</tr>
		    </tbody>
		  	</table>
		</div><!-- /.box-body -->
	</div>

	<input type="hidden" value="http://{{$_ENV['PC_IP']}}:5000/getListParticipant/{{$id}}" id="url">

	<script>
		app.controller('accountCtrl', function($scope, $http) {
			var url = document.getElementById('url').value;
		    $http.get(url)
		    .then(function (response) {$scope.names = response.data.data;});
		    $scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent){
			    $("#data_table").DataTable();
		    })
		});
	</script>
</section>
@endsection