@extends('admin.AppAdmin')
@section('content')
    <section class="content-header">
        <h1>
        	Delete Question
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	<form action="" method="POST" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id" value="{{ $eve->id }}">
		<div class="example-modal">
            <div class="example-modal">
            <div class="modal modal-danger">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Yakin Ingin Menghapus?</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
						<label class="col-md-2 control-label">Judul Pertanyaan</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="judul" value="{{ $quest->judul }}" readonly="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Pertanyaan</label>
						<div class="col-md-6">
							<textarea type="text" class="form-control" name="konten" style="resize:vertical;"  readonly="">{{ $quest->konten }}</textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Jawaban</label>
						<div class="col-md-6">
							<textarea type="text" class="form-control" name="jawaban" style="resize:vertical;"  readonly="">{{ $quest->jawaban }}</textarea>
						</div>
					</div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
      </div>
	</form>
    </section><!-- /.content -->
@endsection
