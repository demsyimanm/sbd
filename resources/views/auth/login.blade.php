@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<div class="deals">
							<div class="sap_tabs">	
									<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
										 <ul class="resp-tabs-list">
											  <li class="resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab">Login</li>
											  <div class="clearfix"></div>
										 </ul>				  	 
										<div class="resp-tabs-container">
											<h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0">
											
												<h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>RECENT</h2>
												<div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
													<div class="sign_in">
														<form>
															<span class="user">
																<i class="user1"> </i><input type="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
															</span>
															<span class="lock">
																<i class="lock1"> </i><input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}">
															</span>
																<div class="login-right">
																	<input type="submit" class="my-button" value="Connexion">
																		<div class="pass_active">
																			
																	   
																		<div class="clearfix"> </div>
																	   </div>
																	   <div class="clearfix"> </div>
																	</div>	
														</form>
													</div>
												</div>
												
												</div>									
										</div>
									</div>
									<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
									<script type="text/javascript">
										$(document).ready(function () {
											$('#horizontalTab').easyResponsiveTabs({
												type: 'default', //Types: default, vertical, accordion           
												width: 'auto', //auto or any width like 600px
												fit: true   // 100% fit in a container
											});
										});
									   </script>	
							</div>				
			<!-- tabs -->
			<!-- <div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
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

					<form class="form-horizontal" role="form" method="POST" action="/auth/login">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Login
								</button>

								<a href="/password/email">Forgot Your Password?</a>
							</div>
						</div>
					</form>
					<!-- tabs -->
				
				</div>
			</div> -->
		</div>
	</div>
</div>
@endsection
