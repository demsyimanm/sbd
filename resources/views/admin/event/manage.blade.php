@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    Event
	</h1>
</section>
<section class="content">
	<div class="box">
		<div ng-app="myApp" ng-controller="accountCtrl">
		<div class="box-body">
			<br><div class="col-xs-3 text-left">
		        <a href="{{ URL::to('admin/event/create') }}" class="btn btn-block btn-social btn-instagram">
	            	<i class="fa fa-plus"></i> Tambah Event
	          	</a>
	      	</div><br><br><br>
		  	<table id="data_table" class="table table-bordered table-striped">
		    <thead>
			    <tr>
			        <th width="5%" class="text-center">No</th>
			        <th width="20%" class="text-center">Judul<span style="font-size:11px;"> &nbsp;(click the title to edit questions)</span></th>
		        	<th width="11%" class="text-center">Waktu Mulai</th>
		        	<th width="11%" class="text-center">Waktu Akhir</th>
		        	<th width="10%" class="text-center">DB</th>
		        	<th width="11%" class="text-center">Parser</th>
		        	<th width="22%" class="text-center">Action</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	<tr ng-repeat="x in names" on-finish-render="ngRepeatFinished">
		      		<td class="text-center">[[$index+1]]</td>
		      		<td><a href="{{ URL::to('admin/question/')}}/[[ x.id ]]" >[[ x.judul ]]</td>
		      		<td>[[ x.waktu_mulai ]]</td>
		      		<td>[[ x.waktu_akhir ]]</td>
		      		<td>[[ x.db_name ]]</td>
		      		<td>
		      			<div ng-if="[[x.status]] == '0'">
		      				<a href="{{URL::to('admin/event/parser/start/')}}/[[ x.id ]]" class="btn btn-success btn-sm">Start</a>
		      				<a href="#" class="btn btn-danger btn-sm" disabled="">Stop</a>
		      			</div>
		      			<div ng-if="[[x.status]] == '1'">
		      				<a href="#" class="btn btn-success btn-sm" disabled="">Start</a>
		      				<a href="{{URL::to('admin/event/parser/stop/')}}/[[ x.id ]]" class="btn btn-danger btn-sm" >Stop</a>
		      			</div>
		      		</td>
		      		<td>
		      			<center>
		      				<a href="{{ URL::to('event/list/peserta//')}}/[[ x.id ]]" class="btn btn-primary"><i class="fa fa-eye"></i> List Peserta</a>
	      					<a href="{{ URL::to('admin/event/update/')}}/[[ x.id ]]" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
	      					<a href="{{ URL::to('admin/event/delete/')}}/[[ x.id ]]" class="btn btn-danger" ><i class="fa fa-times"></i></a>
		      			</center>
		      		</td>
		      	</tr>
		    </tbody>
		    <tfoot>
		      	<tr>
		       		<th class="text-center">No</th>
			        <th>Judul</th>
		        	<th>Waktu Mulai</th>
		        	<th>Waktu Akhir</th>
		        	<th class="text-center">DB</th>
		        	<th class="text-center">Parser</th>
		        	<th>Action</th>
		      	</tr>
		    </tfoot>
		  	</table>
		</div><!-- /.box-body -->
	</div>

	@if(Auth::user()->paket->id == 1)
		<input type="hidden" value="http://{{$_ENV['PC_IP']}}:5000/getEvent" id="url">
	@elseif(Auth::user()->paket->id == 2)
		<input type="hidden" value="http://{{$_ENV['PC_IP']}}:5000/getEventByUserID/{{Auth::user()->id}}" id="url">
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