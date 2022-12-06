<?php

namespace App\Http\Requests;

use App\Rules\NotIsInApproval;
use Illuminate\Foundation\Http\FormRequest;

class CoachLoginRequest extends FormRequest
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
            'email' => ['required', 'string', new NotIsInApproval],
            'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Tidak boleh kosong',
            'email.string' => 'Harus string',
            'password.required' => 'Tidak boleh kosong',
            'password.string' => 'Harus string',
        ];
    }
}
