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

    'uppercase'             => 'El :attribute debe estar en mayúsculas.',
    'phone'                 => 'El :attribute debe ser un número de teléfono.',
    'regional_phone'        => [
        'spain' => 'El :attribute debe ser un número de teléfono español.',
    ],
    'alpha'                 => 'El :attribute solo puede contener letras, guiones y espacios en blanco.',
    'long_text'             => 'El :attribute solo puede contener letras, números, espacios y caracteres de puntuación.',
    'hexadecimal_color'     => 'El :attribute debe ser un color hexadecimal.',
    'strong_password'       => 'La :attribute debe contener letras mayúsculas, minúsculas, números y caracteres especiales con una longitud mínima de ocho caracteres',
    'nif_nie'               => 'El :attribute debe ser un DNI / NIE español válido.',

];
