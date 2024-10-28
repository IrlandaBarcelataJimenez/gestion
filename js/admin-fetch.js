
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#guardar-admin');
    // console.log(form);

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const formDatos = new FormData(form);

            const url = form.getAttribute('action');
            const metodo = form.getAttribute('method');

            fetch(url, { method: metodo, body: formDatos })

                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const resultado = data;
                    if (resultado.respuesta == "exito") {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'El usuario ha sido agregado correctamente',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        setTimeout(()=>{
                            location.reload();
                        },2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Algo salio mal!',
                        })
                    }
                })

                .catch((error) => {
                    console.log(error);
                })

        });
    }

    const tabla = document.querySelector('#cuerpo-tabla')

    if (tabla) {
        tabla.addEventListener('click', function (event) {
            console.log(event.target.id);
            console.log(event.target.value);

            if (event.target.id == 'eliminar') {
                const tipo = event.target.getAttribute('data-tipo');
                const id = event.target.getAttribute('data-id');

                console.log(`id: ${id} - tipo: ${tipo}`);

                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "No podras deshacer esta accion!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const data = new FormData();
                        data.append("id", id);
                        data.append("registro", "eliminar");

                        const url = `modelo-${tipo}.php`;
                        const metodo = "post";
                        fetch(url, {
                            method: metodo,
                            body: data
                        })
                            .then(response => response.json())
                            .then(data => {
                                console.log(data);
                                const resultado = data;

                                if (resultado.respuesta == "exito") {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'El usuario ha sido eliminado correctamente',
                                        showConfirmButton: false,
                                        timer: 1500,
                                    })
                                    setTimeout(()=>{
                                        location.reload();
                                    },2000);
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Algo salio mal!',
                                    })
                                }
                            })
                            .catch((error) => {
                                console.log("Error: ", error);
                            })

                    }
                })

            }
        });
    }

    const formActualizar = document.querySelector('#editar-registro')

    if (formActualizar) {
        formActualizar.addEventListener('submit', function (event) {
            event.preventDefault();

            const formDatos = new FormData(formActualizar);

            const url = formActualizar.getAttribute('action');
            const metodo = formActualizar.getAttribute('method');

            fetch(url, { method: metodo, body: formDatos })

                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const resultado = data;
                    if (resultado.respuesta == 'exito') {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Tu usuario ha sido actualizado correctamente',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        setTimeout(()=>{
                            location.reload();
                        },2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Algo salio mal!',
                        })
                    }
                })

                .catch((error) => {
                    console.log(error);
                })

        });
    }
});
