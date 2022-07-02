jQuery(document).ready(function ($) {
  
    $(document).on(
        'click',
        '.btn-save',
        function (event) {
            event.preventDefault();
                 $.ajax({
                    url:base_url() + "proyectos/add",
                    type: "post",
                    data: {
                        "nombreProyecto": $.trim($("#nombreProyecto").val()),
                        "descripcion"   : $.trim($("#descripcion").val()),
                        "status"        : $('#status option:selected').val(),
                        },
                    cache:false,
                    dataType: "json",
                        success: function (json) {
                            console.log(json.response_code);
                            console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                window.location.replace(base_url() + "proyectos"); 
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
                    url:base_url() + "proyectos/edit",
                    type: "post",
                    data: {
                        "idProyecto"    : $.trim($("#idProyecto").val()),
                        "nombreProyecto": $.trim($("#nombreProyecto").val()),
                        "descripcion"   : $.trim($("#descripcion").val()),
                        "status"        : $('#status option:selected').val(),
                        },
                    cache:false,
                    dataType: "json",
                        success: function (json) {
                            console.log(json.response_code);
                            console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                window.location.replace(base_url() + "proyectos"); 
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



 