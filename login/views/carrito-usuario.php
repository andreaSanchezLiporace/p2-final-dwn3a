<?php

use App\Models\Usuario;

$id = $_GET['id'];
$email = $_GET['email'];
$usuario = (new Usuario());
$discosCarrito = $usuario->traerProductosCarrito($id);

// echo "<pre>";
// print_r($discosCarrito);
// echo "</pre>";

?>

<section>
    <div class="container-fluid p-3 m-auto intro">
        <h1>Carrito de <?= $email; ?></h1>
    </div>
    <div class="my-5 text-center">
        <a href="index.php?s=carrito" class="btn btn-lg btn-catalogo">Volver</a>
    </div>
    <div class="container hola p-3 my-3 mx-auto">
        <section>
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
        </section>
    </div>
</section>