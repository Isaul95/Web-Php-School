
    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->

            <section class="content">
                <div class="box box-solid colorfondo">
                    <div class="box-body">

<!-- AKI EMPIEZA LOMMIOO LO NUEVO -->

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h2>
            <center><strong><font color="#D34787">Dar de Alta alumnos</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Ciudad Iguala de la Independencia, Guerrero</font></small></center>
  </h2>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

<hr> <!-- Le da una linea sombreada para ver la divicion -->

    </div>
  </div>


  <!-- Modal Agregar nueuvo registro -->
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
          <!-- Add Record Form -->
      <form id="addRecordForm">
            <!-- Name -->
            <div class="form-group">
              <?php foreach($nameAlumno as $name):?>
                <label for="">Nombre Alumno: *</label>
              <input type="text" class="form-control"  id="nombre" readonly value="<?php echo $name->nombre_completo;?>">
              <?php endforeach;?>
            </div>

            <!-- Email -->
            <div class="form-group">
              <label for="">Número de control: *</label>
              <input type="text" class="form-control" id="numero_con" readonly>
            </div>

            <!-- Mobile No. -->
          <div class="form-group">
              <?php foreach($nameAlumno as $name):?>
                <label for="">Carrera: *</label>
                <input type="text" class="form-control" id="carrera" readonly value="<?php echo $name->carrera_descripcion;?>">
              <?php endforeach;?>
            </div>


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




  <div class="row my-4">
    <div class="col-md-12 mx-auto">

      <!--       tbl_listAlumConBaucher -->
      <table id="tbl_listAlumConBaucher" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="bg-primary">
          <tr>
            <th width="3%">#</th>
            <th>Nombre Completo</th>
            <th class="text-center">Carrera</th>
            <th class="text-center">No. Control</th>
            <th class="text-center">Registro baucher</th>
            <th class="text-center">Baucher</th>
            <!-- <th class="text-center" width="8%">Recibo</th> -->
            <th class="text-center">Habilitar</th>
            <th class="text-center">Recibo</th>
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
