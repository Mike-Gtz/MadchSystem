jQuery(document).ready(function ($) {
 
     $(document).on(
        'click',
        '.btn-edit',
        function (event) {
            event.preventDefault();
                 $.ajax({
                    url:base_url() + "perfil/edit",
                    type: "post",
                    data: {
                        "idUsuario" : $.trim($("#idUsuario").val()),
                        "contra"    : $.trim($("#contra").val()),
                        "telefono"  : $.trim($("#telefono").val()),
                        },
                    cache:false,
                    dataType: "json",
                        success: function (json) {
                            console.log(json.response_code);
                            console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                window.location.replace(base_url() + "perfil"); 
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
 