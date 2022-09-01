<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOvertimeRequest extends FormRequest
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
            'employee_id'   => 'required|exists:employees,id',
            'date'          => 'required|date_format:Y-m-d',
            'time_started'  => 'required|date_format:H:i:s',
            'time_ended'    => 'required|date_format:H:i:s|after:time_started'
        ];
    }
}
