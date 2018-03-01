<?php

namespace Rafni\Validations\Rules;

use Illuminate\Contracts\Validation\Rule;

class LongText implements Rule
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
        return preg_match('/^[A-Za-z0-9ÁÀÂÄÃÅĄáàäãåąŒÆßÇĆČčćçÉÈÊĖĘËéèêęëėÍÌÎÏĮíìîįîïŁłŃńÓÒÔÖÕØóòôöõøŠšÚÙÛÜŲŪúùûüųūŸÝÿýŻŹżźÑñŽž∂ð \-\':;,._!¡?¿"€@*]+$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation::validation.long_text');
    }
}
