    $(document).ready(function(){

    ccontadordealumnos();

    }); // FIN DE LA FUNCION PRINCIPAL

/*         1.-  FUNCTIO CONSULTA QUE NO EXISTA Comprobante PARA EL ALUMNO K SE ESTA LOGUEANDO;
           1.- SI EXISTE BAUCHER LE MUESTRA EL ICONO PARA PODER MOSTRAR EL DOCUMENRO QUE SUIO
           2.- DE LO CONTRARIO SI NO EXISTE EL BAUCHER LE MUESTRA EL FORMULARIO PARA DARLO DE ALTA               ************/

  function ccontadordealumnos(){
      debugger;
        		var datos = {
        				numero_control : $("#numero_control").val(),
        		    }
        		$.ajax({
              url: base_url+'Alumnos/AltaBaucherBanco/consultaCountAlumnos',
              type: "post",
              dataType: "json",
        			data : (datos),
        			success : function(data){
                if (data.responce == "success") {
                    toastr["success"](data.message);
                        // debugger;
                        $('#formularioRegistroBaucher').hide();
                        $('#baucherPdf').show();
                      }else{
                        // toastr["error"](data.message);
                        $('#baucherPdf').hide();
                      }
        			    }
        		});
        }


/* -------------------------------------------------------------------------- */
/*                               Insert baucher                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#darAltaBaucher", function(e) {
    e.preventDefault();
    debugger;

    var numero_control = $("#numero_control").val();
    var img = $("#archivo")[0].files[0]; // this is file
    var tipo_de_pago = $("#pago").val();
    var archivo = $("#archivo")[0].files[0];

    if (archivo == undefined) {
        alert("No seleccionó el documento a guardar...!");
    } else {
        var fd = new FormData();

        fd.append("numero_control", numero_control);
        fd.append("archivo", img); //Obt principalmente el name file
        fd.append("archivo", archivo); // Obt el file como tal
        fd.append("tipo_de_pago", tipo_de_pago);

        $.ajax({
            type: "post",
            url: base_url+'Alumnos/AltaBaucherBanco/insertarBaucherDelBanco',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype : 'multipart/form-data',
            success: function(response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#formularioaltaBaucher")[0].reset();
                    //  Si se inserto bien el baucher se recarga la pagina
                    location.reload();
                } else {
                    toastr["error"](response.message);
                }
            },
        });
    }
});
