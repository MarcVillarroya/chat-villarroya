$(document).ready(function() {
    $('#btnEnviar').click(function() {

        var nombre_usuario = $('#inputusername').val();
        var contrasena = $('#inputPassword').val();

        $.ajax({

            method: 'POST',
            url: "iniciar_sesion.php",
            data: {
                nombre_usuario: nombre_usuario,
                contrasena: contrasena
            },
            success: function(respuesta) {
                if (respuesta == "usuario") {
                    //alert("ok");
                    window.location.href = 'home.php';
                    //alert(respuesta);
                    //alert("ok");
                } else {

                    alert("usuario incorrecto");
                }

            }

        })

        return false;
    });
});