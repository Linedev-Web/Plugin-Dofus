<?php

namespace Azuriom\Plugin\Dofus\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Azuriom\Plugin\Dofus\Models\Account;

class AccountRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account' => ['required', 'string', 'max:25', 
                function ($attribute, $value, $fail) {
                    $test = Account::where('Login', $value)->first();
                    if ($test) {
                        $fail($attribute.' already exists.');
                    }
                }
            ],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
        ];
    }
}