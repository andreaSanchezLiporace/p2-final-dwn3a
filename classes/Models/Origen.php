<?php

namespace App\Models;

use App\Db\Conexion;

class Origen
{
    /**
     * @var int
     */
    private int $origen_id;
    /**
     * @var string
     */
    private string $pais;

    /**
     * Retorna un array con los paises disponibles para seleccionar
     * @return array
     */
    public function getPaises(): array {
        $db = Conexion::getConexion();
        $query = "SELECT * FROM origen ORDER BY pais";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOrigenId(): int {
        return $this->origen_id;
    }

    public function setOrigenId($origen_id): void {
        $this->origen_id = $origen_id;
    }

    public function getPais(): string {
        return $this->pais;
    }

    public function setPais($pais): void {
        $this->pais = $pais;
    }
}