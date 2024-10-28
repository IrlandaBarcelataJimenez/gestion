<?php

if ($_POST['registro'] == 'nuevo') {
    $nombre = $_POST['nombre'];
    $apPat = $_POST['apPat'];
    $apMat = $_POST['apMat'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $tipo = $_POST['tipo'];

    $opciones = array(
        'cost' => 12
    );

    $contrasena_encriptada = password_hash($contrasena, PASSWORD_BCRYPT, $opciones);

    require_once '../includes/funciones/bd-conexiones.php';

    try {
        //sentencias preparadas
        $stmt = $conn->prepare("INSERT INTO usuario (usuario, contrasena, correo, nombre, apPat, apMat, tipo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssi", $usuario, $contrasena_encriptada, $correo, $nombre, $apPat, $apMat, $tipo);
        $stmt->execute();
        $idRegistro = $stmt->insert_id;

        if ($idRegistro > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_usuario' => $idRegistro
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $exception) {
        echo "Error: " . $exception->getMessage();
    }
    die(json_encode($respuesta));
}


if (($_POST)['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];

    require_once '../includes/funciones/bd-conexiones.php';

    try {
        $stmt = $conn->prepare("DELETE FROM usuario WHERE idUsuario = ?");
        $stmt->bind_param("i", $id_borrar);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        }else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }

    } catch (Exception $exception) {
        echo "Error: " . $exception->getMessage();
    }
    die(json_encode($respuesta));
}

if ($_POST['registro'] == 'actualizar') {
    $id_actualizar = $_POST['id_registro'];
    $nombre = $_POST['nombre'];
    $apPat = $_POST['apPat'];
    $apMat = $_POST['apMat'];
    


    require_once '../includes/funciones/bd-conexiones.php';

    try {
        //sentencias preparadas
        $stmt = $conn->prepare("UPDATE usuario SET nombre = ?, apPat = ?, apMat = ? WHERE idUsuario = ?");
        $stmt->bind_param("sssi", $nombre, $apPat, $apMat, $id_actualizar);
        $stmt->execute();

        if ($stmt -> affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id' => $id_actualizar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $exception) {
        echo "Error: " . $exception->getMessage();
    }
    die(json_encode($respuesta));
}

?>
