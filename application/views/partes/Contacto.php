
<div class="content-wrapper">
 <section class="content py-5 fondo-contacto"> 
<?php if( ($this->session->userdata('logged_in'))){ ?>

    <div class="container-fluid">
      <!--CONTENEDOR-->
      <!--PRIMERA FILA-->
        <div class= "row">

          <!--PRIMERA COLUMNA-->
          <div class = "col-xl-4"> 

          <button class="btn-contacto" style="outline: none"><i class="fab fa-google-plus-g icon-google"></i>
            <p><b>Catadores Oficial</b></p>
          </button>
    

        <button class="btn-contacto" style="outline: none"><i class="fab fa-twitter icon-twitter"></i>
          <p><b>Catadores Oficial</b></p>
        </button>

        <button class="btn-contacto" style="outline: none"><i class="fab fa-instagram icon-instagram"></i>
          <p><b>Catadores Oficial</b></p>
<!--style="outline: none" Quita el borde del boton que viene por default-->
        </button>

       <button class="btn-contacto" style="outline: none"><i class="fab fa-facebook icon-facebook"></i>
        <p><b>Catadores Oficial</b></p>

<!--style="outline: none" Quita el borde del boton que viene por default-->
        </button>

          </div>
           

          <!--SEGUNDA COLUMNA-->
          <div class = "col-xl-7 back-consulta">
            <?php $session_data = $this->session->userdata('logged_in') ?>

            <h1 class="text-bold text-center text-borde" style="font-family:mifuente;font-size: 60px;">Envianos tu Consulta.</h1>
            <p class="h5 text-bold text-bold mt-2 text-center">Dudas, consultas, reclamos: escribinos y a la brevedad un representante de Atención al Cliente se contactará con vos.</p>

            <?php echo validation_errors(); ?>


            <!-- Genero el formulario para crear una usuario -->


            <div class="well bs-component">
               <?php echo form_open('verifico_nuevo_informe', 
                  ['class' => 'form-group', 'role' => 'form', 'id' => 'form_informe']); ?>
                <fieldset>

             <div class="row">
              
              <div class="col-xl-12">
                <div class="form-group">
                  <label class=" control-label text-bold">Nombre y Apellido:</label>
                    <div>
                    <?php echo form_input(['name' => 'nombre', 
                                           'id' => 'nombre', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Nombre', 
                                           'value'=>"$nombre $apellido"]); ?>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-xl-12">
                <div class="form-group">
                  <label class=" control-label text-bold">Email:</label>
                    <div>
                    <?php echo form_input(['name' => 'email', 
                                           'id' => 'email', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Email', 
                                           'value'=>"$email"]); ?>
                    </div>
                </div>
              </div>

             </div> 
            

             <div class="row">
               <div class="col-xl-12">

                  <div class="form-group">

                    <label class=" control-label text-bold">Mensaje:</label>
                    <div>
                    <?php echo form_input(['name' => 'descripcion', 
                                           'id' => 'descripcion', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Consutas', 
                                           'autofocus'=>'autofocus',
                                           'value'=>set_value('descripcion')]); ?>
                    </div>
                  </div>

               </div>  
             </div>  <!--CIERRE DE LA TERCERA FILA-->
 
                
             <div class="row">

                   <?php echo form_reset ('reset', 'Editar', "class='btn btn-secondary ml-2'"); ?>
                  <?php echo form_submit('submit', 'Enviar',"class='btn btn-primary ml-2'"); ?>

               </div>
                 <?php echo form_close(); ?>
  
              </fieldset>
            </div>
          
          </div>


          <div class="col-xl-1"></div>

        </div>  <!--FIN DE LA PRIMERA FILA-->
       
</div><!-- CIERRE DEL PRIMER CONTENEDOR -->
  <br>   <!-- SALTO DE LINEA -->

</section>
</div>

<?php } else { ?>


     <div class="container-fluid">
      <!--CONTENEDOR-->
      <!--PRIMERA FILA-->
        <div class= "row">

          <!--PRIMERA COLUMNA-->
          <div class = "col-xl-4"> 

          <button class="btn-contacto" style="outline: none"><i class="fab fa-google-plus-g icon-google"></i>
            <p><b>Catadores Oficial</b></p>
          </button>
    

        <button class="btn-contacto" style="outline: none"><i class="fab fa-twitter icon-twitter"></i>
          <p><b>Catadores Oficial</b></p>
        </button>

        <button class="btn-contacto" style="outline: none"><i class="fab fa-instagram icon-instagram"></i>
          <p><b>Catadores Oficial</b></p>
<!--style="outline: none" Quita el borde del boton que viene por default-->
        </button>

       <button class="btn-contacto" style="outline: none"><i class="fab fa-facebook icon-facebook"></i>
        <p><b>Catadores Oficial</b></p>

<!--style="outline: none" Quita el borde del boton que viene por default-->
        </button>

          </div>
           

          <!--SEGUNDA COLUMNA-->
          <div class = "col-xl-7 back-consulta" >
            <?php $session_data = $this->session->userdata('logged_in') ?>

            <h1 class="text-bold text-center text-borde" style="font-family:mifuente;font-size: 60px;">Envianos tu Consulta.</h1>
            <p class="h5 text-bold text-bold mt-2 text-center">Dudas, consultas, reclamos: escribinos y a la brevedad un representante de Atención al Cliente se contactará con vos.</p>

            <?php echo validation_errors(); ?>


            <!-- Genero el formulario para crear una usuario -->

            <div class="well bs-component">
               <?php echo form_open('verifico_nuevo_informe_anonimo', 
                  ['class' => 'form-group', 'role' => 'form', 'id' => 'form_informe']); ?>
                <fieldset>

             <div class="row">
              
              <div class="col-xl-12">
                <div class="form-group">
                  <label class=" control-label text-bold">Nombre:</label>
                    <div>
                    <?php echo form_input(['name' => 'nombre', 
                                           'id' => 'nombre', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Nombre', 
                                           'value'=>set_value('nombre')]); ?>
                    </div>
                </div>
              </div>

            </div>

           <div class="row">
              
              <div class="col-xl-12">
                <div class="form-group">
                  <label class=" control-label text-bold">Apellido:</label>
                    <div>
                    <?php echo form_input(['name' => 'apellido', 
                                           'id' => 'apellido', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Apellido', 
                                           'value'=>set_value('apellido')]); ?>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-xl-12">
                <div class="form-group">
                  <label class=" control-label text-bold">Email:</label>
                    <div>
                    <?php echo form_input(['name' => 'email', 
                                           'id' => 'email', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Email', 
                                           'value'=>set_value('email')]); ?>
                    </div>
                </div>
              </div>

             </div> 
            

             <div class="row">
               <div class="col-xl-12">

                  <div class="form-group">

                    <label class=" control-label text-bold">Mensaje:</label>
                    <div>
                    <?php echo form_input(['name' => 'descripcion', 
                                           'id' => 'descripcion', 
                                           'class' => 'form-control',
                                           'placeholder' => 'Consutas', 
                                           'autofocus'=>'autofocus',
                                           'value'=>set_value('descripcion')]); ?>
                    </div>
                  </div>

               </div>  
             </div>  <!--CIERRE DE LA TERCERA FILA-->
 
                
             <div class="row">

                  <?php echo form_reset ('reset', 'Editar', "class='btn btn-secondary ml-2'"); ?>
                  <?php echo form_submit('submit', 'Enviar',"class='btn btn-primary ml-2'"); ?>
               </div>
              
                 <?php echo form_close(); ?>
  
              </fieldset>
              
            </div>
          <br>
          </div>


          <div class="col-xl-1"></div>

        </div>  <!--FIN DE LA PRIMERA FILA-->
   <br>
   <br>    
   <!-- CIERRE DEL PRIMER CONTENEDOR -->

</div>
  <!-- SALTO DE LINEA -->

</section>

</div>
   <?php } ?>








