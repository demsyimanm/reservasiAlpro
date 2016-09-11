@extends ('user.master.master')
@section ('content')
<title>Algorithm and Programming</title>
<h2 class="ui center aligned round icon dividing header">
    <i class=" circular calendar icon"></i>
    <div class="content">
      Jadwal Reservasi Alpro
    </div>
</h2>
<br>
<br>
<br>
<br>
<link rel="stylesheet" type="text/css" href="{{URL::to('assets/plugin/calendar/fullcalendar.css')}}">
<script src="{{URL::to('assets/plugin/calendar/lib/moment.min.js')}}"></script>
<script src="{{URL::to('assets/plugin/calendar/fullcalendar.min.js')}}"></script>
<script>
	$(document).ready(function() {
		
		$('#calendar').fullCalendar({

			header: {
				left: 'prev,next today',
				center: 'title',
				contentHeight: 600,
				right: 'month,agendaWeek,agendaDay'
			},
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				var title = prompt('Event Title:');
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');
			},
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: [
				@foreach ($reservations as $reservation)
				{
					@if ($reservation->matkul_id != "" || $reservation->matkul_id != "0" )
						title: '{{$reservation->matkul->name}}',
					@elseif ($reservation->penyewaan_lain != "" || $reservation->penyewaan_lain != "0" || $reservation->matkul_id == "0" || $reservation->matkul_id == "" )
						title: '{{$reservation->penyewaan_lain}}',
					@endif
					start: '{{$reservation->tanggal}}T{{$reservation->jam_mulai}}',
					end: '{{$reservation->tanggal}}T{{$reservation->jam_akhir}}'

				},
				@endforeach
				
			]
		});

		
	});
</script>
<style>
	body {
		margin-top : 7em;
		margin-bottom : 35em;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}
	#calendar {
		max-width: 1100px;
		margin: 0 auto;
	}
</style>

<body>

	<div id='calendar'></div>

</body>
@endsection