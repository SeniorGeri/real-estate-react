<?php

declare(strict_types=1);

namespace Modules\Property\Requests\Property;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class StorePropertyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'property_type_id' => ['required', 'integer'],
            'property_status_id' => ['required', 'integer'],
            'zone_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'max:255'],
W            'longitude' => ['required', 'string'],
            'latitude' => ['required', 'string'],
            'address' => ['required', 'string'],
            'for_sale' => ['required', 'boolean'],
            'price' => ['required', 'numeric'],
            'price_per_month' => ['required', 'numeric'],
            'for_rent' => ['required', 'boolean'],
            'views' => ['required', 'integer'],
            'is_featured' => ['required', 'boolean'],
            'is_active' => ['required', 'boolean'],
            'bedrooms' => ['required', 'integer'],
            'bathrooms' => ['required', 'integer'],
            'floor' => ['required', 'integer'],
            'garages' => ['required', 'integer'],
            'area' => ['required', 'integer'],
            'total_area' => ['required', 'integer'],
            'net_area' => ['required', 'integer'],
            'elevator' => ['required', 'boolean'],
            'logo' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'hover_image' => ['nullable', 'string'],
            'gallery' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ];
    }
}
