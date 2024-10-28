<?php

if (isset($_POST['login-user'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contra'];
    try {

        require_once '../includes/funciones/bd-conexiones.php';
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $stmt->bind_param("i", $usuario);
        $stmt->execute();
        $stmt->bind_result($idUsuario, $nombre_usuario, $contrasena_usuario, $correo, $nombre, $apPat, $apMat, $tipo, $nivel_actual);

        if ($stmt->affected_rows) {

            $existe = $stmt->fetch();

            if ($existe) {

                if (password_verify($contrasena, $contrasena_usuario)) {
                    session_start();
                    $_SESSION['usuario'] = $nombre_usuario;
                    $_SESSION['nombre'] = $nombre;

                    $respuesta = array(
                        'respuesta'  => 'exito',
                        'nombre' => $nombre,
                        'rol' => $tipo
                    );
                }
            } else {
                $respuesta = array(
                    'respuesta'  => 'error'
                );
            }
        }
    } catch (Exception $exception) {
        $respuesta = array(
            'respuesta'  => $exception->getMessage()
        );
    }

    die(json_encode($respuesta));
}
