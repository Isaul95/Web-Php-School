    $(document).ready(function(){
      litaHistorialPagosAlumnos();
      ccontadordealumnos();
      // litaAvanceReticulaAlumnos();
      llenar_comboSemestres();

// EJEMPLO NO #1 PINTAR CELDA TODA
      var tabla2 = $('#example22').DataTable( {
          "createdRow": function(row,data,index){
            if (data[0] == 'AMPARO') {
                  $('td',row).eq(0).css({
                    'background-color':'#ff5252',
                    'color':'white',
                  });
            }
          // if (data[2] == 'Tokyo') {
          //       $('td',row).eq(2).css({
          //         'background-color':'green',
          //         'color':'white',
          //       });
          // }
        }
          });


          // $('#tbl_avanceRetucularXX').DataTable( {
          //     "createdRow": function(row,data,index){
          //       if (data[0] == 'AMPARO') {
          //             $('td',row).eq(0).css({
          //               'background-color':'#ff5252',
          //               'color':'white',
          //             });
          //       }
          //
          //     // if (data[1] == 'AMPARO') {
          //     //       $('td',row).eq(1).css({
          //     //         'background-color':'green',
          //     //         'color':'white',
          //     //       });
          //     // }
          //   }
          //     });


    }); // FIN DE LA FUNCION PRINCIPAL

    function llenar_comboSemestres(){
      $.ajax({
          type: "get",
          url: base_url + 'Alumnos/AltaBaucherBanco/obtenersemestres',
          dataType: "json",
          success: function (data) {
              $.each(data,function(key, registro) {
                  $("#combo_carreras_administrativos_profesores").append('<option value='+registro.id_carrera+'>'+registro.carrera_descripcion+'</option>');
                });

        },
      });
    }


  //   /* -------------------------------------------------------------------------- */
  //   /*                      llenarTablaPagos Records                              */
  //   /* -------------------------------------------------------------------------- */
  //   function litaAvanceReticulaAlumnos() {
  //     debugger;
  //     var datos = {
  //         numero_control : $("#numero_control").val(),
  //         }
  // var url = base_url+'Alumnos/AltaBaucherBanco/consultaAvanceReticulaXAlumnos/'+datos.numero_control;
  //
  //       $.ajax({
  //           type: "post",
  //           // url: base_url+'Alumnos/AltaBaucherBanco/consultaHistDePagosXAlumnos/'+datos.numero_control,
  //       url: url,
  //           dataType: "json",
  //           data : (datos),
  //           success: function(response) {
  //               $("#tbl_avanceRetucularXX").DataTable({
  //                   data: response,
  //                   responsive: true,
  //                   columns: [
  //                     // {
  //                     //       data: "id_alta_baucher_banco",
  //                     //       "visible": false, // ocultar la columna
  //                     //   },
  //                       {
  //                           data: "nombre_materia",
  //                           "createdRow": function(row,data,index){
  //                             var semes= `${row.nombre_materia}`;
  //                             if (semes == 'AMPARO') {
  //                                     'background-color':'#ff5252',
  //                             }
  //                         }
  //                       },
  //
  //                       // {
  //                       //     // data: "semestre",
  //                       //     "rowCallback" : function(data, type, row) {
  //                       //       var semes= `${row.semestre}`;
  //                       //     if (semes == '1') {
  //                       //           $(row).addClass('#FF5252');
  //                       //     }
  //                       //     return semes;
  //                       //     },
  //                       // },
  //
  //                   ],
  //                     "language" : language_espaniol,
  //               });
  //           },
  //       });
  //   }
  //
  //






    /* -------------------------------------------------------------------------- */
    /*                      llenarTablaPagos Records                              */
    /* -------------------------------------------------------------------------- */
    function litaHistorialPagosAlumnos() {
      debugger;
      var datos = {
          numero_control : $("#numero_control").val(),
          }
  var url = base_url+'Alumnos/AltaBaucherBanco/consultaHistDePagosXAlumnos/'+datos.numero_control;

        $.ajax({
            type: "post",
            // url: base_url+'Alumnos/AltaBaucherBanco/consultaHistDePagosXAlumnos/'+datos.numero_control,
        url: url,
            dataType: "json",
            data : (datos),
            success: function(response) {
                // var i = "1";
                $("#tbl_histPagosRealizadosXAlumno").DataTable({
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
                            data: "numero_control",
                        },
                        {
                            data: "carrera_descripcion",
                        },
                        {
                            data: "fecha_registro",
                        },
                        {
                            data: "pago",
                        },
                        {
                            data: "archivo",
                            render: function(data, type, row, meta) {
                              //  Se consulta el file.pdf x el no. de control
                                var a = `
                                    <a title="Descarga Baucher" href="AltaBaucherBanco/verBaucher/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                                `;
                                return a;
                            },
                        },
                        {
                            // data: "curp",
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {

                                return  a = `
        <a title="Generar Horario Alumno" href="AltaBaucherBanco/generaHorarioAlumno/${row.numero_control}/${row.semestre}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                                 `;

                            },
                        },

                        {
                            data: "estado",
                            render: function(data, type, row, meta) {
                              debugger;
                              var xx = `${row.estado}`;
                              if(xx == "INSCRITO"){
                                // var a 'background-color', '#A497E5';
                              var a = '<div class="p-3 mb-2 bg-green text-white">'+xx+'</div>';
                              }else {
                                var a = '<div class="p-3 mb-2 bg-red text-white">'+xx+'</div>';
                              }
                          return a;
                              },
                        },

                        {
                            data: "archivo",
                            render: function(data, type, row, meta) {
                              var existeRecibFirmado = `${row.id_recibo_valido}`;
                            if(existeRecibFirmado != "null"){
                                  var a = `<a title="Descarga Recibo de Pago" href="AltaBaucherBanco/verReciboFirmadoValidado/${row.id_recibo_valido}" target="_blank"><i class="far fa-file-pdf fa-2x text-success"></i></a>`;
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
        fd.append("estado_archivo", 0);

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
