<?php

declare(strict_types=1);

namespace Modules\Property\Requests\Property;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class StorePropertyRequest extends FormRequest
{

    public function prepareForValidation():void 
    {
        $this->merge([
            'gallery' => [$this->input('image')]
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'property_type_id' => ['nullable', 'integer'],
            'property_status_id' => ['nullable', 'integer'],
            'zone_id' => ['nullable', 'integer'],
            'city_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'title' => ['required', 'string', 'max:255'],
            'longitude' => ['nullable', 'string'],
            'latitude' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'for_sale' => ['nullable', 'boolean'],
            'price' => ['nullable', 'numeric'],
            'price_per_month' => ['nullable', 'numeric'],
            'for_rent' => ['nullable', 'boolean'],
            'views' => ['nullable', 'integer'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'bedrooms' => ['nullable', 'integer'],
            'bathrooms' => ['nullable', 'integer'],
            'floor' => ['nullable', 'integer'],
            'garages' => ['nullable', 'integer'],
            'area' => ['nullable', 'integer'],
            'total_area' => ['nullable', 'integer'],
            'net_area' => ['nullable', 'integer'],
            'elevator' => ['nullable', 'boolean'],
            'logo' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'hover_image' => ['nullable', 'string'],
            'gallery' => ['nullable', 'array'],
            'description' => ['nullable', 'string'],
        ];
    }
}
