<?php

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'pd4');

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener la cantidad de usuarios
$sql = "SELECT COUNT(*) as total_administradores FROM usuario WHERE tipo = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalAdministradores = $row["total_administradores"];

$sql = "SELECT COUNT(*) as total_profesores FROM usuario WHERE tipo = 2";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalProfesores = $row["total_profesores"];

$sql = "SELECT COUNT(*) as total_alumnos FROM usuario WHERE tipo = 3";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalAlumnos = $row["total_alumnos"];

?>

