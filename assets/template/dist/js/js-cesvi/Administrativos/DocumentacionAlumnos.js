$(document).ready(function () {
    //llenarTablaAlumnosParaDocumentacion();

}); // FIN DE LA FUNCION PRINCIPAL


/* -------------------------------------------------------------------------- */
/*                                llenarllenarTablaalumnos               */
/* -------------------------------------------------------------------------- */


function llenarTablaAlumnosParaDocumentacion() {
    // debugger;
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/DocumentosAlumnos/datosGnralDelAlumno',
        dataType: "json",
        success: function (response) {
            var i = "1";
            $("#tbl_alumnosDocumentacion").DataTable({
                data: response,
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
                    data: "nombre_acta",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        var nombre_acta = `${row.nombre_acta}`;
                          var a;
                            if(nombre_acta != "null"&&nombre_acta != "undefined"){
                                var a = `
                                <a title="Descarga Documento" href="Alumnos/verActaalumno/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                             `;
                            }
                            else{
                                a = 'Sin archivo';
                            }

                        return a;
                    },
                },
                {
                    data: "nombre_certificado_bachillerato",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        var nombre_certificado_bachillerato = `${row.nombre_certificado_bachillerato}`;
                        var a;
                          if(nombre_certificado_bachillerato != "null"&&nombre_certificado_bachillerato != "undefined"){
                            var a = `
                            <a title="Descarga Documento" href="Alumnos/verCertificadoalumno/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                            `;
                          }
                          else{
                            a = 'Sin archivo';
                        }
                        return a;
                    },
                },
                {
                    data: "curp",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        var nombre_curp = `${row.nombre_curp}`;
                        var a;
                          if(nombre_curp != "null"&&nombre_curp != "undefined"){
                            var a = `
                            <a title="Descarga Documento" href="Alumnos/verCurpalumno/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                         `;
                          }
                          else{
                            a = 'Sin archivo';
                        }
                        return a;
                    },
                },
                {
                    data: "certificado_medico",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        var nombre_certificado_medico = `${row.nombre_certificado_medico}`;
                        var a;
                          if(nombre_certificado_medico != "null"&&nombre_certificado_medico != "undefined"){
                        var a = `
                               <a title="Descarga Documento" href="Alumnos/verCertificadoMedicoalumno/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                            `;
                          }
                          else{
                            a = 'Sin archivo';
                        }
                        return a;
                    },
                },
                // {
                //     orderable: false,
                //     searchable: false,
                //     data: function (row, type, set) {
                //         return `
                //                 <a href="#" id="edit_alumno" class="btn btn-success btn-remove" value="${row.numero_control}"><i class="far fa-edit"></i></a>
                //                 <a href="#" id="del_alumno" class="btn btn-danger btn-remove" value="${row.numero_control}"><i class="fas fa-trash-alt"></i></a>
                //             `;
                //     },
                // },
                // {
                //     orderable: false,
                //     searchable: false,
                //     data: function(row, type, set) {
                //         return `
                //             <a href="#" id="view_alumno" class="btn btn-info" value="${row.numero_control}"><i class="far fa-edit"></i></a>
                //                `;
                //     },
                // },

                ],
                "language": language_espaniol,

            });
        },
    });
}










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
