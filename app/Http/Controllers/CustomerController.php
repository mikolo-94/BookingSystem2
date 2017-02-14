<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\reservation;

use App\Http\Requests;

class CustomerController extends Controller
{

    public function deleteCustomer($id)
    {

        //first deleting reservation object and then customer object
        $customer = customer::find($id);
        $customer->reservation()->delete();
        $customer->delete();
        return redirect('/futurereservations');
    }



}
