
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        
         
            <div class="content-wrapper" style="background-color: black;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
        <h1>
            <center><strong><font color="#D34787">Restaurante "El Toloache"</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Ciudad Iguala de la Independencia, Guerrero</font></small></center>
        </h1>
            </section>
            <!-- Main content -->
        
            <section class="content">
                
                    <!---div class="box box-solid"> <div class="box-body">
Esta vista es la del dashboard WELCOME ISAUL HERE IS MY WORld <br> </div>  <! /.box-body >  </div-->         <br> <br>
<form action="<?php echo base_url();?>Venta" method="post"> <!--Aqui cambio la vista al modo venta-->
                <center>
                <button  type ="submit" class="btn btn-outline-secondary">
                    <img src="<?php echo base_url()?>assets/template/dist/img/restaurant.jpg"  class="user-image" alt="User Image" width=420px heigth=420px link="">
                 </button>
                   <center>

</form>

<?php ini_set('date.timezone', 'America/Mexico_City');?>
<?php  echo $time=date('H:i:s', time());?>
<?php echo date('g:i:s a', strtotime($time));?>
<?php echo $time=date('Y-m-d', time());?>
              
            </section>
       
            <!-- /.content -->
        </div>
        
        <!-- /.content-wrapper -->
