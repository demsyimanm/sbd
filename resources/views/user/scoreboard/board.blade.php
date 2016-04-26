@extends('user.AppUser')
@section('content')
<section class="content-header">
	<h1>
	    Scoreboard {{$event->judul}} Kelas {{$event->kelas}}
	</h1>
</section>
<section class="content">
	<div class="box box-primary">
	<div class="box-body">
		<?php $jum = $question->count()?>
		<!--script> 
		    var table = $(function () {
		    	$("#data_table").DataTable({
		    		"paging" : false,
		    		"order" : [[ {{ $jum + 2 }},"desc" ]],
				    		ajax: "refresh/{{$id}}"
		    	});
		    });
			
			table.ajax.url( 'refresh/{{$id}}' ).load();
			setInterval( function () {
			    table.ajax.reload(); // user paging is not reset on reload
			}, 3000 );
		 //    repeatAjax();

			// function repeatAjax(){
			// jQuery.ajax({
			//     type: "GET",
			//     url: 'refresh/{{$id}}',
			//     dataType: 'json',
			//     success: function (response) {
			//     	var trHTML = '';
			//         $.each(response, function (i, item) {
			//             trHTML += '<tr><td>' + item.rank + '</td><td>' + item.content + '</td><td>' + item.UID + '</td></tr>';
			//         });
			//         $('#records_table').append(trHTML);
			//     },
			//           complete: function() {
			//                 setTimeout(repeatAjax,5000); //After completion of request, time to redo it after a second
			//              }
			//         });
			// }
	    </script-->
	  	<table id="data_table" class="table table-bordered table-striped">
	  	<?php $i = 1;?>
	    <thead>
		    <tr>
		    	<th width="5%" class="text-center">No</th>
		        <th width="30%" class="text-center">NRP</th>
		        <?php $sum = 0;?>
		        @foreach($question as $quest)
		        	<th class="text-center">{{ $quest->judul }}</th>
		        	<?php $sum += 1;?>
		        @endforeach
		        <th class="text-center">Total</th>
	      	</tr>
	    </thead>
	    <tbody>
	    	<?php $i = 1; ?>
	    	@foreach($nilai as $key	 => $value)
	    	<tr>
		    	<td class="text-center"><?php echo $i++ ?></td>
		    	<td class="text-center"><?php echo $key ?></td>
		    		<?php $nilai_tot = 0;?>
	    			@foreach($value as $item)
				    	<td class="text-center"><?php echo $item ?></td>
			        @endforeach
			    	
	    	</tr>
		    @endforeach
	    </tbody>
	    <tfoot>
	      	<tr>
		    	<th width="5%" class="text-center">No</th>
		        <th width="30%" class="text-center">NRP</th>
		        @foreach($question as $quest)
		        	<th class="text-center">{{ $quest->judul }}</th>
		        @endforeach
		        <th class="text-center">Total</th>
	      	</tr>
	    </tfoot>
	  	</table>
	</div><!-- /.box-body -->
</section>
@endsection