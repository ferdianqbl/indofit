<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('user')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone_number' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:50'],
            'image' => ['file', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tidak boleh kosong',
            'name.string' => 'Harus string',
            'name.max' => 'Maximal 50 huruf',
            'phone_number.required' => 'Tidak boleh kosong',
            'phone_number.numerik' => 'Harus numerik',
            'phone_number.max' => 'Maximal 15 digit',
            'image.file' => 'Bentuk harus file',
            'image.mimes' => 'Hanya boleh mengunggah gambar',
            'image.max' => 'Maximal 1MB',
        ];
    }
}
