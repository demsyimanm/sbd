@extends('admin.AppBayar')
@section('content')
    <section class="content-header">
        <h1>
        	Setting
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
	<div class="nav-tabs-custom col-md-8">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#bayar" data-toggle="tab" aria-expanded="true">Bayar</a>
			</li>
			<li class>
				<a href="#ganti" data-toggle="tab" aria-expanded="true">Ganti Paket</a>
			</li>
		</ul>
		<div class="tab-content">
			<form action="http://10.151.63.181:5000/payment/{{Auth::user()->id}}" method="POST">
				<div class="tab-pane active" id="bayar" style="padding-bottom:30%">
					<div style="padding-bottom:3%">
						<div class="form-group col-md-7">
							<div class="col-md-12">
								<label class="col-md-6">Nama Paket </label>
								<p class="col-md-6">: {{$user->data[0]->nama}}</p>
							</div>
							<div class="col-md-12">
								<label class="col-md-6">Jumlah Query / hari </label>
								<p class="col-md-6">: {{$user->data[0]->jumlah_query}} query</p>
							</div>
							<div class="col-md-12">
								<label class="col-md-6">Ukuran DB</label>
								<p class="col-md-6">: {{$user->data[0]->ukuran_db}} MB</p>
							</div>
							<div class="col-md-12">
								<label class="col-md-6">Harga / bulan </label>
								<p class="col-md-6">: ${{$user->data[0]->harga}}</p>
							</div>	
						</div>
						<div class="col-md-5">
							<div class="col-md-12">
								<center>
									<p style="font-size:16px" class="col-md-12">Pembayaran Terakhir</p>
								</center>
							</div>
							<div class="col-md-12">
								<label class="col-md-6">Bulan </label>
								<?php $bulan = 'aa'; $bulan2 = 'bb';$tahun = 'cc';?>
								@if($payment->data[0]->bulan == 1) 
									<?php 
										$bulan1 = "Januari"; 
										$bulan2 ="Februari"; 
									?>
								@elseif($payment->data[0]->bulan == 2) 
									<?php  
										$bulan1 = "Februari"; 
										$bulan2 ="Maret"; 
									?>
								@elseif($payment->data[0]->bulan == 3) 
									<?php 
										$bulan1 = "Maret"; 
										$bulan2 ="April"; 
									?>
								@elseif($payment->data[0]->bulan == 4) 
									<?php  
										$bulan1 = "April"; 
										$bulan2 ="Mei"; 
									?>
								@elseif($payment->data[0]->bulan == 5) 
									<?php  
										$bulan1 = "Mei"; 
										$bulan2 ="Juni"; 
									?>
								@elseif($payment->data[0]->bulan == 6) 
									<?php 
										$bulan1 = "Juni";
										$bulan2 ="Juli"; 
									?>
								@elseif($payment->data[0]->bulan == 7) 
									<?php 
										$bulan1 = "Juli"; 
										$bulan2 ="Agustus"; 
									?>
								@elseif($payment->data[0]->bulan == 8) 
									<?php 
										$bulan1 = "Agustus"; 
										$bulan2 ="September"; 
									?>
								@elseif($payment->data[0]->bulan == 9) 
									<?php 
										$bulan1 = "September"; 
										$bulan2 ="Oktober"; 
									?>
								@elseif($payment->data[0]->bulan == 10) 
									<?php 
										$bulan1 = "Oktober"; 
										$bulan2 ="November";  
									?>
								@elseif($payment->data[0]->bulan == 11) 
									<?php 
										$bulan1 = "November"; 
										$bulan2 ="Desember"; 
									?>
								@elseif($payment->data[0]->bulan == 12) 
									<?php 
										$bulan1 = "Desember"; 
										$bulan2 ="Januari"; 
									?>
								@endif

								@if($payment->data[0]->bulan == 12) 
									<?php 
										$tahun2 = $payment->data[0]->tahun + 1;
										$bulan3 = $payment->data[0]->bulan + 1;
									?>
								@else
									<?php
										$tahun2 = $payment->data[0]->tahun;
										$bulan3 = $payment->data[0]->bulan + 1;
									?>
								@endif
								<p class="col-md-6">: {{$bulan1}}</p>
							</div>	
							<div class="col-md-12">
								<label class="col-md-6">Tahun </label>
								<p class="col-md-6">: {{$payment->data[0]->tahun}}</p>
							</div>
							<div class="col-md-12" style="margin-top:5%">
								<center>
									<p style="font-size:16px" class="col-md-12">Pembayaran Berikutnya</p>
								</center>
							</div>
							<div class="col-md-12">
								<label class="col-md-6">Bulan </label>
								<p class="col-md-6">: {{$bulan2}}</p>
							</div>
							<div class="col-md-12">
								<label class="col-md-6">Tahun </label>
								<p class="col-md-6">: {{$tahun2}}</p>
							</div>
							<div>
								<button type="submit" class="pull-right btn btn-primary form-control">Bayar</button>
							</div>
						</div>
						<input type="hidden" name="bulan" value="{{$bulan3}}">
						<input type="hidden" name="tahun" value="{{$tahun2}}">
						<input type="hidden" name="paket_id" value="{{$user->data[0]->id}}">
					</div>
				</form>
				<br>
			</div>
			<div class="tab-pane" id="ganti">
				<div class="row form-group">
					@if($user->data[0]->id != 3)
			          <div class="col-xs-6">
			          	<div class="radio">
			          		<div class="box box-solid box-primary">
				          		<div class="box-header text-center">
				          			<div class="box-title text-center">Regular</div>
				          		</div>
				          		<div class="box-body text-center">
					          		<h5>Query : 50 queries / day</h5>
					          		<h5>DB Size : 0 MB</h5>
					          		<h5>Price : $0 / month</h5>
				          		</div>
			          		</div>
			          		<center>
			          			<div class="form-group">
						        	<a href="http://10.151.63.181:5000/update/paket/{{Auth::user()->id}}/3" class="btn btn-primary form-control">Ganti Paket Regular</a>
						      	</div>	
			          		</center>
			          	</div>	
			          </div>
			        @endif
			        @if($user->data[0]->id != 2)
			          <div class="col-xs-6">
			          	<div class="radio">
			          		<div class="box box-solid box-danger">
				          		<div class="box-header text-center">
				          			<div class="box-title text-center">Premium</div>
				          		</div>
				          		<div class="box-body text-center">
					          		<h5>Query : 300 queries / day</h5>
					          		<h5>DB Size : 50 MB</h5>
					          		<h5>Price : $5 / month</h5>
				          		</div>
			          		</div>
			          		<center>
			          			<div class="form-group">
						        	<a href="http://10.151.63.181:5000/update/paket/{{Auth::user()->id}}/2" class="btn btn-danger form-control">Ganti Paket Premium</a>
						      	</div>
			          		</center>
			          	</div>
			          </div>
			        @endif
			        @if($user->data[0]->id != 1)
			          <div class="col-xs-6">
			          	<div class="radio">
			          		<div class="box box-solid box-warning">
				          		<div class="box-header text-center">
				          			<div class="box-title text-center">Gold</div>
				          		</div>
				          		<div class="box-body text-center">
					          		<h5>Query : Unlimited queries / day</h5>
					          		<h5>DB Size : 200 MB</h5>
					          		<h5>Price : $15 / month</h5>
				          		</div>
			          		</div>
			          		<center>
			          			<div class="form-group">
						        	<a href="http://10.151.63.181:5000/update/paket/{{Auth::user()->id}}/1" class="btn btn-warning form-control">Ganti Paket Gold</a>
						      	</div>
			          		</center>
			          	</div>
			          </div>
			        @endif
			      </div>
			      <br>
			</div>
		</div>
	<!-- <form action="" method="POST" class="form-horizontal" >
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="box-body">
			<div class="form-group">
				<label class="col-md-2 control-label">Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Username</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="username" >
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password">
				</div>
			</div>
		</div>
        <div class=" col-md-6 col-md-offset-2 box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Create</button>
        </div>
	</form> -->
    </section><!-- /.content -->
@endsection
