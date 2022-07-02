jQuery(document).ready(function ($) {
 
  //test
     $(document).on(
        'click',
        '#btn-breadcrumb',
        function (event) {
            event.preventDefault();
            window.location.replace(base_url() + "usuarios/user"); 

        }
    ); 

    $(document).on(
        'click',
        '.btn-delete',
        function (event) {
            event.preventDefault();
            if (window.confirm("Esta seguro de inhabilitar este usuario?")) {
                $.ajax({
                    url:base_url() + "usuarios/delete",
                    type: "post",
                    data: {"id":$(this).attr('data-id')},
                    cache:false,
                    dataType: "json",
                        success: function (json) {
                            console.log(json.response_code);
                            console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                reload_contenido();
                            }else{
                                alert('Ocurrió un error, por favor vuelva a intentarlo');
                            }

                        },
                        error: function(ts) {
                           console.log(ts.responseText);
                            alert('Ocurrió un error, por favor vuelva a intentarlo');
                            clear_form();

                        } 
                });  
            } 
        }
    );  
 
     $(document).on(
        'click',
        '.btn-update',
        function (event) {
            event.preventDefault();
            window.location.replace(base_url() + "usuarios/user?id=" + $(this).attr('data-id')); 
        }
    );  

});


function reload_contenido() {
    $('#div_contenido').load(base_url() + 'usuarios/tabla');
}
 