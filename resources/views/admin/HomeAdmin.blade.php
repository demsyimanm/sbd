@extends('admin.AppAdmin')
@section('content')
        <section class="content-header">
	        <h1>
	        	Dashboard
				<small>Control panel</small>
	        </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
          	<h3 align="center" style="margin-top:0px;">Event Terdekat</h3>
          	<p align="center" style="margin-top:0px;font-size:40px">
					{{$event->judul}}
			</p>
			<ul class="countdown">
				<li> <span class="days">00</span>
					<p class="days_ref">days</p>
				</li>
				<li class="seperator">.</li>
				<li> <span class="hours">00</span>
					<p class="hours_ref">hours</p>
				</li>
				<li class="seperator">:</li>
				<li> <span class="minutes">00</span>
					<p class="minutes_ref">minutes</p>
				</li>
				<li class="seperator">:</li>
				<li> <span class="seconds">00</span>
					<p class="seconds_ref">seconds</p>
				</li>
				
			</ul>
				<script type="text/javascript" src="{{URL::to('plugin/counter/jquery.downCount.js')}}"></script> 
				<script class="source" type="text/javascript">
			        $('.countdown').downCount({
			            date: '{{$nearest}}',
			            offset: +7
			        }, function () {
			            alert('WOOT WOOT, done!');
			        });
			    </script> 
			    
        </section><!-- /.content -->
@endsection