<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'start_dt' => 'required|date|date_format:Y-m-d|before:end_dt',
            'end_dt' => 'required|date|date_format:Y-m-d|after:start_dt',
            'roomtype_id' => 'required|exists:rooms,roomtype_id',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ];
    }
}
