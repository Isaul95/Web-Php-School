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

    if (numero_control == "" || img.name == "") {
        alert("Debe llenar todos los campos vacios...!");
    } else {
        var fd = new FormData();

    var archivo = $("#archivo")[0].files[0];

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
                    // $("#addRecords").modal("hide");
                    $("#formularioaltaBaucher")[0].reset();
                    // $(".add-file-label").html("RAFAEL");
                    // $("#tbl_regPagos").DataTable().destroy();
                    // llenarTablaPagos();
                } else {
                    toastr["error"](response.message);
                }
            },
        });
    }
});






// ********************   variable PARA CAMBIAR DE IDIOMA AL ESPAÑOL EL DataTable  *************************
    // var language_espaniol = {
    //   "lengthMenu": "Mostrar _MENU_ registros por pagina",
    //   "zeroRecords": "No se encontraron resultados en su busqueda",
    //   "searchPlaceholder": "Buscar Registros",
    //   "info": "Total: _TOTAL_ registros",
    //   "infoEmpty": "No Existen Registros",
    //   "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    //   "search": "Buscar:",
    //   "paginate": {
    //     "first": "Primero",
    //     "last": "Último",
    //     "next": "Siguiente",
    //     "previous": "Anterior"
    //   }, /* TODO ESTO ES PARA CAMBIAR DE IDIOMA */
    // }
