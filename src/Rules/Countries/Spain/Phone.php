<?php

namespace Rafni\Validations\Rules\Countries\Spain;

use Rafni\Validations\Rules\Phone as InternationalPhone;

class Phone extends InternationalPhone
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(34);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation::validation.regional_phone.spain');
    }
}
