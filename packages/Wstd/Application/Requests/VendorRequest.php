<?php

namespace Wstd\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Wstd\Domain\Models\Vendor\VendorValueStatus;

class VendorRequest extends FormRequest
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

    public function all($keys = null)
    {
        $all = parent::all($keys);

        if (isset($all['cars']) && ! is_array($all['cars'])) {
            $all['cars'] = explode(',', $all['cars']);
        }
        if (isset($all['shops']) && ! is_array($all['shops'])) {
            $all['shops'] = explode(',', $all['shops']);
        }
        if (isset($all['items']) && ! is_array($all['items'])) {
            $all['items'] = explode(',', $all['items']);
        }

        return $all;
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
            'status' => 'sometimes|required|integer|' . Rule::in(VendorValueStatus::toArray()),
            'cars' => 'array',
            'cars.*' => 'integer',
            'shops' => 'array',
            'shops.*' => 'integer',
            'items' => 'array',
            'items.*' => 'integer',
        ];
    }
}
