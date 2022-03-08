<?php

namespace App\Helpers;


class Hydratation {

    static function hydrate (object $object, array $data, array $fields): void {
        if (!empty($data)) { 
            foreach ($fields as $field) {
                $method = 'set' . str_replace(' ', '', ucwords(str_replace('-', '', $field)));
                $object->$method($data[$field]);
            }
        }
    }
}