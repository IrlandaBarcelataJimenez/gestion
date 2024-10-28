<?php
session_start();
if (isset($_GET['cerrar_sesion'])) {
    if ($_GET['cerrar_sesion']) {
        session_destroy();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/cssLogin.css">
    <link rel="shortcut icon" href="../img/logoCerebro.svg">
</head>

<body>

    <div class="logo-container">
        <img src="../img/logoCerebro.svg" alt="">
        <h1>ACTIVA TU LÓGICA</h1>
    </div>

    <div class="form-container">
        <form id="guardar-admin" action="#" method="post">
            <h1>REGISTRO</h1>
            <fieldset>
                <!-- <legend>Ingresa tus datos</legend> -->
                <div>
                    <input type="text" name="nombre" id="nombre" style="font-size: 1.5rem;" placeholder="Ingresa tu nombre" required>
                </div>
                <div>
                    <input type="text" name="apPat" id="apPat" style="font-size: 1.5rem;" placeholder="Ingresa tu apellido paterno" required>
                </div>
                <div>
                    <input type="text" name="apMat" id="apMat" style="font-size: 1.5rem;" placeholder="Ingresa tu apellido materno" required>
                </div>
                <div>
                    <input type="email" name="correo" id="correo" style="font-size: 1.5rem;" placeholder="Ingresa tu correo" required>
                </div>
                <div>
                    <input type="number" name="usuario" id="usuario" style="font-size: 1.5rem;" placeholder="Ingresa tu matricula" minlength="8" maxlength="8" arequired>
                </div>
                <div class="password-container">
                    <input type="password" name="contrasena" id="contrasena" placeholder="Ingresa tu contraseña" style="font-size: 1.5rem;" required>
                </div>
                <div class="password-container">
                    <input type="password" name="contrasena2" id="contrasena2" placeholder="Confirma tu contraseña" style="font-size: 1.5rem;" required>
                </div>
                <div>
                    <select style="font-size: 1.5rem; color: #6e6c6c;" name="tipo" id="tipo" class="form-control">
                        <option value="0">Tipo de usuario</option>
                        <option value="1">Administrador</option>
                        <option value="2">Profesor</option>
                        <option value="3">Alumno</option>
                    </select>
                </div>
            </fieldset>
            <fieldset id="foot">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </fieldset>
            <fieldset id="foot">
                <!-- <legend style="width:100%; text-align:center;">¿Ya tienes cuenta?</legend> -->
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="login.php" style="margin-right: 10px;">Inicia sesión</a>
                    <a href="index.php" style="margin-left: 10px;">Regresar</a>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/login-fetch.js"></script>
    <script src="../js/js-mostrarpsswrd.js"></script>

</body>

</html>