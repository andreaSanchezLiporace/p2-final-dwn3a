<?php

require_once __DIR__ . '/../../bootstrap/init.php';

use App\Authentication\Autenticacion;
use App\Models\Disco;
use App\Routing\Redireccionamiento;

$autenticacion = new Autenticacion();
if(!$autenticacion->esAdmin()) {
    Redireccionamiento::redirect(
        '../index.php?s=login',
        'Debe iniciar sesión para ingresar a la página solicitada',
        'error'
    );
}

$id = $_POST['id'];

try {
    $disco = new Disco();

    // Disco para eliminar la imagen.
    $discoActual = $disco->discoTraerPorPk($id);

    $disco->eliminar($id);

    // Eliminamos la imagen.
    if(!empty($discoActual->getImagen())) {
        unlink(__DIR__ . '/../../recursos/' . $discoActual->getImagen());
    }

    Redireccionamiento::redirect(
        '../index.php?s=catalogo',
        'El producto fue eliminado con éxito',
    );
} catch (Exception $e) {
    Redireccionamiento::redirect(
        '../index.php?s=catalogo',
        'Ha ocurrido un error inesperado. Por favor, comuníquese con el proveedor del servicio.',
        'error'
    );
}