
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content fondo-login">
<div class="container-fluid" > 
    <!--CONTENEDOR-->
    <div class="container-fluid">
      <!--PRIMERA FILA-->
        <div class= "row">

          <!--PRIMERA COLUMNA-->
          <div class = "col-xl-2" > 
  
          </div>

          <!--SEGUNDA COLUMNA-->
          <div class = "col-xl-8 formulario-login">
            <img src="<?php echo base_url ('assets/img/logo.jpg');?>" class="profile-user-img img-fluid img-circle shadow" width="300" height="160">
                <h1 class="mt-2">Iniciar sesion</h1>
            
            <div class="row justify-content-md-center">
              
              <div class = "col-lg-4 col-md-5">

                    <div class="" data-form-type="formoid">
                        <div data-form-alert="" hidden="" class="align-center">Thanks for filling out the form!</div>
            
                    <div class="" data-form-type="formoid">
                        <div data-form-alert="" hidden="" class="align-center">Thanks for filling out the form!</div>
                        <?php echo validation_errors(); ?>
      
                        <?php echo form_open('verifico_usuario', ['class' => 'form-signin', 'role' => 'form']); ?> <br>
        
                    <?php echo form_input(['name' => 'usuario', 
                                           'id' => 'usuario', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Usuario', 
                                           'required'=>'required', 
                                           'autofocus'=>'autofocus']); ?>
                        <br>
        
                    <?php echo form_input(['type' => 'password',
                                           'name' => 'pass', 
                                           'id' => 'pass', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Contraseña', 
                                           'required'=>'required']); ?> 

                    <?php echo form_submit('submit', 'Iniciar sesión',"class='button-login display-7'"); ?> <br>
                    <b>¿No estas registrado?<a href="<?php echo base_url('Registrarse');?>">Registrate</a></b>
                    <?php echo form_close(); ?>
                    <br>
                    </div>

                    </div>
                

                <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
                    <a href="#next">
                        <i class="mbri-down mbr-iconfont"></i>
                    </a>
                </div>

              </div>
            </div>
              
                

          </div><!--CIERRE DE LA SEGUNDA COLUMNA-->

          <!--TERCERA COLUMNA-->
          <div class = "col-xl-2">
              
          </div>

        </div>  <!--FIN DE LA PRIMERA FILA-->
    </div> <!-- CIERRE DEL PRIMER CONTENEDOR -->
    
    <br> <!-- SALTO DE LINEA -->
</div>
</section>

    <!-- /.content -->
  </div>
