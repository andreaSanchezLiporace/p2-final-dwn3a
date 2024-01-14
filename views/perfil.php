<section class="my-5">
    <div class="container-fluid intro2 p-3 m-auto">
        <h1>Mi perfil</h1>
    </div>
    <div class="text-center mb-5">
        <p>Nombre: <?= $_SESSION['nombre']; ?></p>
        <hr>
        <p>Email: <?= $_SESSION['email']; ?></p>
        <hr>
        <p><a class="text-danger" href="index.php?s=mis-compras">Historial de compras</a></p>
        <hr>
        <p><a class="text-danger" href="index.php?s=carrito">Mi Carrito</a></p>
        <hr>
    </div>
</section>