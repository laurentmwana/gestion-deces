<?php

namespace App\Validator;


class Validator {

    protected $data = [];

    protected $errors = [];

    /**
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
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
     * @param string $key
     * @param string $value
     * @return void
     */
    public function setErrors (string $key,  string $value): void {
        $this->errors[$key] = $value;
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
     * @return self
     */
    public function required (string $key): self {
        return $this;
    }

    public function empty (string $key): self {
        return $this;
    }

    /**
     *
     * @param string $key
     * @return string|null
     */
    private function getData (string $key): ?string {

        if (isset($this->data[$key]) && !empty($this->data)) {
            return $this->date[$key];
        }

        throw new ValidatorException("la clé {$key} n'est pas définie dans le formulaire");
    }
}