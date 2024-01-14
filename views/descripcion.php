<?php
    $discoElegido = $disco->discoTraerPorPk((int) $_GET['id']);
    // Reemplazamos los espacios del queryString por '+'
    $albumSinEspacios = str_replace(" ","+",$discoElegido->getAlbum());
    $artistaSinEspacios = str_replace(" ","+",$discoElegido->getArtista());
?>
<section>
    <h2 class="visually-hidden">Descripción del disco elegido</h2>
    <div class="card-descripcion mb-3">
        <article class="row no-gutters">
            <div class="card-body">
                <h3 class="h1"><?= htmlspecialchars($discoElegido->getAlbum()); ?></h3>
                <p class="autor"><?= htmlspecialchars($discoElegido->getArtista()); ?></p>
                <p><?= $discoElegido->getNombreGenero(); ?></p>
                <p>Formato: <?= $discoElegido->getNombreFormato() ?></p>
                <p>Lanzamiento: <?= $discoElegido->getLanzamiento() ?></p>
                <p>Origen: <?= $discoElegido->getPais() ?></p>
                <p class="precio">Precio: $ <?= $discoElegido->getPrecio() ?></p>
            </div>
            <div class="obra-img-descripcion order-first">
                <img src="<?= 'recursos/' . $discoElegido->getImagen() ?>" alt="<?= htmlspecialchars($discoElegido->getImagenDescripcion()) ?>">
            </div>
            <div class="descripcion-sinopsis">
                <p><?= htmlspecialchars($discoElegido->getSinopsis()) ?></p>
            </div>
            <div class="descripcion-botones">
                <a href="actions/carrito/producto-agregar.php?id=<?=$discoElegido->getDiscoId();?>" class="btn btn-lg btn-catalogo">Agregar al carrito</a>
                <a href="index.php?s=contacto&album=<?= htmlspecialchars($albumSinEspacios);?>&artista=<?= htmlspecialchars($artistaSinEspacios);?>" class="btn btn-lg btn-catalogo">Reservar</a>
                <a href="index.php?s=catalogo" class="btn btn-lg btn-catalogo">Volver al catálogo</a>
            </div>
        </article>
    </div>
</section>