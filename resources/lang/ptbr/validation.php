<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | O following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O :attribute deve ser aceito.',
    'accepted_if' => 'O :attribute deve ser aceito quando :other é :value.',
    'active_url' => 'O :attribute não é um URL válido.',
    'after' => 'O :attribute precisa ser uma data depois de :date.',
    'after_or_equal' => 'O :attribute precisa ser uma data igual a :date ou depois.',
    'alpha' => 'O :attribute pode conter apenas letras.',
    'alpha_dash' => 'O :attribute pode conter apenas letras, números, "-" e "_".',
    'alpha_num' => 'O :attribute pode conter apenas letras e números.',
    'array' => 'O :attribute deve ser um array.',
    'before' => 'O :attribute precisa ser uma data antes de :date.',
    'before_or_equal' => 'O :attribute precisa ser uma data igual a :date ou antes.',
    'between' => [
        'numeric' => 'O :attribute precisa estar entre :min e :max.',
        'file' => 'O :attribute precisa estar entre :min e :max kilobytes.',
        'string' => 'O :attribute precisa estar entre :min e :max caracteres.',
        'array' => 'O :attribute precisa estar entre :min e :max itens.',
    ],
    'boolean' => 'O campo do :attribute precisa ser falso ou verdadeiro.',
    'confirmed' => 'A confirmação do :attribute falhou.',
    'current_password' => 'A senha está incorreta.',
    'date' => 'O :attribute não é uma data válida.',
    'date_equals' => 'O :attribute precisa ser uma data igual a :date.',
    'date_format' => 'O :attribute não corresponde ao :format.',
    'declined' => 'O :attribute deve ser negado.',
    'declined_if' => 'O :attribute deve ser negado quando :other é :value.',
    'different' => 'O :attribute e :other devem ser diferentes.',
    'digits' => 'O :attribute deve ter :digits dígitos.',
    'digits_between' => 'O :attribute precisa ter entre :min e :max dígitos.',
    'dimensions' => 'O :attribute tem dimensões de imagem inválidas.',
    'distinct' => 'O campo do :attribute tem um valor repetido.',
    'email' => 'O :attribute deve ser um endereço de email válido.',
    'ends_with' => 'O :attribute deve acabar com um de: :values.',
    'enum' => 'O :attribute selecionado é inválido.',
    'exists' => 'O :attribute selecionado é inválido.',
    'file' => 'O :attribute deve ser yn arquivo.',
    'filled' => 'O campo do :attribute deve ter um valor.',
    'gt' => [
        'numeric' => 'O :attribute must be greater than :value.',
        'file' => 'O :attribute must be greater than :value kilobytes.',
        'string' => 'O :attribute must be greater than :value characters.',
        'array' => 'O :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'O :attribute must be greater than or equal to :value.',
        'file' => 'O :attribute must be greater than or equal to :value kilobytes.',
        'string' => 'O :attribute must be greater than or equal to :value characters.',
        'array' => 'O :attribute must have :value items or more.',
    ],
    'image' => 'O :attribute must be an image.',
    'in' => 'O selected :attribute is invalid.',
    'in_array' => 'O :attribute field does not exist in :other.',
    'integer' => 'O :attribute must be an integer.',
    'ip' => 'O :attribute must be a valid IP address.',
    'ipv4' => 'O :attribute must be a valid IPv4 address.',
    'ipv6' => 'O :attribute must be a valid IPv6 address.',
    'mac_address' => 'O :attribute must be a valid MAC address.',
    'json' => 'O :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'O :attribute must be less than :value.',
        'file' => 'O :attribute must be less than :value kilobytes.',
        'string' => 'O :attribute must be less than :value characters.',
        'array' => 'O :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'O :attribute must be less than or equal to :value.',
        'file' => 'O :attribute must be less than or equal to :value kilobytes.',
        'string' => 'O :attribute must be less than or equal to :value characters.',
        'array' => 'O :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'O :attribute must not be greater than :max.',
        'file' => 'O :attribute must not be greater than :max kilobytes.',
        'string' => 'O :attribute must not be greater than :max characters.',
        'array' => 'O :attribute must not have more than :max items.',
    ],
    'mimes' => 'O :attribute must be a file of type: :values.',
    'mimetypes' => 'O :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'O :attribute must be at least :min.',
        'file' => 'O :attribute must be at least :min kilobytes.',
        'string' => 'O :attribute must be at least :min characters.',
        'array' => 'O :attribute must have at least :min items.',
    ],
    'multiple_of' => 'O :attribute must be a multiple of :value.',
    'not_in' => 'O selected :attribute is invalid.',
    'not_regex' => 'O :attribute format is invalid.',
    'numeric' => 'O :attribute must be a number.',
    'password' => 'O password is incorrect.',
    'present' => 'O :attribute field must be present.',
    'prohibited' => 'O :attribute field is prohibited.',
    'prohibited_if' => 'O :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'O :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'O :attribute field prohibits :other from being present.',
    'regex' => 'O :attribute format is invalid.',
    'required' => 'O :attribute field is required.',
    'required_if' => 'O :attribute field is required when :other is :value.',
    'required_unless' => 'O :attribute field is required unless :other is in :values.',
    'required_with' => 'O :attribute field is required when :values is present.',
    'required_with_all' => 'O :attribute field is required when :values are present.',
    'required_without' => 'O :attribute field is required when :values is not present.',
    'required_without_all' => 'O :attribute field is required when none of :values are present.',
    'same' => 'O :attribute and :other must match.',
    'size' => [
        'numeric' => 'O :attribute must be :size.',
        'file' => 'O :attribute must be :size kilobytes.',
        'string' => 'O :attribute must be :size characters.',
        'array' => 'O :attribute must contain :size items.',
    ],
    'starts_with' => 'O :attribute must start with one of the following: :values.',
    'string' => 'O :attribute must be a string.',
    'timezone' => 'O :attribute must be a valid timezone.',
    'unique' => 'O :attribute has already been taken.',
    'uploaded' => 'O :attribute failed to upload.',
    'url' => 'O :attribute must be a valid URL.',
    'uuid' => 'O :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | O following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
