<?php

namespace Wstd\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Wstd\Domain\Models\Item\ItemValueStatus;

class ItemRequest extends FormRequest
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

        if (isset($all['food_photos']) && ! is_array($all['food_photos'])) {
            $all['food_photos'] = explode(',', $all['food_photos']);
        }
        if (isset($all['remove_food_photos']) && ! is_array($all['remove_food_photos'])) {
            $all['remove_food_photos'] = explode(',', $all['remove_food_photos']);
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
            'status' => 'sometimes|required|integer|' . Rule::in(ItemValueStatus::toArray()),
            'copy' => 'nullable|string|max:30',
            'description' => 'nullable|string|max:80',
            'food_photo' => 'file|image|mimes:jpeg,png,jpg',
            'food_photos' => 'array',
            'food_photos.*' => 'integer',
            'remove_food_photos' => 'array',
            'remove_food_photos.*' => 'integer',
        ];
    }
}
