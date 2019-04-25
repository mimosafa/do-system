<?php

namespace App\Http\Requests;

use App\Values\Car\Status;
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

    protected function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#edit-car';
    }
}
