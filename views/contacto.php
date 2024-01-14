<?php

    if(isset($_SESSION['erroresContacto'])) {
        $errores = $_SESSION['erroresContacto'];
        unset($_SESSION['erroresContacto']);
    } else {
        $errores = [];
    };

    if(isset($_SESSION['old-data-contacto'])) {
        $oldData = $_SESSION['old-data-contacto'];
        unset($_SESSION['old-data-contacto']);
    } else {
        $oldData = [];
    };
    // Obtiene los valores de album y artista de la URL usando $_GET. Si no hay valores en la URL, utiliza los valores almacenados en $oldData (los datos antiguos del formulario). Si no hay datos antiguos, establece los valores en cadenas vacías.
    $album = $_GET['album'] ?? $oldData['album'] ?? '';
    $artista = $_GET['artista'] ?? $oldData['artista'] ?? '';

?>

<section>
    <div class="container-fluid intro3 p-3 m-auto">
        <h1>Contacto</h1>
    </div>
    <div class="form">
        <p>Reservá de manera fácil y rápida completando el formulario.</p>
        <p>Nos comunicaremos con vos en las próximas 48hs para coordinar el pago y la entrega del producto.</p>
        <form action="actions/enviar-form.php" method="post">
            <fieldset class="form-row">
                <legend>Datos del disco</legend>
                <div class="form-group col-md-6">
                    <label for="album">Álbum *</label>
                    <input type="text" class="form-control" id="album" name="album" value="<?= $album; ?>" <?php isset($errores['album']) ? 'aria-describedby="error-album"' : '';?>>
                    <?php
                    if(isset($errores['album'])):
                    ?>
                        <div class="alert alert-danger" role="alert" id="error-album">Error: <?= $errores['album'] ?> </div>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="artista">Artista *</label>
                    <input type="text" class="form-control" id="artista" name="artista" value="<?= $artista; ?>" <?php isset($errores['artista']) ? 'aria-describedby="error-artista"' : '';?>>
                    <?php
                    if(isset($errores['artista'])):
                    ?>
                        <div class="alert alert-danger" role="alert" id="error-artista">Error: <?= $errores['artista'] ?> </div>
                    <?php
                    endif;
                    ?>
                </div>
            </fieldset>
            <fieldset>
                <legend>Tus datos</legend>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Email *</label>
                        <input type="email" class="form-control" id="inputEmail4" name="inputEmail4" value="<?= $oldData['inputEmail4'] ?? ''; ?>" <?php isset($errores['inputEmail4']) ? 'aria-describedby="error-email"' : '';?>>
                        <?php
                        if(isset($errores['inputEmail4'])):
                        ?>
                            <div class="alert alert-danger" role="alert" id="error-email">Error: <?= $errores['inputEmail4'] ?> </div>
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $oldData['nombre'] ?? ''; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $oldData['apellido'] ?? ''; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputAddress">Dirección</label>
                        <input type="text" class="form-control" id="inputAddress" name="inputAddress" value="<?= $oldData['inputAddress'] ?? ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Ciudad</label>
                        <input type="text" class="form-control" id="inputCity" name="inputCity" value="<?= $oldData['inputCity'] ?? ''; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Provincia</label>
                        <input type="text" class="form-control" id="inputState" name="inputState" value="<?= $oldData['inputState'] ?? ''; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPhone">Teléfono</label>
                        <input type="number" class="form-control" id="inputPhone" name="inputPhone" value="<?= $oldData['inputPhone'] ?? ''; ?>">
                    </div>
                </div>
            </fieldset>
            <p>* Campo requerido.</p>
            <button type="submit" class="btn btn-lg btn-catalogo">Reservar</button>
        </form>
    </div>
</section>

