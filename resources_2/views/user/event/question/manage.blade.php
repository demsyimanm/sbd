@extends('user.AppUser')
@section('content')
<section class="content-header">
	
</section>
<?php $i=0; ?>
@foreach ($judul as $jud)
	<?php
		$temp_jud[$i] = $jud->judul;
		$temp_jud_id[$i] = $jud->id;
		$i++;
	?>
@endforeach

<section class="content">
    <div class="box box-primary">
		<div class="box-body">
			<div class="col-md-12">
		      <div class="nav-tabs-custom">
		        <ul class="nav nav-tabs">
		          <li class="active"><a href="#information" data-toggle="tab">Information</a></li>
		          <?php for ($z=0;$z<$i;$z++){?>
		          		<li><a href="#{{$temp_jud_id[$z]}}" data-toggle="tab">{{$temp_jud[$z]}}</a></li>
		          <?php } ?>
		        </ul><br>
		        <div class="tab-content">
		          <div class="active tab-pane" id="information">
		          	<div class="">
		          		<div class="box-body ">
		          			<div class="col-md-10 col-md-offset-1">
		          			<h2>
							   {{$eve->judul}}
							</h2><br>
		          				{{$eve->konten}}
		          				<br><br>
		          			</div>

		          		</div>
		          	</div>
		          </div>
		          <?php $x=0; ?>
		          @foreach ($question as $quest)
		          	<div class="tab-pane" id="{{$temp_jud_id[$x]}}">
			          	<div class="">
			          		<div class="box-body">
				          		<div class="col-md-10 col-md-offset-1">
				          			<h2>{{$quest->judul}}</h2><br>
				          			<?php echo nl2br($quest->konten)?>
				          			<form id="form1" action="{{ URL::to('user/question/'. $eve->id.'/submit/'.$quest->id) }}"  method="POST">
							        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
							        	<br><br>
						          		<h5>Salin query Anda ke textarea di bawah :</h5>
						          		<div class="form-group">
						            		<textarea type="text" name="jawaban" class="form-control input-sm" style="resize:vertical;height:250px;"></textarea>
							          	</div>
							          	<br>
							          	<div class="form-group">
							            	<div class="col-md-2 col-md-offset-10">
							              		<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
							            	</div><!-- /.col -->
							          	</div>
							        </form>
				          		</div>
				          	</div>
			          	</div>
		         	</div>
		         	<?php $x++; ?>
		          @endforeach
		        </div>
		      </div>
		    </div>
		</div>
	</div>
</section>
@endsection