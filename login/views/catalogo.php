<section class="catalogo-admin">
    <div class="header-catalogo-admin">
        <h1 class="login">Administración de productos</h1>
        <p class="explicacion2">Desde aquí no solo podrás editar o eliminar productos, sino que también podrás cargar nuevos, desde los botones "Agregar disco al catálogo", que se encuentran antes y despúes de la lista de discos que tenemos publicados en nuestro sitio y que verás a continuación.</p>
        <p class="explicacion2">Usá tus dedos para poder moverte a lo ancho de la tabla</p>
        <div class="action-crear-disco">
            <a class="btn btn-crear-disco" href="index.php?s=agregar-producto">Agregar disco al catálogo</a>
        </div>
    </div>

    <div class="table-responsive container-fluid">
        <table class="container-fluid">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Álbum</th>
                    <th>Artista</th>
                    <th>Origen</th>
                    <th>Formato</th>
                    <th>Lanzamiento</th>
                    <th>Sinopsis</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($discos as $disco):
                ?>
                    <tr class="h5">
                        <td> <?= $disco->getDiscoId(); ?> </td>
                        <td> <?= htmlspecialchars($disco->getAlbum()); ?> </td>
                        <td> <?= htmlspecialchars($disco->getArtista()); ?> </td>
                        <td> <?= $disco->getPais(); ?> </td>
                        <td> <?= $disco->getNombreFormato(); ?> </td>
                        <td> <?= $disco->getLanzamiento(); ?> </td>
                        <td>
                            <div class="td-sinopsis">
                                <?= htmlspecialchars($disco->getSinopsis()); ?>
                            </div> 
                        </td>
                        <td> $<?= $disco->getPrecio(); ?> </td>
                        <td><img src="<?= '../recursos/' . $disco->getImagen();?>" alt="<?= htmlspecialchars($disco->getImagenDescripcion());?>"></td>
                        <td>
                            <a class="btn btn-warning" href="index.php?s=modificar-producto&id=<?= $disco->getDiscoId(); ?>">Modificar</a>
                            <form action="actions/producto-eliminar.php" method="post" class="form-eliminar">
                                <input type="hidden" name="id" value="<?= $disco->getDiscoId(); ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <div class="action-crear-disco m-5">
        <a class="btn btn-crear-disco" href="index.php?s=agregar-producto">Agregar disco al catálogo</a>
    </div>
</section>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('.form-eliminar');

        for(let i = 0; i < forms.length; i++) {
            forms[i].addEventListener('submit', function(ev) {
                const confirmado = confirm('¿Está seguro de eliminar este producto? Esta acción es irreversible.');

                if(!confirmado) {
                    ev.preventDefault(); // Detiene el evento 'submit' del formulario.
                };
            });
        };
    });

</script>

