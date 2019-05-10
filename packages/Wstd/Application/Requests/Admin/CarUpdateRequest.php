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
            // 基本情報
            'editDefaultInformationNow' => 'sometimes|accepted',
            'name' => 'required_with:editDefaultInformationNow|string|max:100',
            'vin' => 'required_with:editDefaultInformationNow|string|max:20',
            'status' => 'required_with:editDefaultInformationNow|integer|' . Rule::in(CarValueStatus::values()),
        ];
    }
}
