<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCartRequest extends FormRequest
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
            'coach_domain_id' => ['required', 'exists:coach_domains,id'],
            'train_date' => ['required', 'date', 'after_or_equal:today'],
            'train_since' => ['required', 'date_format:H:i'],
            'train_until' => ['required', 'date_format:H:i', 'after:train_since'],
        ];
    }
}
