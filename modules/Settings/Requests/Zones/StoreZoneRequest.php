<?php

declare(strict_types=1);

namespace Modules\Settings\Requests\Zones;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class StoreZoneRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'city_id' => ['required', 'integer'],
            'description' =>  ['nullable', 'string'],
        ];
    }
}
