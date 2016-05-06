@extends('admin.AppAdmin')
@section('content')
    <section class="content-header">
        <h1>
        	Add Participant
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    @if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="http://localhost:5000/addParticipant/{{Auth::user()->id}}" method="POST" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="box-body">
			<div class="form-group">
				<label class="col-md-2 control-label">Nama Peserta</label>
				<div class="col-md-6">
					<select class="js-data-example-ajax form-control" name="user">
						<option value="0" selected="selected" >Pilih Peserta ...</option>
						@foreach ($users->data as $user)
					  		<option value="{{$user->id}}" >{{$user->nama}} ({{$user->username}})</option>
					  	@endforeach
					</select>

				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Role</label>
				<div class="col-md-6">
			    	<select class="form-control" name="role">
			    		<option value="2">Peserta</option>
			    		<option value="1">Admin</option>
			    	</select>
			    </div>
			</div>
			 <div class=" col-md-6 col-md-offset-2 box-footer">
            	<button type="submit" class="btn btn-info pull-right">Create</button>
        	 </div><!-- /.box-footer -->
		</div><!-- /.box-body -->
        
	</form>
	<!--input type="hidden" value="http://{{$_ENV['PC_IP']}}:5000/getUser" id="url"-->
	<script type="text/javascript">
  		$('select').select2();
	</script>
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
	<!--script type="text/javascript">
		$(".js-data-example-ajax").select2({
		  ajax: {
		    url: "https://api.github.com/search/repositories",
		    dataType: 'json',
		    delay: 250,
		    data: function (params) {
		      return {
		        q: params.term, // search term
		        page: params.page
		      };
		    },
		    processResults: function (data, params) {
		      // parse the results into the format expected by Select2
		      // since we are using custom formatting functions we do not need to
		      // alter the remote JSON data, except to indicate that infinite
		      // scrolling can be used
		      params.page = params.page || 1;

		      return {
		        results: data.items,
		        pagination: {
		          more: (params.page * 30) < data.total_count
		        }
		      };
		    },
		    cache: true
		  },
		  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
		  minimumInputLength: 1,
		  templateResult: formatRepo, // omitted for brevity, see the source of this page
		  templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
		});
	</script-->
</section><!-- /.content -->
@endsection
