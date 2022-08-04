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
                        "usuarios"      : $('#usuarios option:selected').map(function(){ return this.value }).get().join(", "),
                        "servicios"     : $('#servicios option:selected').map(function(){ return this.value }).get().join(", "),

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
                        "usuarios"      : $('#usuarios option:selected').map(function(){ return this.value }).get().join(", "),
                        "servicios"     : $('#servicios option:selected').map(function(){ return this.value }).get().join(", "),
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

    /**/

    $(document).on(
        'click',
        '.btn-delete-serv',
        function (event) {
            event.preventDefault();
            if (window.confirm("Esta seguro de eliminar este elemento?")) {
                $.ajax({
                    url:base_url() + "proyectos/deleteservicio",
                    type: "post",
                    data: {"id":$(this).attr('data-id')},
                    cache:false,
                    dataType: "json",
                        success: function (json) {
                            console.log(json.response_code);
                            console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                window.location.reload();
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

    /**/

    $(document).on(
        'click',
        '.btn-delete-usr',
        function (event) {
            event.preventDefault();
            if (window.confirm("Esta seguro de eliminar este elemento?")) {
                $.ajax({
                    url:base_url() + "proyectos/deleteusuario",
                    type: "post",
                    data: {"id":$(this).attr('data-id')},
                    cache:false,
                    dataType: "json",
                        success: function (json) {
                            console.log(json.response_code);
                            console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                window.location.reload();
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

});



 