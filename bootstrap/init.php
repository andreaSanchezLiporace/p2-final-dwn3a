<?php

/**
 * ARCHIVO DE INICIALIZACIÓN DEL PROYECTO
 */

/***********************************************
 * Autoload de Composer -- Acceso a cualquier dependencia que instalemos con Composer.
************************************************/
require_once __DIR__ . "/../vendor/autoload.php";

/***********************************************
 * Sesiones
************************************************/
session_start();

/***********************************************
 * Constantes
************************************************/
const RUTA_RAIZ = __DIR__ . DIRECTORY_SEPARATOR . '..';
const RUTA_IMAGENES = RUTA_RAIZ . DIRECTORY_SEPARATOR . 'recursos';

/***********************************************
 * Autoload
 * El callback del autoload recibe automáticamente el FQN de la clase que se está pidiendo.
************************************************/
spl_autoload_register(function($className) {

    $filename = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filename = substr($filename, 3); // Quitamos "App"

    $filepath = RUTA_RAIZ . DIRECTORY_SEPARATOR . "classes" . $filename . ".php";

    require_once $filepath;
});