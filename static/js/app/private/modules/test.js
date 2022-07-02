jQuery(document).ready(function ($) {
console.log('en -  test.js');


  //test
     $(document).on(
        'click',
        '#btn-breadcrumb',
        function (event) {
            event.preventDefault();
            console.log('hola');  

        }
    );  



    //clear
    $(document).on(
        'click',
        '#btn-clear',
        function (event) {
            event.preventDefault();
            console.log('clear forma'); 
            clear_form();

        }
    );       

    //cancelar
    $(document).on(
        'click',
        '#btn-cancel',
        function (event) {
            event.preventDefault();
            console.log('cancelar forma'); 
            clear_form();

        }
    );   


    
 

    

    $(document).on('click', '#btn-save', function (event) {
        event.preventDefault();
        console.log('save forma'); 
        //Validamos  
      let id_usuario        = $.trim($("#id_usuario").val());
      let nombre_usuario    = $.trim($("#nombre_usuario").val());
      let apellido_usuario  = $.trim($("#apellido_usuario").val()); 
      let correo_usuario    = $.trim($("#correo_usuario").val());
      let telefono_usuario  = $.trim($("#telefono_usuario").val());
      let direccion_usuario = $.trim($("#direccion_usuario").val());
      let pass_usuario      = $.trim($("#pass_usuario").val()); 
      let repeat_pass       = $.trim($("#repeat_pass").val()); 
 
      let goToValidation = true;


       if (nombre_usuario.length < 1) {
           $("#nombre_usuario").focus();
          goToValidation = false;
      }

      if (apellido_usuario.length < 1) {
           $("#apellido_usuario").focus();
          goToValidation = false;
      }      

      if (correo_usuario.length < 1) {
           $("#correo_usuario").focus();
          goToValidation = false;
      }

      if (telefono_usuario.length < 1) {
           $("#telefono_usuario").focus();
          goToValidation = false;
      }


      if (direccion_usuario.length < 1) {
           $("#direccion_usuario").focus();
          goToValidation = false;
      }

      if (pass_usuario.length < 1 && id_usuario.length < 1) {
           $("#pass_usuario").focus();
          goToValidation = false;
      }

      if (repeat_pass.length < 1 && repeat_pass !== pass_usuario) {
           $("#repeat_pass").focus();
          goToValidation = false;
      }                        

        if(goToValidation){
            if(id_usuario.length < 1){

                //si no tiene id es insert 
                data = {
                        nombre_usuario : nombre_usuario, 
                        apellido_usuario : apellido_usuario,
                        correo_usuario : correo_usuario,
                        telefono_usuario : telefono_usuario,
                        direccion_usuario : direccion_usuario,
                        pass_usuario : pass_usuario,
                        repeat_pass : repeat_pass,
                    };

                    console.log(base_url() + "usuario/add");
                    console.log(data);

                $.ajax({
                     url:base_url() + "usuario/add",
                     type: "post",
                     data: data,
                     dataType: "json",
                        success: function (json) { 

                            if(json.response_code == 200){
                                alert(json.message); 
                                 is_req_register = true;
                                //reload_tabla();
                                location.reload();

                            }else{
                                alert('Ocurrió un error, por favor vuelva a intentarlo');
                                //unblock_btn_submit();
                                console.log(json);

                            }
         
                        },
                        error: function(ts) {
                           console.log(ts.responseText);
                            alert('Ocurrió un error, por favor vuelva a intentarlo');
                            unblock_btn_submit();
                        } 
                    });  
            }else{
                //si tiene id es update
                data ={ 
                        id_usuario: id_usuario,
                        nombre_usuario : nombre_usuario, 
                        apellido_usuario : apellido_usuario,
                        correo_usuario : correo_usuario,
                        telefono_usuario : telefono_usuario,
                        direccion_usuario : direccion_usuario,
                        pass_usuario : pass_usuario,
                        repeat_pass : repeat_pass,
                    };

             console.log(base_url() + "usuario/edit");
             console.log(data);
                $.ajax({
                     url:base_url() + "usuario/edit",
                     type: "post",
                     data: data,
                     dataType: "json",
                        success: function (json) {

                            //console.log(json.response_code);
                            //console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                is_req_register = true;
                                //reload_tabla();

                            }else{
                                alert('Ocurrió un error, por favor vuelva a intentarlo');
                                 console.log(json);

                            }
         
                        },
                        error: function(ts) {
                           console.log(ts.responseText);
                            alert('Ocurrió un error, por favor vuelva a intentarlo');
                         } 
                    });             

            }

        }else{
            alert('Por favor revisa los campos');
        }

    });

    $(document).on(
        'click',
        '.btn-delete',
        function (event) {
            event.preventDefault();

if (window.confirm("Esta seguro de eliminar este usuario?")) {
  
          $.ajax({
             url:base_url() + "usuario/delete",
             type: "post",
             data: {"id_usuario":$(this).attr('data-id')},
             cache:false,
             dataType: "json",
                success: function (json) {
                    console.log(json.response_code);
                    console.log(json.message);

                    if(json.response_code == 200){
                        alert(json.message);
                        //reload_tabla();


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
        '.btn-userread',
        function (event) {
            event.preventDefault();                    

          $.ajax({
             url:base_url() + "usuario/read_user",
             type: "post",
             data: {"id_usuario":$(this).attr('data-id')},
             cache:false,
             dataType: "json",
                success: function (json) {
                    console.log(json.response_code);
                    console.log(json.message);
                    console.log(json.data);

                    if(json.response_code == 200){

                    // document.getElementById('id_usuario').removeAttribute('readonly');
                    //document.getElementById('id_usuario').readOnly = false;
                        $("#id_usuario").val(json.data.id_usaurio).change();
                        $("#nombre_usuario").val(json.data.nombre_usuario).change();
                        $("#apellido_usuario").val(json.data.apellido_usuario).change();
                        $("#correo_usuario").val(json.data.correo_usuario).change();
                        $("#telefono_usuario").val(json.data.telefono_usuario).change();
                        $("#direccion_usuario").val(json.data.direccion_usuario).change();
                        $("#pass_usuario").val('').change();
                        $("#repeat_pass").val('').change();                      
  
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



function clear_form(){
    $('#form-usuarios').trigger("reset");
    $("#id_usuario").val('').change();
    $("#nombre_usuario").val('').change();
    $("#apellido_usuario").val('').change();
    $("#correo_usuario").val('').change();
    $("#telefono_usuario").val('').change();
    $("#direccion_usuario").val('').change();
    $("#pass_usuario").val('').change();
    $("#repeat_pass").val('').change();
 }

function block_btn_submit(){
 
}

function unblock_btn_submit(){
 
}


function misgatos(id_usuario){
    $.ajax({
        url:base_url() + "gato/show_gatos",
        type: "post",
        data: {id_usuario:id_usuario },
        success: function (json) {
                $('#gatos_list').html(json)
                var myModal = new bootstrap.Modal(document.getElementById('gatos_modal'))
                myModal.show()          
           }
           
    })
}
