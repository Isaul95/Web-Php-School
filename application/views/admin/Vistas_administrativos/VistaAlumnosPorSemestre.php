
    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->

            <section class="content">
                <div class="box box-solid colorfondo">
                    <div class="box-body">

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h3>
        <input type="hidden" id="semestre" name="semestre" value="<?php echo $_GET["Semestre"]; ?>" >
        <input type="hidden" id="numero" name="numero" value="<?php echo $_GET["Num"]; ?>" >
        <input type="hidden" id="usuario" name="usuario" value="<?php echo $username;?>" >
        <input type="hidden" id="rol" name="rol" value="<?php echo $rol;?>" >

            <center><strong><font color="#D34787">Lista de Alumnos Semestre: <?php echo $_GET["Semestre"]; ?></font></strong></center>
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
          </tr>
        </thead>
      </table>

    </div>
  </div>
      <hr>
                        </div>
                    </div>
                </div>
            </section>
    </div> <!-- /END ALL CONTENT -->
