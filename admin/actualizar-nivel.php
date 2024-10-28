<?php
session_start();
include_once '../includes/funciones/sesiones.php';
include_once '../includes/funciones/bd-conexiones.php';
include_once '../includes/header2.php';
$id = $_GET['id'];

if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Error");
}
?>

<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="../img/logoCerebro.svg" alt="AdminLTELogo" width="200">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index2.php" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge"></span>
                </a>
            <li><a class="dropdown-item" href="index.php?cerrar_sesion=true">Cerrar Sesión</a></li>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Notifications</span>
                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
            </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index2.php" class="brand-link">
            <img src="../img/logoText.png" alt="AdminLTE Logo" class="brand-image" style="opacity: 1;">
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="image">
                    <img src="../img/user.png" class="img-circle" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['nombre']; ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="crear-Usuario.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Crear Usuario
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Lista Usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista Administradores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="data2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista Profesores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="data3.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista Alumnos</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Test
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="crear-nivel.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Nivel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-respuestas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Preguntas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="data-test.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Test</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>

      </nav>
            <!-- /.sidebar-menu -->
        </div>


        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-sm-6">
                    <h1 class="m-0">Panel de Administración Profesor</h1>
                </div><!-- /.col -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col d-flex flex-column h-sm-100">
                                <main class="row overflow-auto">
                                    <div class="col pt-4">
                                        <h3>Editar Nivel</h3>
                                        <p class="lead">Edita un nivel del test.</p>
                                        <hr />

                                        <div class="col-sm-8">

                                            <?php

                                            try {
                                                $sql = "SELECT * FROM nivel WHERE id = $id";
                                                $resultado = $conn->query($sql);
                                                $usuario = $resultado->fetch_assoc();
                                            } catch (Exception $exception) {
                                                echo "Error: " . $exception->getMessage();
                                            }

                                            ?>

                                            <form id="actualizar-registro" action="modelo-nivel.php" method="post">

                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre'] ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary" id="actualizar-registro">Actualizar</button>
                                                    <input type="hidden" name="registro" value="actualizar">
                                                    <input type="hidden" name="id_registro" value="<?php echo $usuario['id'] ?>">
                                                </div>

                                            </form>

                                        </div>

                                    </div>
                                </main>
                                <?php
                                include '../includes/template/footer-interno.php'
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <footer class="main-footer">
        <strong>Copyright &copy; 2023 Pensamiento Computacionnal</a>.</strong>
        All rights reserved.
    </footer>
</div>
<script src="../boost/plugins/jquery/jquery.min.js"></script>
<script src="../boost/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../boost/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../boost/dist/js/adminlte.js"></script>

<script src="../boost/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../boost/plugins/raphael/raphael.min.js"></script>
<script src="../boost/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../boost/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="../boost/plugins/chart.js/Chart.min.js"></script>
<script src="../js/sweetalert2.min.js"></script>
<script src="../js/nivel-fetch.js"></script>
</body>

</html>