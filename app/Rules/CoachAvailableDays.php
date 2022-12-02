<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CoachAvailableDays implements Rule
{
    private $day;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($day)
    {
        $this->day = $day;
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
        $val = Carbon::parse($value)->format('l');

        return $val === $this->day;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Trainer ini hanya bisa di hari ' . $this->day . '. Silakan pilih tanggal yang sesuai ';
    }
}