<?php

use App\Authentication\Autenticacion;
use App\Routing\Redireccionamiento;

require_once __DIR__ . "/../bootstrap/init.php";

$autenticacion = new Autenticacion();

$autenticacion->cerrarSesion();

Redireccionamiento::redirect(
    '../index.php?s=home',
    'Sesión cerrada con éxito.',
);