<?php

if (($_POST)['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];

    require_once '../includes/funciones/bd-conexiones.php';

    try {
        $stmt = $conn->prepare("DELETE nivel, pregunta, respuesta FROM nivel LEFT JOIN pregunta ON nivel.id = pregunta.id_nivel LEFT JOIN respuesta ON nivel.id = respuesta.id_nivel WHERE nivel.id = ?;");
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
        $stmt = $conn->prepare("UPDATE nivel SET nombre = ? WHERE id = ?");
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
