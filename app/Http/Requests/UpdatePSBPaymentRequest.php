<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePSBPaymentRequest extends FormRequest
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
        $uid  = auth()->user()->id;

        return [
            'noref' => 'sometimes|required',
                        Rule::unique('spps')->ignore($uid),
            'bukti_tf' => 'mimes:jpeg,png,jpg |max:4096',
        ];
    }
}
