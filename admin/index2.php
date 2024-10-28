<?php
include_once '../includes/funciones/sesiones.php';
include_once '../includes/funciones/bd-conexiones.php';
include_once 'total_alumnos.php';
include_once '../includes/header2.php';
?>

<div class="wrapper">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
      <li><a class="dropdown-item" id="cerrar">Cerrar Sesión</a></li>
      <script>
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
          <h1 class="m-0">Panel de Administración Educativa</h1>
        </div><!-- /.col -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Administradores</span>
                <span class="info-box-number"><?php echo $totalAdministradores; ?></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Profesores</span>
                <span class="info-box-number"><?php echo $totalProfesores; ?></span>
              </div>
            </div>
          </div>
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Alumnos</span>
                <span class="info-box-number"><?php echo $totalAlumnos; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
      <p>En este espacio centralizado, los administradores como tú tienen la capacidad de construir puentes hacia el conocimiento y el éxito de estudiantes y profesores por igual. Nuestra plataforma ha sido cuidadosamente diseñada para brindarte las herramientas esenciales en la gestión educativa.</p>
      <p>Nos emociona tener a administradores como tú en esta misión educativa. Tu dedicación a construir un entorno de aprendizaje exitoso es invaluable, y estamos aquí para asegurarnos de que tengas todas las herramientas necesarias para impulsar el crecimiento y el conocimiento de tu comunidad educativa.</p>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 Pensamiento Computacionnal</a>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../boost/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../boost/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../boost/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../boost/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../boost/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../boost/plugins/raphael/raphael.min.js"></script>
<script src="../boost/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../boost/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../boost/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
</body>

</html>