  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SBDOJ</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link href="{{URL::to('plugin/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ URL::to('assets/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/font-awesome/css/font-awesome.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/ionicons/css/ionicons.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ URL::to('assets/AdminLTE/dist/css/AdminLTE.min.css')}}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
		 folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{ URL::to('assets/AdminLTE/dist/css/skins/_all-skins.css')}}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ URL::to('assets/AdminLTE/plugins/iCheck/flat/blue.css')}}">
	<!-- Morris chart -->
	
	
	<link rel="stylesheet" href="{{ URL::to('assets/AdminLTE/plugins/datepicker/datepicker3.css')}}">
	<link rel="stylesheet" href="{{ URL::to('assets/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{ URL::to('assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

	
    <link rel="stylesheet" href="{{ URL::to('assets/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}">
    <link rel='stylesheet' href="{{URL::to('assets/angular/angular-loading-bar-master/build/loading-bar.min.css')}}" type='text/css' media='all' />


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- DataTables CSS -->
  
<!-- jQuery -->
	
	<script type="text/javascript" src="{{ URL::to('assets/AdminLTE/plugins/jQuery/jquery-2.1.4.min.js') }}"></script>


	<script src="{{ URL::to('assets/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::to('assets/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ URL::to('assets/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::to('plugin/select2/dist/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('assets/angular/angular.min.js')}}"></script>
    
	<script type='text/javascript' src="{{URL::to('assets/angular/angular-loading-bar-master/build/loading-bar.min.js')}}"></script>
    <script type="text/javascript">
        var app = angular.module('myApp', ['angular-loading-bar']);
        app.config(["$interpolateProvider",function($interpolateProvider)
        {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        }]);

        app.directive('onFinishRender', function($timeout)
        {
        	return {
        		restrict : 'A',
        		link: function (scope, element, attr){
        			if (scope.$last === true){
        				$timeout(function(){
        					scope.$emit('ngRepeatFinished');
        				})
        			}
        		}
        	}
        });

    </script>
    <script type="text/javascript">
  		$('select').select2();
	</script>

    
  
  <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent !important;
      }
    </style>
    <style type="text/css">
		body {
			background: #363f48;
			color: #33333f;
			font: normal 12px;
			margin-top: 20px;
		}
		ul.countdown {
			list-style: none;
			margin: 75px 0;
			padding: 0;
			display: block;
			text-align: center;
		}
		ul.countdown li {
			display: inline-block;
		}
		ul.countdown li span {
			font-size: 80px;
			font-weight: 300;
			line-height: 80px;
		}
		ul.countdown li.seperator {
			font-size: 80px;
			line-height: 70px;
			vertical-align: top;
		}
		ul.countdown li p {
			color: black;
			font-size: 14px;
		}
</style>
  </head>
