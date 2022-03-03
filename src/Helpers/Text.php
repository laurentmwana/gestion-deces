<?php


namespace App\Helpers;


class Text {

    
    /**
     * Coupe une chaine 
     *
     * @param string $string
     * @param integer $limit
     * @return string
     */
    static function excerpt (string $string, int $limit = 60): string {
        return mb_strlen($string) <= $limit ? 
        $string : substr($string, 0, $limit) . "...";
    }
}

?>
