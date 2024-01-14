<?php

namespace App\Db;

use PDO;
use FFI\Exception;
use PDOStatement;

class Conexion
{
    /** @var PDO */
    protected static $db;

    /** @var string */
    protected const DB_HOST = "127.0.0.1";

    /** @var string */
    protected const DB_USER = "root";

    /** @var string */
    protected const DB_PASS = "";

    /** @var string */
    protected const DB_BASE = "dw3-costantino-sanchez-final";

    /**
     * Conecta con la Base de Datos. Si tiene éxito, retorna un objeto PDO. Si falla, redirecciona a 'mantenimiento.php'.
     * @return PDO
     */
    public static function getConexion() : PDO
    {
        if(self::$db == null) {
            $db_dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_BASE . ";charset=utf8mb4";

            try {
                self::$db = new PDO($db_dsn, self::DB_USER, self::DB_PASS);
    
                // Cuando una query falla, PDO lanza PDOException.
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $exception) {
                // echo $exception->getMessage();
                require_once __DIR__ . '/../views/mantenimiento.php';
                exit;
            };
        }

        return self::$db;
    }

    public static function getStatement(string $query): \PDOStatement {
        return self::getConexion()->prepare($query);
    }
}
    