$(document).ready(function () {
    //llenarTablaAlumnosParaDocumentacion();
    var semestre = $("#numero").val();
    var profesor = $("#usuario").val();
    llenar_combo_materias_administrativos_profesores(semestre,profesor);
    $("#combo_materias_administrativos_profesores").change(function () {
        $("#tbl_list_calificaciones_profesor_por_materia").DataTable().destroy();
        llenartablaalumnosasignadosalamateriadelprofesorp($("#combo_materias_administrativos_profesores").val())
    });
    llenar_combo_carreras_administrativos_profesores();
    $("#combo_carreras_administrativos_profesores").change(function () {
        $("#tbl_list_calificaciones_administrativos_por_carrera_horario").DataTable().destroy();
        llenartablaalumnosasignados_por_carrerayopcion($("#combo_carreras_administrativos_profesores").val(),$("#combo_opciones_administrativos_profesores").val());
   });
    llenar_combo_opciones_administrativos_profesores();
    $("#combo_opciones_administrativos_profesores").change(function () {
        $("#tbl_list_calificaciones_administrativos_por_carrera_horario").DataTable().destroy();
        llenartablaalumnosasignados_por_carrerayopcion($("#combo_carreras_administrativos_profesores").val(),$("#combo_opciones_administrativos_profesores").val());
    });
}); // FIN DE LA FUNCION PRINCIPAL

//SELECT - ON CHANGE
//https://stackoverflow.com/questions/11179406/jquery-get-value-of-select-onchange
// SELECT - ADD VALUES
//https://es.stackoverflow.com/questions/33853/crear-select-con-html-usando-ajax
/* -------------------------------------------------------------------------- */
/*                                llenarllenarTablaalumnos               */
/* -------------------------------------------------------------------------- */




function llenar_combo_materias_administrativos_profesores(semestre,profesor){
    var fd = new FormData();
        fd.append("profesor", profesor);
        fd.append("semestre", semestre);
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/vermateriasdelprofesor',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (data) {
            $.each(data,function(key, registro) {
                $("#combo_materias_administrativos_profesores").append('<option value='+registro.id_materia+'>'+registro.nombre_materia+'</option>');
              });   
        
      },
    });
  }
  function llenar_combo_carreras_administrativos_profesores(){
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Calificaciones/obtenercarreras',
        dataType: "json",
        success: function (data) {
            $.each(data,function(key, registro) {
                $("#combo_carreras_administrativos_profesores").append('<option value='+registro.id_carrera+'>'+registro.carrera_descripcion+'</option>');
              });   
        
      },
    });
  }
  function llenar_combo_opciones_administrativos_profesores(){
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Calificaciones/obteneropciones',
        dataType: "json",
        success: function (data) {
            $.each(data,function(key, registro) {
                $("#combo_opciones_administrativos_profesores").append('<option value='+registro.id_opcion+'>'+registro.descripcion+'</option>');
              });   
        
      },
    });
  }
  //LLENAR LA TABLA DE ALUMNOS QUE CORRESPONDEN A LAS MATERIAS A LAS QUE EL PROFESOR TIENE ACCESO
function llenartablaalumnosasignadosalamateriadelprofesorp($materia) {
    // debugger;
    var idmateria = $materia;
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/veralumnos_asignados_ala_materia_del_profesor',
        data: {
            materia_a_consultar: idmateria,
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            var i = "1";
            $("#tbl_list_calificaciones_profesor_por_materia").DataTable({
                data: data,
                responsive: true,
                columns: [{
                    data: "numero_control",
                },
                {
                    data: "alumno",
                },
                {
                    data: "cuatrimestre",
                },
                {
                    data: "carrera_descripcion",
                },
                {
                    data: "calificacion",
                },
                {
                    data: "tiempo_extension",
                },
                {
                    orderable: false,
                    searchable: false,
                     data: function (row, type, set) {
                         return `
                                 <a href="#" id="edit_alumno" class="btn btn-success btn-remove" value="${row.numero_control}"><i class="far fa-edit"></i></a>
                                <a href="#" id="del_alumno" class="btn btn-danger btn-remove" value="${row.numero_control}"><i class="fas fa-trash-alt"></i></a>
                             `;
                },
                },
                ],
                "language": language_espaniol,

            });
        },
    });
}

  //LLENAR LA TABLA DE ALUMNOS QUE CORRESPONDEN A LAS MATERIAS A LAS QUE EL PROFESOR TIENE ACCESO
  function llenartablaalumnosasignados_por_carrerayopcion($carrera,$opcion) {
    // debugger;
    var carrera = $carrera;
    var opcion = $opcion
    var fd = new FormData();
    fd.append("carrera",carrera);
    fd.append("opcion",opcion);

    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/veralumnos_asignados_porcarrera_opcion',
        data: fd,
        processData: false,
        contentType: false,        
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (data) {
            console.log(data);
            var i = "1";
            $("#tbl_list_calificaciones_administrativos_por_carrera_horario").DataTable({
                data: data,
                responsive: true,
                columns: [{
                    data: "numero_control",
                },
                {
                    data: "alumno",
                },
                {
                    data: "cuatrimestre",
                },
                {
                    data: "carrera_descripcion",
                },
                {
                    orderable: false,
                    searchable: false,
                     data: function (row, type, set) {
                         return `
                                 <a href="#" id="edit_alumno" class="btn btn-success btn-remove" value="${row.numero_control}"><i class="far fa-edit"></i></a>
                              `;
                },
                },
                ],
                "language": language_espaniol,

            });
        },
    });
}
//LLENAR LA TABLA DE ALUMNOS QUE CORRESPONDEN A CARRERA Y OPCIÓN DE ESTUDIO

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