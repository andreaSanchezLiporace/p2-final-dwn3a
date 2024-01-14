<?php

namespace App\Routing;

class Redireccionamiento
{
    /**
     * Redirecciona a la URL indicada, opcionalmente con un mensaje de sesión.
     * 
     * @param string $url
     * @param null $message
     * @param string $messageType
     */
    public static function redirect(string $url, $message = null, $messageType = "exito") {
        if($message) {
            $_SESSION['mensaje_' . $messageType] = $message;
        }
        
        header("Location: " . $url);
        exit;
    }
}