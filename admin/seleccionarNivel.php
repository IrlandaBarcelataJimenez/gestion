<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona un Nivel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222328;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 90%;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
        }

        .nivel-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nivel-button {
            width: 80%;
            margin: 10px;
            padding: 20px;
            color: #000000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .nivel-button-bloqueado {
            background-color: #FF9F9F; /* Color de fondo para niveles bloqueados */
        }

        .nivel-button-desbloqueado {
            background-color: #adddff; /* Color de fondo para niveles desbloqueados */
        }

        .nivel-button:hover {
            background-color: #222328;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selecciona un Nivel</h1>
        <div class="nivel-buttons">
            <button class="nivel-button nivel-button-desbloqueado" onclick="seleccionarNivel(1)">Nivel 1</button>
            <button class="nivel-button nivel-button-bloqueado" onclick="seleccionarNivel(2)" id="nivel2">Nivel 2</button>
            <button class="nivel-button nivel-button-bloqueado" onclick="seleccionarNivel(3)" id="nivel3">Nivel 3</button>
            <button class="nivel-button nivel-button-bloqueado" onclick="seleccionarNivel(4)" id="nivel4">Nivel 4</button>
            <a href="areaAlumno.php" class="salir-button">Salir</a>
        </div>
    </div>

    <script>
        var nivelActual = 1;

        function seleccionarNivel(nivel) {
            if (nivel === nivelActual) {
                nivelActual++;
                desbloquearNivel(nivelActual);
                redirigirArchivo(nivel);
            } else if (nivel <= nivelActual) {
                alert("Ya has completado el Nivel " + nivel);
            } else {
                alert("Debes completar el Nivel " + (nivel - 1) + " antes de desbloquear este nivel.");
            }
        }

        function desbloquearNivel(nivel) {
            var botonNivel = document.getElementById("nivel" + nivel);
            if (botonNivel) {
                botonNivel.classList.remove("nivel-button-bloqueado");
                botonNivel.classList.add("nivel-button-desbloqueado");
            }
        }

        function redirigirArchivo(nivel) {
            var archivo;
            switch (nivel) {
                case 1:
                    archivo = "../test/index.php";
                    break;
                case 2:
                    archivo = "../test/index.php";
                    break;
                case 3:
                    archivo = "../test/index.php";
                    break;
                case 4:
                    archivo = "../test/index.php";
                    break;
                default:
                    archivo = "index.php"; // Redirigir a un archivo predeterminado si el nivel no está definido
            }
            window.location.href = archivo;
        }
    </script>

<script src="js/quizz.js"></script>

<script src="js/script.js"> </script>
</body>
</html>
