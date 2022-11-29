<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CoachDomainInsertRequest extends FormRequest
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
            'sport_id' => ['required', 'exists:sports,id'],
            'working_days' => ['required', Rule::in(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'])],
            'working_time_start' => ['required', 'date_format:H:i'],
            'working_time_end' => ['required', 'date_format:H:i', 'after:working_time_start'],
            'price' => ['required', 'numeric', 'max:1000000']
        ];
    }
}
