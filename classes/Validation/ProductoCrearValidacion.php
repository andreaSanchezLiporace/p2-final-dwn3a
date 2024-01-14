<?php

namespace App\Validation;

class ProductoCrearValidacion
{
    protected $data = [];
    protected $errores = [];

    /**
     * Los datos a validar
     * @param array $data
     */
    public function __construct(array $data) {
        $this->data = $data;
    }

    /**
     * Ejecuta las validaciones
     * @return void
     */
    public function ejecutar(): void {
        // Álbum
        if(empty($this->data['album'])) {
            $this->errores['album'] = "Debe escribir el nombre del álbum";
        } elseif(strlen($this->data['album']) > 255) {
            $this->errores['album'] = "El nombre del álbum no puede superar los 255 caracteres";
        };

        // Artista
        if(empty($this->data['artista'])) {
            $this->errores['artista'] = "Debe escribir el nombre del artista";
        } elseif(strlen($this->data['artista']) > 255) {
            $this->errores['album'] = "El nombre del artista no puede superar los 255 caracteres";
        };

        // Pais
        if(empty($this->data['pais'])) {
            $this->errores['pais'] = "Debe elegir el país de origen del producto";
        }

        // Género
        if(empty($this->data['genero'])) {
            $this->errores['genero'] = "Debe elegir el género del producto";
        }

        // Formato
        if(empty($this->data['formato'])) {
            $this->errores['formato'] = "Debe elegir el formato del producto";
        }

        // Lanzamiento
        if(empty($this->data['lanzamiento'])) {
            $this->errores['lanzamiento'] = "Debe indicar el año de lanzamiento del producto";
        }

        // Sinopsis
        if(empty($this->data['sinopsis'])) {
            $this->errores['sinopsis'] = "Debe escribir la sinopsis del álbum";
        };

        // Precio
        if(empty($this->data['precio'])) {
            $this->errores['precio'] = "Debe indicar el precio del producto";
        }

        // Imagen Descripción
        if(empty($this->data['imagen_descripcion'])) {
            $this->errores['imagen_descripcion'] = "Debe escribir la descripción de la imagen del álbum";
        } elseif(strlen($this->data['imagen_descripcion']) > 150) {
            $this->errores['imagen_descripcion'] = "El nombre del álbum no puede superar los 150 caracteres";
        };
    }

    /**
     * Retorna 'true' si hay algún error en la validación
     * @return bool
     */
    public function huboErrores(): bool {
        return count($this->errores) > 0;
    }

    /**
     * Retorna los errores de validación
     * @return array
     */
    public function getErrores() {
        return $this->errores;
    }
}