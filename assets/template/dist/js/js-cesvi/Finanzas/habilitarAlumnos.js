
  $(document).ready(function(){
        litarAlumnosConBaucherRegistrados();

    }); // FIN DE LA FUNCION PRINCIPAL



    // LISTADO DE LA TABLA ALUMOS PARA HABILTAR DAR ACCESO A SU RECIBO Y ELEHIR MATERIAS
      /* -------------------------------------------------------------------------- */
      /*                      llenarTablaPagos Records                              */
      /* -------------------------------------------------------------------------- */
      function litarAlumnosConBaucherRegistrados() {
        // here litarAlumnosConBaucherRegistrados
          // debugger;
          $.ajax({
              type: "get",
              url: base_url+'Finanzas/HabilitarAlumnos/listaDeAlumnosConBaucherRegistrado',
              dataType: "json",
              success: function(response) {
                  var i = "1";
                  $("#tbl_listAlumConBaucher").DataTable({
                      data: response,
                      responsive: true,
                      columns: [
                        {
                              data: "id_alta_baucher_banco",
                              // render: function(data, type, row, meta) {
                              //     return i++;
                              // },
                          },
                          {
                              data: "nombre_completo",
                          },
                          {
                              data: "nombre_archivo",
                          },
                          {
                              data: "numero_control",
                          },
                          {
                              data: "fecha_registro",
                          },
                          {
                              data: "archivo",
                              render: function(data, type, row, meta) {
                                //  HabilitarAlumnos/
                                  var a = `
                                      <a title="Descarga Baucher" href="verBaucher/${row.id_alta_baucher_banco}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                                  `;
                                  return a;
                              },
                          },

                          {
                              data: "estatus_acceso",
                              orderable: false,
                              searchable: false,
                              "render" : function(data, type, row) {
                                var habilitarAlumno = `${row.estatus_acceso}`;
                                var string = '<input type="checkbox" ';
                                if(habilitarAlumno == 1){
                                  string = string + `checked onclick=habilitaRegistro('${row.id_alta_baucher_banco}','${row.numero_control}') disabled>`;
                                }else {
                                  string = string + `onclick=habilitaRegistro('${row.id_alta_baucher_banco}','${row.numero_control}') >`;
                                }
                                return string;
			                         },
                          },

// DEBE ESTAR disabled , ASTA K SE ACTIVE EL CHECK DE DAR ACCESO AL ALUMNO  SE DEBE DE ACTIVE ESTE CHECK PARA GENERAR EL RECIVO PDF
                          {
                              data: "estatus_acceso",
                              orderable: false,
                              searchable: false,
                              "render" : function(data, type, row) {
                                var checkAGenerarReciboPago = `${row.estatus_acceso}`;
                                // var string = '<input type="checkbox" ';
                                debugger;
                                if(checkAGenerarReciboPago == 1){
                                  //string = string + `  href="Reportes_cesvi/Reporte_ReciboPago" target="_blank"  >`;

                                  var a = `
                                      <a title="Descarga Recibo" href="generaPdfRcibo" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                                  `;
                                }else {
                                  var a = 'No hay recibo';
                                }
                                return a;
                               },
                          },

                      ],
                        "language" : language_espaniol,

                  });
              },
          });
      }




// SOLO SE VA HABILITAR CUANDO ESTE DESHABILITADO, UNA VEZ K SE ABILITE SE DESBLOKEA
function habilitaRegistro(id_alta_baucher_banco, numero_control){
    // debugger;
      		var datos = {
      				id_alta_baucher_banco : id_alta_baucher_banco,
      				numero_control : numero_control,
              estatus_acceso : 1,
      		}
      		$.ajax({
      			url: base_url+'Finanzas/HabilitarAlumnos/marcarParaRegistro',
            type: "post",
            dataType: "json",
      			data : (datos),
      			success : function(data){
              if (data.responce == "success") {
          toastr["success"](data.message);
          $("#tbl_listAlumConBaucher").DataTable().destroy();
          litarAlumnosConBaucherRegistrados();
        }else{
          toastr["error"](data.message);
        }
      			     }
      		});

      }



//  ***********     function GENERAR EL RECIBO PDF     **********************
      function generarReciboPago(id_alta_baucher_banco, numero_control){
          debugger;
            		var datos = {
            				id_alta_baucher_banco : id_alta_baucher_banco,
            				numero_control : numero_control,
                    // estatus_acceso : 1,
            		}
            		$.ajax({
            			url: base_url+'Reportes_cesvi/Reporte_ReciboPago',
                  type: "post",
                  dataType: "json",
            			data : (datos),
            			success : function(data){
                    if (data.responce == "success") {
                toastr["success"](data.message);
                $("#tbl_listAlumConBaucher").DataTable().destroy();
                litarAlumnosConBaucherRegistrados();
              }else{
                toastr["error"](data.message);
              }
            			     }
            		});

            }






// ********************   VAR PARA CAMBIAR DE IDIOMA AL ESPAÑOL EL DataTable  *************************
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
