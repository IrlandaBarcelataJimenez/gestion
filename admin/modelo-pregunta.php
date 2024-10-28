<?php

if (($_POST)['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];

    require_once '../includes/funciones/bd-conexiones.php';

    try {
        $stmt = $conn->prepare("DELETE FROM pregunta WHERE id = ?");
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
    $pregunta = $_POST['pregunta'];
    $respuestaC = $_POST['respuesta-correcta'];
    $img = $_POST['imagen'];
    


    require_once '../includes/funciones/bd-conexiones.php';

    try {
        //sentencias preparadas
        $stmt = $conn->prepare("UPDATE pregunta SET pregunta = ?, respuesta_correcta = ?, img = ? WHERE id = ?");
        $stmt->bind_param("sssi", $pregunta, $respuestaC, $img, $id_actualizar);
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
