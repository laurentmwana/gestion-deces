<?php

namespace App\Session;


class Session {

    private static $getSession;

    private  $key = "flash";

    private $defaultKey = "flash";

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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set (string $key, string $value): void {
        $_SESSION[$this->key][$key] = $value;
    }


    public function get ($key): array {
        if ($this->has($key)) {
                $values = $_SESSION[$this->key];
                unset($_SESSION[$this->key]);
                return $values;
        }

        return [];
    }

    public function has ($key): bool {
        return isset($_SESSION[$this->key][$key]);
    }

    private function setKey ($key, $value): void {
        $this->key[$key] = $value;
    }

    private function getKey ($key): ?string {
        return $this->key;
    } 
}