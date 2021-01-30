
    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">

<!-- AKI EMPIEZA LOMMIOO LO NUEVO -->

<div class="container">

<section class="contenido">
  <div class="row">

    <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_Colegiaturas" data-toggle="tab">Colegiaturas</a></li>
          <li><a id="tab-consultar" href="#tab_Cursos" data-toggle="tab">Historial de pagos</a></li>

          <li><a href="#tab_Extraordinario" data-toggle="tab">Avance Reticular</a></li>
          <li><a href="#tab_Tesis" data-toggle="tab">Tesis</a></li>
          <li><a href="#tab_Otros" data-toggle="tab">Otros</a></li>

      </ul>

      <div class="tab-content"> <!-- INICIO DEL CONYENDOR DEL BODY  -->

<!--   ===============================         1- TAB UNO         ==========================================     -->
          <div class="tab-pane  active" id="tab_Colegiaturas">
                <div class="row">
                  <div class="col-md-12 mt-5">
                    <h1 class="text-center">
                    <strong><font color="#D34787">Subir Baucher del Banco</font></strong>
                    </h1>
                    <hr style="background-color: black; color: black; height: 1px;">
                  </div>
                </div>

                <div class="modal-dialog" id="formularioRegistroBaucher">
                  <div class="modal-content">
                    <div class="modal-body">

                  <form id="formularioaltaBaucher">

                        <!-- no control -->
                        <div class="form-group">
                          <label for="">Número de control: *</label>
                          <input type="text" class="form-control" id="numero_control" readonly value="<?php echo $username;?>" >
                        </div>

                        <div class="form-group">
                            <label for="">Nombre Alumno: *</label>
                          <input type="text" class="form-control" id="nombre" readonly value="<?php echo $nombres;?>" >
                        </div>

                        <!-- <div class="form-group">
                          <label for="">Semestre: *</label>
                          <input type="text" class="form-control" id="semestre" readonly>
                        </div> -->

                        <div class="form-group">
                            <label for="">Tipo de pago:</label>
                            <select name="pago" id="pago" class="form-control">
                                <?php foreach($tipoDePagos as $pago):?>
                                    <option value="<?php echo $pago->id_tipo_pago;?>"><?php echo $pago->pago;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <!-- file -->
                        <div class="form-group">
                          <label for="customFile">Adjuntar archivo: *</label>
                          <input type="file" class="custom-file-input" id="archivo">
                        </div>

                      </form>
                        </div>
                        <div class="modal-footer">

                          <?php if($permisos->insert == 1):?>
                                <button type="button" class="btn btn-primary" id="darAltaBaucher">Agregar Pago</button>
                          <?php endif;?>
                        </div>
                      </div>
                    </div>


              <!-- *****************  EL DIV DE LA OPCION DEL ICONO PARA LA DESCARGA DEL BAUCHER *******************  -->
                  <div class="modal-dialog" id="baucherPdf">
                    <center>
                      <h3><font color="#3498DB">Usted ya registro su Comprobante de pago</font></h3> <br> <br>
                     <a href="AltaBaucherBanco/verBaucher/<?php echo $username;?>" target="_blank">
                       <i class="far fa-file-pdf fa-2x"></i></a>
                     </center> <br> <br>
                     <strong><font color="#E74C3C">NOTA: Para hacer el cambio del comprobante, es necesario notificar al departamento de finanzas</font></strong> <br>
                  </div>
          </div>


<!--   ===============================         2- TAB DOS         ==========================================     -->

          <div class="tab-pane" id="tab_Cursos">
            <div class="row">
              <div class="col-md-12 mt-5">
                <h1 class="text-center">
                <strong><font color="#D34787">Historial de pagos realizados</font></strong>
                </h1>
                <hr style="background-color: black; color: black; height: 1px;">
              </div>
            </div>

              <div class="row my-4">
                <div class="col-md-12 mx-auto">
                  <table id="tbl_histPagosRealizadosXAlumno" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                    <thead class="text-center bg-primary">
                      <tr>
                        <th width="3%">#</th>
                        <th class="text-center">Nombre</th>
                        <th>No. Control</th>
                        <th class="text-center">Carrera</th>
                        <th class="text-center">Fecha registro</th>
                        <th>Tipo de Pago</th>
                        <th class="text-center" width="7%">Pdf</th>
                        <th class="text-center">Horario</th>
                        <th class="text-center">Estado</th>
                        <th>Recibo de Pago</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
          </div>


<!--   ====================         3- TAB TRES     Avance Reticular    ========================     -->
          <div class="tab-pane" id="tab_Extraordinario">
            <div class="col-lg-4"></div>

<br>
  <div class="row">
    <div class="col-sm-12">
      <div for="" class="text-center bg-primary"><strong>Datos Personales</strong></div>
      <br>
       <div class="row">
          <div class="col-8 col-sm-6">
          <label for="">Nombre Completo:</label>
          <input type="text" class="form-control" id="nameCompletoAlum" readonly placeholder="Nivel de estudios">
          </div>
          <div class="col-4 col-sm-3">
          <label for="">No. Control:</label>
          <input type="text" class="form-control" id="num_controlAlum" readonly placeholder="Titulado">
          </div>
          <div class="col-4 col-sm-3">
          <label for="">Semestre:</label>
          <input type="text" class="form-control" id="semestreAlum" readonly placeholder="Cedula">
          </div>
        </div>
        <div class="row">
          <div class="col-8 col-sm-6">
          <label for="">Carrera:</label>
          <input type="text" class="form-control" id="carreraAlum" readonly placeholder="Ocupación">
          </div>
          <div class="col-4 col-sm-3">
          <label for="">Periodo Ecolar:</label>
          <input type="text" class="form-control" id="periodoAlum" readonly placeholder="Tipo de trabajo">
          </div>
        </div>

    </div>
  </div>
<br><br>

  <div class="row">

     <div class="col-2 col-sm-3">
    <label for="">     Materia Reprobado</label>
     <input type="text" class="bg-red" readonly>
     </div>

     <div class="col-2 col-sm-3">
       <label for="">Materia Acreditada</label>
     <input type="text" class="bg-success" readonly>
     </div>

     <div class="col-2 col-sm-3">
       <label for="">Materia por Cursar</label>
     <input type="text" class="bg-info" readonly>
     </div>

   </div>


  <br><br>

              <div class="row">
                <div class="col-8 col-sm-2">
                  <label for="">Seleccione semestre: </label>
                  <select background-color="red" id="combo_semestres" class="form-control"></select>
                </div>
              </div>
              <br>


              <div class="row my-4">
                <div class="col-md-12 mx-auto">
                  <table id="tbl_avanceRetucular" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important" >
                    <thead class="text-center bg-primary">
                      <tr>
                        <!-- <th>ID MATERIA</th> width="100%" -->
                        <th class="text-center"> MATERIAS </th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>

          </div>




<!--   ===============================         1- TAB CUATRO         ==========================================     -->
          <div class="tab-pane" id="tab_Tesis">
            <div class="col-lg-4"></div>
              <div class="col-lg-4 text-center">
                <h2>PRUENA DATATABLE()</h2>
                <hr>
              </div>


              <table id="example22" class="display" style="width:100%">
                      <thead>
                          <tr>
                              <th>Materias</th>
                              <!-- <th>Position</th>
                              <th>Office</th>
                              <th>Age</th>
                              <th>Start date</th>
                              <th>Salary</th> -->
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach($semestre1 as $semestre1):?>
                                <tr>
                                     <!-- <td><?php echo $semestre1->id_materia;?></td> -->
                                     <td><?php echo $semestre1->nombre_materia;?></td>
                                </tr>
                            <?php endforeach;?>
                      </tbody>

                  </table>



          </div>


<!--   ===============================         1- TAB CINCO         ==========================================     -->
        <div class="tab-pane" id="tab_Otros">
            <div class="col-lg-4"></div>
              <div class="col-lg-4 text-center">
                <h2>Otros</h2>
                <hr>
              </div>
              <div class="row my-4">
                <div class="col-md-12 mx-auto">
                  <table id="tbl_otros" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                    <thead class="text-center bg-primary">
                      <tr>
                        <th width="3%">#</th>
                        <th>Nombre</th>
                        <th>No. Control</th>
                        <th>Carrera</th>
                        <th>Semestre</th>
                        <th class="text-center" width="7%">Pdf</th>
                        <th class="text-center" width="7%">Acciones</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
        </div>




      </div>  <!-- FIN DEL CONTENEDOR DEL BODY  -->



  </div>

</section>


</div>

<!-- AKI TERMIAN LO MIO LO NUEVO QUE AGREGUE -->




                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- / MAIN content -->




    </div> <!-- /END ALL CONTENT -->
    <style>
       .inner {
         position: absolute;
         width: 8%;
         height: 7%;
         background-color: #00FF00;
       }

       .inner2 {
         position: absolute;
         width: 8%;
         height: 7%;
         background-color: #00FF00;
       }

       .inner3 {
         position: absolute;
         width: 8%;
         height: 7%;
         background-color: #00FF00;
       }
     </style>
