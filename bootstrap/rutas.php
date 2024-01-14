<?php

use App\Models\Disco;

/**
 * Retorna las rutas del sitio junto con sus 'title'.
 * @return string[][]
 */
function getRutas(): array {
    if(isset($_GET['id'])) {
        $disco = (new Disco())->discoTraerPorPk((int) $_GET['id']);
        return [
            'descripcion' => [
                'title' => $disco->getArtista() . " - " . $disco->getAlbum(),
            ],
        ];
    } else {
        return [
            'home' => [
                'title' => 'Bienvenido a RockOnPasta',
            ],
            'catalogo' => [
                'title' => 'Catálogo de discos',
            ],
            'contacto' => [
                'title' => 'Contacto',
            ],
            'iniciar-sesion' => [
                'title' => 'Iniciar Sesión',
            ],
            'registrarse' => [
                'title' => 'Registrarse',
            ],
            'perfil' => [
                'title' => 'Mi perfil',
                'autenticacion' => true,
            ],
            'carrito' => [
                'title' => 'Mi carrito',
                'autenticacion' => true,
            ],
            'mis-compras' => [
                'title' => 'Mis compras',
                'autenticacion' => true,
            ],
            'gracias' => [
                'title' => 'Tu reserva se realizó con éxito',
            ],
            'mantenimiento' => [
                'title' => 'Mantenimiento',
            ],
        ];
    }
}

/**
 * Retorna las rutas del panel de administración.
 * @return string[][]
 */
function getRutasAdmin(): array {
    return [
        'homeAdmin' => [
            'title' => 'Inicio',
            'autenticacion' => true,
        ],
        'login' => [
            'title' => 'Iniciar Sesión',
        ],
        'catalogo' => [
            'title' => 'Administración de los productos',
            'autenticacion' => true,
        ],
        'agregar-producto' => [
            'title' => 'Publicar un nuevo disco',
            'autenticacion' => true,
        ],
        'modificar-producto' => [
            'title' => 'Modificar un disco',
            'autenticacion' => true,
        ],
        'carrito' => [
            'title' => 'Administración Carrito',
            'autenticacion' => true,
        ],
        'carrito-usuario' => [
            'title' => 'Carrito del Usuario',
            'autenticacion' => true,
        ],
    ];
}