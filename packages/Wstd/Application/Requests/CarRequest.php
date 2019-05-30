<?php

namespace Wstd\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Wstd\Domain\Models\Car\CarValueStatus;

class CarRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'vin' => 'required|string|max:20',
            'status' => 'sometimes|required|integer|' . Rule::in(CarValueStatus::toArray()),
        ];
    }
}
