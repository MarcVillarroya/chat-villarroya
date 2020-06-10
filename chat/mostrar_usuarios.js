$(document).ready(function() {

    mostrar_datos();
    setInterval(mostrar_comentarios, 1000);


    function mostrar_datos() {
        $.ajax({
            type: "POST",
            url: "mostrar_usuarios.php",
            success: function(response) {
                //alert(response);
                let datos = JSON.parse(response);
                let plantilla = '';
                datos.forEach(dato => {
                    plantilla += `
                    <tr dato_id="${dato.id}">
                        <td>${dato.id}</td>
                        <td>${dato.nombre_usuario}</td>
                        <td>
                        <button type="button" class="dato-editar btn btn-primary btn-warning select">
                          CHAT
                        </button>
                        </td>
                       
                    </tr>
                    `
                });
                $('#tabla_usuarios').html(plantilla);
            }
        });
    }
    $(document).on('click', '.select', function() {


        let elemento = $(this)[0];
        //id = $(elemento).attr('dato_id');
        let plantilla2 = '';

        plantilla2 += `
        <div>
        
        
        <h5 ml-2 pb-0>Chat:</h5>
        <form id="form_comentarios" name="form1">
            <label for="textarea"></label>
            <center><textarea class="form-control" id="inputtexto" name="textarea" cols rows="3"></textarea></center>
            <button type="button" id="enviar_comentario" name="comentar" class=" enviar_comentario btn btn-primary float-right mt-2">Enviar</button>
            <div id="chats">

            </div>
        </form>
            
        </div> 
                    `
            //console.log(id);
        $('#fotos2').html(plantilla2);
        mostrar_comentarios();

    })


    $(document).on('click', '.enviar_comentario', function() {
        var texto = $('#inputtexto').val();

        // var id_foto = id;


        $.ajax({
            method: 'POST',
            url: "registrar_texto.php",
            data: {
                texto: texto,
                //id_foto: id_foto
            },
            success: function(respuesta) {
                if (respuesta == "ok") {
                    mostrar_comentarios();
                    $('#inputtexto').val("");
                    //alert("ok");
                } else {
                    mostrar_comentarios();
                    //alert("no ok");
                }
                //alert(respuesta);
            }

        })

        return false;
    });

    function mostrar_comentarios() {
        //alert("aaaaaa");
        // var id_foto = id;

        $.ajax({
            type: "POST",
            url: "mostrar_chat.php",

            success: function(response) {
                let datos = JSON.parse(response);
                let plantilla = '';
                datos.forEach(dato => {
                    plantilla += `
                    <div class="container" style="width=400px;">
                    <h6 class="nombre_usuario mt-2">Usuario: ${dato.nombre_usuario} // Fecha: ${dato.fecha}</h6>
                    <p class="comentario text-break">${dato.texto}</p>
                    </div>
                    <hr>
                    `
                        //alert(response);
                });
                //alert($ { dato.miniatura });

                $('#chats').html(plantilla);

            }


        });

    }

})