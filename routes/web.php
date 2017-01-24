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
]);

Route::get('/calendar', function () {
    return view('calendar');
});

Route::get('/calendarreservations', [
    'uses' => 'ReservationController@loadCalendarReservations',
    'as' => 'loadCalendarReservations'
]);

Route::get('/calendarrooms', [
    'uses' => 'ReservationController@loadCalendarRooms',
    'as' => 'loadCalendarRooms'
]);


Route::post('/createroomtype', [
    'uses' => 'RoomtypeController@createRoomtype',
    'as' => 'createRoomtype'
]);

Route::get('/createrooms/{id}', [
    'uses' => 'RoomController@createRoomspage',
    'as' => 'createroomspage'
]);

Route::post('/docreaterooms', [
    'uses' => 'RoomController@createRooms',
    'as' => 'docreaterooms'
]);


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


