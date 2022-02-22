<?php

namespace App;


class Request {

    /**
     * La requete 
     *
     * @var array
     */
    private $request = [];

    /**
     * Request COnstructor 
     *
     * @param array $request
     */
    public function __construct(array $request = [])
    {
        $this->request = $request;
    }


    /**
     * La requete en post 
     *
     * @return array
     */
    public function get (): array {
        return $this->request;
    }

    /**
     * Vérifie les données ont été poster 
     *
     * @param string $key
     * @return boolean
     */
    public function isset (string $key): bool  {
        return isset($this->request[$key]);
    }

    /**
     * Vérifie si un champs est vide 
     *
     * @param string $key
     * @return boolean
     */
    public function empty (string $key): bool {
        return isset($this->request[$key]);
    }   

    /**
     * Une valeur 
     *
     * @param string $key
     * @return string
     */
    public function getValue (string $key): string {
        return isset($this->request[$key]);
    }



}