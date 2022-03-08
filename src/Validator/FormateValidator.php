<?php

namespace App\Validator;

class FormateValidator {

    private  $parameters;

    private string $key;

    private string $rule;

    private $messages = [
        "empty" => "Le champs %s ne doit pas être vide",
        "minLenght" => "Le champs %s doit contenir au moins %d caratères",
        "maxLenght" => "Le champs %s doit contenir au moins %d caratères",
        "regex" => "Le champs %s doit contenir que de caratères (%s)"
    ];

    
    public function __construct(string $key, string $rule, $parameters = [])
    {
        $this->key = $key;
        $this->rule = $rule;
        $this->parameters = $parameters;
    }

    public function __toString(): string
    {
        $parameters = [$this->messages[$this->rule],$this->key];
        $parameters = array_merge($parameters, $this->parameters);

        return (string)call_user_func_array('sprintf', $parameters);
    }
}