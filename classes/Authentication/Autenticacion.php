<?php

namespace App\Authentication;

use App\Models\Usuario;

class Autenticacion
{
    /**@var Usuario */
    protected $usuario;

    /**
     * Retorna 'true' si el email y password ingresados pertenecen a un Usuario de la base de datos. También autentica al Usuario en el sistema.
     * 
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function iniciarSesion(string $email, string $password): bool {

        $this->usuario = (new Usuario())->traerPorEmail($email);

        if($this->usuario === null) {
            return false;
        }
        
        if(!password_verify($password, $this->usuario->getPassword())) {
            return false;
        }

        $this->autenticarUsuario($this->usuario);
        
        return true;
    }

    /**
     * Autentica al usuario en el sistema.
     * @param Usuario $usuario
     */
    public function autenticarUsuario(Usuario $usuario) {
        $_SESSION['id'] = $usuario->getUsuariosId();
        $_SESSION['rol'] = $usuario->getRolesFk();
        $_SESSION['nombre'] = $usuario->getNombre();
        $_SESSION['email'] = $usuario->getEmail();
    }

    /**
     * Cierra la sesión.
     */
    public function cerrarSesion() {
        unset($_SESSION['id']);
        unset($_SESSION['nombre']);
        unset($_SESSION['rol']);
        unset($_SESSION['email']);
    }

    /**
     * Retorna 'true' si el usuario está autenticado
     * @return bool
     */
    public function estaAutenticado(): bool {
        return isset($_SESSION['id']);
    }

    /**
     * Retorna 'true' si es un usuario administrador.
     * 
     * @return bool
     */
    public function esAdmin(): bool {
        if(!$this->estaAutenticado()) {
            return false;
        };

        return $this->getUsuario()->getRolesFk() == 1;
    }

    /**
     * Retorna el 'id' del Usuario autenticado.
     * @return int|null
     */
    public function getUsuarioId(): ?int {
        return $_SESSION['id'] ?? null;
    }

    /**
     * Retorna el usuario autenticado.
     * 
     * @return Usuario|null
     */
    public function getUsuario(): ?Usuario {
        if(!$this->estaAutenticado()) {
            return null;
        };

        if($this->usuario === null) {
            $this->usuario = (new Usuario())->traerPorEmail($_SESSION['email']);
        };        

        return $this->usuario;
    }
}