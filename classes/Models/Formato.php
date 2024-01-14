<?php

namespace App\Models;

use App\Db\Conexion;

class Formato
{
    private int $formato_id;
    private string $nombre_formato;

    /**
     * Retorna un array con los formatos disponibles para seleccionar
     * @return array
     */
    public function getFormatosBase(): array {
        $db = Conexion::getConexion();
        $query = "SELECT * FROM formato";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getFormatoId(): int {
        return $this->formato_id;
    }

    public function setFormatoId($formato_id): void {
        $this->formato_id = $formato_id;
    }

    public function getNombreFormato(): string {
        return $this->nombre_formato;
    }

    public function setNombreFormato($nombre_formato): void {
        $this->nombre_formato = $nombre_formato;
    }
}