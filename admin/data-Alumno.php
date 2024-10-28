<?php
include_once '../includes/funciones/sesiones.php';
include_once '../includes/funciones/bd-conexiones.php';
include_once 'total_alumnos.php';
include_once '../includes/header2.php';
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
        <a href="area-Profesor.php" class="nav-link">Home</a>
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
    <a href="area-Profesor.php" class="brand-link">
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
            <a href="crear-Alumno.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Crear Usuario
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="data-Alumno.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Lista Alumnos
              </p>
            </a>
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
              <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                <thead>
                  <tr>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Matricula</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nombre(s)</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Apellido Paterno</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Apellido Materno</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Acciones</th>
                  </tr>
                </thead>
                <tbody id="cuerpo-tabla">
                  <?php
                  try {
                    $sql = "SELECT idUsuario, usuario, correo, nombre, apPat, apMat, tipo FROM usuario WHERE tipo = 3";
                    $resultado = $conn->query($sql);
                  } catch (Exception $exception) {
                    echo "Error: " . $exception->getMessage();
                  }
                  while ($usuario = $resultado->fetch_assoc()) {
                  ?>
                    <tr>
                      <td><?php echo $usuario['usuario'] ?></td>
                      <td><?php echo $usuario['nombre'] ?></td>
                      <td><?php echo $usuario['apPat'] ?></td>
                      <td><?php echo $usuario['apMat'] ?></td>
                      <td>
                        <!-- envio por GET -->
                        <a href="actualizar-Alumno.php?id=<?php echo $usuario['idUsuario'] ?>" class="btn btn-light">Actualizar</a>
                        <button class="btn btn-danger" id="eliminar" data-id="<?php echo $usuario['idUsuario'] ?>" data-tipo="Admin" id="eliminar" value="<?php echo $usuario['idUsuario'] ?>">Eliminar</button>
                        <a href="progreso.php?usuario=<?php echo $usuario['usuario'] ?>" class="btn btn-light">Progreso</a>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">Matricula</th>
                    <th rowspan="1" colspan="1">Nombre(s)</th>
                    <th rowspan="1" colspan="1">Apellido Paterno</th>
                    <th rowspan="1" colspan="1">Apellido Materno</th>
                    <th rowspan="1" colspan="1">Acciones</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../js/sweetalert2.min.js"></script>
<script src="../js/admin-fetch.js"></script>
</body>

</html>