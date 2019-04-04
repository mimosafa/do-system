<?php

namespace App\Http\Requests;

use App\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditCar extends CreateCar
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
        $rules = parent::rules();
        unset($rules['vendor_id']);

        $status_rule = Rule::in(array_keys(Car::STATUS));

        return $rules + [
            'status' => 'required|' . $status_rule,
        ];
    }
}
