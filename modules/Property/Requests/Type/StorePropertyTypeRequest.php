<?php

declare(strict_types=1);

namespace Modules\Property\Requests\Type;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class StorePropertyTypeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'string', 'max:100'],  
            'logo' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'description' =>  ['nullable', 'string'],
        ];
    }
}
