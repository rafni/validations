<?php

namespace Rafni\Validations\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone implements Rule
{
    /**
     * @var string|bool
     */
    private $international_prefix;
    
    /**
     * Create a new rule instance.
     *
     * @param string|bool $international_prefix
     * @return void
     */
    public function __construct($international_prefix = true)
    {
        $this->international_prefix = $international_prefix;
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
        $international_pattern = '(\+?\d+([ |\-])?)?';
        if ($this->international_prefix === false) {
            $international_pattern = '';
        } elseif ($this->international_prefix !== true && $this->international_prefix !== false) {
            $international_pattern = '(\+?'.$this->international_prefix.'([ \t|\-])?)?';
        }
        $pattern = '/^('.$international_pattern.'[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/';
        
        return preg_match($pattern, $value);
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
