<?php

namespace Rafni\Validations\Rules;

use Illuminate\Contracts\Validation\Rule;

class NifNie implements Rule
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
        if (
            strlen($value) != 9
            || preg_match('/^([XYZ]?[0-9]{7,8})([A-Z])$/i', $value, $matches) !== 1
        ) {
            return false;
        }
        $map = 'TRWAGMYFPDXBNJZSQVHLCKE';

        list(, $number, $letter) = $matches;
        $number_ready = str_replace(array('X', 'Y', 'Z'), array(0, 1, 2), strtoupper($number));

        return strtoupper($letter) === $map[((int) $number_ready) % 23];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation::validation.nif_nie');
    }
}
