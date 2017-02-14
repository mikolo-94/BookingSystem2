@extends('layouts.backend')

@section('content')

    <!--Fullcalendar -->
    <!-- FullCalendar -->
    <link href="{{asset('fullcalendar.min.css') }}" rel='stylesheet'/>
    <link href='/lib/fullcalendar.print.min.css' rel='stylesheet' media='print'/>
    <link href='/scheduler.min.css' rel='stylesheet'/>
    <script src='/lib/moment.min.js'></script>
    <script src='/lib/jquery.min.js'></script>
    <script src='/lib/fullcalendar.min.js'></script>
    <script src='/scheduler.min.js'></script>
    <script>

        $(function () { // document ready

            $('#calendar').fullCalendar({

                editable: false,
                aspectRatio: 1.8,
                scrollTime: '00:00',
                contentHeight: 300,

                header: {
                    left: 'today prev,next',
                    center: 'title'
                },
                defaultView: 'timelineThreeDays',
                views: {
                    timelineThreeDays: {
                        type: 'timeline',
                        duration: {weeks: 4},
                        slotDuration: {days: 1}
                    }
                },
                resourceGroupField: 'roomtype',
                resources: {
                    url: '/calendarrooms',
                    type: 'GET'
                },
                events: { // receving events from database with json
                    type: 'GET',
                    url: '/calendarreservations',
                    dataType: 'json'
                },
                eventClick: function (event, jsEvent, view, resource) {
                    var title = prompt('New Value:', event.title, {buttons: {Ok: true, Cancel: false}});
                    if (title) {
                        event.title = title;


                        $.ajax({
                            url: '/eventupdate',
                            beforeSend: function (xhr) {
                                var token = $('meta[name="csrf_token"]').attr('content');

                                if (token) {
                                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                                }
                            },
                            data: 'type=changetitle&title=' + title + '&eventid=' + event.id + '&type=' + event.type,
                            type: 'POST',
                            dataType: 'json',
                            success: function (response) {
                                if (response.status == 'success')
                                    $("#calendar").fullCalendar('removeEvents'); //Remove the current event
                                $("#calendar").fullCalendar('addEventSource', JSON); //Reload JSON

                            },
                            error: function (e) {
                                alert('Error processing your request: ' + e.responseText);
                            }

                        });
                    }
                }
            });
        });


    </script>
    <style>

        body {
            margin: 0;
            padding: 0;
            font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 100%;
        }

    </style>

    <!--End of fullcalendar -->




    <!-- Page content -->
    <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div id='calendar'></div>
    </div>


</div>

@endsection