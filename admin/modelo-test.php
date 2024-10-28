<?php

if ($_POST['registro'] == 'nuevo') {
    $nombre = $_POST['nombre']; // Captura el valor del campo "nombre"

    require_once '../includes/funciones/bd-conexiones.php';

    try {
        // Prepara la sentencia SQL
        $stmt = $conn->prepare("INSERT INTO nivel (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre); // Asocia el valor a la sentencia preparada
        $stmt->execute(); // Ejecuta la sentencia

        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_nivel' => $stmt->insert_id // Obtén el ID del nuevo nivel insertado
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
    die(json_encode($respuesta)); // Devuelve la respuesta al cliente
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
    


    require_once '../includes/funciones/bd-conexiones.php';

    try {
        //sentencias preparadas
        $stmt = $conn->prepare("UPDATE nivel SET nombre = ? WHERE idUsuario = ?");
        $stmt->bind_param("si", $nombre, $id_actualizar);
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
