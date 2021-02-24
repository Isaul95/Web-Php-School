    $(document).ready(function(){


        // document.getElementById("semestre").style.display = "none";
        // document.getElementById("modalidadDiv").style.display = "none";
    }); // FIN DE LA FUNCION PRINCIPAL



    /* -------------------------------------------------------------------------- */
    /*            Insert oficio pa Practicas_profesionale                         */
    /* -------------------------------------------------------------------------- */
    $(document).on("click", "#darAltaOficioPracticas", function(e) {
        e.preventDefault();
        debugger;

        var numero_control = $("#noControlProcFinPracticas").val();
        var img = $("#archivoProcFinPracticas")[0].files[0]; // this is file
                      // var tipo_de_pago = $("#pago").val();
        var archivo = $("#archivoProcFinPracticas")[0].files[0];
        var semestre = $("#semestreProcFinPracticas").val();

        if (archivo == undefined) {
            alert("No seleccionó el documento a guardar...!");
        } else {
            var fd = new FormData();

            fd.append("alumno", numero_control);
            fd.append("archivo", img); //Obt principalmente el name file
            fd.append("archivo", archivo); // Obt el file como tal
            fd.append("tipo_documento", 'PRACTICAS');  //  => Practocas profesionales
            // fd.append("estado_archivo", 6);  // 6 => estatyus de "Registro baucher"
            fd.append("semestre", semestre);

            $.ajax({
                type: "post",
                url: base_url+'Alumnos/Practicas_profesionales/insertarOficioPracticasProfesional',
                data: fd,
                processData: false,
                contentType: false,
                dataType: "json",
                enctype : 'multipart/form-data',
                success: function(response) {
                    if (response.res == "success") {
                        toastr["success"](response.message);
                        $("#formularioAltaOficioProcFinPracticas")[0].reset();
                        //  Si se inserto bien el baucher se recarga la pagina
                        // location.reload();
                    } else {
                        toastr["error"](response.message);
                    }
                },
            });
        }
    });








/* -------------------------------------------------------------------------- */
/*                  Insert oficio pa Servicio_social                          */
/* -------------------------------------------------------------------------- */
        $(document).on("click", "#darAltaOficioServicio", function(e) {
            e.preventDefault();
            debugger;

            var numero_control = $("#noControlProcFinServSocial").val();
            var img = $("#archivoProcFinServicio")[0].files[0]; // this is file
                          // var tipo_de_pago = $("#pago").val();
            var archivo = $("#archivoProcFinServicio")[0].files[0];
            var semestre = $("#semestreProcFinServSocial").val();

            if (archivo == undefined) {
                alert("No seleccionó el documento a guardar...!");
            } else {
                var fd = new FormData();

                fd.append("alumno", numero_control);
                fd.append("archivo", img); //Obt principalmente el name file
                fd.append("archivo", archivo); // Obt el file como tal
                fd.append("tipo_documento", 'SERVICIO');  //  => Practocas profesionales
                // fd.append("estado_archivo", 6);  // 6 => estatyus de "Registro baucher"
                fd.append("semestre", semestre);

                $.ajax({
                    type: "post",
                    url: base_url+'Alumnos/Servicio_social/insertarOficioServicioSocial',
                    data: fd,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    enctype : 'multipart/form-data',
                    success: function(response) {
                        if (response.res == "success") {
                            toastr["success"](response.message);
                            $("#formularioAltaOficioProcFinServicio")[0].reset();
                            //  Si se inserto bien el baucher se recarga la pagina
                            // location.reload();
                        } else {
                            toastr["error"](response.message);
                        }
                    },
                });
            }
        });










/* -------------------------------------------------------------------------- */
/*                    Insert oficio para Titulacion                           */
/* -------------------------------------------------------------------------- */
            $(document).on("click", "#darAltaOficioTitulacion", function(e) {
                e.preventDefault();
                debugger;

                var numero_control = $("#noControlProcFinTitulacion").val();
                var img = $("#archivoProcFinTitulacion")[0].files[0]; // this is file
                var archivo = $("#archivoProcFinTitulacion")[0].files[0];
                var semestre = $("#semestreProcFinTitulacion").val();

                if (archivo == undefined) {
                    alert("No seleccionó el documento a guardar...!");
                } else {
                    var fd = new FormData();

                    fd.append("alumno", numero_control);
                    fd.append("archivo", img); //Obt principalmente el name file
                    fd.append("archivo", archivo); // Obt el file como tal
                    fd.append("tipo_documento", 'TITULACION');  //  => Practocas profesionales
                    fd.append("semestre", semestre);

                    $.ajax({
                        type: "post",
                        url: base_url+'Alumnos/Titulacion/insertarOficioDeTitulacion',
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        enctype : 'multipart/form-data',
                        success: function(response) {
                            if (response.res == "success") {
                                toastr["success"](response.message);
                                $("#formularioAltaOficioProcFinTitulacion")[0].reset();
                                //  Si se inserto bien el baucher se recarga la pagina
                                // location.reload();
                            } else {
                                toastr["error"](response.message);
                            }
                        },
                    });
                }
            });
