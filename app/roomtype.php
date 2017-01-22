<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomtype extends Model
{

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function room()
    {
        return $this->hasMany('App\room');
    }

    public static function createRoomtype($request) {
        $roomtype = new roomtype();
        $roomtype->roomtype = $request->roomtype;
        $roomtype->base_price = $request->base_price;
        $roomtype->max_occupancy = $request->max_occupancy;
        $roomtype->base_availability = $request->base_availability;
        $roomtype->description = $request->description;
        $roomtype->save();
    }
}
