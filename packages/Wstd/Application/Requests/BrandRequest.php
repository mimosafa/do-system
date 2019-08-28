<?php

namespace Wstd\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Wstd\Domain\Models\Brand\BrandValueStatus;

class BrandRequest extends FormRequest
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

        if (isset($all['items']) && ! is_array($all['items'])) {
            $all['items'] = explode(',', $all['items']);
        }

        if (isset($all['detach_available_cars'])) {
            if (! isset($all['available_cars']) && $all['detach_available_cars']) {
                // Detach all cars
                $all['available_cars'] = [];
            }
            unset($all['detach_available_cars']);
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
            'status' => 'sometimes|required|integer|' . Rule::in(BrandValueStatus::toArray()),
            'sub_title' => 'nullable|string|max:30',
            'description' => 'nullable|string|max:80',
            'long_description' => 'nullable|string',
            'items' => 'array',
            'items.*' => 'integer',
            'available_cars' => 'sometimes|present|array',
            'available_cars.*' => 'exists:cars,id',
        ];
    }
}
