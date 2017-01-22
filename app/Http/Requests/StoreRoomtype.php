<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomtype extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //change to false later to make sure user need to be logged in
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'roomtype' => 'required',
            'base_price' => 'required',
            'max_occupancy' => 'required',
            'base_availability' => 'required',
            'description' => 'required',
        ];
    }

    //Error messages which will be sent to the view
    public function messages()
    {
        return [
            'roomtype.required' => 'You need to enter a roomtypename',
            'base_price.required' => 'You need to enter a price',
            'max_occupancy.required' => 'You need to enter max occupancy',
            'base_availability.required' => 'You entered the number of rooms',
            'description.required' => 'You need to enter a room description',
        ];
    }
}
