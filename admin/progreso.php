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
$totalData = array_fill(0, 8, 0);
while ($row = $result->fetch_assoc()) {
    $nivel = $row['nivel'];
    if (!isset($data[$nivel])) {
        $data[$nivel] = [];
    }
    $data[$nivel][] = [$row['descomposicion'], $row['recoPatrones'], $row['abstraccion'], $row['generalizacion'], $row['penAlgorit'], $row['porcentaje'], $row['correctas'], $row['total']];
    for ($i = 0; $i < 8; $i++) {
        $totalData[$i] += $data[$nivel][0][$i];
    }
}

$stmt->close();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Progreso del estudiante</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #212529;
            color: #fff;
        }

        .chart-container {
            width: 90%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-between">
        <!-- <a onclick="history.back()" class="btn btn-primary">Regresar</a> -->
        <h1 class="title mx-auto">Progreso de: <?php echo $nombreCompleto; ?></h1>
    </div>
    <?php
    if (empty($data)) {
        echo "<h2 class='title'>El usuario no ha iniciado su test</h2>";
    } else {
        foreach ($data as $nivel => $datos) {
            $progresoData = array_map('floatval', array_slice($datos[0], 0, 6));
            $correctasTotalData = array_map('floatval', array_slice($datos[0], 6, 2));
            echo "
            <div class='chart-container'>
                <div class='row'>
                    <div class='col-md-6'>
                        <canvas id='progresoChart$nivel'></canvas>
                    </div>
                    <div class='col-md-6'>
                        <canvas id='correctasTotalChart$nivel'></canvas>
                    </div>
                </div>
            </div>
            <script>
                var ctx1 = document.getElementById('progresoChart$nivel').getContext('2d');
                var chart1 = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: ['Descomposición', 'Reconocimiento de patrones', 'Abstracción', 'Generalización', 'Pensamiento algorítmico', 'Porcentaje total'],
                        datasets: [{
                            label: 'Progreso nivel $nivel',
                            data: " . json_encode($progresoData) . ",
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#ffffff'
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: '#ffffff'
                                }
                            },
                            y: {
                                ticks: {
                                    color: '#ffffff'
                                }
                            }
                        }
                    }
                });

                var ctx2 = document.getElementById('correctasTotalChart$nivel').getContext('2d');
                var chart2 = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ['Correctas', 'Total'],
                        datasets: [{
                            label: 'Preguntas correctas y total del nivel $nivel',
                            data: " . json_encode($correctasTotalData) . ",
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#ffffff'
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: '#ffffff'
                                }
                            },
                            y: {
                                ticks: {
                                    color: '#ffffff'
                                }
                            }
                        }
                    }
                });
            </script>";
        }
    }
    ?>
    <script>
        setInterval(function() {
            location.reload();
        }, 10000);
    </script>
</body>

</html>