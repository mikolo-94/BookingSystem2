<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\roomtype;


use App\Http\Requests;
use App\Http\Requests\StoreRoomtype;

class RoomtypeController extends Controller
{
    public function loadRoomtypes() {
        $roomtypes = roomtype::all();
        return view('roomtypes', ['roomtypes' => $roomtypes]);
    }

    public function CreateRoomtype(StoreRoomtype $request) {
        Roomtype::CreateRoomtype($request);
        return redirect('/roomtypes');

    }


}
