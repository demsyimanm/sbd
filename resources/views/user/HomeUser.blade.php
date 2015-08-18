<!DOCTYPE html>
<html lang="en">
	@include('header')
	@include('user.NavUser')
	<style type="text/css">
	#container {
		height: 400px; 
		min-width: 310px; 
		max-width: 800px;
		margin: 0 auto;
	}
	</style>
<body>
	
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">Rekap Nilai</div>

				<div class="panel-body">
					<div id="container" style="height: 400px"></div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
@include('footer')
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Rekap Nilai Praktikum Mahasiswa'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: [1,2,3]
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'Nilai',
            data: [2, 3, null]
        }]
    });
});
</script>

<script src="{{URL::to('plugin/chart/js/highcharts.js')}}"></script>
<script src="{{URL::to('plugin/chart/js/highcharts-3d.js')}}"></script>
</html>
