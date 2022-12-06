<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CoachUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('coach')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'phone_number' => ['required', 'numeric', 'max:15'],
            'description' => ['required', 'string', 'max:255'],
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
            'description.required' => 'Tidak boleh kosong',
            'description.string' => 'Harus string',
            'description.max' => 'Maximal 255',
            'image.file' => 'Bentuk harus file',
            'image.mimes' => 'Hanya boleh mengunggah gambar',
            'image.max' => 'Maximal 1MB',
        ];
    }
}
