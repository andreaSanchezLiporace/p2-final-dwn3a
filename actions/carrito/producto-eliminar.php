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

$usuario = new Usuario();

try {
    if(!$usuario->discoExisteEnUsuario($autenticacion->getUsuarioId(), $idDisco)) {
        Redireccionamiento::redirect(
            '../../index.php?s=carrito',
            'No tenés ese disco en el carrito',
            'error'
        );
    }

    $usuario->eliminarDiscoDeCarrito($autenticacion->getUsuarioId(), $idDisco);

    Redireccionamiento::redirect(
        '../../index.php?s=carrito',
        'El producto fue eliminado correctamente'
    );
} catch (\Exception $e) {
    Redireccionamiento::redirect(
        '../../index.php?s=carrito',
        'Ocurrió un error inesperado. Volvé a intentar mas tarde',
        'error');
}