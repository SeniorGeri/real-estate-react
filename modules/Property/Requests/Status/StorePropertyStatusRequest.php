<?php

declare(strict_types=1);

namespace Modules\Property\Requests\Status;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class StorePropertyStatusRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['required', 'string', 'max:100'],
            'logo' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'description' =>  ['nullable', 'string'],
        ];
    }
}
