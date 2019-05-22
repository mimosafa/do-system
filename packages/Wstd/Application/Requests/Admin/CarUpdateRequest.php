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
        $statusRule = Rule::in(CarValueStatus::toArray());

        return [
            /**
             * 基本情報
             *
             * @see Wstd\View\Admin\Pages\Cars\DefaultInformation
             * @see Wstd\View\Admin\Includes\AbstractDefaultInformation
             * @see resources/views/adminWstd/includes/defaultInformation.blade.php
             */
            'edit_car_default_information' => 'sometimes|accepted',
            'name' => 'required_with:edit_car_default_information|string|max:100',
            'vin' => 'required_with:edit_car_default_information|string|max:20',
            'status' => 'required_with:edit_car_default_information|integer|' . $statusRule,

            /**
             * 画像追加
             */
            'add_image_to_car' => 'sometimes|accepted',
            'image' => 'required_with:add_image_to_car|file|image|mimes:jpeg,png,jpg',
        ];
    }
}
