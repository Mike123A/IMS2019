$(document).ready(function(){

    //--------------------- SELECCIONAR Imagen PRODUCTO ---------------------
    $("#Imagen").on("change",function(){
        var uploadImagen = document.getElementById("Imagen").value;
        var Imagen       = document.getElementById("Imagen").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');
        
            if(uploadImagen !='')
            {
                var type = Imagen[0].type;
                var name = Imagen[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
                {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';                        
                    $("#img").remove();
                    $(".delPhoto").addClass('notBlock');
                    $('#Imagen').val('');
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        $("#img").remove();
                        $(".delPhoto").removeClass('notBlock');
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        $(".prevPhoto").append("<img id='img' src="+objeto_url+">");
                        $(".upimg label").remove();
                        
                    }
              }else{
                alert("No selecciono Imagen");
                $("#img").remove();
              }              
    });

    $('.delPhoto').click(function(){
        $('#Imagen').val('');
        $(".delPhoto").addClass('notBlock');
        $("#img").remove();

    });

});
