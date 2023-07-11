<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no"> 

  <link rel="stylesheet"  href="<?php echo base_url('assets/css/miestilo.css');?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.css');?>">
  
    <title><?php echo ($titulo); ?></title>

  <script type="text/javascript">
        function borra_carrito() {
            var result = confirm('¿Esta seguro de eliminar todo el carrito?');

            if (result) {
                return true;
            } else {
                return false; // Boton Cancela
            }
        }


    </script>


	</head>

  <body class="hold-transition sidebar-mini">
 
 <?php $session_data = $this->session->userdata('logged_in') ?>
  <!--            MENU PARA ADMINISTRADOR-->
    <?php if( ($this->session->userdata('logged_in')) and (($session_data['perfil_id']) =='1')){
      
    ?>

<!-- Site wrapper -->
<div class="wrapper">
   <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('Muestra_ventas');?>" class="nav-link">Inicio</a>
      </li>
     
    </ul>

    <ul class="navbar-nav ml-auto">
        <a class="btn btn-info" href="<?php echo base_url('cerrar_sesion');?>"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a><!--Login Controller-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!--            MENU PARA CLIENTES-->       
    <?php } else if( ($this->session->userdata('logged_in')) and (($session_data['perfil_id'])=='2')) {?>

      <div class="wrapper">
   <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('catalogo');?>" class="nav-link">Inicio</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('Informe');?>" class="nav-link">Contacto</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('NuestraVinoteca');?>" class="nav-link">Nosotros</a>
      </li>

    </ul>
     

  <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Carrito Dropdown Menu -->
      <?php $cant=0; 
            $cant= $this->cart->total_items();//Cantidad total de artículos en el carro
       ?> <!--Cuenta los Productos en carrito -->
      <ul class="navbar-right">
      <li class="nav-item dropdown d-block">
        <!-- Inicio Carrito -->
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-shopping-cart fa-2x"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $cant?></span>
        </a>

        <div class="dropdown-menu dropdown-menu-fluid dropdown-menu-right">

        <table class="table table-hover text-nowrap p-0">
          <thead class="table-success"><!--Encabezado de tabla-->
             <tr><!--Fila-->
              <th>Nombre</th><!--Columnas-->
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Eliminar</th>
            </tr>
          </thead>
            <?php $gran_total = 0;?><!--Defino la variable para el total-->
            
            <?php 
              $cart= $this->cart->contents();
              foreach ($cart as $item):
              ?>
            <tr>
              <a href="#">
              <td>
              <?php echo $item['name']; ?>
              </td>
              <td class="text-center">
              <?php echo number_format($item['qty']);?>
              </td>
              <td>
              $<?php echo number_format($item['subtotal'], 2);?>
              </td>
              <td class="text-center">
              <?php // Imagen para quitar un producto del carrito
              $path = '<img src= '. base_url('assets/img/Eliminar_del_carrito.png') . ' width="25px" height="20px">';
              echo anchor('Eliminar_del_carrito/' . $item['rowid'], $path); ?></td>

              <?php //Gran Total
              $gran_total = $gran_total + $item['subtotal']; ?>
              </a>

              <?php endforeach; ?>
              
              
                
            </tr>
            <!-- Fin Listado de Productos en carrito -->
            <tr>
             <th>Total:</th>
             <td><th class="text-right">$<?php echo number_format($gran_total, 2);?></th></td>
            </tr>
             </table>

        <a class="btn btn-danger text-bold dropdown-footer" value="Borrar Carrito" onclick="return borra_carrito()" href="<?php echo base_url('Eliminar_del_carrito/all');?>">Eliminar Todos</a>
       
        <a href="<?php echo base_url('Comprar');?>" class="btn btn-primary text-bold dropdown-footer" value="Confirmar Orden">Comprar</a>
        </div>
        
   </li>
    </ul>
    
    <ul class="mt-2">
    <li class="nav-item d-block">
        <a href="<?php echo base_url('cerrar_sesion');?>"><i class="fas fa-sign-out-alt fa-2x"></i>Salir</a>
    </li>
    </ul>

  </nav>

      <!--            MENU PARA PUBLICO GENERAL-->
      <?php } else {?> 

 <div class="wrapper">
   <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('principal');?>" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('Informe');?>" class="nav-link">Contacto</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('NuestraVinoteca');?>" class="nav-link">Nosotros</a>
      </li>
     
    </ul>
    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
        <a href="<?php echo base_url('IniciarSesion');?>" class="icon3"><i class="fas fa-user"></i> Iniciar Sesion</a>
    </ul>
  </nav>

        <?php }?>
