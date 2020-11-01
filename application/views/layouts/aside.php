<!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar" >
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><strong>OPCIONES DE MENU</strong></li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-balance-scale"></i> <span>Finanzas</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo base_url();?>mantenimiento/comida">
                              Formato de registro de pago</a></li>
                              <!-- <i class="fas fa-utensils"></i> -->

                          <li><a href="<?php echo base_url();?>mantenimiento/bebidas">
                              Registrar pago <br> (Formato/Archivo)</a></li>
                              <!-- <i class="fas fa-wine-bottle"></i> -->


                          <li><a href="<?php echo base_url();?>mantenimiento/extras">
                              Solicitar recibo pago <br> (Formato solicitud)</a></li>
                              <!-- <i class="fas fa-plus-circle"></i> -->

                          <li><a href="<?php echo base_url();?>mantenimiento/extras">
                            Consulta pagos</a></li>
                            <!--   <i class="fas fa-plus-circle"></i> -->

                        </ul>
                    </li>



                    <li class="treeview">
                        <a href="#">   <!--- class="fa fa-cogs" -->
                            <i class="fas fa-graduation-cap"></i><span>Cont. academico y escolar</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                 <li><a href="<?php echo base_url();?>menuventas">
                    <i class="fas fa-money-check-alt"></i> Ventas completadas</a>
                </li>
                <li><a href="<?php echo base_url();?>menuventascanceladas">
                    <i class="fas fa-trash"></i> Ventas Canceladas</a>
                </li>

                        </ul>
                    </li>



                     <li class="treeview">
                        <a href="#">   <!--- class="fa fa-cogs" -->
                            <i class="fab fa-sellsy"></i><span>Atención y soporte</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                 <li><a href="<?php echo base_url();?>graficas"> <!--- CONTROLLER  -->
                    <i class="fas fa-money-check-alt"></i> Graficas</a>
                </li>
                <li><a href="<?php echo base_url();?>menuventascanceladas">
                    <i class="fas fa-trash"></i> Ventas</a>
                </li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-sellsy"></i> <span>Admición e inscripción</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/comida">
                                <i class="fas fa-utensils"></i> Comidas</a></li>

                            <li><a href="<?php echo base_url();?>mantenimiento/bebidas">
                                <i class="fas fa-wine-bottle"></i> Bebidas</a></li>


                            <li><a href="<?php echo base_url();?>mantenimiento/extras">
                                <i class="fas fa-plus-circle"></i> Extras</a></li>

                        </ul>
                    </li>



                    <li class="treeview">
                        <a href="#">
                            <i class="fab fa-sellsy"></i> <span>Bolsa de Trabajo</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/comida">
                                <i class="fas fa-utensils"></i> Comidas</a></li>

                            <li><a href="<?php echo base_url();?>mantenimiento/bebidas">
                                <i class="fas fa-wine-bottle"></i> Bebidas</a></li>


                            <li><a href="<?php echo base_url();?>mantenimiento/extras">
                                <i class="fas fa-plus-circle"></i> Extras</a></li>

                        </ul>
                    </li>





                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
