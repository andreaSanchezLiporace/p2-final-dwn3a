<section>
    <div class="container-fluid p-3 m-auto intro">
        <h1>Panel de Administración</h1>
    </div>
    <div class="container hola p-3 my-3 mx-auto">
        <h3 class="my-5 mx-auto">¡Bienvenido <?= $_SESSION['nombre']; ?>!</h3>
        <p class="aviso-admin-tittle">Como administrador de nuestro sitio podrás:</p>
        <ul class="list-admin">
            <li class="list-unstyled"><i class="fas fa-check-circle"></i> Cargar nuevos discos en el catálogo de la disquería</li>
            <li class="list-unstyled"><i class="fas fa-check-circle"></i> Editar productos que ya se encuentren cargados y publicados</li>
            <li class="list-unstyled"><i class="fas fa-check-circle"></i> Eliminar productos de la base de datos</li>
        </ul>
        <div class="aviso-admin">
            <p class="aviso-admin-tittle"><i class="fas fa-exclamation-triangle"></i>Por favor, recordá...<i class="fas fa-exclamation-triangle"></i></p>
            <p>Verificar que contás con todos los datos necesarios para completar la carga de nuevos productos y que toda la información que cargues o elimines se impacta en nuestra Base de Datos</p>
        </div>
    </div>
</section>