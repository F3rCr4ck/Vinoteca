<!-- Main Sidebar Container -->
<?php $session_data = $this->session->userdata('logged_in');?>

          
          <!-- MENU PARA ADMINISTRADOR-->

    <?php if( ($this->session->userdata('logged_in')) and (($session_data['perfil_id']) =='1')){?>

      <?php $session_data = $this->session->userdata('logged_in');
       $id_usuario= $session_data['id'];?>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url ('assets/img/logo.jpg');?>"
           alt=""
           class="brand-image img-circle elevation-6"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CATADORES</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img id="avatar4"src="<?php echo base_url ('assets/img/avatar.png');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
              ADMINISTRADOR
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">USUARIO</li>

          <li class="nav-item">
            
            <a href="<?php echo base_url('modificar_usuario/'.$id_usuario);?>" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>Editar Datos Personales</p>
            </a>
          </li>

          <li class="nav-header">GESTION DE USUARIOS</li>
          
          <li class="nav-item">
            <a href="<?php echo base_url('Mostrar_usuarios');?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Mostrar Usuarios 
              </p>
            </a>
          </li>

          <li class="nav-header">GESTION DE PRODUCTOS</li>
          
          <li class="nav-item">
            <a href="<?php echo base_url('AgregarProductos');?>" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Agregar Productos
              </p>
            </a>
          </li>

          <!--
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p class="mr-2">
                Agregar por Categorias<i class="fas fa-angle-left right"></i>
              </p>
            </a>

          </li>-->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wine-bottle"></i>
              <p>
                Mostrar Productos<i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="<?php echo base_url('MostrarProductos');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Mostrar_vinos_tinto');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vino Tinto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Mostrar_vinos_blanco');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vino Blanco</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Mostrar_vinos_rosado');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vino Rosado</p>
                </a>
              </li>

            </ul>


          </li>

          <li class="nav-header">REPORTES</li>

          <li class="nav-item">
            <a href="<?php echo base_url('Muestra_ventas');?>" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Ventas 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Muestra_informes');?>" class="nav-link">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Consultas 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Muestra_informes_anonimos');?>" class="nav-link">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Consultas Anonimas
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
                                <!--MENU PARA CLIENTES-->       
  <?php } else if( ($this->session->userdata('logged_in')) and (($session_data['perfil_id'])=='2')) {?>

      <?php $session_data = $this->session->userdata('logged_in');
       $id_usuario= $session_data['id'];?><!--_valid_login-->
  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url ('assets/img/logo.jpg');?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-6"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">CATADORES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img id="avatar4"src="<?php echo base_url ('assets/img/avatar.png');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
              <?= $session_data['nombre'] ?>
          </a>
        </div>
      </div>

                  <!-- Busqueda -->

                  <!-- Get trae informacion -->
        <form class="form-inline" id="form" method="GET" action="<?php echo base_url('buscar');?>">
        <div class="input-group">
          <input class="form-control form-control-sidebar"  type="text" id="query" name="query" placeholder="Buscar">
          <div class="input-group-append">
            <button class="btn btn-sidebar" type="submit" id="buscar" value="buscar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </form>

            <!-- Fin Busqueda -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>

          <li class="nav-item">
            
            <a href="<?php echo base_url('modificar_usuario/'.$id_usuario);?>" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>Editar Datos Personales</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('catalogo');?>" class="nav-link">
              <i class="nav-icon fas fa-house-user icon1"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
          <!--  
          <li class="nav-item">
            <a href="<?php //echo base_url('Registrarse');?>" class="nav-link">
              <i class="nav-icon fas fa-user-edit icon2"></i>
              <p>
                Registrate
              </p>
            </a>
          </li>
          -->
  
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-glass-cheers icon4"></i>
              <p>
                Catalogo
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo base_url('catalogo');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todos</p>
                </a>
            </li>
            
              <li class="nav-item">
                <a href="<?php echo base_url('seccion_tintos');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vino Tinto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('seccion_blancos');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vino Blanco</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('seccion_rosados');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vino Rosado</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Mis_compras');?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag icon2"></i>
              <p>
                Mis Compras
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('NuestraVinoteca');?>" class="nav-link">
              <i class="nav-icon fas fa-users icon5"></i>
              <p>
                Nosotros
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Informe');?>" class="nav-link">
              <i class="nav-icon fas fa-headset icon6"></i>
              <p>
                Contactanos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('cerrar_sesion');?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt icon7"></i>
              <p>
                Salir
              </p>
            </a>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

        <!--MENU PARA PUBLICO GENERAL-->
      <?php } else {?> 
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url ('assets/img/logo.jpg');?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-6"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">CATADORES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img id="avatar4"src="<?php echo base_url ('assets/img/avatar.png');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
              INVITADO
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="<?php echo base_url('principal');?>" class="nav-link">
              <i class="nav-icon fas fa-house-user icon1"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Registrarse');?>" class="nav-link">
              <i class="nav-icon fas fa-user-edit icon2"></i>
              <p>
                Registrate
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="<?php echo base_url('IniciarSesion');?>" class="nav-link">
              <i class="nav-icon fas fa-door-open icon3"></i>
              <p>
                Iniciar Sesion
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Catalogo_invitado');?>" class="nav-link">
              <i class="nav-icon fas fa-glass-cheers icon4"></i>
              <p>
                Productos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('NuestraVinoteca');?>" class="nav-link">
              <i class="nav-icon fas fa-users icon5"></i>
              <p>
                Nosotros
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Informe');?>" class="nav-link">
              <i class="nav-icon fas fa-headset icon6"></i>
              <p>
                Contactanos
              </p>
            </a>
          </li>

        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <?php }?>
