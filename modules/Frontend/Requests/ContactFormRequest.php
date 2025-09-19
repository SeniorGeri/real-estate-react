<?php

declare(strict_types=1);

namespace Modules\Frontend\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class ContactFormRequest extends FormRequest
{
 
    
    protected function prepareForValidation(): void
    {
        $this->merge([
            'ip' => $this->ip(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'property_id' => ['nullable', "numeric"],
            'user_id' => ['nullable', "numeric"],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
            'ip' => ['required', 'string'],
        ];
    }
}
