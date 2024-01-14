<?php

use App\Authentication\Autenticacion;
use App\Routing\Redireccionamiento;

require_once __DIR__ . '/../../bootstrap/init.php';

$email      = $_POST['email'];
$password   = $_POST['password'];

$autentificacion = new Autenticacion();

if($autentificacion->iniciarSesion($email, $password)) {
    Redireccionamiento::redirect(
        '../index.php?s=homeAdmin',
        'Sesión iniciada correctamente',
    );
} else {
    $_SESSION['old_data'] = $_POST;
    Redireccionamiento::redirect(
        '../index.php?s=login',
        'Ha ingresado un email o contraseña inválidos. Intente nuevamente',
        'error'
    );
}



