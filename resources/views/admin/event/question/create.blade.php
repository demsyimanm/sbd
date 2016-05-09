@extends('admin.AppAdmin')
@section('content')
    <section class="content-header">
        <h1>
        	Add Question for {{$eve->data[0]->judul}}
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
	<form action="http://10.151.63.181:5000/createQuestion/{{$eve->data[0]->id}}/{{Auth::user()->paket_id}}" method="POST" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="box-body">
			<div class="form-group">
				<label class="col-md-2 control-label">Judul pertanyaan</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="judul" value="{{ old('judul') }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Pertanyaan</label>
				<div class="col-md-6">
					<textarea type="text" class="form-control" name="konten" style="resize:vertical;" ></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Jawaban</label>
				<div class="col-md-6">
					<textarea type="text" class="form-control" name="jawaban" style="resize:vertical;" ></textarea>
				</div>
			</div>
			    
		</div><!-- /.box-body -->
        <div class=" col-md-6 col-md-offset-2 box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Create</button>
        </div><!-- /.box-footer -->
	</form>
    </section><!-- /.content -->
@endsection
