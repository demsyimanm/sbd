@extends('admin.AppAdmin')
@section('content')
        <section class="content-header">
	        <h1>
	        	Event
				<small>Calendar</small>
	        </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
        <div class="box" style="">
        <div class="fc-button-group">
        	<button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button>
        	<button type="button" class="fc-basicWeek-button fc-button fc-state-default">week</button>
        	<button type="button" class="fc-basicDay-button fc-button fc-state-default fc-corner-right">day</button>
        </div>
			<div class="box-body">
          		<div id='calendar' style=""></div>
          	</div>
          </div>
        </section><!-- /.content -->
        <script>

    $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '2015-02-12',
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'All Day Event',
                    start: '2015-02-01'
                },
                {
                    title: 'Long Event',
                    start: '2015-02-07',
                    end: '2015-02-10'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2015-02-09T16:00:00'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2015-02-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2015-02-11',
                    end: '2015-02-13'
                },
                {
                    title: 'Meeting',
                    start: '2015-02-12T10:30:00',
                    end: '2015-02-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2015-02-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2015-02-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2015-02-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2015-02-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2015-02-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2015-02-28'
                }
            ]
        });
        
    });

</script>
   
@endsection