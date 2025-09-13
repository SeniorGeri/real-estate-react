<?php

declare(strict_types=1);

namespace Modules\Hrm\Requests\Instructors;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class StoreInstructorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'profile_pic' => ['nullable', 'string'],
            'name' => ['required','string'],
            'active' => ['required','boolean'],
            'email' => ['required','string'],
            'password' => ['required','string'],
            'city_id' => ['nullable', 'integer', 'exists:cities,id'],
            'country_id' => ['nullable', 'integer', 'exists:countries,id'],
            'gender_id' => ['nullable', 'integer', 'exists:genders,id'],
            'address' => ['nullable','string'],
            'bio' =>  ['nullable', 'string'],
            'specialization' =>  ['nullable', 'string'],
            'description' =>  ['nullable', 'string'],
        ];
    }
}
