<?php
include_once '../includes/funciones/sesiones.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pensamiento Computacional</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Changa+One&display=swap');
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap');
    </style>
</head>


<body>
    <header>
        <a href="#">
            <img class="logo" src="../img/logoText.png">
        </a>

        <ul class="navbar">
            <li><a href="#" class="active" style="font-style: none;">Inicio</a></li>
            <li><a href="#">Acerca de</a></li>
            <li><a href="soporteAlumno.php">Soporte</a></li>
        </ul>

        <div class="main">
            <a href="../test/index.php" class="user"><i class="ri-user-fill"></i>Iniciar Test</a>
            <!-- <li><a class="dropdown-item" href="index.php?cerrar_sesion=true">Cerrar Sesión</a></li> una confirmacion a este cierre de sesion -->
            <!-- <a href="index.php?cerrar_sesion=true" class="user"><i class="ri-logout-box-r-fill"></i>Cerrar Sesión</a> -->
            <a href="#" id="cerrar" class="user"><i class="ri-logout-box-r-fill"></i>Cerrar Sesión</a>

            <!-- confirmar si desea cerrar la sesion con php -->


            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    <main>
        <div class="contenedor1">
            <div class="subcontenedor">
                <h1>Activa tu Lógica</h1>
            </div>
            <div class="subcontenedor">
                <img class="logo" src="../img/logoCerebro.svg">
            </div>
        </div>

        <div class="contenedor2">
            <p>El pensamiento computacional es un concepto relativamente nuevo que surge a principios de este siglo y rápidamente se ha popularizado debido a su premisa principal, que todas las personas pueden utilizar habilidades propias del ámbito de la computación para la resolución de problemas en otros ámbitos.</p>
        </div>

        <div class="contenedor3">
            <div class="subcontenedor3">
                <div class="sub">
                    <h3>Estimular la creatividad</h3>
                    <p>El pensamiento computacional estimula la creatividad al enfocarse en la solución de problemas, fomentar el pensamiento no convencional, abstraer los detalles irrelevantes, y promover la experimentación y la prueba de diferentes soluciones posibles. Esto ayuda a las personas a encontrar soluciones nuevas e inesperadas, liberarse de las restricciones de pensamiento convencionales y explorar ideas creativas sin miedo a cometer errores.</p>
                </div>

            </div>
            <div class="subcontenedor3">
                <img src="../img/cerebro.svg" alt="">
            </div>
        </div>

        <div class="contenedor4">
            <div class="subcontenedor4">
                <img src="../img/circuito.svg" alt="">
            </div>
            <div class="subcontenedor4">
                <div class="sub">
                    <h3>Trabajar la capacidad de razonamiento y de pensamiento crítico</h3>
                    <p>El pensamiento computacional mejora la capacidad de razonamiento y el pensamiento crítico al basarse en la lógica y en la descomposición de problemas complejos en partes más pequeñas, lo que ayuda a desarrollar habilidades de razonamiento lógico y a fomentar el pensamiento crítico.</p>
                </div>
            </div>


        </div>

        <div class="contenedor3">
            <div class="subcontenedor3">
                <div class="sub">
                    <h3>Fomentar los dotes de liderazgo y el trabajo en equipo</h3>
                    <p>El pensamiento computacional fomenta el trabajo en equipo y los dotes de liderazgo al enfocarse en la resolución de problemas de manera colaborativa y automatizar tareas repetitivas. Estas habilidades son esenciales para liderar y colaborar con otros en cualquier campo y pueden mejorar significativamente la eficiencia y el éxito de un equipo.</p>
                </div>
            </div>
            <div class="subcontenedor3">
                <img src="../img/foco.svg" alt="">
            </div>
        </div>
    </main>

    <?php
    include '../includes/template/footer-interno.php'
    ?>


    <!-- js link -->
    <script type="text/javascript" src="../js/script.js"></script>

    <!-- <script>
        document.getElementById("cerrar").addEventListener("click", function() {
            var confirmar = confirm("¿Desea cerrar la sesión?");
            if (confirmar) {
                window.location.href = "index.php?cerrar_sesion=true";
            }
        });
    </script> -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- con sweetalert -->
    <script>
        // document.getElementById("cerrar").addEventListener("click", function() {
        //     Swal.fire({
        //         title: 'CERRAR SESION',
        //         text: "¿Desea cerrar la sesión?",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Cerrar Sesión'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             Swal.fire(
        //                 'Sesion Cerrada!',
        //                 'Tu sesion ha sido cerrada.',
        //                 'success'
        //             )
        //         }
        //     })
        // });

        document.getElementById("cerrar").addEventListener("click", function() {
            Swal.fire({
                title: 'CERRAR SESION',
                text: "¿Desea cerrar la sesión?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Cerrar Sesión'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Sesion Cerrada!',
                        'Tu sesion ha sido cerrada.',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = "index.php?cerrar_sesion=true";
                    }, 2000);
                }
            })
        });
    </script>

</body>

</html>