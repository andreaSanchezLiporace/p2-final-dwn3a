<?php

namespace App\Utilities;

/**
 * Clase de métodos útiles para manejo de Strings.
 */
class Str
{
    /**
     * Transforma el $string a una versión "sluggificada".
     * 
     * @param string $string
     * @return string
     */
    public static function sluggify(string $string): string {
        $search = [' ', 'á', 'é', 'í', 'ó', 'ú', 'ñ', '$', '#'];
        $replace = ['-', 'a', 'e', 'i', 'o', 'u', 'ni', '', ''];
        return str_replace($search, $replace, $string);
    }
}