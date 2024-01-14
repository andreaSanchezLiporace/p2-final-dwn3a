<?php

require_once __DIR__ . '/../bootstrap/init.php';

use App\Validation\ContactoValidacion;

$album   = $_POST['album'];
$artista = $_POST['artista'];
$email   = $_POST['inputEmail4'];

if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
};

if(isset($_POST['apellido'])) {
    $apellido = $_POST['apellido'];
};

if(isset($_POST['inputAdress'])) {
    $direccion = $_POST['inputAdress'];
};

if(isset($_POST['inputAdress'])) {
    $direccion = $_POST['inputAdress'];
};

if(isset($_POST['inputCity'])) {
    $ciudad = $_POST['inputCity'];
};

if(isset($_POST['inputState'])) {
    $provincia = $_POST['inputState'];
};

if(isset($_POST['inputPhone'])) {
    $telefono = $_POST['inputPhone'];
};

$validator = new ContactoValidacion($_POST);
$validator->ejecutar();

if($validator->huboErrores()) {
    $_SESSION['erroresContacto'] = $validator->getErroresContacto();
    $_SESSION['old-data-contacto'] = $_POST;
    header("Location: ../index.php?s=contacto");
    exit;
} else {
    header("Location: ../index.php?s=gracias");
}