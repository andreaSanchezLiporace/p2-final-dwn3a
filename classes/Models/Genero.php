<?php

namespace App\Models;

use App\Db\Conexion;

class Genero
{
    private int $genero_id;
    private string $nombre_genero;

    /**
     * Retorna un array con los géneros disponibles para seleccionar
     * @return array
     */
    public function getGenerosBase(): array {
        $db = Conexion::getConexion();
        $query = "SELECT * FROM generos";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getGeneroId(): int {
        return $this->genero_id;
    }

    public function setGeneroId($genero_id): void {
        $this->genero_id = $genero_id;
    }

    public function getNombreGenero(): string {
        return $this->nombre_genero;
    }

    public function setNombreGenero($nombre_genero): void {
        $this->nombre_genero = $nombre_genero;
    }
}