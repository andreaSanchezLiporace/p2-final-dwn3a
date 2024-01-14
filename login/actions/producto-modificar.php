<?php

require_once __DIR__ . '/../../bootstrap/init.php';

use App\Authentication\Autenticacion;
use App\Validation\ProductoCrearValidacion;
use App\Models\Disco;
use App\Uploaders\DiscoImagenUploader;
use PDOException;
use App\Routing\Redireccionamiento;

$autenticacion = new Autenticacion();
if(!$autenticacion->esAdmin()) {
    Redireccionamiento::redirect(
        '../index.php?s=login',
        'Debe iniciar sesión para ingresar a la página solicitada',
        'error'
    );
}

$id                     = $_POST['id'];
$album                  = $_POST['album'];
$artista                = $_POST['artista'];
$pais                   = $_POST['pais'];
$genero                 = $_POST['genero'];
$formato                = $_POST['formato'];
$lanzamiento            = $_POST['lanzamiento'];
$sinopsis               = $_POST['sinopsis'];
$precio                 = $_POST['precio'];
$imagen                 = $_FILES['imagen'];
$imagen_descripcion     = $_POST['imagen_descripcion'];

$validator = new ProductoCrearValidacion($_POST);
$validator->ejecutar();

if($validator->huboErrores()) {
    $_SESSION['errores'] = $validator->getErrores();
    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?s=modificar-producto&id=" . $id);
    exit;
}

$disco = (new Disco())->discoTraerPorPk($id);
$nombreImagenOriginal = $disco->getImagen();

if(!empty($imagen['tmp_name'])) {
    $uploader = new DiscoImagenUploader($imagen);
    $uploader->subir();
    $nombreImagen = $uploader->getFileName();
} else {
    $nombreImagen = $nombreImagenOriginal;
}

try {
    $disco = new Disco();
    $disco->modificar($id, [
        'origen_fk' => $pais,
        'genero_fk' => $genero,
        'formato_fk' => $formato,
        'album' => $album,
        'artista' => $artista,
        'lanzamiento' => $lanzamiento,
        'sinopsis' => $sinopsis,
        'precio' => $precio,
        'imagen' => $nombreImagen,
        'imagen_descripcion' => $imagen_descripcion,
    ]);

    // Si se modifica la imagen, eliminamos la anterior.
    if(!empty($imagen['tmp_name'])) {
        if(!empty($nombreImagenOriginal)) {
            unlink(__DIR__ . '/../../recursos/' . $nombreImagenOriginal);
        }
    }

    Redireccionamiento::redirect(
        '../index.php?s=catalogo',
        'El producto fue modificado correctamente',
    );
} catch (PDOException $e) {
    $_SESSION['mensaje_error'] = "Ha ocurrido un error inesperado. Por favor, comuníquese con el proveedor del servicio.";
    header("Location: ../index.php?s=modificar-producto&id=" . $id);
    exit;
}

