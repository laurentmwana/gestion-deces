<?php

namespace App\Session;


class Session {

    private static $getSession;

    private  $key;

    private $defaultKey = "session";

    /**
     * Une instance de session
     *
     * @return self
     */
    static function getSession (): self {
        if (!self::$getSession) {
            self::$getSession = new Session();
        }

        return self::$getSession;
    }


    public function __construct()
    {
        session_start();
    }

    public function set (string $key, string $value): void {
        if (!$this->key) {
            $_SESSION[$this->defaultKey][$key] = $value;
        } else {
            $_SESSION[$this->key][$key] = $value;
        }
    }


    public function get ($key): array {
        $session = $_SESSION[$this->key];
        return $session;
    }

    private function setKey ($key, $value): void {
        $this->key[$key] = $value;
    }

    private function getKey ($key): ?string {
        return $this->key;
    } 
}