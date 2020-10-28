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


<script language="javascript">
/*
JS PARA ELEGIR CLIENTE
*/
  function datosdecancelacionparacomidas($id_comida, $precio_unitario, $cliente, $nombre, $cantidad){


$('#id_comida').val($id_comida);
$('#nombre_comida').val($nombre);
$('#cantidad').val($cantidad);
    $('#precio_comida').val($precio_unitario);
    $('#num_cliente_comida').val($cliente);
}

function datosdecancelacionparabebidas($id_bebida, $precio_unitario, $cliente, $nombre, $cantidad){

$('#id_bebida').val($id_bebida);
$('#nombre_bebida').val($nombre);
$('#cantidad').val($cantidad);
$('#precio_bebida').val($precio_unitario);
$('#num_cliente_bebida').val($cliente);
}

function datosdecancelacionparaextras($id_extra, $precio_unitario, $cliente, $nombre, $cantidad){

$('#id_extra').val($id_extra);
$('#nombre_extra').val($nombre);
$('#cantidad').val($cantidad);
$('#precio_extra').val($precio_unitario);
$('#num_cliente_extra').val($cliente);
}


function mandanumerodemesa_almodal($numerodecliente, $totaldelcliente){

$('#numerodemesa').val($numerodecliente);

}



  function quemodalabro($nombredelplatillobebidaoextra){


if($nombredelplatillobebidaoextra=="Tacos"){
   $(document).ready(function(){
 
    $("#tacosprecios").modal(); 
 
});
}
if($nombredelplatillobebidaoextra=="Quekas"){
   $(document).ready(function(){

    $("#quekasprecios").modal(); 

});
}
if($nombredelplatillobebidaoextra=="Al horno"){
   $(document).ready(function(){
  
    $("#alhornoprecios").modal(); 
  
});
}
if($nombredelplatillobebidaoextra=="Mulas"){
   $(document).ready(function(){

    $("#mulasprecios").modal(); 

});
}
if($nombredelplatillobebidaoextra=="Burritos"){
   $(document).ready(function(){

    $("#burritosprecios").modal(); 

});
}

if($nombredelplatillobebidaoextra=="Agua Natural 1 lt."){
   $(document).ready(function(){
  
    $("#aguanaturalprecio").modal(); 
  
});
}

if($nombredelplatillobebidaoextra=="Cerveza coronoa o victoria 355ml."){
   $(document).ready(function(){
  
    $("#cheveprecio").modal(); 
  
});
}

if($nombredelplatillobebidaoextra=="Chesco 1/2 lt."){
   $(document).ready(function(){
 
    $("#chescoprecio").modal(); 

  });
}

if($nombredelplatillobebidaoextra=="Agua del día 1 lt."){
   $(document).ready(function(){
 
    $("#aguadeldiaprecio").modal(); 
  
});
}

if($nombredelplatillobebidaoextra=="Agua del día 1/2 lt."){
   $(document).ready(function(){
 
    $("#aguadeldiademedioprecio").modal(); 
  });
}

if($nombredelplatillobebidaoextra=="Orden de guacamole"){
   $(document).ready(function(){

    $("#guacamoleprecio").modal(); 
  
});
}
if($nombredelplatillobebidaoextra=="Birria"){
   $(document).ready(function(){

    $("#birriaprecio").modal(); 
 
});
}
if($nombredelplatillobebidaoextra=="Media birria"){
   $(document).ready(function(){
  
    $("#mediabirriaprecio").modal(); 
  
});
}



  }


/*
JS PARA ELEGIR CLIENTE
*/

  $(document).ready(function(){
       graficar();

  /*  ADD LA PARTE SUPERIOR LA BUSKEDA Y LOS LIMITES DE REGISTROS A MOSTRAR  */
 $('#examplelist').DataTable( {
          
       
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros por pagina",
      "zeroRecords": "No se encontraron resultados en su busqueda",
      "searchPlaceholder": "Buscar Registros", 
      "info": "Mostrar registros de _START_ al _END_ de un total de _TOTAL_ registros",
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

          });


function graficar(){




  Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});






}




</script>
