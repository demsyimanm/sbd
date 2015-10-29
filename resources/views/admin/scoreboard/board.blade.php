@extends('admin.AppAdmin')
@section('content')
<section class="content-header">
	<h1>
	    Scoreboard
	</h1>
</section>
<section class="content">
	<div class="box">
	<div class="box-body">
		<?php $jum = $question->count()?>
		<script> 
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
	    </script>
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
	    	<?php if ($flag_nilai == 1)
	    	{
	    		$i = 1; ?>
		    	@foreach($nilai as $key	 => $value)
		    	<tr>
			    	<td class="text-center"><?php echo $i++ ?></td>
			    	<td class="text-center"><?php echo $key ?></td>
			    		<?php $nilai_tot = 0;?>
		    			@foreach($value as $item)
					    	<td class="text-center"><?php echo $item ?></td>
					    	<?php $nilai_tot += $item;?>
				        @endforeach
				    	<td class="text-center" style="display:none"><?php echo $nilai_tot;?></td>
		    	</tr>
			    @endforeach
			<?php 
			}
		    else
		    {
		    	$num = 1; ?>
		    	@foreach($user as $key)
		    	<tr>
			    	<td class="text-center"><?php echo $num++ ?></td>
			    	<td class="text-center"><?php echo $key->nama ?></td>
			    		<?php
		    			for ($a=0; $a < $sum; $a++) { 
		    			?>
		    				<td class="text-center">0</td>
		    			<?php
		    			}?>
		    		<td class="text-center">0</td>
		    	</tr>
			    @endforeach
		    <?php 
		    }
		    ?>
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