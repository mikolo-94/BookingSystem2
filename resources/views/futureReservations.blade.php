@extends('layouts.backend')

@section('content')

    <!-- Page content -->
    <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Upcomming reservations</div>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Reservation ID</th>
                                <th>Roomtype</th>
                                <th>Room number</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{$reservation->checkin}}</td>
                                    <td>{{$reservation->checkout}}</td>
                                    <td>{{$reservation->id}}</td>
                                    <td>{{$reservation->room->roomtype->roomtype}}</td>
                                    <td>{{$reservation->room->room_number}}</td>
                                    <td>{{$reservation->customer->first_name}}</td>
                                    <td>{{$reservation->customer->last_name}}</td>
                                    <td>{{$reservation->customer->phone}}</td>
                                    <td>{{$reservation->customer->email}}</td>

                                    <td><a href="deletereservation/{{$reservation->customer->id}}" class="btn btn-danger" role="button">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <p class="alert alert-danger"> @foreach ($errors->all() as $error){{ $error }}<br>
            @endforeach
        </p>
    @endif

</div>

@endsection