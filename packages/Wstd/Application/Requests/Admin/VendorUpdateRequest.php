<?php

namespace Wstd\Application\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Wstd\Domain\Models\Vendor\VendorValueStatus;

class VendorUpdateRequest extends FormRequest
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
            'status' => 'required_with:editDefaultInformationNow|integer|' . Rule::in(VendorValueStatus::toArray()),

            // 車両追加
            'addCarToVendorNow' => 'sometimes|accepted',
            'car.name' => 'required_with:addCarToVendorNow|string|max:100',
            'car.vin' => 'required_with:addCarToVendorNow|string|max:20',
        ];
    }
}
