<?php

use App\Models\Usuario;

// Crea un nueva instancia de usuario
$usuario = new Usuario();
// Obtención de productos en el carrito temporal del usuario autentificado con su ID
$discosCarrito = $usuario->traerProductosCarritoTemporal($autenticacion->getUsuarioId());
$totalCompra = 0;

// echo "<pre>";
// print_r($discosCarrito);
// echo "</pre>";

// echo ($autenticacion->getUsuarioId());

?>

<section class="my-5 section-mi-carrito">
    <div class="container-fluid intro2 p-3 m-auto">
        <h1>Mi carrito</h1>
    </div>
    <section class="my-5 text-center d-flex flex-column">
        <?php
        // Verifica si hay productos en el carrito. Si hay productos, muestra la sección correspondiente; de lo contrario, muestra un mensaje indicando que no hay productos en el carrito.
        if(count($discosCarrito) > 0):
        ?>
        <div>
            <?php
            //Itera sobre cada producto en el carrito y muestra información requerida del disco.
            foreach ($discosCarrito as $discoCarrito):
                $subtotal = 0;
                $subtotal = $discoCarrito['precio'] * $discoCarrito['cantidad'];
                $totalCompra = $totalCompra + $subtotal;
            ?>
            <article class="my-5">
                <div class="text-right">
                    <p>Disco: <?= $discoCarrito['album']; ?></p>
                    <p>Cantidad: <?= $discoCarrito['cantidad']; ?></p>
                    <p>Subtotal: $<?= $subtotal; ?></p>
                </div>
                <div>
                    <!--Crea un formulario para eliminar un producto del carrito. Cuando se envía, redirige a la acción producto-eliminar.php-->
                    <form action="actions/carrito/producto-eliminar.php" class="text-left ml-5">
                            <input type="hidden" name="id" value="<?= $discoCarrito['discos_id']; ?>">
                            <button class="btn btn-lg btn-catalogo" type="submit">Eliminar</button>
                    </form>
                </div>
                <hr>
            </article>
            <hr>
            <?php
            endforeach;
            ?>
        </div>
        <div class="my-5">
            <!-- Proporciona un enlace para permitir al usuario seguir comprando. -->
            <a href="index.php?s=catalogo" class="btn btn-lg btn-catalogo">Seguir comprando</a>
        </div>
        <div>
            <!-- Crea un formulario para finalizar la compra, mostrando el costo total acumulado. -->
            <form action="actions/carrito/finalizar-compra.php" method="post">
                <input type="hidden" name="id" value="<?= $autenticacion->getUsuarioId(); ?>">
                <button type="submit" class="btn btn-lg btn-catalogo">Finalizar compra ($<?= $totalCompra; ?>)</button>
            </form>
        </div>
        <?php
        else:
        ?>
        <div class="text-center">
            <h2>Actualmente no tenés ningún producto agregado.</h2>
            <div class="my-5 text-center">
                <a href="index.php?s=catalogo" class="btn btn-lg btn-catalogo">¡Agregá un producto ahora!</a>
            </div>
        </div>
        
        <?php
        endif;
        ?>
    </section>
</section>