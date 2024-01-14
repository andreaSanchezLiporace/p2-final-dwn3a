<?php

    require_once __DIR__ . '/bootstrap/init.php';
    require_once RUTA_RAIZ . '/bootstrap/rutas.php';

    use App\Models\Disco;
    use App\Authentication\Autenticacion;

    $disco = new Disco();
    $discos = $disco->getDiscos();

    $rutas = getRutas();

    $vista = $_GET['s'] ?? 'home';

    // Verificamos si la vista está en la lista de rutas. De no estarlo, mostramos una página de error.
    if(!isset($rutas[$vista])) {
        $vista = "404";
    };

    $autenticacion = new Autenticacion();
    $estaAutenticado = $autenticacion->estaAutenticado();

    // Restricción para usuarios no autenticados.
    $requiereAutenticacion = $rutas[$vista]['autenticacion'] ?? false;
    if($requiereAutenticacion && !$estaAutenticado) {
        $_SESSION['mensaje_error'] = "Debe iniciar sesión para ingresar a la página solicitada";
        header("Location: index.php?s=iniciar-sesion");
        exit;
    }

    $mensajeExito = $_SESSION['mensaje_exito'] ?? null;
    $mensajeError = $_SESSION['mensaje_error'] ?? null;
    unset($_SESSION['mensaje_exito'], $_SESSION['mensaje_error']);

?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="En RockOnPasta podrás encontrar el disco que buscas al mejor precio para vos">

    <!-- Estilos -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="recursos/favicon.ico" type="image/x-icon"/>
    <!-- fuente montserrat para el sitio-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- fuente clicker para la marca-->
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <!-- fuente pacifico para títulos secciones y pregunta banner-->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <title><?= $rutas[$vista]['title'] ?? 'RockOnPasta';?></title>
</head>

<body>
    <header class="container-fluid">
        <div class="row">
            <div class="logo">
                <a href="index.php?s=home">
                    <picture>
                        <source srcset="recursos/marca.png" media="(min-width:951px)"/>
                        <img src="recursos/marca_mobile.png" alt="Logo de RockOnPasta">
                    </picture>
                </a>
            </div>
            <nav class="navbar navbar-expand-md navbar-dark">
                <!-- botón menú -->
                <button class="navbar-toggler" type="button"
                        data-toggle="collapse"
                        data-target="#navegacion"
                        aria-controls="navegacion"
                        aria-expanded="false"
                        aria-label="Menú Hamburguesa">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- menú -->
                <div class="collapse navbar-collapse" id="navegacion">
                    <ul class="navbar-nav text-center">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=catalogo">Catálogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=contacto">Contacto</a>
                        </li>
                        <?php
                        if($estaAutenticado):
                        ?>
                        <li class="nav-item">
                            <a href="index.php?s=perfil" class="nav-link">Mi perfil</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?s=carrito" class="nav-link">Mi carrito</a>
                        </li>
                        <li class="nav-item">
                            <form action="actions/auth-cerrar-sesion.php" method="post">
                                <button type="submit" class="nav-link btn_cerrar_sesion">Cerrar Sesión (<?= $autenticacion->getUsuario()->getNombre(); ?>)</button>
                            </form>
                        </li>
                        <?php
                        else:
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=iniciar-sesion">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=registrarse">Registrarse</a>
                        </li>
                        <?php
                        endif;
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div>
        <?php
            if($mensajeExito !== null):
        ?>
        <div class="alert alert-success">
            <?= $mensajeExito; ?>
        </div>
        <?php
            endif;
        ?>

        <?php
            if($mensajeError !== null):
        ?>
        <div class="alert alert-danger">
            <?= $mensajeError; ?>
        </div>
        <?php
            endif;
        ?>
    </div>
    <main>
        <!-- Pido la sección a mostrar -->
        <?php
        require __DIR__ . "/views/" . $vista . ".php";
        ?>
    </main>
    <footer>
        <div class="container">
            <ul  class="row text-center mx-3 mb-5 p-0">
                <li class="col p-0">
                    <a class="btn-floating btn-lg btn-fb btn-color"
                    href="https://www.facebook.com/"><i class="fab fa-facebook-f fa-2x"></i></a>
                </li>
                <li class="col p-0">
                    <a class="btn-floating btn-lg btn-ins btn-color"
                    href="https://www.instagram.com/?hl=es-la"><i class="fab fa-instagram fa-2x"></i></a>
                </li>
                <li class="col p-0">
                    <a class="btn-floating btn-lg btn-yt btn-color"
                    href="https://www.youtube.com/"><i class="fab fa-youtube fa-2x"></i></a>
                </li>
            </ul>
            <ul class="row datos">
                <li class="col-6">Sitio diseñado por:
                    <ul>
                        <li>~ Andrea Sanchez Liporace ~</li>
                        <li>~ Federico Costantino ~</li>
                    </ul>
                </li>
                <li class="col-6">
                    <ul>
                        <li>Programación II ~ Escuela Da Vinci</li>
                        <li>Docente: Santiago Gallino</li>
                        <li>Comisión: dwn3a</li>
                        <li>Año: 2021</li>
                    </ul>
                </li>
            </ul>
        </div>
    </footer>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>