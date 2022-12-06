<?php

namespace App\Rules;

use App\Models\Coach;
use Illuminate\Contracts\Validation\Rule;

class NotIsInApproval implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $coach = Coach::where('email', $value)->first();
        return $coach->is_approve == 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Menunggu persetujuan pendaftaran. Silakan tunggu beberapa waktu.';
    }
}
