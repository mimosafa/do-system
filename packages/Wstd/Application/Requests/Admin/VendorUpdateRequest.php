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
        $statusRule = Rule::in(VendorValueStatus::toArray());

        return [
            /**
             * 基本情報
             *
             * @see Wstd\View\Admin\Pages\Vendors\DefaultInformation
             * @see Wstd\View\Admin\Includes\AbstractDefaultInformation
             * @see resources/views/adminWstd/includes/defaultInformation.blade.php
             */
            'edit_vendor_default_information' => 'sometimes|accepted',
            'name' => 'required_with:edit_vendor_default_information|string|max:100',
            'status' => 'required_with:edit_vendor_default_information|integer|' . $statusRule,

            /**
             * 車両追加
             *
             * @see Wstd\View\Admin\Pages\Vendors\CarTable
             * @see resources/views/adminWstd/pages/vendors/carTable.blade.php
             */
            'add_car_to_vendor' => 'sometimes|accepted',
            'car.name' => 'required_with:add_car_to_vendor|string|max:100',
            'car.vin' => 'required_with:add_car_to_vendor|string|max:20',

            /**
             * 店舗追加
             *
             * @see Wstd\View\Admin\Pages\Vendors\ShopTable
             * @see resources/views/adminWstd/pages/vendors/shopTable.blade.php
             */
            'add_shop_to_vendor' => 'sometimes|accepted',
            'shop.name' => 'required_with:add_shop_to_vendor|string|max:100',
        ];
    }
}
