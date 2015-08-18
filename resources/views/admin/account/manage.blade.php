@extends('admin.AppAdmin')
@section('content')
<div class="panel-heading">
	<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;&nbsp;Akun</h3>
</div>
<div class="panel-body">
	<div class="btn-group">
		<a href="{{URL::to('/admin/user/create')}}"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;	Tambah</button></a>
    </div>

     
</div>
@endsection