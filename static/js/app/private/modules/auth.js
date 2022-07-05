jQuery(document).ready(function ($) {
    console.log('en -  auth.js');

    /**/

    $(document).on('click', '.btn-login', function (event) {
        event.preventDefault();
         $.ajax({
            url: base_url() + 'auth/login',
            type: 'post',
            async: false,
            data: { 
                email:      $('#email').val(),
                contra:     $('#contra').val(),
            },
            cache: false,
            dataType: 'json',
            success: function (json) {

                if (json.resultado == true) {
                    var mensaje = 'Bienvenido ' + json.usuario['nombre'] + ', ' + json.mensaje;
                    if(json.vencimiento_contra){
                        mensaje += ', Por favor modifica tu contrasena para poder seguir haciendo uso de la plataforma.';
                    }

                    $.confirm({
                        title: 'Bienvenido',
                        content: mensaje,
                        autoClose: false, 
                        type: 'blue',
                        icon: 'fa fa-spinner fa-spin',
                        buttons: {
                            aceptar: function () {
                                window.location.replace(base_url() + 'usuarios'); 
                              }
                        }
                    });

 
                } else {
                    $.confirm({
                        title: 'Parece que hay un problema',
                        content: json.mensaje,
                        autoClose: false, 
                        type: 'red',
                        icon: 'fa fa-times',
                        buttons: {
                            aceptar: function () {

                            }
                        }
                    });
                }
            },
            error: function (ts) {
                console.log(ts.responseText);
                alert('Ocurrió un error, por favor vuelva a intentarlo');
            },
        });
    });

    $(document).on('click', '.btn-recovery', function (event) {
        event.preventDefault();

        $.ajax({
            url: base_url() + 'auth/recovery',
            type: 'post',
            data: { 
                email:      $('#email').val()
            },
            cache: false,
            dataType: 'json',
            success: function (json) {

                if (json.resultado == 'true') {
                    alert(json.mensaje);
                } else {
                    alert(json.mensaje);
                }
            },
            error: function (ts) {
                console.log(ts.responseText);
                alert('Ocurrió un error, por favor vuelva a intentarlo');
            },
        });
    }); 

});