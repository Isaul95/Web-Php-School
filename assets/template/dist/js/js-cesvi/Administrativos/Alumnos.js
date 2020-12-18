$(document).ready(function(){
    llenarTablaAlumnos(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA
    date_picker_alumno();
  }); // FIN DE LA FUNCION PRINCIPAL


$(".custom-file-input").on("change", function() {
    let fileName = $(this).val().split("\\").pop();
    let label = $(this).siblings(".custom-file-label");

    if (label.data("default-title") === undefined) {
        label.data("default-title", label.html());
    }

    if (fileName === "") {
        label.removeClass("selected").html(label.data("default-title"));
    } else {
        label.addClass("selected").html(fileName);
    }
});

/* ---------------------------- Add Records Modal --------------------------- */
$("#modaladdalumno").on("hide.bs.modal", function(e) {
    // do something...
    $("#formaddalumno")[0].reset();
    $(".custom-file-label").html("Adjuntar archivo (Curriculum vitae)");
});

/* ---------------------------- Add Records Modal --------------------------- */
$("#modaladdtutor").on("hide.bs.modal", function(e) {
    // do something...
    $("#formaddtutor")[0].reset();
    $(".custom-file-label").html("Adjuntar archivo (Curriculum vitae)");
});

/* ---------------------------- Edit Record Modal --------------------------- */
$("#modaleditprofesor").on("hide.bs.modal", function(e) {
    // do something...
    $("#formeditprofesor")[0].reset();
    $(".custom-file-label").html("Adjuntar archivo (Curriculum vitae)");
});


/* -------------------------------------------------------------------------- */
/*                               Insert Records                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#btnaddalumno", function(e) {
    e.preventDefault();
    var numero_control = $("#numero_control_alumno").val();
    var nombre_alumno = $("#nombre_alumno").val();
    var apellidop_alumno = $("#apellidop_alumno").val();
    var apellidom_alumno = $("#apellidom_alumno").val();
    var direccion_alumno = $("#direccion_alumno").val();
    var municipmunicipio_alumno = $("#municipio_alumno").val();
    var estestado_alumnodo = $("#estado_alumno").val();
    var datepicker_fecha_nacimiento_alumno = $("#datepicker_fecha_nacimiento_alumno").val();
    var datepicker_fecha_inscripcion_alumno = $("#datepicker_fecha_inscripcion_alumno").val();
    var lugar_nacimiento_alumno = $("#lugar_nacimiento_alumno").val();
    var municipio_nacimiento_alumno = $("#municipio_nacimiento_alumno").val();
    var estado_nacimiento_alumno = $("#estado_nacimiento_alumno").val();
    var estado_civil_alumno = $("#estado_civil_alumno").val();
    var sexo_alumno = $("#sexo_alumno").val();
    var institucion_procedencia_alumno = $("#institucion_procedencia_alumno").val();
    var tipo_escuela_alumno = $("#tipo_escuela_alumno").val();
    var telefono_alumno = $("#telefono_alumno").val();
    var email_alumno = $("#email_alumno").val();
    var facebook_alumno = $("#facebook_alumno").val();
    var twitter_alumno = $("#twitter_alumno").val();
    var instagram_alumno = $("#instagram_alumno").val();
    var licenciaturas_alumno = $("#licenciaturas_alumno").val();
    var horarios_alumno = $("#horarios_alumno").val();
    var img_acta_alumno = $("#acta_alumno")[0].files[0]; // this is file
    var img_certificado_alumno = $("#certificado_alumno")[0].files[0]; // this is file
    var img_curp_alumno = $("#curp_alumno")[0].files[0]; // this is file
    var img_certificado_medico_alumno = $("#certificado_medico_alumno")[0].files[0]; // this is file

    if (numero_control == "" || nombre_alumno == "" || apellidop_alumno == "" || apellidom_alumno == "" || direccion_alumno == ""||
    municipmunicipio_alumno == "" ||  estestado_alumnodo == "" || datepicker_fecha_nacimiento_alumno == "" || datepicker_fecha_inscripcion_alumno == ""||
    lugar_nacimiento_alumno == "" || municipio_nacimiento_alumno == "" || estado_nacimiento_alumno == "" || estado_civil_alumno == "" || sexo_alumno == ""||
    institucion_procedencia_alumno == "" || tipo_escuela_alumno == "" || telefono_alumno == "" || 
    email_alumno == "" || facebook_alumno == "" || twitter_alumno == "" || instagram_alumno == "" || licenciaturas_alumno == ""||
    horarios_alumno == "" || img_acta_alumno.name == "" ){/*|| img_certificado_alumno.name == "" || img_curp_alumno.name == "" || img_certificado_medico_alumno.name=="" ) {
      */  alert("Debe llenar todos los campos vacios...!");
    } else {
        var fd = new FormData();
        var fd2 = new FormData();
        var archivo_acta_alumno = $("#acta_alumno")[0].files[0]; // this is file
        var archivo_certificado_alumno = $("#certificado_alumno")[0].files[0]; // this is file
        var archivo_curp_alumno = $("#curp_alumno")[0].files[0]; // this is file
        var archivo_certificado_medico_alumno = $("#certificado_medico_alumno")[0].files[0]; // this is file

        fd.append("numero_control", numero_control);
        fd.append("nombres", nombre_alumno);
        fd.append("apellido_paterno", apellidop_alumno);
        fd.append("apellido_materno", apellidom_alumno);
        fd.append("direccion", direccion_alumno);
        fd.append("municipio_direccion", municipmunicipio_alumno);
        fd.append("estado_direccion", estestado_alumnodo);
        fd.append("fecha_nacimiento", datepicker_fecha_nacimiento_alumno);
        fd.append("fecha_inscripcion", datepicker_fecha_inscripcion_alumno);
        fd.append("localidad", lugar_nacimiento_alumno);
        fd.append("municipio_localidad", municipio_nacimiento_alumno);
        fd.append("estado_localidad", estado_nacimiento_alumno);
        fd.append("estado_civil", estado_civil_alumno);
        fd.append("sexo", sexo_alumno);

        fd.append("tipo_escuela_nivel_medio_superior", tipo_escuela_alumno);
        fd.append("institucion", institucion_procedencia_alumno);

        fd.append("email", email_alumno);
        fd.append("telefono", telefono_alumno);
        fd.append("facebook", facebook_alumno);
        fd.append("twitter", twitter_alumno);
        fd.append("instagram", instagram_alumno);
        fd.append("estatus", 1); // Obt el file como tal
      /*  fd.append("universidad_procedente", licenciaturas_alumno);
        fd.append("experiencia_docente", horarios_alumno);*/

        fd.append("nombre_acta", img_acta_alumno); //Obt principalmente el name file
        fd.append("acta_nacimiento", archivo_acta_alumno); // Obt el file como tal
        
        fd.append("nombre_certificado_bachillerato", img_certificado_alumno); //Obt principalmente el name file
        fd.append("certificado_bachillerato", archivo_certificado_alumno); // Obt el file como tal

        fd.append("nombre_curp", img_curp_alumno); //Obt principalmente el name file
        fd.append("curp", archivo_curp_alumno); // Obt el file como tal

        fd.append("nombre_certificado_medico", img_certificado_medico_alumno); //Obt principalmente el name file
        fd.append("certificado_medico", archivo_certificado_medico_alumno); // Obt el file como tal
        //EL REGISTRO DEL ALUMNO COMO USUARIO
        var apellidos="";
        apellidos = apellidos.concat(apellidop_alumno);
        apellidos = apellidos.concat(" ");
        apellidos = apellidos.concat(apellidop_alumno);

        fd2.append("nombres", nombre_alumno);
        fd2.append("apellidos", apellidos);
        fd2.append("telefono", telefono_alumno);
        fd2.append("email", email_alumno);
        fd2.append("username", numero_control);
        fd2.append("password", 123456);
        fd2.append("rol_id", 2);
        fd2.append("estado", 1);

        $.ajax({
            type: "post",
            url: base_url+'Administrativos/Alumnos/insertaralumno',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype : 'multipart/form-data',
            success: function(data) {
                if (data.response == "success") {
                    toastr["success"](data.response.message);
                    $("#modaladdalumno").modal("hide");
                    $("#formaddalumno")[0].reset();
                    $(".add-file-label").html("No se eligió archivo");
                    $("#tbl_alumnos_inscripcion").DataTable().destroy();
                    llenarTablaAlumnos();
                } else {
                    toastr["error"](data.response.message);
                }
            },
        });
        $.ajax({
            type: "post",
            url: base_url+'Administrativos/Alumnos/insertaralumnocomousuario',
            data: fd2,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype : 'multipart/form-data',
            success: function(data) {
                if (data.response == "success") {
                    toastr["success"](data.response.message);
                } else {
                    toastr["error"](data.response.message);
                }
            },
        });
    }
});




$(document).on("click", "#update_profesor", function (e) {
    e.preventDefault();
    var id_profesores = $('#id_profesores_update').val();
    var nombre_profesor = $("#nombre_profesor_update").val();
    var edad_profesor = $("#edad_profesor_update").val();
    var sexo_profesor = $("#sexo_profesor_update").val();
    var direccion_profesor = $("#direccion_profesor_update").val();
    var ciudad_profesor = $("#ciudad_profesor_update").val();
    var nacionalidad_profesor = $("#nacionalidad_profesor_update").val();
    var telefono_profesor = $("#telefono_profesor_update").val();
    var email_profesor = $("#email_profesor_update").val();
    var estadocivil_profesor = $("#estadocivil_profesor_update").val();
    var niveldeestudios_profesor = $("#niveldeestudios_profesor_update").val();
    var titulado_profesor = $("#titulado_profesor_update").val();
    var cedula_profesor = $("#cedula_profesor_update").val();
    var ocupacion_profesor = $("#ocupacion_profesor_update").val();
    var tipodetrabajo_profesor = $("#tipodetrabajo_profesor_update").val();
    var universidadprocedente_profesor = $("#universidadprocedente_profesor_update").val();
    var experiencia_profesor = $("#experiencia_profesor_update").val();
    var trabajosprevios_profesor = $("#trabajosprevios_profesor_update").val();
    var img = $("#archivo_profesor_update")[0].files[0]; // this is file
    
    if (nombre_profesor == "" || edad_profesor == "" || sexo_profesor == "" || direccion_profesor == "" || ciudad_profesor == ""||
    nacionalidad_profesor == "" ||  telefono_profesor == "" || email_profesor == "" || estadocivil_profesor == ""||
    niveldeestudios_profesor == "" || titulado_profesor == "" || cedula_profesor == "" || ocupacion_profesor == "" || tipodetrabajo_profesor == ""||
    universidadprocedente_profesor == "" || experiencia_profesor == "" || trabajosprevios_profesor == "" || img.name == "" ) {
        alert("Debe llenar todos los campos vacios...!");
    } else {
        
        var fd = new FormData();
        var archivo = $("#archivo_profesor_update")[0].files[0];  
              
        fd.append("id_profesores", id_profesores);      
        fd.append("nombres", nombre_profesor);
        fd.append("edad", edad_profesor);
        fd.append("sexo", sexo_profesor);
        fd.append("direccion", direccion_profesor);
        fd.append("ciudad_radicando", ciudad_profesor);
        fd.append("nacionalidad", nacionalidad_profesor);
        fd.append("telefono_celular", telefono_profesor);
        fd.append("correo", email_profesor);
        fd.append("estado_civil", estadocivil_profesor);
        fd.append("nivel_de_estudios", niveldeestudios_profesor);
        fd.append("titulado", titulado_profesor);
        fd.append("cedula", cedula_profesor);
        fd.append("ocupacion", ocupacion_profesor);
        fd.append("tipo_de_trabajo", tipodetrabajo_profesor);
        fd.append("universidad_procedente", universidadprocedente_profesor);
        fd.append("experiencia_docente", experiencia_profesor);
        fd.append("trabajos_anteriores", trabajosprevios_profesor);
        fd.append("nombre_archivo", img); //Obt principalmente el name file
        fd.append("curriculum", archivo); // Obt el file como tal

        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Alumnos/updatealumno',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype : 'multipart/form-data',
            success: function (response) {
                if (response.responce == "success") {
                    toastr["success"](response.message);
                    $("#modaleditprofesor").modal("hide");
                    $("#formeditprofesor")[0].reset();
                    $("#tbl_alumnos_inscripcion").DataTable().destroy();
                    llenarTablaAlumnos();
                } else {
                    toastr["error"](data.message);
                }
            },
            error: function(response){
                toastr["error"](response.message);
            }
        });
    }
});

/* -------------------------------------------------------------------------- */
/*                                llenarllenarTablaProfesores                 */
/* -------------------------------------------------------------------------- */


function llenarTablaAlumnos() {
    // debugger;
    $.ajax({
        type: "get",
        url: base_url+'Administrativos/Alumnos/veralumno',
        dataType: "json",
        success: function(response) {
            var i = "1";
            $("#tbl_alumnos_inscripcion").DataTable({
                data: response,
                responsive: true,
                columns: [{
                        data: "id_profesores",  
                        "visible": false,
                        "searchable": false
                      },
                    {
                        data: "nombres",
                    },
                    {
                        data: "nivel_de_estudios",
                    },
                    {
                        data: "titulado",
                    },
                    {
                        data: "cedula",
                    },
                    {
                        data: "ocupacion",
                    },
                    {
                        data: "tipo_de_trabajo",
                    },
                    {
                        data: "universidad_procedente",
                    },
                    {
                        data: "experiencia_docente",
                    },
                    {
                        data: "trabajos_anteriores",
                    },
                    {
                        data: "curriculum",
                        render: function(data, type, row, meta) {
                            var a = `
                               <a title="Descarga Documento" href="Alumnos/verArchivoalumno/${row.id_profesores}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                            `;
                            return a;
                        },
                    },
                    {
                        orderable: false,
                        searchable: false,
                        data: function(row, type, set) {
                            return `
                                <a href="#" id="agregar_tutor" class="btn btn-success btn-remove" value="${row.id_profesores}"><i class="far fa-edit"></i></a>
                                 `;
                        },
                    },
                    {
                        orderable: false,
                        searchable: false,
                        data: function(row, type, set) {
                            return `
                                <a href="#" id="edit_profe" class="btn btn-success btn-remove" value="${row.id_profesores}"><i class="far fa-edit"></i></a>
                                <a href="#" id="del_profesor" class="btn btn-danger btn-remove" value="${row.id_profesores}"><i class="fas fa-trash-alt"></i></a>
                            `;
                        },
                    },
                ],
                  "language" : language_espaniol,

            });
        },
    });
}

// <a href="#" id="edit" class="btn btn-sm btn-outline-info" value="${row.id}"><i class="fas fa-edit"></i></a>

$(document).on("click", "#agregar_tutor", function (e) {
    e.preventDefault();
    $('#modaladdtutor').modal('show');

});


$(document).on("click", "#edit_profe", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url+'Administrativos/Alumnos/editaralumno',
        data: {
            edit_id: edit_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditprofesor').modal('show');
            $('#id_profesores_update').val(data.post.id_profesores)
            $("#nombre_profesor_update").val(data.post.nombres);
            $("#edad_profesor_update").val(data.post.edad);
            $("#sexo_profesor_update").val(data.post.sexo);
            $("#direccion_profesor_update").val(data.post.direccion);
            $("#ciudad_profesor_update").val(data.post.ciudad_radicando);
            $("#nacionalidad_profesor_update").val(data.post.nacionalidad);
            $("#telefono_profesor_update").val(data.post.telefono_celular);
            $("#email_profesor_update").val(data.post.correo);
            $("#estadocivil_profesor_update").val(data.post.estado_civil);
            $("#niveldeestudios_profesor_update").val(data.post.nivel_de_estudios);
            $("#titulado_profesor_update").val(data.post.titulado);
            $("#cedula_profesor_update").val(data.post.cedula);
            $("#ocupacion_profesor_update").val(data.post.ocupacion);
            $("#tipodetrabajo_profesor_update").val(data.post.tipo_de_trabajo);
            $("#universidadprocedente_profesor_update").val(data.post.universidad_procedente);
            $("#experiencia_profesor_update").val(data.post.experiencia_docente);
            $("#trabajosprevios_profesor_update").val(data.post.trabajos_anteriores);
        },
    });
});
/* -------------------------------------------------------------------------- */
/*                               Delete Records                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#del_profesor", function(e) {
    e.preventDefault();

    var del_id = $(this).attr("value");

    Swal.fire({
        title: "¿Estás seguro de Borrar?",
        text: "¡Esta acción es irreversile!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, bórralo!",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                // url: base_url + "delete",
                url: base_url+'Administrativos/Alumnos/eliminaralumno',
                data: {
                    del_id: del_id,
                },
                dataType: "json",
                success: function(data) {
                    if (data.responce == "success") {
                        Swal.fire(
                            '¡Eliminado!',
                            'El profesor fue eliminado',
                            'success'
                        );
                        $("#tbl_alumnos_inscripcion").DataTable().destroy();
                        llenarTablaAlumnos();
                    }else{
                        console.log(data);
                    }
                },
            });
        }
    });
});






// ********************   variable PARA CAMBIAR DE IDIOMA AL ESPAÑOL EL DataTable  *************************
    var language_espaniol = {
      "lengthMenu": "Mostrar _MENU_ registros por pagina",
      "zeroRecords": "No se encontraron resultados en su busqueda",
      "searchPlaceholder": "Buscar Registros",
      "info": "Total: _TOTAL_ registros",
      "infoEmpty": "No Existen Registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "search": "Buscar:",
      "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
      }, /* TODO ESTO ES PARA CAMBIAR DE IDIOMA */
    }

    function date_picker_alumno() {
        $("#datepicker_fecha_nacimiento_alumno,#datepicker_fecha_inscripcion_alumno").datepicker({
            closeText: 'Cerrar',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yy/mm/dd',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        });
        $.datepicker.setDefaults($.datepicker.regional['es']);
    }
