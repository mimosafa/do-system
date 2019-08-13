<?php

namespace Wstd\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessPermitRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'health_center_id' => 'sometimes|required|integer|gt:0',
            'business_category' => 'sometimes|required|integer|gt:0',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after:start_date',
            'car_id' => 'sometimes|required|exists:cars,id',
        ];
    }
}
