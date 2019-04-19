<?php

namespace App\Http\Requests;

use App\Values\Shop\Status;
use Illuminate\Validation\Rule;

class EditShop extends CreateShop
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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

        $status_rule = Rule::in(Status::values());

        return $rules + [
            'status' => 'required|' . $status_rule,
            'image' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
