<?php


namespace App;

use App\Exceptions\Exceptions;

class URI {

    /**
     * Fait la rédirection dans la page A vers la B
     *
     * @param string $path
     * @return void
     */
    static function redirect (string $path): void {
        header("Location: " . $path);
        exit();
    }


    /**
     * Permet de retourner une valeur provenant du paramètre 
     *
     * @param string $name
     * @param integer $default = 1
     * @return int
     */
    static function getInt (string $name, int $default = 1): int {

        if (!isset($_GET[$name])) return $default;

        if (!filter_var($_GET[$name], FILTER_VALIDATE_INT)) {
           throw new Exceptions("le paramètre {$name} n'est pas un entier");
        }

        return (int)$_GET[$name];
    }

    /**
     * Permet de retourne une valeur depuis le paramètre (url) et que cette valeur soit positive
     *
     * @param string $name
     * @param integer $default
     * @return integer
     */
    static function getPositiveInt (string $name, int $default = 1): int {
        if (!isset($_GET[$name])) return $default;

        if (!filter_var($_GET[$name], FILTER_VALIDATE_INT)) {
            throw new Exceptions("le paramètre {$name} n'est pas un entier");
        }

        if ((int)$_GET[$name] <= 0) {
            throw new Exceptions("le paramètre {$name} n'est pas positive");
        }

        return (int)$_GET[$name];
    }

    /**
     * Permet de définir un paramètre dans l'url
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */ 
    static function setUri (string $key, $value): void {
        $_GET = http_build_query(array_merge($_GET, [$key => $value]));
    }
}