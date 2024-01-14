<?php

use App\Authentication\Autenticacion;
use App\Routing\Redireccionamiento;

require_once __DIR__ . "/../bootstrap/init.php";

$email = $_POST['email'];
$password = $_POST['password'];

$autenticacion = new Autenticacion();

if($autenticacion->iniciarSesion($email, $password)) {
    Redireccionamiento::redirect(
        '../index.php?s=home',
        'Sesión iniciada correctamente.',
    );
} else {
    $_SESSION['old_data'] = $_POST;
    Redireccionamiento::redirect(
        '../index.php?s=iniciar-sesion',
        'Los datos ingresados no coinciden con nuestros registros. Intente nuevamente.',
        'error'
    );
}