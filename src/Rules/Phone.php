<?php

namespace Rafni\Validations\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone implements Rule
{
    /**
     * @var string
     */
    private $expr;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($international_prefix = 34)
    {
        $expr_ext = '';
        if ($international_prefix) {
            $expr_ext = '(\+?'.$international_prefix.'([ \t|\-])?)?';
        }
        $this->expr = '/^('.$expr_ext.'[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/';
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
        return preg_match($this->expr, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation::validation.phone');
    }
}
