<?php

namespace App\Models;

use App\Db\Conexion;
use PDO;
use PDOException;

class Disco
{
    /**@var int */
    private int $discos_id;
    
    /**@var string */
    private string $album;

    /**@var string */
    private string $artista;

    /**@var string */
    private string $nombre_formato;

    /**@var string */
    private int $lanzamiento;

    /**@var string */
    private string $nombre_genero;

    /**@var string */
    private string $sinopsis;

    /**@var string */
    private string $pais;

    /**@var string */
    private string $precio;

    /**@var string */
    private string $imagen;

    /**@var string */
    private string $imagen_descripcion;

    /**
     * Retorna todos los discos.
     * @return Disco[]
     */
    public function getDiscos(): array {
        $db = Conexion::getConexion();
        $query = "SELECT * FROM discos 
                    JOIN generos ON discos.genero_fk = generos.genero_id
                    JOIN origen ON discos.origen_fk = origen.origen_id
                    JOIN formato ON discos.formato_fk = formato.formato_id
                    ORDER BY discos_id";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
    }

    /**
     * Recibe por parámetro la Primary Key (pk) del Disco y retorna el disco con ese id. De no existir, retorna null.
     * @param int $pk
     * @return Disco|null
     */
    public function discoTraerPorPk($pk): ?Disco {
        $db = Conexion::getConexion();
        $query = "SELECT * FROM discos 
                    JOIN generos ON discos.genero_fk = generos.genero_id
                    JOIN origen ON discos.origen_fk = origen.origen_id
                    JOIN formato ON discos.formato_fk = formato.formato_id
                        WHERE discos_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $disco = $stmt->fetch();
        if(!$disco) {
            return null;
        }
        return $disco;
    }

    /**
     * Crea un nuevo registro en la base de datos.
     * @param array $data
     * @throws PDOException
     */
    public function crear(array $data) {
        $db = Conexion::getConexion();
        $db->beginTransaction();
        $query = "INSERT INTO discos (origen_fk, genero_fk, formato_fk, album, artista, lanzamiento, sinopsis, precio, imagen, imagen_descripcion)
            VALUES (:origen_fk, :genero_fk, :formato_fk, :album, :artista, :lanzamiento, :sinopsis, :precio, :imagen, :imagen_descripcion)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'origen_fk'             => $data['origen_fk'],
            'genero_fk'             => $data['genero_fk'],
            'formato_fk'            => $data['formato_fk'],
            'album'                 => $data['album'],
            'artista'               => $data['artista'],
            'lanzamiento'           => $data['lanzamiento'],
            'sinopsis'              => $data['sinopsis'],
            'precio'                => $data['precio'],
            'imagen'                => $data['imagen'],
            'imagen_descripcion'    => $data['imagen_descripcion'],
        ]);
        $db->commit();
    }

    /**
     * Modifica un registro en la base de datos.
     * @param $pk
     * @param array $data
     * @throws PDOException
     */
    public function modificar($pk, array $data) {
        $db = Conexion::getConexion();
        $db->beginTransaction();
        $query = "UPDATE discos
                    SET origen_fk = :origen_fk,
                        genero_fk = :genero_fk,
                        formato_fk = :formato_fk,
                        album = :album,
                        artista = :artista,
                        lanzamiento = :lanzamiento,
                        sinopsis = :sinopsis,
                        precio = :precio,
                        imagen = :imagen,
                        imagen_descripcion = :imagen_descripcion
                    WHERE discos_id = :discos_id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'origen_fk' => $data['origen_fk'],
            'genero_fk' => $data['genero_fk'],
            'formato_fk' => $data['formato_fk'],
            'album' => $data['album'],
            'artista' => $data['artista'],
            'lanzamiento' => $data['lanzamiento'],
            'sinopsis' => $data['sinopsis'],
            'precio' => $data['precio'],
            'imagen' => $data['imagen'],
            'imagen_descripcion' => $data['imagen_descripcion'],
            'discos_id' => $pk,
        ]);
        $db->commit();
    }

    /**
     * Elimina el registro correspondiente a la $pk en la base de datos.
     * @param int $pk
     */
    public function eliminar(int $pk) {
        $db = Conexion::getConexion();
        $db->beginTransaction();
        $query = "DELETE FROM discos
                    WHERE discos_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);
        $db->commit();
    }

    /******** GETTERS Y SETTERS ********/

    /**
     * Retorna el 'id' del Disco.
     * @return int
    */
    public function getDiscoId(): int {
        return $this->discos_id;
    }

    /**
     * Modifica el 'id' del Disco.
     * @param int $disco_id
     * @return void
    */
    public function setDiscoId($discos_id): void {
        $this->discos_id = $discos_id;
    }

    /**
     * Retorna el 'artista' del Disco.
     * @return string
    */
    public function getArtista(): string {
        return $this->artista;
    }

    /**
     * Modifica el 'artista' del Disco.
     * @param string $nombre_artista
    */
    public function setNombreArtista($artista): void {
        $this->artista = $artista;
    }

    /**
     * Retorna el 'álbum' del Disco.
     * @return string
    */
    public function getAlbum(): string {
        return $this->album;
    }

    /**
     * Modifica el 'álbum' del Disco.
     * @param string $album
     * @return void
    */
    public function setAlbum($album): void {
        $this->album = $album;
    }

    /**
     * Retorna el 'formato' del Disco.
     * @return string
    */
    public function getNombreFormato(): string {
        return $this->nombre_formato;
    }

    /**
     * Modifica el 'formato' del Disco.
     * @param string $formato
     * @return void
    */
    public function setNombreFormato($nombre_formato): void {
        $this->nombre_formato = $nombre_formato;
    }

    /**
     * Retorna el 'lanzamiento' del Disco.
     * @return string
    */
    public function getLanzamiento(): string {
        return $this->lanzamiento;
    }

    /**
     * Modifica el 'formato' del Disco.
     * @param string $lanzamiento
     * @return void
    */
    public function setLanzamiento($lanzamiento): void {
        $this->lanzamiento = $lanzamiento;
    }

    /**
     * Retorna el 'género' del Disco.
     * @return string
    */
    public function getNombreGenero(): string {
        return $this->nombre_genero;
    }

    /**
     * Modifica el 'género' del Disco.
     * @param string $genero
     * @return void
    */
    public function setNombreGenero($nombre_genero): void {
        $this->nombre_genero = $nombre_genero;
    }

    /**
     * Retorna la 'sinopsis' del Disco.
     * @return string
    */
    public function getSinopsis(): string {
        return $this->sinopsis;
    }

    /**
     * Modifica la 'sinopsis' del Disco.
     * @param string $sinopsis
     * @return void
    */
    public function setSinopsis($sinopsis): void {
        $this->sinopsis = $sinopsis;
    }

    /**
     * Retorna el 'origen' del Disco.
     * @return string
    */
    public function getPais(): string {
        return $this->pais;
    }

    /**
     * Modifica el 'origen' del Disco.
     * @param string $pais
     * @return void
    */
    public function setPais($pais): void {
        $this->pais = $pais;
    }

    /**
     * Retorna el 'precio' del Disco.
     * @return string
    */
    public function getPrecio(): string {
        return $this->precio;
    }

    /**
     * Modifica el 'origen' del Disco.
     * @param string $precio
     * @return void
    */
    public function setPrecio($precio): void {
        $this->precio = $precio;
    }

    /**
     * Retorna el 'src' de la imagen del Disco.
     * @return string|null
    */
    public function getImagen(): ?string {
        return $this->imagen;
    }

    /**
     * Modifica el 'src' de la imagen del Disco.
     * @param string $imagen
     * @return void
    */
    public function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    /**
     * Retorna el 'alt' de la imagen del Disco.
     * @return string
    */
    public function getImagenDescripcion(): string {
        return $this->imagen_descripcion;
    }

    /**
     * Modifica el 'alt' de la imagen del Disco.
     * @param string $imagen_descripcion
     * @return void
    */
    public function setImagenDescripcion($imagen_descripcion): void {
        $this->imagen_descripcion = $imagen_descripcion;
    }
}