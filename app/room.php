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


        $roomsVacants = room::whereHas('roomtype', function ($q) use ($request) {
            $q->where('max_occupancy', '>=', $request->min_occupancy);

        })->whereDoesntHave('reservation', function ($q) use ($request) {
            $q->where('checkin', '>=', $request->start_dt);
            $q->where('checkout', '<=', $request->end_dt);
        })->groupby('roomtype_id')->get();

        return $roomsVacants;
    }




    public static function createRooms($request) {
        $room = new room();
        $room->roomtype_id = $request->roomtype_id;
        $room->room_number = $request->room_number;
        $room->save();
    }
}
