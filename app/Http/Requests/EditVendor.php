<?php

namespace App\Http\Requests;

use App\Values\Vendor\Status;
use Illuminate\Validation\Rule;

class EditVendor extends CreateVendor
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
        $rule = parent::rules();

        $status_rule = Rule::in(Status::values());

        return $rule + [
            'status' => 'required|' . $status_rule,
        ];
    }

    protected function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#edit-vendor';
    }
}
