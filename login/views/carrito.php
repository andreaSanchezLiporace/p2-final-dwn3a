<?php

use App\Models\Usuario;

$usuariosConDiscoEnCarrito = (new Usuario)->traerUsuariosConDiscosEnCarrito();

// echo "<pre>";
// print_r($usuariosConDiscoEnCarrito);
// echo "</pre>";

?>

<section>
    <div class="container-fluid p-3 m-auto intro">
        <h1>Administración Carrito de Compras</h1>
    </div>
    <div class="container hola p-3 my-3 mx-auto">
        <h2 class="mb-5">Usuarios con productos en el carrito de compras</h2>

        <?php
        if(count($usuariosConDiscoEnCarrito) > 0):
        ?>
        <article>
            <?php
            foreach ($usuariosConDiscoEnCarrito as $usuarioConDiscoEnCarrito):
            ?>
            <p>ID: <?= $usuarioConDiscoEnCarrito->getUsuariosId(); ?></p>
            <p>Usuario: <?= $usuarioConDiscoEnCarrito->getEmail(); ?></p>
            <p>
                <a class="text-danger" href="index.php?s=carrito-usuario&id=<?= $usuarioConDiscoEnCarrito->getUsuariosId(); ?>&email=<?= $usuarioConDiscoEnCarrito->getEmail(); ?>">Ver productos</a>
            </p>
            <hr>
            <?php
            endforeach;
            ?>
        </article>
        <?php
        else:
        ?>
        <h2 class="mb-5">No hay usuarios actualmente que hayan realizado alguna compra.</h2>
        <?php
        endif;
        ?>
    </div>
</section>