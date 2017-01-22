<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\room;
use App\roomtype;


use App\Http\Requests;
use App\Http\Requests\searchAvailableRooms;

class RoomController extends Controller
{
    public function searchAvailableRooms(searchAvailableRooms $request) {
        $RoomsVacants  = Room::searchAvailableRooms($request);
        return view('searchresult', ['roomsVacants' => $RoomsVacants, 'days' => $this->numberOfDays($request),
            'start_dt' => $request->start_dt, 'end_dt' => $request->end_dt]);
    }

    public function numberOfDays($request) {

        $date1 = date_create($request->start_dt);
        $date2 = date_create($request->end_dt);
        $length_of_stay = $date2->diff($date1);
        $days = $length_of_stay->days;
        return $days;

    }
}
