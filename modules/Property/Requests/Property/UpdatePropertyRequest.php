<?php

declare(strict_types=1);

namespace Modules\Property\Requests\Property;

use App\Traits\HasTranslationRulesTrait;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class UpdatePropertyRequest extends FormRequest
{
    use HasTranslationRulesTrait;

    public function prepareForValidation(): void
    {
        $this->merge([
            'image' => $this->input('gallery')[0] ?? null,
            'hover_image' => $this->input('gallery')[1] ?? $this->input('gallery')[0] ?? null,
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
            'longitude' => ['nullable', 'numeric'],
            'latitude' => ['nullable', 'numeric'],
            'address' => ['nullable', 'string'],
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
            'gallery' => ['nullable', 'array'],
            'propertyAttributes' => ['nullable', 'array'],
        ];
    }

    /**
     * Get the validation translations rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function translationsRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

        ];
    }
}
