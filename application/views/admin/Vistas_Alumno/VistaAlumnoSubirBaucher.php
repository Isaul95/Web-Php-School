
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
                  </div>
            </section>
    </div> <!-- /END ALL CONTENT -->
