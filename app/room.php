<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

        $roomsVacants = Room::whereHas('roomtype', function ($q) use ($request) {
            $q->where('max_occupancy', '>=', $request->min_occupancy);

        })->whereDoesntHave('reservation', function ($q) use ($request) {
            $q->where('checkin', '>=', $request->start_dt);
            $q->where('checkout', '<=', $request->end_dt);
        })->groupby('roomtype_id')->distinct()
            ->get();

        return $roomsVacants;
    }
    


}
