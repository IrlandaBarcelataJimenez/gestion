<?php

if ($_POST['registro'] == 'nuevo') {
    $preg = $_POST['preg'];
    $respuesta_correcta = $_POST['respuesta_correcta'];
    $preg_opcion_a = $_POST['preg_opcion_a'];
    $preg_opcion_b = $_POST['preg_opcion_b'];
    $preg_opcion_c = $_POST['preg_opcion_c'];
    $preg_opcion_d = $_POST['preg_opcion_d'];
    
    $valor0 = 0;
    $valor1 = 1;
    $valor2 = 2;
    $valor3 = 3;

    require_once '../includes/funciones/bd-conexiones.php';

    $query = "SELECT MAX(id) AS id FROM nivel";
    $resultado = mysqli_fetch_assoc(mysqli_query($conn, $query));
    $ultimonivel = $resultado['id'];

    $query = "SELECT MAX(id) AS id FROM pregunta";
    $resultado = mysqli_fetch_assoc(mysqli_query($conn, $query));
    $ultimoIdPregunta = $resultado['id'];


    try {
        //sentencias preparadas
        
        $stmt = $conn->prepare("INSERT INTO pregunta (id_nivel, pregunta, respuesta_correcta) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $ultimonivel, $preg, $respuesta_correcta);
        $stmt->execute();

        $idPregunt = $ultimoIdPregunta + 1;
        
        $stmt = $conn->prepare("INSERT INTO respuesta (id_pregunta, id_nivel, respuesta, inciso) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iisi", $idPregunt, $ultimonivel, $preg_opcion_a, $valor0);
        $stmt->execute();

        $stmt = $conn->prepare("INSERT INTO respuesta (id_pregunta, id_nivel, respuesta, inciso) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iisi", $idPregunt, $ultimonivel, $preg_opcion_b, $valor1);
        $stmt->execute();

        $stmt = $conn->prepare("INSERT INTO respuesta (id_pregunta, id_nivel, respuesta, inciso) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iisi", $idPregunt, $ultimonivel, $preg_opcion_c, $valor2);
        $stmt->execute();

        $stmt = $conn->prepare("INSERT INTO respuesta (id_pregunta, id_nivel, respuesta, inciso) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iisi", $idPregunt, $ultimonivel, $preg_opcion_d, $valor3);
        $stmt->execute();

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
}
