document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("#login-form");
  // console.log(form);

  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();

      const formDatos = new FormData(form);

      const url = form.getAttribute("action");
      const metodo = form.getAttribute("method");

      fetch(url, { method: metodo, body: formDatos })
        .then((response) => response.json())
        .then((data) => {
          console.log(data);

          const resultado = data;

          if (resultado.respuesta == "exito") {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Inicio de sesion correcto!",
              text: `¡Bienvenido(a) ${resultado.nombre}!`,
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(() => {
              switch (resultado.rol) {
                case 1:
                  setTimeout(() => {
                    window.location.href = "index2.php";
                  }, 1000);
                  break;
                case 2:
                  setTimeout(() => {
                    window.location.href = "area-Profesor.php";
                  }, 1000);
                  break;
                case 3:
                  setTimeout(() => {
                    window.location.href = "areaAlumno.php";
                  }, 1000);
                  break;

                default:
                  break;
              }
            }, 1500);
          } else {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Algo salio mal!",
            });
          }
        })

        .catch((error) => {
          console.log(error);
        });
    });
  }
});
