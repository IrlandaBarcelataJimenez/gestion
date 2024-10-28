<?php
require_once '../includes/funciones/bd-conexiones.php';
include '../includes/header.php';
session_start();
?>

<div class="container-fluid overflow-hidden">

    <div class="row vh-100 overflow-auto">
        <?php
        include '../includes/template/lateral.php'
        ?>
        <div class="col d-flex flex-column h-sm-100">
            <main class="row overflow-auto">
                <div class="col pt-4">
                    <h3>Crear Usuario</h3>
                    <p class="lead">Crea un nuevo Usuario.</p>
                    <hr />

                    <form id="guardar-admin" action="modelo-Admin.php" method="post">

                        <div class="mb-3">
                            <label for="usuario" class="form-label">Matricula:</label>
                            <input type="number" class="form-control" id="usuario" name="usuario">
                        </div>
                        
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contreseña:</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena">
                        </div>
                        
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo:</label>
                            <input type="email" class="form-control" id="correo" name="correo">
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>

                        <div class="mb-3">
                            <label for="apPat" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="apPat" name="apPat">
                        </div>
                        
                        <div class="mb-3">
                            <label for="apMat" class="form-label">Apellido Materno:</label>  
                            <input type="text" class="form-control" id="apMat" name="apMat">
                        </div>

                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo:</label>
                            <input type="number" class="form-control" id="tipo" name="tipo">
                        </div>


                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <input type="hidden" name="registro" value="nuevo">

                    </form>

                </div>
            </main>
            <?php
            include '../includes/template/footer-interno.php'
            ?>
        </div>

    </div>

</div>



<?php
include '../includes/footer.php'
?>