
    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">

                      <div class="row">
                        <div class="col-md-12 mt-5">
                          <h1 class="text-center">
                          <strong><font color="#D34787">Subir Baucher del Banco</font></strong>
                          </h1>
                          <hr style="background-color: black; color: black; height: 1px;">
                        </div>
                      </div>


            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">

              <form id="formularioaltaBaucher">

                    <!-- no control -->
                    <div class="form-group">
                      <label for="">Número de control: *</label>
                      <input type="text" class="form-control" id="numero_control" placeholder="numero control">
                    </div>

                    <div class="form-group">
                        <label for="">Nombre Alumno: *</label>
                      <input type="text" class="form-control" id="nombre" readonly>
                    </div>


                  <!-- <div class="form-group">
                      <label for="">Carrera: *</label>
                      <input type="text" class="form-control" id="carrera" placeholder="Mobile No.">
                    </div> -->


                    <div class="form-group">
                      <label for="">Semestre: *</label>
                      <input type="text" class="form-control" id="semestre" readonly>
                    </div>

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
                  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> -->
                  <!-- Insert Button -->
  <?php if($permisos->insert == 1):?>
                  <button type="button" class="btn btn-primary" id="darAltaBaucher">Agregar Pago</button>
  <?php endif;?>
                </div>
              </div>
            </div>



<!-- AKI TERMIAN LO MIO LO NUEVO QUE AGREGUE -->
                      </div>

                  </div>

            </section>

    </div> <!-- /END ALL CONTENT -->
