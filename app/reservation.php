<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    public function room()
    {
        return $this->belongsTo('App\room');
    }

    public function customer()
    {
        return $this->belongsTo('App\customer');
    }

    public static function loadCalendarReservations()
    {

        $reservations = reservation::all();

        $eventsJson = array();

        foreach ($reservations as $reservation) {
            $eventsJson[] = array(
                'id' => $reservation->id,
                'resourceId' => $reservation->room_id,
                'start' => $reservation->checkin,
                'end' =>  date($reservation->checkout,strtotime("-1 day")), //one day before checkout date
                'title' =>  $reservation->customer->first_name . ' ' . $reservation->customer->last_name,
                'allDay' => true
            );

        }
        return $eventsJson;
    }

    public static function loadCalendarRooms() {
        $rooms = room::all();

        $roomsJson = array();

        foreach ($rooms as $room) {
            $roomsJson[] = array(
                'id' => $room->id,
                'roomtype' => $room->roomtype->roomtype,
                'title' => $room->room_number
            );

        }
        return $roomsJson;
    }

    public static function storeBooking($request) {

        $room = room::whereHas('roomtype', function ($q) use ($request) {
            $q->where('id', $request->roomtype_id);

        })->whereDoesntHave('reservation', function ($q) use ($request) {
            $q->where('checkin', '>=', date('Y-m-d', strtotime($request->start_dt)))
                ->where('checkout', '<=', date('Y-m-d', strtotime($request->end_dt)));

        })->firstOrFail(); //Get the first available room that suits the user-input

        //If the room is available, make the booking. If it doesn't exist it's likely someone booked it before user
        if(!empty($room)) {
            //get datediff
            $date1 = date_create($request->start_dt);
            $date2 = date_create($request->end_dt);
            $length_of_stay = $date2->diff($date1);
            $days = $length_of_stay->days;

            $customer = new customer;
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->save();

            $reservation = new reservation;
            $reservation->checkin = date('Y-m-d', strtotime($request->start_dt));
            $reservation->checkout = date('Y-m-d', strtotime($request->end_dt));
            $reservation->room_id = $room->id; //save room_id
            $reservation->customer_id = $customer->id; //save customer ID that just was created
            $reservation->total_price = $days * $room->roomtype->base_price;
            $reservation->save();
        } else {
            throw new Exception("Something went wrong with your booking, try to book again.");
        }

        return true;

    }
}
