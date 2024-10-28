<?php
require_once '../includes/funciones/bd-conexiones.php';
include '../includes/header.php';
session_start();
?>

<div class="row vh-100 overflow-auto">
  <?php
  include '../includes/template/lateral.php'
  ?>
  <div class="col d-flex flex-column h-sm-100">
    <section class="h-100 gradient-custom-2">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-9 col-xl-7">
            <div class="card">
              <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                  <img src="../img/user.png" alt="Generic placeholder image" style="width: 150px; z-index: 1">
                </div>
                <div class="ms-3" style="margin-top: 130px;">
                  <h5>
                    <?php
                    echo $_SESSION['nombre'];
                    ?>
                  </h5>
                </div>
              </div>
              <div class="p-4 text-black" style="background-color: #f8f9fa;">
                <div class="d-flex justify-content-end text-center py-1">

                </div>
              </div>

              <div class="card-body p-4 text-black">
                <div class="mb-5">
                  <p class="lead fw-normal mb-1">Acerca de:</p>
                  <div class="p-4" style="background-color: #f8f9fa;">
                    <h4>
                      Rol:
                    </h4>
                    <p class="font-italic mb-1">Administrador</p>

                    <h4>Nombre: </h4><?php echo $_SESSION['nombre']; ?>
                    <h4>Matricula: </h4><?php echo $_SESSION['usuario']; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        include '../includes/template/footer-interno.php'
        ?>
      </div>
  </div>
</div>

</section>

</div>
</div>



<?php
include '../includes/footer.php'
?>