<?php

namespace App\HTML;

use App\Helpers\Text;
use DateTimeInterface;

class Form {

    /**
     *
     * @var mixed
     */
    private $data;

    /**
     *
     * @var array
     */
    private $errors;

    /**
     *
     * @param mixed $data
     * @param array $errors
     */
    public function __construct($data, array $errors)
    {
        $this->errors = $errors;
        $this->data = $data;
    }

    /**
     * Génére le champs input (text, radio, etc.)
     *
     * @param string $key
     * @param string $label
     * @param string $type
     * @param string $placeholder
     * @return string
     */
    public function input (string $key, string $label, string $type = "text", string $placeholder = ""): string {
        $value = $this->getValue($key);
        return <<< HTML
        <div class="group-input">
            <label for="field-{$key}" class="field-label"> {$label} </label>
            <input type="{$type}" class="field" id="field-{$key}"  name="{$key}" placeholder="{$placeholder}" value="{$value}">
            {$this->css($key)}
        </div>
HTML;
    }

    /**
     * 
     * Génère le champs textarea
     *
     * @param string $key
     * @param string $label
     * @param string $placeholder
     * @return string
     */
    public function textarea (string $key, string $label, string $placeholder = ""): string {
        $value = $this->getValue($key);
        return <<< HTML
        <div class="group-input">
            <label for="field-{$key}" class="field-label"> {$label} </label>
            <textarea class="field" id="field-{$key}" name="{$key}" placeholder="{$placeholder}"> {$value}</textarea>
            {$this->css($key)}
        </div>
HTML;
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param string $label
     * @param mixed $options
     * @return string
     */
    public function select (string $key, string $label, $options): string {
        $value = $this->getValue($key);
        $selected = "";
        $option = <<< HTML
        <option value="">{$label}</option>
HTML;
        if (is_object($options)) {
            foreach ($options as $v) {
                if ($value === $v) {
                    $selected = 'selected';
                }
                $option .= <<< HTML
                <option value="{$v}" {$selected}>{$v}</option>
HTML;
            }
        } else {
            foreach ($options as $k => $v) {
                if ($value === $v) {
                    $selected = 'selected';
                }
                $option .= <<< HTML
                <option value="{$v}" {$selected}>{$k}</option>
HTML;
            }
        }
        
        return <<< HTML
        <div class="group-input">
            <label for="field-{$key}" class="field-label"> {$label} </label>
            <select id="field-{$key}" name="{$key}" class="field">
            {$option}
            </select>
            {$this->css($key)}
        </div>
HTML;
    }


    /**
     * récupère la valeur poster
     *
     * @param string $key
     * @return string
     */
    private function getValue (string $key): ?string {
        if (is_array($this->data)) {
            return Text::e($this->data[$key]) ?? null;
        }

        $method = 'get' . str_replace(' ', '', ucwords(str_replace('-', ' ', $key)));
        $value = $this->data->$method();

        return ($value instanceof DateTimeInterface) ?  $value->format("Y-m-d H:i:s") : $value;      
    }

    private function css ($key): ?string {
        $css = null;
        if (isset($this->errors[$key])) {
            $message = $this->errors[$key];
            $css  = <<< HTML
             <em class="error">{$message}</em>
HTML;
        }

        return $css;
    }
}