<section class="section-logueo-adm">
    <div class="container-fluid intro-adm p-3">
        <h1 class="h1 text-center mt-5 login">Registrarse</h1>

        <p class="text-center mb-3">Por favor, completa la información solicitada para registrarte como un nuevo usuario.</p>
        <p class="text-center mb-5">Al tener una cuenta, podrás realizar compras dentro de nuestro sitio.</p>

        <form action="actions/auth-registro.php" method="post">
            <div class="form-datos">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="">
            </div>
            <div class="form-datos">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="">
            </div>
            <div class="form-datos">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-lg btn-catalogo m-0">Registrarse</button>
            </div>
        </form>
    </div>
</section>