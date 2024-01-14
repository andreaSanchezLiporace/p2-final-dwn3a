<?php

use App\Authentication\Autenticacion;
use App\Models\Usuario;
use App\Routing\Redireccionamiento;

require_once __DIR__ . "/../../bootstrap/init.php";

$autenticacion = new Autenticacion();

if(!$autenticacion->estaAutenticado()) {
    Redireccionamiento::redirect(
        '../../index.php?s=iniciar-sesion',
        'Para agregar un producto tenés que iniciar sesión',
        'error'
    );
}

$idDisco = $_GET['id'];

$usuario = new Usuario;

try {
    $usuario->agregarDiscoACarrito($autenticacion->getUsuarioId(), $idDisco);
    Redireccionamiento::redirect(
        '../../index.php?s=catalogo',
        'El producto se agregó correctamente.'
    );
} catch (\Exception $e) {
    Redireccionamiento::redirect(
        '../../index.php?s=catalogo',
        'Ocurrió un error inesperado. Volvé a intentar mas tarde.',
        'error'
    );
}