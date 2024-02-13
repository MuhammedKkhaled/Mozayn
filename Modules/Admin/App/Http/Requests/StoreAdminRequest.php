<?php

namespace Modules\Admin\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "admin_name" => ["required", "min:3"],
            "admin_email" => ["required", "email:dns,rfc", "exists:admins,admin_email"],
            "admin_password" => ["required",  Password::min(8)->numbers()->symbols()->mixedCase()],
        ];
    }

    public function messages(): array
    {
        return [
            "admin_name.required" => "The Name Is required Filed ",
            "admin_name.min" => "The Name lesser than 3 chars",
            "admin_email.required" => "The email field is required.",
            "admin_email.email" => "The email must be a valid email address.",
            "admin_email.exists" => "The selected email is invalid or does not exist in our records.",
            "admin_password.required" => "The password field is required.",
            "admin_password.min" => "The password must be at least :min characters.",
        ];
    }

}
