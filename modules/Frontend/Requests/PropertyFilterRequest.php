<?php

declare(strict_types=1);

namespace Modules\Frontend\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class PropertyFilterRequest extends FormRequest
{
 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "keyword" => ['nullable', 'string'],
            "type" => ['nullable', 'integer'],
            "zone" => ['nullable', 'integer'],
            "property_status" => ['nullable', 'integer'],
            "bedrooms" => ['nullable', 'integer'],
            "bathrooms" => ['nullable', 'integer'],
            "amenities" => ['nullable', 'array'],
            "price_range" => ['nullable', 'string'],
            "area_range" => ['nullable', 'string'],
            "sortby" => ['nullable', 'string'],
        ];
    }
}
