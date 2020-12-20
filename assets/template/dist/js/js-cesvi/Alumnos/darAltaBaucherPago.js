$(document).ready(function(){
// llenarTablaPagos();

  }); // FIN DE LA FUNCION PRINCIPAL


// $(".custom-file-input").on("change", function() {
//     let fileName = $(this).val().split("\\").pop();
//     let label = $(this).siblings(".custom-file-label");
//
//     if (label.data("default-title") === undefined) {
//         label.data("default-title", label.html());
//     }
//
//     if (fileName === "") {
//         label.removeClass("selected").html(label.data("default-title"));
//     } else {
//         label.addClass("selected").html(fileName);
//     }
// });

/* ---------------------------- Add Records Modal --------------------------- */
// $("#addRecords").on("hide.bs.modal", function(e) {
//     // do something...
//     $("#addRecordForm")[0].reset();
//     $(".custom-file-label").html("Choose file");
// });



/* -------------------------------------------------------------------------- */
/*                               Insert Records                               */
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

    // var archivo = $("#archivo")[0].files[0];

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
                    // $('#darAltaBaucher').attr('disabled','disabled');
                } else {
                    toastr["error"](response.message);
                }
            },
        });
    }

});
