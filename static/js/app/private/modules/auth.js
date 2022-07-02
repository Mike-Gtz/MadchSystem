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
                    alert('Bienvenido');
                    window.location.replace(base_url() + 'usuarios'); 
 
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