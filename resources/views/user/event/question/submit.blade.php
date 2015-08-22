@extends('user.AppUser')
@section('content')
<section class="content-header">
	<h1>
	    Question "{{$quest->judul}}" {{$eve->judul}}  Kelas {{$eve->kelas}}
	</h1>
</section>
<section class="content">
	<div class="box">
		<form action"" method="post">
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<br><br>
        	<div class = "col-md-8 col-md-offset-1">
        		<h6>Soal :</h6>
        		<h4>{{$quest->konten}}</h4><br>
        	</div>
          	<div class="form-group has-feedback col-md-8 col-md-offset-1">
          		<h5>Salin query Anda ke textarea di bawah :</h5>
            	<textarea type="text" name="jawaban" class="form-control input-sm" style="resize:vertical;height:250px;"></textarea>
          	</div>
          	<div class="row">
            	<div class="col-md-2 col-md-offset-7">
              		<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            	</div><!-- /.col -->
          	</div>
        </form>
	<div class="box-body">
      	
	</div><!-- /.box-body -->
</section>
@endsection