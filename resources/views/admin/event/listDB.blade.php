@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    Database List
	</h1>
</section>
<section class="content">
	<div class="box">
		<div ng-app="myApp" ng-controller="accountCtrl">
		<div class="box-body">
			<br><div class="col-xs-2 text-left">
		        <a href="{{ URL::to('create/db') }}" class="btn btn-block btn-social btn-instagram">
	            	<i class="fa fa-plus"></i> Tambah Database
	          	</a>
	      	</div><br><br><br>
	      	
		  	<table id="data_table" class="table table-bordered table-striped">
		    <thead>
			    <tr>
			        <th width="5%" class="text-center">No</th>
		        	<th width="11%" class="text-center">Nama DB</th>
		        	<th width="11%" class="text-center">User</th>
		        	<th width="13%" class="text-center">Upload at</th>
		        	<th width="10%" class="text-center">Action</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	<tr ng-repeat="x in names" on-finish-render="ngRepeatFinished">
		      		<td class="text-center">[[$index+1]]</td>
		      		<td>[[ x.db_name ]]</td>
		      		<td>[[ x.nama ]]</td>
		      		<td>[[ x.created_at ]]</td>
		      		<td>
		      			<center>
	      					<a href="{{ URL::to('db/delete/')}}/[[ x.id ]]" class="btn btn-danger" ><i class="fa fa-times"></i></a>
		      			</center>
		      		</td>
		      	</tr>
		    </tbody>
		  	</table>
		</div><!-- /.box-body -->
	</div>

		<input type="hidden" value="http://localhost:5000/getListDB/{{Auth::user()->id}}" id="url">

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