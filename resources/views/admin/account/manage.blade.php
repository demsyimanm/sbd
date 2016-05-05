@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    User
	</h1>
</section>
<section class="content">
	<div class="box">
		<div ng-app="myApp" ng-controller="accountCtrl"> 
		<div class="box-body">
			<br><br>
		  	<table id="data_table" class="table table-bordered table-striped">
		    <thead>
			    <tr>
			        <th width="5%" class="text-center">No</th>
			        <th width="25%">Username</th>
			        <th width="25%">Nama</th>
		        	<th width="25%">Paket</th>
		        	<th width="10%">Action</th>
		      	</tr>
		    </thead>
		    <tbody>
		      	<tr ng-repeat="x in names" on-finish-render="ngRepeatFinished">
		      		<td class="text-center">[[$index+1]]</td>
		      		<td><a href="{{URL::to('admin/user/update/')}}/[[x.id]]" >[[ x.username ]]</td>
		      		<td>[[ x.nama ]]</td>
		      		<td>[[ x.paket_nama ]]</td>
		      		<td>
		      			<center>
		      				<a href="{{ URL::to('admin/user/delete/') }}/[[x.id]]" class="btn btn-danger" ><i class="fa fa-times"></i></a>
		      			</center>
		      		</td>
		      	</tr>
		    </tbody>
		    <tfoot>
		      	<tr>
		       		<th class="text-center">No</th>
			        <th>Username</th>
			        <th>Nama</th>
		        	<th>Paket</th>
		        	<th>Action</th>
		      	</tr>
		    </tfoot>
		  	</table>
		</div><!-- /.box-body -->
	</div>
	@if(Auth::user()->paket->id == 1 || Auth::user()->paket->id == 2)
		<input type="hidden" value="http://{{$_ENV['PC_IP']}}:5000/getUser" id="url">
	@endif

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