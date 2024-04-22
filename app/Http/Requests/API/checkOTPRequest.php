<?php

namespace App\Http\Requests\API;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class checkOTPRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email'=>['required','string','email',Rule::exists('users','email')],
            'otp'=>['required','max:'.config('montag_constant.LENGTH')],
        ];
    }
}
