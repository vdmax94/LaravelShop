<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> ['required', 'string','min:2', 'max:50'],
            'surname'=> ['required', 'string', 'min:2', 'max:50'],
            'email'=> ['required', 'string', 'email', 'unique:users', 'max:250'],
            'phone'=> ['required', 'string', 'unique:users', 'max:25'],
            'birthdate'=> ['required', 'date', 'max:25', 'before_or_equal: -18 years'],
            'password'=> ['required', 'confirmed', Password::default()],
        ];
    }
}
