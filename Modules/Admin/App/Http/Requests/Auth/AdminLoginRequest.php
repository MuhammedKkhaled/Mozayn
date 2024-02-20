<?php

namespace Modules\Admin\App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'admin_email' => ['required', 'email:dns,rfc'],
            'admin_password' => ['required', 'string'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'admin_email.required' => 'The email field is required.',
            'admin_email.email' => 'The email must be a valid email address.',
            'admin_email.exists' => 'The selected email is invalid or does not exist in our records.',
            'admin_password.required' => 'The password field is required.',
            'admin_password.min' => 'The password must be at least :min characters.',
        ];
    }
}
