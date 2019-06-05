<?php

namespace Wstd\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Wstd\Domain\Models\Shop\ShopValueStatus;

class ShopRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:100',
            'status' => 'sometimes|required|integer|' . Rule::in(ShopValueStatus::toArray()),
            'sub_title' => 'nullable|string|max:30',
            'description' => 'nullable|string|max:80',
            'long_description' => 'nullable|string',
            'items' => 'array',
            'items.*' => 'integer',
        ];
    }
}
