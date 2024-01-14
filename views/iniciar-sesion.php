<section class="section-logueo-adm">
    <div class="container-fluid intro-adm p-3">
        <h1 class="h1 text-center mt-5 login">Ingreso de Usuario</h1>

        <p class="text-center mb-5">Por favor, ingresa tus credenciales para acceder al panel.</p>

        <form action="actions/auth-iniciar-sesion.php" method="post">
            <div class="form-datos">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="">
            </div>
            <div class="form-datos">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-lg btn-catalogo m-0">Ingresar</button>
            </div>
        </form>
    </div>
</section>