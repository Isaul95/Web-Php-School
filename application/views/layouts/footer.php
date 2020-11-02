<style type="text/css">

/*
CSS PARA ELEGIR MESA
*/

#cobroporcliente{
    position: absolute;
  top:446px;
  bottom:;
  right:;
  left:1037px;
   overflow:scroll;
  overflow-x: hidden;
     height:200px;
     width:300px;
}

#error{
   top:600px;
  bottom:;
  right:600px;
  left:;
     width:500px;
}

#descripciondeclientes{
   position: absolute;
  top:406px;
  bottom:;
  right:;
  left:1046px;
}
 #mesa1libre{
   position: absolute;
  top:50px;
  bottom:;
  right:290px;
  left:;
}
#mesa2libre{
   position: absolute;
  top:190px;
bottom:;
  right:;
  left:860px;
}
#mesa3libre{
   position: absolute;
  top:290px;
  bottom:;
  right:357px;
  left:;
}
#mesa4libre{
   position: absolute;
  top:441px;
  bottom:;
  right:240px;
  left:;
}
#mesa5libre{
   position: absolute;
  top:50px;
  bottom:;
  right:;
  left:200px;
}
#mesa6libre{
   position: absolute;
  top:201px;
  bottom:;
  right:686px;
  left:;
}
#mesa7libre{
   position: absolute;
  top:314px;
  bottom:;
  right:990px;
  left:;
}
#mesa8libre{
   position: absolute;
  top:471px;
  bottom:;
  right:850px;
  left:;
}
#divisiondemesas{
   position: absolute;
  top:100px;
  bottom:;
  right:;
  left:290px;
}
#mesa1ocupado{
   position: absolute;
  top:106px;
  bottom:;
  right:;
  left:860px;
}
#mesa2ocupado{
   position: absolute;
  top:245px;
bottom:;
  right:;
  left:976px;
}
#mesa3ocupado{
   position: absolute;
  top:346px;
  bottom:;
  right:;
  left:790px;
}
#mesa4ocupado{
   position: absolute;
  top:497px;
  bottom:;
  right:;
  left:910px;
}
#mesa5ocupado{
   position: absolute;
  top:106px;
  bottom:;
  right:;
  left:72px;
}
#mesa6ocupado{
   position: absolute;
  top:258px;
  bottom:;
  right:;
  left:220px;
}
#mesa7ocupado{
   position: absolute;
  top:370px;
  bottom:;
  right:;
  left:160px;
}
#mesa8ocupado{
   position: absolute;
  top:527px;
  bottom:;
  right:;
  left:304px;
}

/*
CSS PARA ELEGIR MESA
*/


#botondecancelacion{
     position: absolute;
  top:;
  bottom:22px;
  right:;
  left:500px;
}


/*
CSS PARA ELEGIR CLIENTE
*/
 #clientesymesa{
   position: relative;
  top:300px;
  bottom:;
  right: ;
  left:100px;
}
 #mesa{
  position: absolute;
  top:140px;
  bottom:;
  right:;
  left:10px;
}
 #totaldelamesa{
  position: absolute;
  top:190px;
  bottom:;
  right:;
  left:10px;
}
#numerodeclientes{
  position: absolute;
  top:165px;
  bottom:;
  right:;
  left:10px;
}
 #botontotal{
  position: absolute;
  top:;
  bottom:10px;
  right:430px;
  left:;
}
#botonderegresar{
   position: absolute;
  top:90px;
  bottom:;
  right:30px;
  left:;
}
#tabladecontenidodelamesa{
     position: absolute;
  top:190px;
  bottom:;
  right:30px;
  left:;
/*EL SCROLL PARA LA TABLA DE PRODUCTOS AGREGADOS*/
  overflow:scroll;
  overflow-x: hidden;
     height:200px;
     width:350px;

}
#descripciopndelatablacontenidodelamesa{
       position: absolute;
  top:;
  bottom:446px;
  right:120px;
  left:;

}
#modalclientes{
   position: absolute;
  top:70px;
  bottom:;
  right:;
  left:30px;
}

/*
CSS PARA ELEGIR CLIENTE
*/
</style>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>

<!-- Highcharts -->
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.css"></script>
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!--FONT AWESOME, CARGA DE ICONOS PARA LOS BOTONES-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


<!-- DataTables Export -->

<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/css/buttons.dataTables.min.css"></script>


<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>

<script>

  $(document).ready(function(){

      //$('#btn_RegistroPago').DataTable();

      /*  ADD LA PARTE SUPERIOR LA BUSKEDA Y LA PAGHINACION  */
$('#btn_RegistroPago').DataTable( {
   "order": [[ 5, "asc" ]], //ordenar de forma ascendente

   "language": {
     "lengthMenu": "Mostrar _MENU_ registros por pagina",
     "zeroRecords": "No se encontraron resultados en su busqueda",
     "searchPlaceholder": "Buscar Registros",
     "info": "Total: _TOTAL_ registros",
     "infoEmpty": "No Existen Registros",
     "infoFiltered": "(filtrado de un total de _MAX_ registros)",
     "search": "Buscar:",
     "paginate": {
       "first": "Primero",
       "last": "Último",
       "next": "Siguiente",
       "previous": "Anterior"
     }, /* TODO ESTO ES PARA CAMBIAR DE IDIOMA */
   }
  });

          })

</script>

<script src="<?php echo base_url();?>assets/template/dist/js/js-cesvi/archivos.js"></script>
