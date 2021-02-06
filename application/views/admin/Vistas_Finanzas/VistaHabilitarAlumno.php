
    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->

            <section class="content">
                <div class="box box-solid colorfondo">
                    <div class="box-body">

<!-- AKI EMPIEZA LOMMIOO LO NUEVO -->

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h3>
        <input type="hidden" id="tipoPago" name="tipoPago" value="<?php echo $_GET["Pago"]; ?>" >
            <center><strong><font color="#D34787">Dar de Alta Alumnos Para: <?php echo $_GET["Pago"]; ?></font></strong></center>
<!-- var "saludo": <?php echo $_GET["Pago"]; ?>    <<<== DE ESTA FORMA RECIBO EL PARAMETO QUE SE ENVIA DEPENDEIDNDO DE LA OPCION ELEGIDA -->
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Ciudad Iguala de la Independencia, Guerrero</font></small></center>
  </h3>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

<hr> <!-- Le da una linea sombreada para ver la divicion -->

    </div>
  </div>


  <!-- Modal Agregar registro para recibo de pago -->
  <div class="modal fade" id="addDatosRecibo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-center">
          <strong class="modal-title" id="exampleModalLabel">Registrar datos para generar recibo de pago</strong>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="username" name="username" value="<?php echo $username;?>" >

          <!-- Add Record Form -->
      <form id="addRecordForm">
            <!-- Name -->
            <!-- <div class="form-group">
              <?php foreach($nameAlumno as $name):?>
                <label for="">Nombre Alumno: *</label>
              <input type="text" class="form-control"  id="nombre" readonly value="<?php echo $name->nombre_completo;?>">
              <?php endforeach;?>
            </div> -->

            <!-- Email -->
            <div class="form-group">
              <label for="">Número de control: *</label>
              <input type="text" class="form-control" id="numero_con" readonly>
            </div>

            <!-- Mobile No. -->
          <!-- <div class="form-group">
              <?php foreach($nameAlumno as $name):?>
                <label for="">Carrera: *</label>
                <input type="text" class="form-control" id="carrera" readonly value="<?php echo $name->carrera_descripcion;?>">
              <?php endforeach;?>
            </div> -->


            <!-- <div class="form-group">
                <label for="">Tipo de pago:</label>
                <select name="pago" id="pago" class="form-control">
                    <?php foreach($tipoDePagos as $pago):?>
                        <option value="<?php echo $pago->id_tipo_pago;?>"><?php echo $pago->pago;?></option>
                    <?php endforeach;?>
                </select>
            </div> -->

            <div class="form-group">
              <label for="">Cantidad de pago: *</label>
              <input type="text" class="form-control" id="cantidad" placeholder="Cantidad $">
            </div>

            <div class="form-group">
              <label for="">Descripción del concepto: *</label>
              <input type="text" class="form-control" id="concepto" placeholder="Descripción del concepto">
            </div>

            <div class="form-group">
              <label for="">Capturar cantidad en letra: *</label>
              <input type="text" class="form-control" id="numletra" placeholder="Cantidad en letra">
            </div>


              <!-- <div class="container"> -->
                  <!-- <form > -->
                      <div class="form-group" id="formParcialidad2">
                        <label for="">Parcialidad:</label>
                        <!-- <input type="text" class="form-control"  placeholder="Parcialidad.."> -->
                        <select name="parcial" id="parcial" class="form-control">
                        <option value="" selected>Seleccione una parcialidad...</option>
                        <option value="Primer_parcialidad">Primer parcialidad</option>
                        <option value="Segunda_parcialidad">Segunda parcialidad</option>
                        <option value="Tercera_parcialidad">Tercera parcialidad</option>
                        <option value="Cuarta_parcialidad">Cuarta parcialidad</option>
                        <option value="Quinto_parcialidad">Quinto parcialidad</option>
                        </select>
                <br>
                <!-- <div class="form-group"> -->
                    <!-- <label for="">Fecha</label> -->
                    <!-- <input type="text" id="datepicker_fecha_licenciatura" /> -->
                    <label for="">Fecha limite de realizar el pago: *</label>
                    <input type="text" class="form-control" id="datepicker_fecha_parcialidad" placeholder="Capturar fecha limite para realizar el pago completo">
                  <!-- </div> -->

                      </div>
                  <!-- </form> -->
                  <!-- <button type="submit" class="btn btn-success"  onclick="Mostrar_Parcialidad()">Agregar</button> -->
                  <button type="button" class="btn btn-primary" onclick="Mostrar_Parcialidad()">Agregar Parcialidad</button>
                <!-- </div> -->




      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <!-- Insert Button -->
          <button type="button" class="btn btn-primary" id="addDatosAGenerarReciboPago">Agregar Pago</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Agregar nueuvo registro -->
  <div class="modal fade" id="modalDocumento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-center">
          <strong class="modal-title" id="exampleModalLabel">Guardar recibo de pago</strong>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <input type="hidden" id="numero_controlVarHide" name="numero_controlVarHide">
				      <input type="hidden" id="id_alta_baucher_bancoVarHide" name="id_alta_baucher_bancoVarHide">
				      <input type="hidden" id="id_reciboVarHide" name="id_reciboVarHide">
              <input type="hidden" id="userAlta" name="userAlta" value="<?php echo $username;?>" >

            <div>
              <label> <span class="rojo">*</span>Seleccione el archivo formato PDF </label>
            </div>
            <div class="panel panel-default">
              <div class="panel-body">
              <div class="row">
              <div class="col-xs-12 col-sm-8 col-md-8">
                  <div class="form-group" id="archivoPDF">
                      <input id="archivo" name="archivo"  type="file" size="60" accept=".pdf"/>
                  </div>
              </div>
              </div>

              <table id="tbl_listaRecibosFirmados" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important" width="100%">
                <thead class="bg-primary">
                  <tr>
                    <th width="3%">#</th>
                    <center><th width="25%">Nombre del recibo</th></center>
                    <center><th width="10%">Descarga</th></center>
                    <center><th width="10%">Eliminar</th></center>
                  </tr>
                </thead>
              </table>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <!-- Insert Button -->
          <button type="button" class="btn btn-primary" id="altaReciboValidado">Agregar Pago</button>
        </div>
      </div>
    </div>
  </div>




  <div class="row my-4">
    <div class="col-md-12 mx-auto">

      <!--       tbl_listAlumConBaucher -->
      <table id="tbl_listAlumConBaucher" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="bg-primary">
          <tr>
            <th width="3%">#</th>
            <th>Nombre Completo</th>
            <th class="text-center">Carrera</th>
            <th class="text-center">No.Control</th>
            <th class="text-center">Fecha registro</th>
            <th class="text-center">Ver Baucher</th>
            <!-- <th class="text-center" width="8%">Recibo</th> -->
            <th class="text-center">Habilitar</th>
            <th class="text-center">Recibo</th>
            <th class="text-center">No aplica</th>
            <th class="text-center">Subir</th>
            <th class="text-center">Parcialidad</th>
            <th class="text-center">Fecha limite</th>
          </tr>
        </thead>
      </table>

    </div>
  </div>



  <hr>





</div>


<!-- AKI TERMIAN LO MIO LO NUEVO QUE AGREGUE -->


                    </div>

                </div>

            </section>

    </div> <!-- /END ALL CONTENT -->
