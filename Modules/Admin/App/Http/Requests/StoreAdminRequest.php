<?php

namespace Modules\Admin\App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'admin_name' => ['required', 'min:3'],
            'admin_email' => ['required', 'email:dns,rfc', 'unique:admins,admin_email'],
            'admin_password' => ['required',  Password::min(8)->numbers()->symbols()->mixedCase()],
        ];
    }

    public function messages(): array
    {
        return [
            'admin_name.required' => 'The Admin Name Is required Filed ',
            'admin_name.min' => 'The Name lesser than 3 chars',
            'admin_email.required' => 'The email field is required.',
            'admin_email.email' => 'The email must be a valid email address.',
            'admin_email.exists' => 'The selected email is invalid or does not exist in our records.',
            'admin_password.required' => 'The password field is required.',
            'admin_password.min' => 'The password must be at least :min characters.',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'success' => false,

            'message' => 'Validation errors',

            'data' => $validator->errors(),

        ]));
    }
}
