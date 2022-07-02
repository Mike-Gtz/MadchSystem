jQuery(document).ready(function ($) {
  
    $(document).on(
        'click',
        '.btn-save',
        function (event) {
            event.preventDefault();
                 $.ajax({
                    url:base_url() + "usuarios/add",
                    type: "post",
                    data: {
                        "nombre"    : $.trim($("#nombre").val()),
                        "apellidos" : $.trim($("#apellidos").val()),
                        "email"     : $.trim($("#email").val()),
                        "contra"    : $.trim($("#contra").val()),
                        "telefono"  : $.trim($("#telefono").val()),
                        "tipo"      : $('#tipo option:selected').val(),
                        "status"    : $('#status option:selected').val(),
                        },
                    cache:false,
                    dataType: "json",
                        success: function (json) {
                            console.log(json.response_code);
                            console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                window.location.replace(base_url() + "usuarios"); 
                            }else{
                                alert('Ocurrió un error, por favor vuelva a intentarlo');
                            }

                        },
                        error: function(ts) {
                           console.log(ts.responseText);
                            alert('Ocurrió un error, por favor vuelva a intentarlo');

                        } 
                });  
         }
    );   

    $(document).on(
        'click',
        '.btn-edit',
        function (event) {
            event.preventDefault();
                 $.ajax({
                    url:base_url() + "usuarios/edit",
                    type: "post",
                    data: {
                        "idUsuario" : $.trim($("#idUsuario").val()),
                        "nombre"    : $.trim($("#nombre").val()),
                        "apellidos" : $.trim($("#apellidos").val()),
                        "email"     : $.trim($("#email").val()),
                        "contra"    : $.trim($("#contra").val()),
                        "telefono"  : $.trim($("#telefono").val()),
                        "tipo"      : $('#tipo option:selected').val(),
                        "status"    : $('#status option:selected').val(),
                        },
                    cache:false,
                    dataType: "json",
                        success: function (json) {
                            console.log(json.response_code);
                            console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                window.location.replace(base_url() + "usuarios"); 
                            }else{
                                alert('Ocurrió un error, por favor vuelva a intentarlo');
                            }

                        },
                        error: function(ts) {
                           console.log(ts.responseText);
                            alert('Ocurrió un error, por favor vuelva a intentarlo');

                        } 
                });  
         }
    );   


});



 