<?php

namespace Wstd\Application\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Wstd\Domain\Models\Car\CarValueStatus;

class CarUpdateRequest extends FormRequest
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
            'edit-name-now' => 'accepted',
            'name' => 'required_with:edit-name-now|string|max:100',
            'edit-vin-now' => 'accepted',
            'vin' => 'required_with:edit-vin-now|string|max:20',
            'edit-status-now' => 'accepted',
            'status' => 'required_with:edit-status-now|integer|' . Rule::in(CarValueStatus::values()),
        ];
    }
}
