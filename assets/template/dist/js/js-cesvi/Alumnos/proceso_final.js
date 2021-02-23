    $(document).ready(function(){


        // document.getElementById("semestre").style.display = "none";
        // document.getElementById("modalidadDiv").style.display = "none";
    }); // FIN DE LA FUNCION PRINCIPAL


//
//
//     /* -------------------------------------------------------------------------- */
// /*                               Insert Records                               */
// /* -------------------------------------------------------------------------- */
// $(document).on("click", "#guardarRespuestas", function(e) {
//     e.preventDefault();
//     debugger;
//     // var rol    = $("#rol").val();
//     // var menu   = $("#menu").val();
//     // var licenciatura  = $('input:radio[name=licenciatura]:checked').val();
//     // var semestre = $('input:radio[name=semestre]:checked').val();
//     // var updat = $('input:radio[name=updat]:checked').val();
//     // var delet  = $('input:radio[name=delet]:checked').val();
//
//     // if (licenciatura == undefined) {
//     //     alert("Debe elegir todos los datos...!");
//     // } else {
//
//
//       var datos = {
//          licenciatura  : $('input:radio[name=licenciatura]:checked').val(),
//          licenciatura_1 : $('input:radio[name=semestre]:checked').val(),
//          licenciatura_2 : $('input:radio[name=modalidad]:checked').val(),
//       }
//
//         $.ajax({
//             type: "post",
//             url: base_url+'Alumnos/Evaluacion_Alum_docente/insertarRespuestas',
//             data: (datos),
//             dataType: "json",
//             success: function(data) {
//                 if (data.responce == "success") {
//                     toastr["success"](data.message);
//                     // $("#agregarNuevosPermisos").modal("hide");
//                     $("#formulariEncuesta")[0].reset();
//
//                     // document.getElementById("semestre").style.display = "block";
//                     //   document.getElementById("lic").style.display = "none";
//                       // document.getElementById("modalidadDiv").style.display = "block";
//                 } else {
//                     toastr["error"](response.message);
//                 }
//             },
//         });
//     // }
// });
