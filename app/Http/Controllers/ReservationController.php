<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\roomtype;
use App\reservation;

use App\Http\Requests;
use App\Http\Requests\ChooseRoomtype;
use App\Http\Requests\StoreReservation;

class ReservationController extends Controller
{

    public function bookingDetails(ChooseRoomtype $request) {
        $roomTypeDetails = Roomtype::where('id', '=', $request->roomtype_id)->first();
        return view('bookingdetails', ['roomTypeDetails' => $roomTypeDetails, 'start_dt' => $request->start_dt,
            'end_dt' => $request->end_dt]);

    }

    public function storeBooking(StoreReservation $request) {
        reservation::storeBooking($request);
        return view('receipt');
    }

    public function loadCalendarReservations() {
        //encoding to json to be able to display in fullcalendare
        return json_encode(reservation::loadCalendarReservations());
    }

    public function loadCalendarRooms() {
        return json_encode(reservation::loadCalendarRooms());
    }

    public function loadFutureReservations() {

        $reservations = reservation::where('checkin', '>=', date("Y-m-d"))->get();
        return view('futureReservations', ['reservations' => $reservations]);

    }

    public function loadOldReservations() {

        $reservations = reservation::where('checkin', '<', date("Y-m-d"))->get();
        return view('oldReservations', ['reservations' => $reservations]);
    }

}
