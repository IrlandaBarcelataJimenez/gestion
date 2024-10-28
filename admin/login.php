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
    <title>INICIAR SESIÓN</title>
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
        <form id="login-form" method="post" action="login-user.php" name="login-form">
            <h1>INICIAR SESIÓN</h1>
            <fieldset>
                <div>
                    <input type="number" name="usuario" style="font-size: 1.5rem;" placeholder="Ingresa tu matricula" minlength="8" maxlength="8" arequired>
                </div>
                <div class="password-container">
                    <input type="password" name="contra" id="txtPassword" placeholder="Ingresa tu contraseña" style="font-size: 1.5rem;" required>
                    <button type="button" id="btnTogglePassword" onclick="togglePasswordVisibility()">
                        <i id="passwordIcon" class="fas fa-eye"></i>
                    </button>
                </div>
            </fieldset>

            <fieldset id="foot">
                <input type="hidden" name="login-user" value="1">
                <button type="submit">Iniciar Sesión</button>
            </fieldset>

            <fieldset>
                <a href="index.php">Regresar</a>
            </fieldset>

        </form>
    </div>
    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/login-fetch.js"></script>
    <script src="../js/js-mostrarpsswrd.js"></script>

</body>

</html>