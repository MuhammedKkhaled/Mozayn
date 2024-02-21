<?php

namespace Modules\Branch\App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BranchStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'branch_name' => ['required', 'string', 'min:5'],
            'branch_location' => ['required', 'string'],
            'phone' => ['required', "regex:/^(\+201|01|00201)[0-2,5]{1}[0-9]{8}/"],
            'social_media_links' => ['required', function ($attribute, $value, $fail) {
                // Validate each social media link
                foreach ($value as $platform => $link) {
                    if (! in_array($platform, ['facebook', 'instagram'])) {
                        $fail('Invalid social media platform: '.$platform);

                        return;
                    }
                    if (! filter_var($link, FILTER_VALIDATE_URL)) {
                        $fail('Invalid URL for '.$platform);

                        return;
                    }
                }
            }],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Provide a response if the validation has failed
     * */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'There is a Validation errors',
            'data' => $validator->errors(),

        ]));
    }
}
