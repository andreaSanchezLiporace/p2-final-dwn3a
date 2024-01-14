<?php

use FFI\Exception;
use App\Models\Usuario;
use App\Routing\Redireccionamiento;

require_once __DIR__ . '/../bootstrap/init.php';

$nombre =   $_POST['nombre'];
$email =    $_POST['email'];
$password = $_POST['password'];

if($nombre == '' || $email == '' || $password == '') {
    Redireccionamiento::redirect(
        '../index.php?s=registrarse',
        'Los datos ingresados no son válidos. Intente nuevamente.',
        'error'
    );
};

$usuario = new Usuario();

if($usuario->traerPorEmail($email) == null) {
    try {
        $usuario->crear([
                'roles_fk' => 2,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nombre' => $nombre,
            ]);
    
            Redireccionamiento::redirect(
                '../index.php?s=home',
                'Cuenta creada exitosamente',
            );    
        
    } catch (Exception $error) {
        $_SESSION['old_data'] = $_POST;
        Redireccionamiento::redirect(
            '../index.php?s=registrarse',
            'Ha ocurrido un error al intentar crear un nuevo usuario. Por favor, intente mas tarde.',
            'error'
        );
    }
} else{
    Redireccionamiento::redirect(
        '../index.php?s=registrarse',
        'El mail ingresado ya existe en nuestra base de datos.',
        'error'
    );
}

