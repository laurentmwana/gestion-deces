<?php

namespace App\Session;


class FlashMessage {

    private $messages = [];


    /**
     *
     * @param array $messages
     */
    public function __construct(array $messages = [])
    {
        $this->messages = $messages;
    }

    /**
     *
     * @return string|null
     */
    public function html (): ?string {

        if (empty($this->messages)) return null;
        $values = "";
        $keys = null;

        foreach ($this->messages as $key => $value) {
            $values .=  <<< HTML
        <li> {$value} </li>
    HTML;
            if (!$keys) {
               $keys = $key;
            }
        }

        return <<< HTML
        <div class="message"> 
            <p>{$keys}</p>
            <ul>{$values}</ul>
            <button href="" class="message-cancel"> Fermer <em class="times"></em></button>
        </div>
    HTML;
    }

}