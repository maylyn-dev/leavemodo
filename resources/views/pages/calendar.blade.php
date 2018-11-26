@extends('layouts.admin-template')

@section('content-header')
    <h4>Calendar</h4>
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-body no-padding">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
        </div><!-- /.box-body -->
    </div><!-- /. box -->
@endsection

@section('footer')
    <script>
        $(function () {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function () {

                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    };

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject);

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    });

                });
            }
            ini_events($('#external-events div.external-event'));

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date();
            var d = date.getDate(),
                    m = date.getMonth(),
                    y = date.getFullYear();
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day'
                },
                // Approved Leave Requests
                events: [
                    <?php foreach($events as $event) : ?>
                    {
                        title: '{{ $event->user->name }}:{{ $event->type->name }}',
                        start: '{{ $event->start_date->format('Y-m-d') }}',
                        end: '{{ $event->end_date->format('Y-m-d') }}',
                        backgroundColor: "#f56954", //red
                        borderColor: "#f56954" //red
                    },
                    <?php endforeach; ?>
                ],
            });
        });
    </script>
@endsection