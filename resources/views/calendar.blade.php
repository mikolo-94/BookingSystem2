<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link href="{{ asset('/resources/assets/simple-sidebar.css')}}" type="text/css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
            <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <link href="{{ asset('/resources/assets/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}./style.css" type="text/css"/>
    <style>
        .row{
            margin-left:0px;
            margin-right:0px;
        }

        #wrapper {
            padding-left: 70px;
            transition: all .4s ease 0s;
            height: 100%
        }

        #sidebar-wrapper {
            margin-left: -150px;
            left: 70px;
            width: 150px;
            background: #222;
            position: fixed;
            height: 100%;
            z-index: 10000;
            transition: all .4s ease 0s;
        }

        .sidebar-nav {
            display: block;
            float: left;
            width: 150px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        #page-content-wrapper {
            padding-left: 0;
            margin-left: 0;
            width: 100%;
            height: auto;
        }
        #wrapper.active {
            padding-left: 150px;
        }
        #wrapper.active #sidebar-wrapper {
            left: 150px;
        }

        #page-content-wrapper {
            width: 100%;
        }

        #sidebar_menu li a, .sidebar-nav li a {
            color: #999;
            display: block;
            float: left;
            text-decoration: none;
            width: 150px;
            background: #252525;
            border-top: 1px solid #373737;
            border-bottom: 1px solid #1A1A1A;
            -webkit-transition: background .5s;
            -moz-transition: background .5s;
            -o-transition: background .5s;
            -ms-transition: background .5s;
            transition: background .5s;
        }
        .sidebar_name {
            padding-top: 25px;
            color: #fff;
            opacity: .7;
        }

        .sidebar-nav li {
            line-height: 40px;
            text-indent: 20px;
        }

        .sidebar-nav li a {
            color: #999999;
            display: block;
            text-decoration: none;
        }

        .sidebar-nav li a:hover {
            color: #fff;
            background: rgba(255,255,255,0.2);
            text-decoration: none;
        }

        .sidebar-nav li a:active,
        .sidebar-nav li a:focus {
            text-decoration: none;
        }

        .sidebar-nav > .sidebar-brand {
            height: 65px;
            line-height: 60px;
            font-size: 18px;
        }

        .sidebar-nav > .sidebar-brand a {
            color: #999999;
        }

        .sidebar-nav > .sidebar-brand a:hover {
            color: #fff;
            background: none;
        }

        #main_icon
        {
            float:right;
            padding-right: 65px;
            padding-top:20px;
        }
        .sub_icon
        {
            float:right;
            padding-right: 65px;
            padding-top:10px;
        }
        .content-header {
            height: 65px;
            line-height: 65px;
        }

        .content-header h1 {
            margin: 0;
            margin-left: 20px;
            line-height: 65px;
            display: inline-block;
        }

        @media (max-width:767px) {
            #wrapper {
                padding-left: 70px;
                transition: all .4s ease 0s;
            }
            #sidebar-wrapper {
                left: 70px;
            }
            #wrapper.active {
                padding-left: 150px;
            }
            #wrapper.active #sidebar-wrapper {
                left: 150px;
                width: 150px;
                transition: all .4s ease 0s;
            }
        }

    </style>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("active");
        });
    </script>

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


</head>


<body>

<div id="wrapper" class="active">

    <!-- Sidebar -->
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav">
            <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
        </ul>
        <ul class="sidebar-nav" id="sidebar">
            <li><a href="/roomtypes">Roomtypes</a></li>
            <li><a href="/calendar">Calendarview</a></li>
        </ul>
    </div>

    <!-- Page content -->
    <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div id='calendar'></div>
    </div>


</div>

</body>

</html>