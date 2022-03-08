<?php

namespace App\Validator;

use App\Helpers\Text;

abstract class AbstractValidator {

    protected $data = [];

    protected $errors = [];

    private $regex = [
        "(^[0-9]+$)" => "chiffre",
        "(^[a-z]+$)" => "lettres en miniscule",
        "(^[A-Z]+$)" => "lettres en majuscule",
    ];

    private $validate = [
        "empty",
        "regex",
        "maxLenght",
        "minLenght",
        "betweenLenght",
        "trim"
    ];

    /**
     *
     * @var array
     */
    private $keys = [];

    /**
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $k => $v) {
            $this->data[$k] = Text::e($v);
        }
        
        $this->keys = array_keys($this->data);
    }

    public function rule (string $rule, $keys, $options = null): self {

        $message = "Le name (nom) du champs d'un formulaire ne doit pas être modifier";
        if (is_array($keys) && !empty($this->data)) {
            foreach ($keys as $k) {
                if (!in_array($k, $this->keys)) {
                    throw new ValidatorException($message);
                }
            }
        } elseif (!in_array($keys, $this->keys) && !empty($this->data)) {
            throw new ValidatorException($message);
        }


        if (in_array($rule, $this->validate)) {
            if (!$options && !is_array($keys)) {
                $this->$rule($keys);
            } elseif ($options && is_string($keys)) {
                $this->$rule($keys, $options);
            } elseif ($options && is_array($keys)) {
                foreach ($keys as $k) {
                    $this->$rule($k, $options);
                }
            } elseif (!$options && is_array($keys)) {
                foreach ($keys as $k) {
                    $this->$rule($k);
                }
            }
        } else  {
            throw new ValidatorException("la régle $rule n'existe pas");
        }
        

        return $this;
    }



    /**
     *
     * @return array
     */
    public function getErrors (): array {
        return $this->errors;
    }


    /**
     *
     * @return boolean
     */
    public function has (): bool {
        return empty($this->errors);
    }

    /**
     *
     * @param string $key
     * @return void
     */
    private function empty (string $key): void {
        if (empty($this->getValue($key))) {
           $this->setErrors('empty', $key);
        }
    }

   
    /**
     *
     * @param string $key
     * @param string $regex
     * @return void
     */
    private function regex (string $key, string $regex): void {
        if (!preg_match($regex, $this->getValue($key))) {
            $this->setErrors('regex', $key, [$this->regex[$regex]]);
        }
    }

    private function minLenght (string $key, int $min): void {
        $lenght = strlen($this->getValue($key));

        if ($lenght > $min) {
            $this->setErrors('minLenght', $key, [$min]);
        }
    }

    private function maxLenght (string $key, int $max): void {
        $lenght = strlen($this->getValue($key));

        if ($lenght > $max) {
            $this->setErrors('maxLenght', $key, [$max]);
        }
    }

    /**
     *
     * @param string $rule
     * @param string $key
     * @param array $params
     * @return void
     */
    private function setErrors (string $rule, string $key, array $params = []): void {
        $this->errors[$key] = new FormateValidator($key, $rule, $params);
    }

    /**
     *
     * @param string $key
     * @return string|null
     */
    private function getValue (string $key): ?string {
        return $this->data[$key];
    }


}