<!-- ============  AKI HAREMOS TODO EL MOVIMEINTO DE LISTAR LOS PRODUCTOS DE LA BD  ============ -->

        <!-- <style type="text/css">
        .table{ color: white; }
           .colorfondo{  background:#060405 ;  }
           </style> -->

        <div class="content-wrapper colorfondo">
            <!-- Content Header (Page header) -->
            <section class="content-header">
        <h1>
            <center><strong><font color="#D34787">Lista de Resgistros de los pagos realizados</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Menu cesvi</font></small></center>
        </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">

                         <div class="row">
                             <div class="col-md-12">
                                 <a href="<?php echo base_url();?>mantenimiento/Controller_RegistroPago/agregar_RegistroPago" class="btn btn-primary btn-float"> <span class="fa fa-plus"></span> Agregar Nuevo Registro</a>
                             </div>
                         </div>

                              <hr>
                               <div class="row">
                                    <div class="col-md-12">
                                        <table id="btn_RegistroPago"  class="table">
                                            <thead>
                                                <tr>
                                                     <th><center>Nombre Alumno</center></th>
                                                     <th><center>No. Control</center></th>
                                                     <th><center>Carrera</center></th>
                                                     <th><center>Semestre</center></th>
                                                     <th><center>Fecha Registro</center></th>
                                                     <!-- <th><center>Documento</center></th> -->
                                                     <th><center>opciones</center></th>
                                                    </tr>
                                            </thead>
                                                  <tbody>
                                                              <?php if (!empty($RegistroPago)):?>
                                                                  <?php foreach($RegistroPago as $RegistroPago):?>
                                                  <tr>

          <td><center> <?php echo $RegistroPago->alumno_nombre_completo;?></center></td>
          <td><center>$<?php echo $RegistroPago->numero_control;?></center></td>
          <td><center>$<?php echo $RegistroPago->carrera;?></center></td>
          <td><center>$<?php echo $RegistroPago->semestre;?></center></td>
          <td><center>$<?php echo $RegistroPago->fecha_registro;?></center></td>

                                         <td>
                                    <div class="btn-group">
                                        <center>
            <!--- EDITAR  MEDICAMENTOS...-->
                                    <a href="<?php echo base_url()?>mantenimiento/comida/edit/<?php echo $RegistroPago->id_registropago;?>" class="btn btn-warning"><span class="fa fa-refresh"></span></a>
            <!--- ELIMINAR MEDICAMENTOS...-->
                                    <a href="<?php echo base_url()?>mantenimiento/comida/delete/<?php echo $RegistroPago->id_registropago;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
                                         </center>
                                </div>
                                                           </td>
                                                       </tr>
                                                           <?php endforeach;?>
                                                            <?php endif;?>
                                                  </tbody>
                                        </table>
                                    </div>

                               </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
