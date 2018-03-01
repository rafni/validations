<?php

namespace Rafni\Validations\Rules;

use Illuminate\Contracts\Validation\Rule;

class HexadecimalColor implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
        return preg_match('/^#(?:(?:[a-f\d]{3}){1,2})$/i', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation::validation.hexadecimal_color');
    }
}
