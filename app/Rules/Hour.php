<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Hour implements Rule
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
     * @param string $attribute
     * @param mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
        $parts = explode(':', $value);

        if (count($parts) !== 2) {
            return false;
        }

        if ($parts[0] < 0 || $parts[0] > 23) {
            return false;
        }

        if ($parts[1] < 0 || $parts[1] > 60) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Wrong hour: :attribute.';
    }
}
