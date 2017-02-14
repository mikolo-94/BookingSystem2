<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/searchroom', function () {
    return view('searchroom');
});

Route::get('/roomtypes', [
    'uses' => 'RoomtypeController@loadRoomtypes',
    'as' => 'roomtypes'
])->middleware('auth');

Route::get('/calendar', function () {
    return view('calendar');
})->middleware('auth');

Route::get('/calendarreservations', [
    'uses' => 'ReservationController@loadCalendarReservations',
    'as' => 'loadCalendarReservations'
])->middleware('auth');

Route::get('/calendarrooms', [
    'uses' => 'ReservationController@loadCalendarRooms',
    'as' => 'loadCalendarRooms'
])->middleware('auth');

Route::get('/futurereservations', [
    'uses' => 'ReservationController@loadfutureReservations',
    'as' => 'loadFutureReservations'
])->middleware('auth');

Route::get('/oldreservations', [
    'uses' => 'ReservationController@loadOldReservations',
    'as' => 'loadOldReservations'
])->middleware('auth');

Route::get('/deletereservation/{id}', [
    'uses' => 'CustomerController@deleteCustomer',
    'as' => 'deletereservation'
])->middleware('auth');


Route::post('/createroomtype', [
    'uses' => 'RoomtypeController@createRoomtype',
    'as' => 'createRoomtype'
])->middleware('auth');

Route::get('/createrooms/{id}', [
    'uses' => 'RoomController@createRoomspage',
    'as' => 'createroomspage'
])->middleware('auth');

Route::post('/docreaterooms', [
    'uses' => 'RoomController@createRooms',
    'as' => 'docreaterooms'
])->middleware('auth');


Route::post('/searchresult', [
    'uses' => 'RoomController@searchAvailableRooms',
    'as' => 'searchresult'
]);

Route::post('/bookingdetails', [
    'uses' => 'ReservationController@bookingDetails',
    'as' => 'bookingdetails'
]);

Route::post('/receipt', [
    'uses' => 'ReservationController@storeBooking',
    'as' => 'receipt'
]);



Auth::routes();

Route::get('/home', 'HomeController@index');
