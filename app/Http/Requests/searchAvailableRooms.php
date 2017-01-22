<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class searchAvailableRooms extends FormRequest
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
            'min_occupancy' => 'required',
        ];
    }

    public function messages() {
        return [
            'start_dt.required' => 'You need to enter a valid check-in date',
            'start_dt.date' => 'You need to enter a valid check-in date',
            'start_dt.date_format' => 'You need to enter a valid check-in date',
            'start_dt.before' => 'You need to enter a valid check-in date',
            'end_dt.required' => 'You need to enter a valid check-out date',
            'end_dt.date' => 'You need to enter a valid check-out date',
            'end_dt.date_format' => 'You need to enter a valid check-out date',
            'end_dt.before' => 'You need to enter a valid check-out date',
        ];
    }
}
