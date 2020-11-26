
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
                <!-- <div class="modal-header bg-primary text-center">
                  <strong class="modal-title" id="exampleModalLabel">Agregar Nuevo Registro</strong>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div> -->
                <div class="modal-body">
                  <!-- Add Record Form -->
              <form id="formularioaltaBaucher">

                    <!-- <div class="form-group">
                        <label for="">Nombre Alumno: *</label>
                      <input type="text" class="form-control" id="nombre" placeholder="Username">
                    </div> -->

                    <!-- no control -->
                    <div class="form-group">
                      <label for="">Número de control: *</label>
                      <input type="text" class="form-control" id="numero_control" placeholder="numero control">
                    </div>


                  <!-- <div class="form-group">
                      <label for="">Carrera: *</label>
                      <input type="text" class="form-control" id="carrera" placeholder="Mobile No.">
                    </div> -->


                    <!-- <div class="form-group">
                      <label for="">Semestre: *</label>
                      <input type="text" class="form-control" id="semestre" placeholder="semestre">
                    </div> -->

                    <!-- file -->
                    <div class="form-group">
                      <label for="customFile">Adjuntar archivo: *</label>
                      <input type="file" class="custom-file-input" id="archivo">
                    </div>


              </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <!-- Insert Button -->
  <?php if($permisos->insert == 1):?>
                  <button type="button" class="btn btn-primary" id="darAltaBaucher">Agregar Pago</button>
  <?php endif;?>
                </div>
              </div>
            </div>



<!-- AKI TERMIAN LO MIO LO NUEVO QUE AGREGUE -->

                      </div>
                    <!-- /.box-body -->

                  </div>
                <!-- /.box -->

            </section>
            <!-- / MAIN content -->

    </div> <!-- /END ALL CONTENT -->
