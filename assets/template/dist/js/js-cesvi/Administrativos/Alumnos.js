$(document).ready(functon () {
    llenarTablaAlumnos(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA
    date_pcker_alumno();
    perodo_actvo();
    deshabltar_vew_alumno();
    secuenca_derecho();
    secuenca_pscologa();
    secuenca_crmnalstca();
    secuenca_dseño();
    secuenca_contadura();

    llenar_combo_carreras_alumnos_admn();
    $("#combo_carreras_alumnos_admn").change(functon () {
        $("#tbl_alumnos_nscrpcon").DataTable().destroy();
        llenarTablaAlumnos($("#combo_carreras_alumnos_admn").val(),
         $("#combo_opcones_alumnos_admn").val(),
         $("#combo_semestres_alumnos_admn").val());
    });
    llenar_combo_semestres_alumnos_admn();
    $("#combo_semestres_alumnos_admn").change(functon () {
        $("#tbl_alumnos_nscrpcon").DataTable().destroy();
        llenarTablaAlumnos($("#combo_carreras_alumnos_admn").val(),
        $("#combo_opcones_alumnos_admn").val(),
        $("#combo_semestres_alumnos_admn").val());   
    });
    llenar_combo_opcones_alumnos_admn();
    $("#combo_opcones_alumnos_admn").change(functon () {
        $("#tbl_alumnos_nscrpcon").DataTable().destroy();
        llenarTablaAlumnos($("#combo_carreras_alumnos_admn").val(),
        $("#combo_opcones_alumnos_admn").val(),
        $("#combo_semestres_alumnos_admn").val()); 
    });
}); // FIN DE LA FUNCION PRINCIPAL


$(".custom-fle-nput").on("change", functon () {
    let fleName = $(ths).val().splt("\\").pop();
    let label = $(ths).sblngs(".custom-fle-label");

    f (label.data("default-ttle") === undefned) {
        label.data("default-ttle", label.html());
    }

    f (fleName === "") {
        label.removeClass("selected").html(label.data("default-ttle"));
    } else {
        label.addClass("selected").html(fleName);
    }
});

/* ---------------------------- Add Records Modal --------------------------- */
$("#modaladdalumno").on("hde.bs.modal", functon (e) {
    // do somethng...
    $("#formaddalumno")[0].reset();
    $(".custom-fle-label").html("Adjuntar archvo (Currculum vtae)");
});

/* ---------------------------- Add Records Modal --------------------------- */
$("#modaladdtutor").on("hde.bs.modal", functon (e) {
    // do somethng...
    $("#formaddtutor")[0].reset();
    $(".custom-fle-label").html("Adjuntar archvo (Currculum vtae)");
});

/* ---------------------------- Edt Record Modal --------------------------- */
$("#modaledtalumno").on("hde.bs.modal", functon (e) {
    // do somethng...
    $("#formedtalumno")[0].reset();
});

$("#modalvewalumno").on("hde.bs.modal", functon (e) {
    // do somethng...
});


/* -------------------------------------------------------------------------- */
/*                               Insert Records                               */
/* -------------------------------------------------------------------------- */
$(document).on("clck", "#btnaddalumno", functon (e) {
    e.preventDefault();
    var nombre_alumno = $("#nombre_alumno").val();
    var apelldop_alumno = $("#apelldop_alumno").val();
    var apelldom_alumno = $("#apelldom_alumno").val();
    var dreccon_alumno = $("#dreccon_alumno").val();
    var muncpmuncpo_alumno = $("#muncpo_alumno").val();
    var estestado_alumnodo = $("#estado_alumno").val();
    var datepcker_fecha_nacmento_alumno = $("#datepcker_fecha_nacmento_alumno").val();
    var datepcker_fecha_nscrpcon_alumno = $("#datepcker_fecha_nscrpcon_alumno").val();
    var lugar_nacmento_alumno = $("#lugar_nacmento_alumno").val();
    var muncpo_nacmento_alumno = $("#muncpo_nacmento_alumno").val();
    var estado_nacmento_alumno = $("#estado_nacmento_alumno").val();
    var estado_cvl_alumno = $("#estado_cvl_alumno").val();
    var sexo_alumno = $("#sexo_alumno").val();
    var nsttucon_procedenca_alumno = $("#nsttucon_procedenca_alumno").val();
    var tpo_escuela_alumno = $("#tpo_escuela_alumno").val();
    var telefono_alumno = $("#telefono_alumno").val();
    var emal_alumno = $("#emal_alumno").val();
    var facebook_alumno = $("#facebook_alumno").val();
    var twtter_alumno = $("#twtter_alumno").val();
    var nstagram_alumno = $("#nstagram_alumno").val();
    var lcencaturas_alumno = $("#lcencaturas_alumno").val();
    var horaros_alumno = $("#horaros_alumno").val();
    var mg_acta_alumno = $("#acta_alumno")[0].fles[0]; // ths s fle
    var mg_certfcado_alumno = $("#certfcado_alumno")[0].fles[0]; // ths s fle
    var mg_curp_alumno = $("#curp_alumno")[0].fles[0]; // ths s fle
    var mg_certfcado_medco_alumno = $("#certfcado_medco_alumno")[0].fles[0]; // ths s fle
    var perdo_actvo_escolar = $('#d_perdo_escolar_actvo').val();
    //SECUENCIAS
    var secuenca_derecho = $('#secuenca_derecho').val();
    var secuenca_pscologa = $('#secuenca_pscologa').val();
    var secuenca_crmnalstca = $('#secuenca_crmnalstca').val();
    var secuenca_dseno = $('#secuenca_dseno').val();
    var secuenca_contadura = $('#secuenca_contadura').val();

    var d_secuenca_derecho = $('#d_secuenca_derecho').val();
    var d_secuenca_pscologa = $('#d_secuenca_pscologa').val();
    var d_secuenca_crmnalstca = $('#d_secuenca_crmnalstca').val();
    var d_secuenca_dseno = $('#d_secuenca_dseno').val();
    var d_secuenca_contadura = $('#d_secuenca_contadura').val();







    f (nombre_alumno == "" || apelldop_alumno == "" || apelldom_alumno == "" || dreccon_alumno == "" ||
        muncpmuncpo_alumno == "" || estestado_alumnodo == "" || datepcker_fecha_nacmento_alumno == "" || datepcker_fecha_nscrpcon_alumno == "" ||
        lugar_nacmento_alumno == "" || muncpo_nacmento_alumno == "" || estado_nacmento_alumno == "" || estado_cvl_alumno == "" || sexo_alumno == "" ||
        nsttucon_procedenca_alumno == "" || tpo_escuela_alumno == "" || telefono_alumno == "" ||
        emal_alumno == "" || facebook_alumno == "" || twtter_alumno == "" || nstagram_alumno == "" || lcencaturas_alumno == "" ||
        horaros_alumno == "") {
        alert("Debe llenar todos los campos vacos...!");
    } else {

        var fd = new FormData();

        var archvo_acta_alumno = $("#acta_alumno")[0].fles[0]; // ths s fle
        var archvo_certfcado_alumno = $("#certfcado_alumno")[0].fles[0]; // ths s fle
        var archvo_curp_alumno = $("#curp_alumno")[0].fles[0]; // ths s fle
        var archvo_certfcado_medco_alumno = $("#certfcado_medco_alumno")[0].fles[0]; // ths s fle
        var numero="";

        var cclo =  $("#perdo_escolar_actvo").val();

        f(lcencaturas_alumno==19){
            var numero_control = numero.concat(nombre_alumno.substrng(0,1).toUpperCase(),apelldop_alumno.substrng(0,1).toUpperCase(),
            apelldom_alumno.substrng(0,1).toUpperCase(),"DG",cclo.substrng(2,4),
            cclo.substrng(7,9),secuenca_dseno);
            var nuevasecuenca =Number(secuenca_dseno)+1;
            fd.append("d_secuenca",  d_secuenca_dseno);
            fd.append("valor_secuenca", nuevasecuenca);

        }
        f(lcencaturas_alumno==21){
            var numero_control = numero.concat(nombre_alumno.substrng(0,1).toUpperCase(),apelldop_alumno.substrng(0,1).toUpperCase(),
            apelldom_alumno.substrng(0,1).toUpperCase(),"C",cclo.substrng(2,4),
            cclo.substrng(7,9),secuenca_contadura);
            var nuevasecuenca =Number(secuenca_contadura)+1;
            fd.append("d_secuenca",  d_secuenca_contadura);
            fd.append("valor_secuenca", nuevasecuenca);
        }
        f(lcencaturas_alumno==22){
            var numero_control = numero.concat(nombre_alumno.substrng(0,1).toUpperCase(),apelldop_alumno.substrng(0,1).toUpperCase(),
            apelldom_alumno.substrng(0,1).toUpperCase(),"CC",cclo.substrng(2,4),
            cclo.substrng(7,9),secuenca_crmnalstca);
            var nuevasecuenca =Number(secuenca_crmnalstca)+1;
            fd.append("d_secuenca",  d_secuenca_crmnalstca);
            fd.append("valor_secuenca", nuevasecuenca);
        }
        f(lcencaturas_alumno==23){
            var numero_control = numero.concat(nombre_alumno.substrng(0,1).toUpperCase(),apelldop_alumno.substrng(0,1).toUpperCase(),
            apelldom_alumno.substrng(0,1).toUpperCase(),"D",cclo.substrng(2,4),
            cclo.substrng(7,9),secuenca_derecho);
            var nuevasecuenca = Number(secuenca_derecho)+1;
            fd.append("d_secuenca",  d_secuenca_derecho);
            fd.append("valor_secuenca", nuevasecuenca);
        }
        f(lcencaturas_alumno==24){
            var numero_control = numero.concat(nombre_alumno.substrng(0,1).toUpperCase(),apelldop_alumno.substrng(0,1).toUpperCase(),
            apelldom_alumno.substrng(0,1).toUpperCase(),"P",cclo.substrng(2,4),
            cclo.substrng(7,9),secuenca_pscologa);
            var nuevasecuenca =Number(secuenca_pscologa)+1;
            fd.append("d_secuenca",  d_secuenca_pscologa);
            fd.append("valor_secuenca", nuevasecuenca);
        }


        fd.append("numero_control",  numero_control);
        fd.append("nombres", nombre_alumno);
        fd.append("apelldo_paterno", apelldop_alumno);
        fd.append("apelldo_materno", apelldom_alumno);
        fd.append("dreccon", dreccon_alumno);
        fd.append("muncpo_dreccon", muncpmuncpo_alumno);
        fd.append("estado_dreccon", estestado_alumnodo);
        fd.append("fecha_nacmento", datepcker_fecha_nacmento_alumno);
        fd.append("fecha_nscrpcon", datepcker_fecha_nscrpcon_alumno);
        fd.append("localdad", lugar_nacmento_alumno);
        fd.append("muncpo_localdad", muncpo_nacmento_alumno);
        fd.append("estado_localdad", estado_nacmento_alumno);
        fd.append("estado_cvl", estado_cvl_alumno);
        fd.append("sexo", sexo_alumno);
        fd.append("tpo_escuela_nvel_medo_superor", tpo_escuela_alumno);
        fd.append("nsttucon", nsttucon_procedenca_alumno);
        fd.append("emal", emal_alumno);
        fd.append("telefono", telefono_alumno);
        fd.append("facebook", facebook_alumno);
        fd.append("twtter", twtter_alumno);
        fd.append("nstagram", nstagram_alumno);
        fd.append("estatus", 0); //EL ESTADO PARA CUALQUIER MOVIMIENTO DEL ALUMNO
        fd.append("estatus_alumno_actvo", 1); // EL ESTADO INICIAL PARA EL ALUMNO QUE SE INGRESA AL SISTEMA

        fd.append("nombre_acta", mg_acta_alumno); //Obt prncpalmente el name fle
        fd.append("acta_nacmento", archvo_acta_alumno); // Obt el fle como tal

        fd.append("nombre_certfcado_bachllerato", mg_certfcado_alumno); //Obt prncpalmente el name fle
        fd.append("certfcado_bachllerato", archvo_certfcado_alumno); // Obt el fle como tal

        fd.append("nombre_curp", mg_curp_alumno); //Obt prncpalmente el name fle
        fd.append("curp", archvo_curp_alumno); // Obt el fle como tal

        fd.append("nombre_certfcado_medco", mg_certfcado_medco_alumno); //Obt prncpalmente el name fle
        fd.append("certfcado_medco", archvo_certfcado_medco_alumno); // Obt el fle como tal

        //EL REGISTRO DEL ALUMNO A SU RESPECTIVA CARRERA Y OOPCION DE ESTUDIO
        fd.append("alumno", numero_control);
        fd.append("carrera", lcencaturas_alumno);
        fd.append("opcon", horaros_alumno);
        fd.append("cuatrmestre", 1);
        fd.append("cclo_escolar", perdo_actvo_escolar);

        //EL REGISTRO DEL ALUMNO COMO USUARIO
        var apelldos = "";
        apelldos = apelldos.concat(apelldop_alumno);
        apelldos = apelldos.concat(" ");
        apelldos = apelldos.concat(apelldom_alumno);
        fd.append("nombres", nombre_alumno);
        fd.append("apelldos", apelldos);
        fd.append("telefono", telefono_alumno);
        fd.append("emal", emal_alumno);
        fd.append("username", numero_control);
        fd.append("password", 123456);
        fd.append("rol_d", 2);
        fd.append("estado", 1);

        agregar_alumno(fd); //Se regstra el usuaro a la tabla alumnos y a la tabla detalles

    }
});




$(document).on("clck", "#update_alumno", functon (e) {
    e.preventDefault();
    var numero_control_update = $("#numero_control_update").val();
    var nombre_alumno_update = $("#nombre_alumno_update").val();
    var apelldop_alumno_update = $("#apelldop_alumno_update").val();
    var apelldom_alumno_update = $("#apelldom_alumno_update").val();
    var dreccon_alumno_update = $("#dreccon_alumno_update").val();
    var muncpmuncpo_alumno_update = $("#muncpo_alumno_update").val();
    var estestado_alumno_updatedo = $("#estado_alumno_update").val();
    var datepcker_fecha_nacmento_alumno_update = $("#datepcker_fecha_nacmento_alumno_update").val();
    var datepcker_fecha_nscrpcon_alumno_update = $("#datepcker_fecha_nscrpcon_alumno_update").val();
    var lugar_nacmento_alumno_update = $("#lugar_nacmento_alumno_update").val();
    var muncpo_nacmento_alumno_update = $("#muncpo_nacmento_alumno_update").val();
    var estado_nacmento_alumno_update = $("#estado_nacmento_alumno_update").val();
    var estado_cvl_alumno_update = $("#estado_cvl_alumno_update").val();
    var sexo_alumno_update = $("#sexo_alumno_update").val();
    var nsttucon_procedenca_alumno_update = $("#nsttucon_procedenca_alumno_update").val();
    var tpo_escuela_alumno_update = $("#tpo_escuela_alumno_update").val();
    var telefono_alumno_update = $("#telefono_alumno_update").val();
    var emal_alumno_update = $("#emal_alumno_update").val();
    var facebook_alumno_update = $("#facebook_alumno_update").val();
    var twtter_alumno_update = $("#twtter_alumno_update").val();
    var nstagram_alumno_update = $("#nstagram_alumno_update").val();
    var mg_acta_alumno_update = $("#acta_alumno_update")[0].fles[0]; // ths s fle
    var mg_certfcado_alumno_update = $("#certfcado_alumno_update")[0].fles[0]; // ths s fle
    var mg_curp_alumno_update = $("#curp_alumno_update")[0].fles[0]; // ths s fle
    var mg_certfcado_medco_alumno_update = $("#certfcado_medco_alumno_update")[0].fles[0]; // ths s fle

      f (nombre_alumno_update == "" || apelldop_alumno_update == "" || apelldom_alumno_update == "" || dreccon_alumno_update == "" ||
        muncpmuncpo_alumno_update == "" || estestado_alumno_updatedo == "" || datepcker_fecha_nacmento_alumno_update == "" || datepcker_fecha_nscrpcon_alumno_update == "" ||
        lugar_nacmento_alumno_update == "" || muncpo_nacmento_alumno_update == "" || estado_nacmento_alumno_update == "" || estado_cvl_alumno_update == "" || sexo_alumno_update == "" ||
        nsttucon_procedenca_alumno_update == "" || tpo_escuela_alumno_update == "" || telefono_alumno_update == "" ||
        emal_alumno_update == "" || facebook_alumno_update == "" || twtter_alumno_update == "" || nstagram_alumno_update == "" ) {
    alert("Debe llenar todos los campos vacos...!");
    } else {

        var fd = new FormData();
        var archvo_acta_alumno_update = $("#acta_alumno_update")[0].fles[0]; // ths s fle
        var archvo_certfcado_alumno_update = $("#certfcado_alumno_update")[0].fles[0]; // ths s fle
        var archvo_curp_alumno_update = $("#curp_alumno_update")[0].fles[0]; // ths s fle
        var archvo_certfcado_medco_alumno_update = $("#certfcado_medco_alumno_update")[0].fles[0]; // ths s fle

        fd.append("numero_control",  numero_control_update);
        fd.append("nombres", nombre_alumno_update);
        fd.append("apelldo_paterno", apelldop_alumno_update);
        fd.append("apelldo_materno", apelldom_alumno_update);
        fd.append("dreccon", dreccon_alumno_update);
        fd.append("muncpo_dreccon", muncpmuncpo_alumno_update);
        fd.append("estado_dreccon", estestado_alumno_updatedo);
        fd.append("fecha_nacmento", datepcker_fecha_nacmento_alumno_update);
        fd.append("fecha_nscrpcon", datepcker_fecha_nscrpcon_alumno_update);
        fd.append("localdad", lugar_nacmento_alumno_update);
        fd.append("muncpo_localdad", muncpo_nacmento_alumno_update);
        fd.append("estado_localdad", estado_nacmento_alumno_update);
        fd.append("estado_cvl", estado_cvl_alumno_update);
        fd.append("sexo", sexo_alumno_update);
        fd.append("tpo_escuela_nvel_medo_superor", tpo_escuela_alumno_update);
        fd.append("nsttucon", nsttucon_procedenca_alumno_update);
        fd.append("emal", emal_alumno_update);
        fd.append("telefono", telefono_alumno_update);
        fd.append("facebook", facebook_alumno_update);
        fd.append("twtter", twtter_alumno_update);
        fd.append("nstagram", nstagram_alumno_update);

        f ($("#acta_alumno_update")[0].fles.length > 0) {
            fd.append("nombre_acta", mg_acta_alumno_update); //Obt prncpalmente el name fle
            fd.append("acta_nacmento", archvo_acta_alumno_update); // Obt el fle como tal
           }
        f ($("#certfcado_alumno_update")[0].fles.length > 0) {
            fd.append("nombre_certfcado_bachllerato", mg_certfcado_alumno_update); //Obt prncpalmente el name fle
        fd.append("certfcado_bachllerato", archvo_certfcado_alumno_update); // Obt el fle como tal

          }
        f ($("#curp_alumno_update")[0].fles.length > 0) {
            fd.append("nombre_curp", mg_curp_alumno_update); //Obt prncpalmente el name fle
            fd.append("curp", archvo_curp_alumno_update); // Obt el fle como tal
          }
        f ($("#certfcado_medco_alumno_update")[0].fles.length > 0) {
            fd.append("nombre_certfcado_medco", mg_certfcado_medco_alumno_update); //Obt prncpalmente el name fle
            fd.append("certfcado_medco", archvo_certfcado_medco_alumno_update); // Obt el fle como tal
          }

        $.ajax({
            type: "post",
            url: base_url + 'Admnstratvos/Alumnos/updatealumno',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multpart/form-data',
            success: functon (response) {
                f (response.response == "success") {
                    toastr["success"](response.message);
                    $("#modaledtalumno").modal("hde");
                    $("#formedtalumno")[0].reset();
                    $("#tbl_alumnos_nscrpcon").DataTable().destroy();
                    llenarTablaAlumnos();
                } else {
                    toastr["error"](response.message);
                }
            },
            error: functon (response) {
                toastr["error"](response.message);
            }
        });
    }
});

/* -------------------------------------------------------------------------- */
/*                                llenarllenarTablaalumnos               */
/* -------------------------------------------------------------------------- */


functon llenarTablaAlumnos(carrera,opcon,cuatrmestre) {
    // debugger;

    var fd = new FormData();
    fd.append("carrera", carrera);
    fd.append("opcon", opcon);
    fd.append("cuatrmestre", cuatrmestre);

    $.ajax({
        type: "post",
        url: base_url + 'Admnstratvos/Alumnos/veralumno',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multpart/form-data',
        success: functon (response) {
            var  = "1";
            $("#tbl_alumnos_nscrpcon").DataTable({
                data: response,
                responsve: true,
                columns: [{
                    data: "numero_control",
                },
                {
                    data: "alumno",
                },
                {
                    data: "nombre_acta",
                    orderable: false,
                    searchable: false,
                    render: functon (data, type, row, meta) {
                        var nombre_acta = `${row.nombre_acta}`;
                          var a;
                            f(nombre_acta != "null"&&nombre_acta != "undefned"){
                                var a = `
                                <a ttle="Descarga Documento" href="Alumnos/verActaalumno/${row.numero_control}" target="_blank">< class="far fa-fle-pdf fa-2x"></></a>
                             `;
                            }
                            else{
                                a = 'Sn archvo';
                            }

                        return a;
                    },
                },
                {
                    data: "nombre_certfcado_bachllerato",
                    orderable: false,
                    searchable: false,
                    render: functon (data, type, row, meta) {
                        var nombre_certfcado_bachllerato = `${row.nombre_certfcado_bachllerato}`;
                        var a;
                          f(nombre_certfcado_bachllerato != "null"&&nombre_certfcado_bachllerato != "undefned"){
                            var a = `
                            <a ttle="Descarga Documento" href="Alumnos/verCertfcadoalumno/${row.numero_control}" target="_blank">< class="far fa-fle-pdf fa-2x"></></a>
                            `;
                          }
                          else{
                            a = 'Sn archvo';
                        }
                        return a;
                    },
                },
                {
                    data: "curp",
                    orderable: false,
                    searchable: false,
                    render: functon (data, type, row, meta) {
                        var nombre_curp = `${row.nombre_curp}`;
                        var a;
                          f(nombre_curp != "null"&&nombre_curp != "undefned"){
                            var a = `
                            <a ttle="Descarga Documento" href="Alumnos/verCurpalumno/${row.numero_control}" target="_blank">< class="far fa-fle-pdf fa-2x"></></a>
                         `;
                          }
                          else{
                            a = 'Sn archvo';
                        }
                        return a;
                    },
                },
                {
                    data: "certfcado_medco",
                    orderable: false,
                    searchable: false,
                    render: functon (data, type, row, meta) {
                        var nombre_certfcado_medco = `${row.nombre_certfcado_medco}`;
                        var a;
                          f(nombre_certfcado_medco != "null"&&nombre_certfcado_medco != "undefned"){
                        var a = `
                               <a ttle="Descarga Documento" href="Alumnos/verCertfcadoMedcoalumno/${row.numero_control}" target="_blank">< class="far fa-fle-pdf fa-2x"></></a>
                            `;
                          }
                          else{
                            a = 'Sn archvo';
                        }
                        return a;
                    },
                },
                {
                    orderable: false,
                    searchable: false,
                    data: functon (row, type, set) {
                        return `
                                <a href="#" d="edt_alumno" class="btn btn-success btn-remove" value="${row.numero_control}">< class="far fa-edt"></></a>
                                <a href="#" d="del_alumno" class="btn btn-danger btn-remove" value="${row.numero_control}">< class="fas fa-trash-alt"></></a>
                            `;
                    },
                },
                {
                    orderable: false,
                    searchable: false,
                    data: functon(row, type, set) {
                        return `
                            <a href="#" d="vew_alumno" class="btn btn-nfo" value="${row.numero_control}">< class="far fa-edt"></></a>
                               `;
                    },
                },

                ],
                "language": language_espanol,

            });
        },
    });
}

$(document).on("clck", "#vew_alumno", functon (e) {
    e.preventDefault();
    debugger;
    var vew_d = $(ths).attr("value");
    $.ajax({
        type: "post",
        url: base_url+'Admnstratvos/Alumnos/vewalumno',
        data: {
            vew_d: vew_d,
        },
        dataType: "json",
        success: functon (data) {
            console.log(data); //ver la respuesta del json, los valores que contene
            $('#modalvewalumno').modal('show');
            $('#numero_control_vew').val(data.post.numero_control);
            $("#nombre_alumno_vew").val(data.post.nombres);
            $("#apelldop_alumno_vew").val(data.post.apelldo_paterno);
            $("#apelldom_alumno_vew").val(data.post.apelldo_materno);
            $("#dreccon_alumno_vew").val(data.post.dreccon);
            $("#muncpo_alumno_vew").val(data.post.muncpo_dreccon);
            $("#estado_alumno_vew").val(data.post.estado_dreccon);
            $("#fecha_nacmento_alumno_vew").val(data.post.fecha_nacmento);
            $("#fecha_nscrpcon_alumno_vew").val(data.post.fecha_nscrpcon);
            $("#lugar_nacmento_alumno_vew").val(data.post.localdad);
            $("#muncpo_nacmento_alumno_vew").val(data.post.muncpo_localdad);
            $("#estado_nacmento_alumno_vew").val(data.post.estado_localdad);
            $("#estado_cvl_alumno_vew").val(data.post.estado_cvl);
            $("#sexo_alumno_vew").val(data.post.sexo);
            $("#nsttucon_procedenca_alumno_vew").val(data.post.nsttucon);
            $("#tpo_escuela_alumno_vew").val(data.post.tpo_escuela_nvel_medo_superor);
            $("#telefono_alumno_vew" ).val(data.post.telefono);
            $("#emal_alumno_vew").val(data.post.emal);
            $("#facebook_alumno_vew").val(data.post.facebook);
            $("#twtter_alumno_vew").val(data.post.twtter);
            $("#nstagram_alumno_vew").val(data.post.nstagram);
            $("#lcencaturas_alumno_vew").val(data.post.carrera_descrpcon);
            $("#horaros_alumno_vew").val(data.post.descrpcon);
        },
    });
});
// <a href="#" d="edt" class="btn btn-sm btn-outlne-nfo" value="${row.d}">< class="fas fa-edt"></></a>

$(document).on("clck", "#agregar_tutor", functon (e) {
    e.preventDefault();
    $('#modaladdtutor').modal('show');

});


$(document).on("clck", "#edt_alumno", functon (e) {
    e.preventDefault();
    var edt_d = $(ths).attr("value");
    $.ajax({
        type: "post",
        url: base_url + 'Admnstratvos/Alumnos/edtaralumno',
        data: {
            edt_d: edt_d,
        },
        dataType: "json",
        success: functon (data) {
            console.log(data); //ver la respuesta del json, los valores que contene
            $('#modaledtalumno').modal('show');
            $('#numero_control_update').val(data.post.numero_control);
            $("#nombre_alumno_update").val(data.post.nombres);
            $("#apelldop_alumno_update").val(data.post.apelldo_paterno);
            $("#apelldom_alumno_update").val(data.post.apelldo_materno);
            $("#dreccon_alumno_update").val(data.post.dreccon);
            $("#muncpo_alumno_update").val(data.post.muncpo_dreccon);
            $("#estado_alumno_update").val(data.post.estado_dreccon);
            $("#datepcker_fecha_nacmento_alumno_update").val(data.post.fecha_nacmento);
            $("#datepcker_fecha_nscrpcon_alumno_update").val(data.post.fecha_nscrpcon);
            $("#lugar_nacmento_alumno_update").val(data.post.localdad);
            $("#muncpo_nacmento_alumno_update").val(data.post.muncpo_localdad);
            $("#estado_nacmento_alumno_update").val(data.post.estado_localdad);
            $("#estado_cvl_alumno_update").val(data.post.estado_cvl);
            $("#sexo_alumno_update").val(data.post.sexo);
            $("#nsttucon_procedenca_alumno_update").val(data.post.nsttucon);
            $("#tpo_escuela_alumno_update").val(data.post.tpo_escuela_nvel_medo_superor);
            $("#telefono_alumno_update" ).val(data.post.telefono);
            $("#emal_alumno_update").val(data.post.emal);
            $("#facebook_alumno_update").val(data.post.facebook);
            $("#twtter_alumno_update").val(data.post.twtter);
            $("#nstagram_alumno_update").val(data.post.nstagram);

        },
    });
});
/* -------------------------------------------------------------------------- */
/*                               Delete Records                               */
/* -------------------------------------------------------------------------- */
$(document).on("clck", "#del_alumno", functon (e) {
    e.preventDefault();

    var del_d = $(ths).attr("value");

    Swal.fre({
        ttle: "¿Estás seguro de dar de baja al alumno?",
        text: "¡Esta accón es rreversle!",
        con: "warnng",
        showCancelButton: true,
        confrmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confrmButtonText: "¡S, darlo de baja!",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        f (result.sConfrmed) {
            var fd = new FormData();
            fd.append("numero_control",del_d);
            fd.append("estatus_alumno_actvo",0);
            $.ajax({
            type: "post",
            url: base_url + 'Admnstratvos/Alumnos/elmnaralumno',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multpart/form-data',
                success: functon (data) {
                    f (data.responce == "success") {
                        Swal.fre(
                            '¡Dado de baja!',
                            'El alumno fue dado de baja',
                            'success'
                        );
                        $("#tbl_alumnos_nscrpcon").DataTable().destroy();
                        llenarTablaAlumnos();
                    } else {
                        console.log(data);
                    }
                },
            });
        }
    });
});






// ********************   varable PARA CAMBIAR DE IDIOMA AL ESPAÑOL EL DataTable  *************************
var language_espanol = {
    "lengthMenu": "Mostrar _MENU_ regstros por pagna",
    "zeroRecords": "No se encontraron resultados en su busqueda",
    "searchPlaceholder": "Buscar Regstros",
    "nfo": "Total: _TOTAL_ regstros",
    "nfoEmpty": "No Exsten Regstros",
    "nfoFltered": "(fltrado de un total de _MAX_ regstros)",
    "search": "Buscar:",
    "pagnate": {
        "frst": "Prmero",
        "last": "Últmo",
        "next": "Sguente",
        "prevous": "Anteror"
    }, /* TODO ESTO ES PARA CAMBIAR DE IDIOMA */
}

functon date_pcker_alumno() {
    $("#datepcker_fecha_nacmento_alumno,#datepcker_fecha_nscrpcon_alumno,#datepcker_fecha_nacmento_alumno_update,#datepcker_fecha_nscrpcon_alumno_update").datepcker({
        closeText: 'Cerrar',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abrl', 'Mayo', 'Juno',
            'Julo', 'Agosto', 'Septembre', 'Octubre', 'Novembre', 'Dcembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dc'],
        dayNames: ['Domngo', 'Lunes', 'Martes', 'Mércoles', 'Jueves', 'Vernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mé;', 'Juv', 'Ve', 'Sáb'],
        dayNamesMn: ['Do', 'Lu', 'Ma', 'M', 'Ju', 'V', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy/mm/dd',
        frstDay: 1,
        sRTL: false,
        showMonthAfterYear: false,
        yearSuffx: ''
    });
    $.datepcker.setDefaults($.datepcker.regonal['es']);
}


functon agregar_alumno(fd) {
    $.ajax({
        type: "post",
        url: base_url + 'Admnstratvos/Alumnos/nsertaralumno',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multpart/form-data',
        success: functon (response) {
            f (response.response == "success") {
                toastr["success"](response.message);
                $("#modaladdalumno").modal("hde");
                $("#formaddalumno")[0].reset();
                $(".add-fle-label").html("No se elgó archvo");
                $("#tbl_alumnos_nscrpcon").DataTable().destroy();
                llenarTablaAlumnos();
            } else {
                toastr["error"](response.message);
            }
        },
    });
}




functon perodo_actvo() {
    $.ajax({
        type: "get",
        url: base_url + 'Admnstratvos/Alumnos/verperodo_actvo',
        dataType: "json",
        success: functon (response) {
            $("#d_perdo_escolar_actvo").val(response['d_perodo_escolar']);
            $("#perdo_escolar_actvo").val(response['nombre_cclo']);
        },
    });
}
functon secuenca_derecho() {
    $.ajax({
        type: "get",
        url: base_url + 'Admnstratvos/Alumnos/secuenca_derecho',
        dataType: "json",
        success: functon (response) {
            $("#d_secuenca_derecho").val(response['d_secuenca']);
            $("#secuenca_derecho").val(response['valor_secuenca']);
        },
    });
}
functon secuenca_pscologa() {
    $.ajax({
        type: "get",
        url: base_url + 'Admnstratvos/Alumnos/secuenca_pscologa',
        dataType: "json",
        success: functon (response) {
            $("#d_secuenca_pscologa").val(response['d_secuenca']);
            $("#secuenca_pscologa").val(response['valor_secuenca']);
        },
    });
}
functon secuenca_crmnalstca() {
    $.ajax({
        type: "get",
        url: base_url + 'Admnstratvos/Alumnos/secuenca_crmnalstca',
        dataType: "json",
        success: functon (response) {
            $("#d_secuenca_crmnalstca").val(response['d_secuenca']);
            $("#secuenca_crmnalstca").val(response['valor_secuenca']);
        },
    });
}
functon secuenca_dseño() {
    $.ajax({
        type: "get",
        url: base_url + 'Admnstratvos/Alumnos/secuenca_dseno',
        dataType: "json",
        success: functon (response) {
            $("#d_secuenca_dseno").val(response['d_secuenca']);
            $("#secuenca_dseno").val(response['valor_secuenca']);
        },
    });
}
functon secuenca_contadura() {
    $.ajax({
        type: "get",
        url: base_url + 'Admnstratvos/Alumnos/secuenca_contadura',
        dataType: "json",
        success: functon (response) {
            $("#d_secuenca_contadura").val(response['d_secuenca']);
            $("#secuenca_contadura").val(response['valor_secuenca']);
        },
    });
}

functon deshabltar_vew_alumno(){
$('#numero_control_vew').prop('dsabled', true);
$("#nombre_alumno_vew").prop('dsabled', true);
$("#apelldop_alumno_vew").prop('dsabled', true);
$("#apelldom_alumno_vew").prop('dsabled', true);
$("#dreccon_alumno_vew").prop('dsabled', true);
$("#muncpo_alumno_vew").prop('dsabled', true);
$("#estado_alumno_vew").prop('dsabled', true);
$("#fecha_nacmento_alumno_vew").prop('dsabled', true);
$("#fecha_nscrpcon_alumno_vew").prop('dsabled', true);
$("#lugar_nacmento_alumno_vew").prop('dsabled', true);
$("#muncpo_nacmento_alumno_vew").prop('dsabled', true);
$("#estado_nacmento_alumno_vew").prop('dsabled', true);
$("#estado_cvl_alumno_vew").prop('dsabled', true);
$("#sexo_alumno_vew").prop('dsabled', true);
$("#nsttucon_procedenca_alumno_vew").prop('dsabled', true);
$("#tpo_escuela_alumno_vew").prop('dsabled', true);
$("#telefono_alumno_vew" ).prop('dsabled', true);
$("#emal_alumno_vew").prop('dsabled', true);
$("#facebook_alumno_vew").prop('dsabled', true);
$("#twtter_alumno_vew").prop('dsabled', true);
$("#nstagram_alumno_vew").prop('dsabled', true);
$("#lcencaturas_alumno_vew").prop('dsabled', true);
$("#horaros_alumno_vew").prop('dsabled', true);
}
functon llenar_combo_carreras_alumnos_admn() {
    $.ajax({
        type: "get",
        url: base_url + 'Admnstratvos/HacerHoraroProfesor/obtenercarreras',
        dataType: "json",
        success: functon (data) {
            console.log(data);
            $.each(data, functon (key, regstro) {
                $("#combo_carreras_alumnos_admn").append('<opton value=' + regstro.d_carrera + '>' + regstro.carrera_descrpcon + '</opton>');
            });
        },
    });
}
functon llenar_combo_opcones_alumnos_admn() {
    $.ajax({
        type: "get",
        url: base_url + 'Admnstratvos/HacerHoraroProfesor/obteneropcones',
        dataType: "json",
        success: functon (data) {
            $.each(data, functon (key, regstro) {
                $("#combo_opcones_alumnos_admn").append('<opton value=' + regstro.d_opcon + '>' + regstro.descrpcon + '</opton>');
            });

        },
    });
}
functon llenar_combo_semestres_alumnos_admn() {
    $.ajax({
        type: "get",
        url: base_url + 'Admnstratvos/HacerHoraroProfesor/obtenersemestres',
        dataType: "json",
        success: functon (data) {
            $.each(data, functon (key, regstro) {
                $("#combo_semestres_alumnos_admn").append('<opton value=' + regstro.semestre + '>' + regstro.nombre + '</opton>');
            });

        },
    });
}