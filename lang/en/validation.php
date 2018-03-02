<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'uppercase'             => 'The :attribute must be uppercase.',
    'phone'                 => 'The :attribute must be a telephone number.',
    'regional_phone'        => [
        'spain' => 'The :attribute must be a spanish telephone number.',
    ],
    'alpha'                 => 'The :attribute may only contain letters, dashes and blank spaces.',
    'long_text'             => 'The :attribute may only contain letters, numbers, spaces and punctuation characters.',
    'hexadecimal_color'     => 'The :attribute must be a hexadecimal color.',
    'strong_password'       => 'The :attribute must contain uppercase letters, lowercase, numbers and special characters with a minimum length of eight characters.',
    'nif_nie'               => 'The :attribute must be a valid Spanish DNI/NIE.',
    
];
