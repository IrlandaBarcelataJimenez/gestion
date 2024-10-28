<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Iniciar sesion</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/styleSoporte.css">
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <script>
        $(document).ready(function() {
            $('#formulario').submit(function(e) {
                e.preventDefault();

                document.getElementById("mensaje").innerHTML = "";
                document.getElementById("correo").innerHTML = "";

                var enviar = $("#enviar");
                var nombre = document.getElementById("nombre");
                var contrasena = document.getElementById('contrasena');
                //alert(colorsel.value);
                $.ajax({
                    data: $('#formulario').serialize(),
                    url: 'php/soporte.php',
                    type: 'post',


                    beforeSend: function() {
                        $("#enviar").text(" Procesando los datos");
                    },
                    complete: function(data) {
                        var resp = data.responseText;
                        enviar.text("Contactar");
                    },
                    success: function(respuesta) {
            
                        var nombre = document.getElementById('nombre');
                        // alert(respuesta);
                        switch (respuesta) {
                            case 'ok':
                                document.getElementById('resultado').style.display='block';
                                document.getElementById("mensaje").innerHTML = '<div class="alert alert-success alert-dismissible alertas"><strong>Bienvenido! </strong>Usuario Registrado</div> </div>';
                                break;
                            default:
                            document.getElementById('resultado').style.display='block';
                                setTimeout(function(){
                                    document.getElementById('resultado').style.display='none';
                                }, 2000);
                                document.getElementById("mensaje").innerHTML = '<div class="alert alert-danger alert-dismissible alertas"><strong>Error!</strong> Usuario incorrecto </div> </div>';
                        }

                    },
                    error: function(data) {
                        document.getElementById('resultado').style.display='block';

                        setTimeout(function(){
                            document.getElementById('resultado').style.display='none';
                        }, 2000);
                        document.getElementById("mensaje").innerHTML='<div class="alert alert-primary" role="alert"><strong>Error!</strong> Ahi algo que no esta bien</div>'
                    }
                });
            });
        });
    </script>
</head>

<body>
   <div class="form-container">
      <form id="formulario" name="formulario">
        <h3>Contactar</h3>

        <input type="text" name="nombre" id="nombre" required placeholder="Ingresa tu nombre">
        <input type="email" name="correo" id="correo" required placeholder="Ingresa tu correo">
        <input type="text" name="telefono" id="telefono" required placeholder="Ingresa tu telefono">
        <textarea name="mensaje" id="mensaje" placeholder="Ingresa tu mensaje" required></textarea>
        <button type="submit" class="form-btn" id="enviar" name="enviar">Contactar</button>
        <p><a href="areaAlumno.php">Regresar</a></p>


        <div id="resultado" style="display:none;">
            <div id="mensaje"></div>
        </div>
        
      </form>
   </div>
</body>

</html>