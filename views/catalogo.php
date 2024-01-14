<section>
    <div class="container-fluid intro2 p-3 m-auto">
        <h1>Discos</h1>
    </div>
    <div class="productos">
        <?php
        foreach($discos as $disco):
            // Reemplazamos los espacios del queryString por '+'
            $albumSinEspacios = str_replace(" ","+",$disco->getAlbum());
            $artistaSinEspacios = str_replace(" ","+",$disco->getArtista());
        ?>
        <article class="card mb-3">
            <div class="row no-gutters">
                <div class="obra-info">
                    <div class="card-body">
                        <h2 class="h3"> <?= htmlspecialchars($disco->getAlbum());?> </h2>
                        <p class="autor"><?= htmlspecialchars($disco->getArtista());?></p>
                        <p class="gancho"><?= htmlspecialchars($disco->getSinopsis());?></p>
                        <div class="catalogo-btns">
                            <a href="index.php?s=descripcion&id=<?=$disco->getDiscoId();?>" class="btn btn-lg btn-catalogo">Ver más</a>
                            <a href="actions/carrito/producto-agregar.php?id=<?=$disco->getDiscoId();?>" class="btn btn-lg btn-catalogo">Agregar al carrito</a>
                            <a href="index.php?s=contacto&album=<?=htmlspecialchars($albumSinEspacios);?>&artista=<?=htmlspecialchars($artistaSinEspacios);?>" class="btn btn-lg btn-catalogo">Reservar</a>
                        </div>
                    </div>
                </div>
                <div class="obra-img order-first">
                    <img src="<?= 'recursos/' . $disco->getImagen();?>" alt="<?= htmlspecialchars($disco->getImagenDescripcion());?>">
                </div>
            </div>
        </article>
        <?php
        endforeach;
        ?>
    </div>
</section>