<?php

namespace Wstd\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Wstd\Domain\Models\Car\CarValueStatus;

class CarRequest extends FormRequest
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

        if (isset($all['car_photos']) && ! is_array($all['car_photos'])) {
            $all['car_photos'] = explode(',', $all['car_photos']);
        }
        if (isset($all['remove_car_photos']) && ! is_array($all['remove_car_photos'])) {
            $all['remove_car_photos'] = explode(',', $all['remove_car_photos']);
        }

        if (isset($all['detach_available_brands']) && $all['detach_available_brands']) {
            unset($all['detach_available_brands']);
            if (! isset($all['available_brands'])) {
                // Detach all brands
                $all['available_brands'] = [];
            }
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
            'vin' => 'sometimes|required|string|max:20',
            'status' => 'sometimes|required|integer|' . Rule::in(CarValueStatus::toArray()),
            'car_photo' => 'file|image|mimes:jpeg,png,jpg',
            'car_photos' => 'array',
            'car_photos.*' => 'integer',
            'remove_car_photos' => 'array',
            'remove_car_photos.*' => 'integer',
            'available_brands' => 'sometimes|present|array',
            'available_brands.*' => 'exists:brands,id',
        ];
    }
}
