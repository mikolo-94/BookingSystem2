<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class room extends Model
{

    public function roomtype()
    {
        return $this->belongsTo('App\roomtype');
    }

    public function reservation()
    {
        return $this->hasMany('App\reservation');
    }

    public static function searchAvailableRooms($request) {

        $date1 = date_create($request->start_dt);
        $date2 = date_create($request->end_dt);
        $roomsVacants = room::whereHas('roomtype', function ($q) use ($request) {
            $q->where('max_occupancy', '>=', $request->min_occupancy);

        })->whereDoesntHave('reservation', function ($q) use ($request) {
//            $q->whereRaw("'$request->start_dt' BETWEEN checkin AND checkout OR '$request->end_dt' BETWEEN checkin AND checkout OR checkin BETWEEN '$request->start_dt' AND '$request->end_dt'");
            $q->where('checkin', '>=', $request->start_dt);
            $q->where('checkout', '<', $request->end_dt);
            $q->where('checkin', '<', $request->end_dt);
            $q->where('checkout', '>', $request->start_dt);
        })->get();


        return $roomsVacants;
    }


    public static function createRooms($request) {
        $room = new room();
        $room->roomtype_id = $request->roomtype_id;
        $room->room_number = $request->room_number;
        $room->save();
    }
}
