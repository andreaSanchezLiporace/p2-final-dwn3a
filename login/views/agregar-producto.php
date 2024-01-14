<?php

    use App\Models\Genero;
    use App\Models\Formato;
    use App\Models\Origen;

    $generos = (new Genero())->getGenerosBase();
    $formatos = (new Formato())->getFormatosBase();
    $paises = (new Origen())->getPaises();
    $anio = getdate();

    if(isset($_SESSION['errores'])) {
        $errores = $_SESSION['errores'];
        unset($_SESSION['errores']);
    } else {
        $errores = [];
    };

    if(isset($_SESSION['old_data'])) {
        $oldData = $_SESSION['old_data'];
        unset($_SESSION['old_data']);
    } else {
        $oldData = [];
    };
?>

<section>
    <h1 class="login">Publicar  disco</h1>
    <p class="requisitos">Por favor, ingresa todos los datos del nuevo disco que deseas publicar en el catálogo del sitio.</p>
    <form class="p-5 form-agregar-modificar" action="actions/producto-crear.php" method="post" enctype="multipart/form-data">
        <div class="form-datos">
            <label for="album">Albúm</label>
            <input type="text" id="album" name="album" value="<?= $oldData['album'] ?? ''; ?>">
            <?php
            if(isset($errores['album'])):
            ?>
                <div class="alert alert-danger" role="alert" id="error-album"> <?= $errores['album'] ?> </div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-datos">
            <label for="artista">Artista</label>
            <input type="text" id="artista" name="artista" value="<?= $oldData['artista'] ?? ''; ?>">
            <?php
            if(isset($errores['artista'])):
            ?>
                <div class="alert alert-danger" role="alert"> <?= $errores['artista'] ?> </div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-datos">
            <label for="pais">Origen</label>
            <select name="pais" id="pais">
                <option value="" selected disabled>Seleccione un país</option>
                <?php
                foreach($paises as $pais):
                ?>
                    <option value="<?= $pais['origen_id'] ?>"><?= $pais['pais'] ?></option>
                <?php
                endforeach;
                ?>
            </select>
            <?php
            if(isset($errores['pais'])):
            ?>
                <div class="alert alert-danger" role="alert"> <?= $errores['pais'] ?> </div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-datos">
            <label for="genero">Género</label>
            <select name="genero" id="genero">
                <option value="" selected disabled>Seleccione un género</option>
                <?php
                foreach($generos as $genero):
                ?>
                    <option value="<?= $genero['genero_id'] ?>"><?= $genero['nombre_genero'] ?></option>
                <?php
                endforeach;
                ?>
            </select>
            <?php
            if(isset($errores['genero'])):
            ?>
                <div class="alert alert-danger" role="alert"> <?= $errores['genero'] ?> </div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-datos">
            <label for="formato">Formato</label>
            <select name="formato" id="formato">
                <option value="" selected disabled>Seleccione un formato</option>
                <?php
                foreach($formatos as $formato):
                ?>
                    <option value="<?= $formato['formato_id'] ?>"><?= $formato['nombre_formato'] ?></option>
                <?php
                endforeach;
                ?>
            </select>
            <?php
            if(isset($errores['formato'])):
            ?>
                <div class="alert alert-danger" role="alert"> <?= $errores['formato'] ?> </div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-datos">
            <label for="lanzamiento">Año de lanzamiento</label>
            <input type="number" id="lanzamiento" name="lanzamiento" min="1948" max="<?= $anio['year'] ?>" value="<?= $oldData['lanzamiento'] ?? ''; ?>">
            <?php
            if(isset($errores['lanzamiento'])):
            ?>
                <div class="alert alert-danger" role="alert"> <?= $errores['lanzamiento'] ?> </div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-datos">
            <label for="sinopsis">Sinopsis</label>
            <textarea name="sinopsis" id="sinopsis" cols="20" rows="1"><?= $oldData['sinopsis'] ?? ''; ?></textarea>
            <?php
            if(isset($errores['sinopsis'])):
            ?>
                <div class="alert alert-danger" role="alert"> <?= $errores['sinopsis'] ?> </div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-datos">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" min="0" value="<?= $oldData['precio'] ?? ''; ?>">
            <?php
            if(isset($errores['precio'])):
            ?>
                <div class="alert alert-danger" role="alert"> <?= $errores['precio'] ?> </div>
            <?php
            endif;
            ?>
        </div>
        <div class="form-datos">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen">
        </div>
        <div class="form-datos">
            <label for="imagen_descripcion">Descripción de la imagen</label>
            <input type="text" id="imagen_descripcion" name="imagen_descripcion" value="<?= $oldData['imagen_descripcion'] ?? ''; ?>">
            <?php
            if(isset($errores['imagen_descripcion'])):
            ?>
                <div class="alert alert-danger" role="alert"> <?= $errores['imagen_descripcion'] ?> </div>
            <?php
            endif;
            ?>
        </div>

        <div class="publicar">
        <p class="explicacion">Recuerda que toda la información que cargues en este formulario se impacta directamente en nuestra Base de Datos</p>
        <button type="submit" class="btn btn-lg btn-catalogo my-0">Publicar Disco</button>
        </div>

    </form>
</section>

