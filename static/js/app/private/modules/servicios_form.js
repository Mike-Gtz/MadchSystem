jQuery(document).ready(function ($) {
  
    $(document).on(
        'click',
        '.btn-save',
        function (event) {
            event.preventDefault();
                 $.ajax({
                    url:base_url() + "servicios/add",
                    type: "post",
                    data: {
                        "nombreServ"    : $.trim($("#nombreServ").val()),
                        "status"        : $('#status option:selected').val(),
                        },
                    cache:false,
                    dataType: "json",
                        success: function (json) {
                            console.log(json.response_code);
                            console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                window.location.replace(base_url() + "servicios"); 
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
                    url:base_url() + "servicios/edit",
                    type: "post",
                    data: {
                        "idServ"        : $.trim($("#idServ").val()),
                        "nombreServ"    : $.trim($("#nombreServ").val()),
                        "status"        : $('#status option:selected').val(),
                        },
                    cache:false,
                    dataType: "json",
                        success: function (json) {
                            console.log(json.response_code);
                            console.log(json.message);

                            if(json.response_code == 200){
                                alert(json.message);
                                window.location.replace(base_url() + "servicios"); 
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



 