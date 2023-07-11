<div class="content-wrapper">
  <section class="content">
    
<div class="container-fluid fondo-reg" >	
    <!--CONTENEDOR-->
 
    <div class="container-fluid">
      <!--PRIMERA FILA-->
        <div class= "row">

          <!--PRIMERA COLUMNA-->
          <div class = "col-xl-2" > 
  

          </div>

          <!--SEGUNDA COLUMNA-->
          <div class = "col-xl-8 formulario-registro">
            <h1>REGISTRARSE</h1>

            <?php echo validation_errors(); ?>
              <!-- Genero el formulario para crear una usuario -->

            <div class="well bs-component form-horizontal">
               <?php echo form_open('verifico_nuevoregistro', 
                  ['class' => 'form-group', 'role' => 'form', 'id' => 'form_registro']); ?>
                <fieldset>

             <div class="row">
              
              <div class="col-xl-6">
                <div class="form-group botones">
                  <label class="col-lg-2 control-label">Nombre</label>
                  <div class="col-lg-12 celdas">

                    <?php echo form_input(['name' => 'nombre', 
                                           'id' => 'nombre', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Nombre', 
                                           'required'=>'required', 
                                           'autofocus'=>'autofocus',
                                           'value'=>set_value('nombre')]);?>

     
              </div>
                </div>
              </div>
              
              <div class="col-xl-6">
                <div class="form-group">
                  <label class="col-lg-2 control-label">Apellido</label>
                    <div class="col-lg-12">
                    <?php echo form_input(['name' => 'apellido', 
                                           'id' => 'apellido', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Apellido', 
                                           'required'=>'required',
                                           'value'=>set_value('apellido')]); ?>
                  </div>
                </div>
              </div>

             </div> <!--CIERRE DE LA PRIMERA FILA-->
            
             <div class="row">

              <div class="col">
                <div class="form-group">
                  <label class="col-lg-2 control-label">Email</label>
                  <div class="col-lg-12">
                    <?php echo form_input(['type'=>'email', 
                                           'name' => 'email', 
                                           'id' => 'email', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Email', 
                                           'required'=>'required',
                                           'value'=>set_value('email')]); ?>
                  </div>
                </div>
               </div>

             </div> <!--CIERRE DE LA SEGUNDA FILA-->

             <div class="row">
               <div class="col">

                  <div class="form-group">
                    <label class="col-lg-2 control-label">Usuario</label>
                    <div class="col-lg-12">
                    <?php echo form_input(['name' => 'usuario', 
                                           'id' => 'usuario', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Usuario', 
                                           'required'=>'required',
                                           'value'=>set_value('usuario')]); ?>
                    </div>
                  </div>

               </div>  
             </div>  <!--CIERRE DE LA TERCERA FILA-->

             <div class="row">
               <div class="col-xl-6">

                 <div class="form-group">
                  <label class="col-lg-2 control-label">Contraseña</label>
                  <div class="col-lg-12">
                    <?php echo form_password(['name' => 'pass', 
                                              'id' => 'pass', 
                                              'class' => 'form-control',
                                              'placeholder' => 'Contraseña', 
                                              'required'=>'required']); ?>
                  </div>
                </div>

               </div>
               <div class="col-xl-6"> 

                 <div class="form-group">
                  <label class="col-lg-6 control-label">Repite Contraseña</label>
                  <div class="col-lg-12">
                    <?php echo form_password(['name' => 're_password', 
                                              'id' => 're_password', 
                                              'class' => 'form-control',
                                              'placeholder' => 'Repetir Contraseña', 
                                              'required'=>'required']); ?>
                  </div>
                </div>

               </div>      
             </div>  <!--CIERRE DE LA CUARTA FILA--> 
                
             <div class="row">
             
               <div class="col-xl-3 registro">
                <div class="col-lg-3 col-lg-offset-4">
                   <?php echo form_submit('submit', 'Registrarse',"class='button-registrar' id=btn-registro"); ?>
                  
                </div>
                 
               </div>

               <div class="col-xl-3">
                 <?php echo form_reset ('reset', 'Editar', "class='button-registrar' "); ?>
                 <?php echo form_close(); ?>
               </div>

			 </div><!--CIERRE DE LA QUINTA FILA--> 
  			<p>Al registrarte, aceptas nuestras condiciones de uso y Politica de privacidad.</p>
  			<hr>
  			<p>Ya tienes Cuenta?<a class="link" href="<?php echo base_url('IniciarSesion');?>"> Iniciar Sesion</a></p>
             </fieldset>
            </div> 
             
          </div><!--CIERRE DE LA SEGUNDA COLUMNA-->

          <!--TERCERA COLUMNA-->
          <div class = "col-xl-2 ">
              
          </div>

        </div>  <!--FIN DE LA PRIMERA FILA-->
    </div> <!-- CIERRE DEL PRIMER CONTENEDOR -->
    
    <br> <!-- SALTO DE LINEA -->
</div>
   </section>   
</div>