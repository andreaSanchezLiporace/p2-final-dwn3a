<?php

namespace App\Models;

use App\Db\Conexion;
use PDO;

class Usuario
{
    /**@var string */
    protected $usuarios_id;

    /**@var string */
    protected $roles_fk;

    /**@var string */
    protected $email;

    /**@var string */
    protected $password;

    /**@var string */
    protected $nombre;

    /**
     * Recibe un string con el email del usuario y devuelve el Usuario de la base de datos. Si no existe, devuelve null.
     * @param string $email
     * @return Usuario|null
     */
    public function traerPorEmail(string $email): ?Usuario {
        $db = Conexion::getConexion();
        $query = "SELECT * FROM usuarios
                    WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, self::class);
        $usuario = $stmt->fetch();

        if(!$usuario) {
            return null;
        }
        
        return $usuario;
    }

    /**
     * Crea un nuevo usuario en la base de datos.
     * 
     * @param array $data
     */
    public function crear(array $data) {
        $db = Conexion::getConexion();
        $query = "INSERT INTO usuarios (roles_fk, email, password, nombre)
                    VALUES (:roles_fk, :email, :password, :nombre)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'roles_fk'  => $data['roles_fk'],
            'email'     => $data['email'],
            'password'  => $data['password'],
            'nombre'    => $data['nombre'],
        ]);
    }

    /**
     * Retorna los usuarios que tienen discos en el carrito de compras.
     * 
     * @return array|Usuario[]
     */
    public function traerUsuariosConDiscosEnCarrito(): array {
        $query = "SELECT * FROM usuarios
                    INNER JOIN historial_carrito ON usuarios.usuarios_id = historial_carrito.usuarios_fk
                    GROUP BY usuarios.usuarios_id";
        $stmt = Conexion::getStatement($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
    }

    /**
     * Retorna un array con los productos añadidos del usuario al carrito.
     * 
     * @param $pkUsuario
     * @return Disco[]
     */
    public function traerProductosCarrito(int $pkUsuario): array {
        $query = "SELECT * FROM discos
                    INNER JOIN historial_carrito ON discos.discos_id = historial_carrito.discos_fk
                    WHERE historial_carrito.usuarios_fk = ?";
        $stmt = Conexion::getStatement($query);
        $stmt->execute([$pkUsuario]);
        // $stmt->setFetchMode(PDO::FETCH_CLASS, Disco::class);

        return $stmt->fetchAll();
    }

    public function traerProductosCarritoTemporal(int $pkUsuario): array {
        $query = "SELECT * FROM discos
                    INNER JOIN usuarios_tienen_discos ON discos.discos_id = usuarios_tienen_discos.discos_fk
                    WHERE usuarios_tienen_discos.usuarios_fk = ?";
        $stmt = Conexion::getStatement($query);
        $stmt->execute([$pkUsuario]);
        // $stmt->setFetchMode(PDO::FETCH_CLASS, Disco::class);

        return $stmt->fetchAll();
    }

    /**
     * Agrega el disco seleccionado por el usuario a la base de datos.
     * 
     * @param int $pkUsuario
     * @param int $pkDisco
     */
    public function agregarDiscoACarrito(int $pkUsuario, int $pkDisco) {

        if($this->discoExisteEnUsuario($pkUsuario, $pkDisco)) {
            $query = "UPDATE usuarios_tienen_discos
                        SET cantidad = (SELECT cantidad FROM usuarios_tienen_discos 
                                            WHERE usuarios_fk = :usuarios_fk
                                            AND discos_fk = :discos_fk)+1
                        WHERE usuarios_fk = :usuarios_fk 
                        AND discos_fk = :discos_fk";
            $stmt = Conexion::getStatement($query);
            $stmt->execute([
                'usuarios_fk' => $pkUsuario,
                'discos_fk' => $pkDisco,
            ]);
        } else {
            $query = "INSERT INTO usuarios_tienen_discos (usuarios_fk, discos_fk, cantidad)
            VALUES (?, ?, ?)";
            $stmt = Conexion::getStatement($query);
            $stmt->execute([$pkUsuario, $pkDisco, 1]);
        }
    }

    /**
     * Elimina el disco seleccionado del carrito
     * 
     * @param int $pkUsuario - El id del usuario
     * @param int $pkDisco - El id del disco
     */
    public function eliminarDiscoDeCarrito(int $pkUsuario, int $pkDisco) {
        $query = "DELETE FROM usuarios_tienen_discos
                    WHERE usuarios_fk = ?
                    AND discos_fk = ?";
        $stmt = Conexion::getStatement($query);
        $stmt->execute([$pkUsuario,$pkDisco]);
    }

    /**
     * Retorna 'true' si el disco ya fue añadido previamente por el usuario autenticado.
     * 
     * @param int $pkUsuario - El id del usuario
     * @param int $pkDisco - El id del disco
     */
    public function discoExisteEnUsuario($pkUsuario,$pkDisco) {
        $query = "SELECT * FROM usuarios_tienen_discos
                    WHERE usuarios_fk = ?
                    AND discos_fk = ?";
        $stmt = Conexion::getStatement($query);
        $stmt->execute([$pkUsuario,$pkDisco]);

        return $stmt->fetch() !== false;
    }

    public function finalizarCompra($pkUsuario) {
        $db = Conexion::getConexion();
        $db->beginTransaction();
        $this->copiarDiscosAlHistorialCarrito($pkUsuario);
        $this->vaciarDiscosDelCarrito($pkUsuario);
        $db->commit();
    }

    protected function copiarDiscosAlHistorialCarrito($pkUsuario) {
        $query = "INSERT INTO historial_carrito (usuarios_fk, discos_fk, cantidad, fecha)
                    SELECT *, NOW() FROM usuarios_tienen_discos
                        WHERE usuarios_tienen_discos.usuarios_fk = ?";
        $stmt = Conexion::getStatement($query);
        $stmt->execute([$pkUsuario]);
    }

    protected function vaciarDiscosDelCarrito($pkUsuario) {
        $query = "DELETE FROM usuarios_tienen_discos
                    WHERE usuarios_tienen_discos.usuarios_fk = ?";
        $stmt = Conexion::getStatement($query);
        $stmt->execute([$pkUsuario]);
    }

    /**
     * Retorna el id del usuario
     */
    public function getUsuariosId() {
        return $this->usuarios_id;
    }

    /**
     * Setea el id del usuario
     */
    public function setUsuariosId(int $usuarios_id): void {
        $this->usuarios_id = $usuarios_id;
    }

    /**
     * Retorna el rol del usuario
     */
    public function getRolesFk() {
        return $this->roles_fk;
    }

    /**
     * Setea el rol del usuario
     */
    public function setRolesFk($roles_fk): void {
        $this->roles_fk = $roles_fk;
    }

    /**
     * Retorna el email del usuario
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Setea el email del usuario
     */
    public function setEmail($email): void {
        $this->email = $email;
    }

    /**
     * Retorna el password del usuario
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Setea el password del usuario
     */
    public function setPassword($password): void {
        $this->password = $password;
    }

    /**
     * Retorna el nombre del usuario
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Setea el nombre del usuario.
     */
    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }
}