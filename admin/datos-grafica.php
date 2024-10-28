<?php

include_once '../includes/funciones/sesiones.php';
include '../includes/funciones/bd-conexiones.php';

$idUsuario = isset($_GET['usuario']) ? (int)$_GET['usuario'] : 0;

$sql = "SELECT * FROM usuario WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();

$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$nombreCompleto = $userData['nombre'] . ' ' . $userData['apPat'] . ' ' . $userData['apMat'];

$stmt->close();

$sql = "SELECT * FROM resultados WHERE cveusuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();

$result = $stmt->get_result();
$data = [];
while ($row = $result->fetch_assoc()) {
    $nivel = $row['nivel'];
    if (!isset($data[$nivel])) {
        $data[$nivel] = [];
    }
    $data[$nivel][] = [$row['descomposicion'], $row['recoPatrones'], $row['abstraccion'], $row['generalizacion'], $row['penAlgorit'], $row['porcentaje'], $row['correctas'], $row['total']];
}

$stmt->close();

header('Content-Type: application/json');
echo json_encode([
    'nombreCompleto' => $nombreCompleto,
    'data' => $data,
]);
