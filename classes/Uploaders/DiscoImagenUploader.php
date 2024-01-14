<?php

namespace App\Uploaders;

use App\Utilities\Str;
use Intervention\Image\ImageManagerStatic;

class DiscoImagenUploader
{
    /**
     * @var array - El archivo subido de $_FILES.
     */
    protected $file;

    /**
     * @var string - El nombre para la imagen.
     */
    protected $filename;

    /**
     * @param array $file - El array de $_FILES con los datos del archivo
     */
    public function __construct(array $file) {
        $this->file = $file;
    }

    /**
     * Crea la versión de la Imagen.
     */
    public function subir() {
        $this->filename = Str::sluggify(date('YmdHis_') . $this->file['name']);

        ImageManagerStatic::make($this->file['tmp_name'])
            ->fit(300, 300)
            ->save(__DIR__ . '/../../recursos/' . $this->filename);
    }

    /**
     * @return string
     */
    public function getFileName(): string {
        return $this->filename;
    }
}