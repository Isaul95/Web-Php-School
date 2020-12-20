
  $(document).ready(function(){
        litarAlumnosConBaucherRegistrados();

    }); // FIN DE LA FUNCION PRINCIPAL



    // LISTADO DE LA TABLA ALUMOS PARA HABILTAR DAR ACCESO A SU RECIBO Y ELEHIR MATERIAS
      /* -------------------------------------------------------------------------- */
      /*                      llenarTablaPagos Records                              */
      /* -------------------------------------------------------------------------- */
      function litarAlumnosConBaucherRegistrados() {
         console.log("Lista de alumnos con baucher...!");
          debugger;
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
                              "visible": false, // ocultar la columna
                          },
                          {
                              data: "nombre_completo",
                          },
                          {
                              data: "carrera_descripcion",
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
                                //  Se consulta el file.pdf x el no. de control
                                  var a = `
                                      <a title="Descarga Baucher" href="verBaucher/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                                  `;
                                  return a;
                              },
                          },

                          {
                        //   Es el estatus de la tabla de alumnos
                              data: "estatus",
                              orderable: false,
                              searchable: false,
                              "render" : function(data, type, row) {
                                var habilitarAlumno = `${row.estatus}`;
                                var string = '<input type="checkbox" ';
                                if(habilitarAlumno == 1){
string = string + `checked onclick=habilitaRegistro(0,'${row.numero_control}','${row.id_alta_baucher_banco}')>`;
                                }else {
string = string +`onclick=habilitaRegistro(1,'${row.numero_control}','${row.id_alta_baucher_banco}')>`;
                                }
                                return string;
			                         },
                          },

// DEBE ESTAR disabled , ASTA K SE ACTIVE EL CHECK DE DAR ACCESO AL ALUMNO  SE DEBE DE ACTIVE ESTE CHECK PARA GENERAR EL RECIVO PDF
                          {
                              data: "estatus",
                              orderable: false,
                              searchable: false,
                              "render" : function(data, type, row) {
                                var checkAGenerarReciboPago = `${row.estatus}`;
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
function habilitaRegistro(estatus, numero_control, id_alta_baucher_banco){
    debugger;
      		var datos = {
      				numero_control : numero_control,
              estatus: estatus,
              id_alta_baucher_banco: id_alta_baucher_banco,
      		}

      		$.ajax({
      			url: base_url+'Finanzas/HabilitarAlumnos/marcarParaRegistro/'+numero_control,
            type: "post",
            dataType: "json",
      			data : (datos),
      			success : function(data){
              if (data.responce == "success") {
          toastr["success"](data.message);
          $("#tbl_listAlumConBaucher").DataTable().destroy();
          litarAlumnosConBaucherRegistrados();
          addDatoParaReciboPagoAlumno(id_alta_baucher_banco, numero_control);
        }else{
          toastr["error"](data.message);
        }
      			     }
      		});
      }


      // SE RECOGEN LOS DATOS PARA PODER GENERAR EL RECIBO DE PAGO SIN FIRMA NI SELLO  onClick="eliminarRegistroGasto()"
      function addDatoParaReciboPagoAlumno(id_alta_baucher_banco, numero_control){
          debugger;
            	$('#addDatosRecibo').modal({show: true}); // abrir modal al execute la function

              // Aki solo se imprime al numero de control no pude inprimir los demas datos x problemas de los espacios
              $("#numero_con").val(numero_control);

              $(document).on("click", "#addDatosAGenerarReciboPago", function(e){
                e.preventDefault();
                // Se recojern los valores en la variable datos
              var datos = {
                  bauche: id_alta_baucher_banco,
                  desc_concepto : $("#concepto").val(),
                  cantidad : $("#cantidad").val(),
                  // var name = $("#concepto").val();
              }

              // var email = $("#email").val();

              // if (dates.name == "" || dates.email == "") {
              //   alert("estan vacios los campos OBLIGATORIOS...!");
              // }else{

                $.ajax({
          //       registroDatosParaGenerarReciboPago
                  url: base_url+'Finanzas/HabilitarAlumnos/registroDatosParaGenerarReciboPago',
                  type: "post",
                  dataType: "json",
                  data : (datos),
                  success: function(data){
                    if (data.responce == "success") {
                      $('#tbl_listAlumConBaucher').DataTable().destroy();
                      litarAlumnosConBaucherRegistrados();
                      toastr["success"](data.message);
                      $('#addDatosRecibo').modal('hide');
                    }else{
                      toastr["error"](data.message);
                    }

                  }
                });
                // $("#form")[0].reset();  // VACIA MODAL DESPUES DE INSERT
              // }
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
