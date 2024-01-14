<?php

use App\Authentication\Autenticacion;
use App\Routing\Redireccionamiento;
use App\Models\Usuario;

require_once __DIR__ . "/../../bootstrap/init.php";

$autenticacion = new Autenticacion();

$idUsuario = $_POST['id'];

if(!$autenticacion->estaAutenticado()) {
    Redireccionamiento::redirect(
        '../../index.php?s=iniciar-sesion',
        'Debe iniciar sesión para realizar esta accion',
        'error',
    );
}

try {
    (new Usuario())->finalizarCompra($idUsuario);

    Redireccionamiento::redirect(
        '../../index.php?s=gracias',
        'Tu compra se realizó con éxito'
    );
} catch (\Exception $e) {
    Redireccionamiento::redirect(
        '../../index.php?s=carrito',
        'Hubo un problema al procesar la compra. Volvé a intentar mas tarde' . $e->getMessage(),
        'error'
    );
}