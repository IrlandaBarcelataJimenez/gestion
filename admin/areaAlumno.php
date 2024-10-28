<?php
include_once '../includes/funciones/sesiones.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Pensamiento Computacional">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Pensamiento Computacional</title>
    <link rel="shortcut icon" href="../img/logoCerebro.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- JS de Bootstrap y dependencias (jQuery y Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="resource/fonts/webfonts/Montserrat-Alt1.css"> -->



    <!-- Bootstrap core CSS -->
    <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../css/daltonico.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
        #botonDaltonico {
            display: inline-block;
            width: 30px;
            height: 30px;
            background: #ccc;
            text-align: center;
            border-radius: 50%;
            transition: background 0.3s ease;
        }

        #botonDaltonico.active {
            background: #2b90d9;
        }
    </style>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img class="img-fluid logo" src="../img/logoText.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navletter" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="areaAlumno.php">Inicio</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="about.php">Acerca de</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="../test/index.php">Test</a>
                        </li>
                        <!-- <a href="../test/index.php" class="user"><i class="ri-user-fill"></i>Iniciar Test</a> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="soporteAlumno.php">Soporte</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Modo de color
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switchDaltonico">
                                    <label class="custom-control-label" for="switchDaltonico">Daltonico</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switchDeuteranomalia">
                                    <label class="custom-control-label" for="switchDeuteranomalia">Deuteranomalia</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switchProtanomalia">
                                    <label class="custom-control-label" for="switchProtanomalia">Protanomalia</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switchTritanomalia">
                                    <label class="custom-control-label" for="switchTritanomalia">Tritanomalia</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="main">
                        <a href="#" class="user"><i class="ri-user-fill"></i><?php echo $_SESSION['nombre']; ?></a>
                        <!-- <li><a class="dropdown-item" href="index.php?cerrar_sesion=true">Cerrar Sesión</a></li> una confirmacion a este cierre de sesion -->
                        <!-- <a href="index.php?cerrar_sesion=true" class="user"><i class="ri-logout-box-r-fill"></i>Cerrar Sesión</a> -->
                        <a href="#" id="cerrar" class="user"><i class="ri-logout-box-r-fill"></i>Cerrar Sesión</a>

                        <!-- confirmar si desea cerrar la sesion con php -->


                        <!-- <div class="bx bx-menu" id="menu-icon"></div> -->
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div>
        <link href="../css/style.css" rel="stylesheet" />
        <div class="home-container">
            <div class="home-container1">
                <img src="../img/brain1.png" alt="image" class="home-image" />
                <h1 class="home-text">ACTIVA TU LÓGICA</h1>
            </div>
        </div>
    </div>

    <div class="contenedor2">
        <p>El pensamiento computacional es un concepto relativamente nuevo que surge a principios de este siglo y rápidamente se ha popularizado debido a su premisa principal, que todas las personas pueden utilizar habilidades propias del ámbito de la computación para la resolución de problemas en otros ámbitos.</p>
    </div>

    <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="carrimg" src="../img/cerebro.svg" alt="Cerebro" width="100%" height="100%">
                    <div class="container">
                        <div class="carousel-caption text-start p2">
                            <h1>Estimular la creatividad.</h1>
                            <p>El pensamiento computacional es un concepto relativamente nuevo que surge a principios de este siglo y rápidamente se ha popularizado debido a su premisa principal, que todas las personas pueden utilizar habilidades propias del ámbito de la computación para la resolución de problemas en otros ámbitos.</p>
                            <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="carrimg" src="../img/circuito.svg" alt="circuito" width="100%" height="100%">
                    <div class="container">
                        <div class="carousel-caption p2">
                            <h1>Trabajar la capacidad de razonamiento y de pensamiento crítico</h1>
                            <p>El pensamiento computacional mejora la capacidad de razonamiento y el pensamiento crítico al basarse en la lógica y en la descomposición de problemas complejos en partes más pequeñas, lo que ayuda a desarrollar habilidades de razonamiento lógico y a fomentar el pensamiento crítico.</p>
                            <!-- <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> -->
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="carrimg" src="../img/foco.svg" alt="foco" width="100%" height="100%">
                    <div class="container">
                        <div class="carousel-caption text-end p2">
                            <h1>Fomentar los dotes de liderazgo y el trabajo en equipo.</h1>
                            <p>El pensamiento computacional fomenta el trabajo en equipo y los dotes de liderazgo al enfocarse en la resolución de problemas de manera colaborativa y automatizar tareas repetitivas. Estas habilidades son esenciales para liderar y colaborar con otros en cualquier campo y pueden mejorar significativamente la eficiencia y el éxito de un equipo.</p>
                            <!-- <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <!-- <div class="row">
        <div class="col-lg-4">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2>Heading</h2>
          <p>Some representative placeholder content for the three columns of text below the carousel. This is the first
            column.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2>Heading</h2>
          <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.
          </p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2>Heading</h2>
          <p>And lastly this, the third column of representative placeholder content.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div>
      </div> -->


            <!-- START THE FEATURETTES -->
            <!-- 
      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Estimular la <span class="text-muted">creatividad</span>
          </h2>
          <p class="lead">El pensamiento computacional estimula la creatividad al enfocarse en la solución de problemas, fomentar el pensamiento no convencional, abstraer los detalles irrelevantes, y promover la experimentación y la prueba de diferentes soluciones posibles. Esto ayuda a las personas a encontrar soluciones nuevas e inesperadas, liberarse de las restricciones de pensamiento convencionales y explorar ideas creativas sin miedo a cometer errores.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto rounded-circle" src="img/cerebro.svg">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this
            layout would work with some actual real-world content in place.</p>
        </div>
        <div class="col-md-5 order-md-1">
          <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
          </svg>

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really
            intended to be actually read, simply here to give you a better view of what this would look like with some
            actual content. Your content.</p>
        </div>
        <div class="col-md-5">
          <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
          </svg>

        </div>
      </div>

      <hr class="featurette-divider"> -->

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->
    </main>

    <?php
    include '../includes/template/footer-interno.php'
    ?>


    <!-- js link -->
    <script type="text/javascript" src="../js/script.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/js/all.min.js"></script>

    <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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

    <script>
        var switches = ['Daltonico', 'Deuteranomalia', 'Protanomalia', 'Tritanomalia'];

        switches.forEach(function(switchId) {
            var switchElement = document.getElementById('switch' + switchId);
            var switchContainer = switchElement.parentElement;

            // Agrega un event listener para el evento 'click' al contenedor del switch
            switchContainer.addEventListener('click', function(event) {
                // Detiene la propagación del evento
                event.stopPropagation();
            });

            switchElement.addEventListener('change', function() {
                // Si el interruptor está activado, agrega la clase correspondiente al body
                // Si no, remueve la clase correspondiente
                if (this.checked) {
                    document.body.classList.add(switchId.toLowerCase());
                } else {
                    document.body.classList.remove(switchId.toLowerCase());
                }
            });
        });
    </script>

</body>

</html>