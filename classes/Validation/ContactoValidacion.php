<?php

namespace App\Validation;

class ContactoValidacion
{
    protected $data = [];
    protected $erroresContacto = [];

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
            $this->erroresContacto['album'] = "Debe escribir el nombre del álbum";
        };

        // Artista
        if(empty($this->data['artista'])) {
            $this->erroresContacto['artista'] = "Debe escribir el nombre del artista";
        };

        // Email
        if(empty($this->data['inputEmail4'])) {
            $this->erroresContacto['inputEmail4'] = "Debe ingresar un correo electrónico";
        }
    }

    /**
     * Retorna 'true' si hay algún error en la validación
     * @return bool
     */
    public function huboErrores(): bool {
        return count($this->erroresContacto) > 0;
    }

    /**
     * Retorna los errores de validación
     * @return array
     */
    public function getErroresContacto() {
        return $this->erroresContacto;
    }
}