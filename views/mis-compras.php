<?php

use App\Models\Usuario;

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

$usuario = new Usuario();
$discosCarrito = $usuario->traerProductosCarrito($_SESSION['id']);

// echo "<pre>";
// print_r($discosCarrito);
// echo "</pre>";


?>

<section>
    <div class="container-fluid intro2 p-3 m-auto">
        <h1>Mis compras</h1>
    </div>
    <div class="container hola p-3 my-3 mx-auto">
        <section>
            <?php
            if(count($discosCarrito) > 0):
            ?>
            <article>
                <?php
                foreach ($discosCarrito as $discoCarrito):
                ?>
                <p>Disco: <?= $discoCarrito['album']; ?></p>
                <p>Cantidad: <?= $discoCarrito['cantidad']; ?></p>
                <p>Subtotal: $<?= ($discoCarrito['precio'] * $discoCarrito['cantidad']); ?></p>
                <p>Fecha de compra: <?= $discoCarrito['fecha']; ?></p>
                <hr>
                <?php
                endforeach;
                ?>
            </article>
            <?php
            else:
            ?>
            <article>
                <h2>Aún no has realizado ninguna compra</h2>
                <p>¡Comenzá ahora!</p>
                <div class="my-5 text-center">
                    <a href="index.php?s=catalogo" class="btn btn-lg btn-catalogo">Ir al catálogo</a>
                </div>
            </article>
            <?php
            endif;
            ?>
        </section>
    </div>
</section>