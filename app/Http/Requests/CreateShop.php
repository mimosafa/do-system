<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShop extends FormRequest
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
        return [
            'vendor_id' => 'required|integer',
            'name' => 'max:100|nullable',
            'copy' => 'max:30|nullable',
            'short_text' => 'max:80|nullable',
            'text' => 'nullable',
            'genres' => 'array',
        ];
    }
}
