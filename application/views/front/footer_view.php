
 <footer class="main-footer" style="background: black;">
      <!--PRIMERA FILA-->
      <div class="container-fluid"> 
        <div class= "row justify-content-around">
  
            <div class="col-md-3">
              
            <div class="media align-items-center ml-auto">
              
              <div class="media-left mr-3">
                 <i class="text-white fas fa-car-side fa-3x"></i>
              </div>

              <div class="media-body">
                 <p class="h4 text-white font-weight-bold ">ENVIOS A DOMICILIO</p><p class="text-white">Realizamos envíos a domicilio para entregarte el producto en tu casa!</p>
              </div>
               
             </div>
           </div>

            <div class="col-md-3">
              
            <div class="media align-items-center ml-auto">
              <div class="media-left mr-3">
                 <i class="text-white fas fa-phone-volume fa-3x"></i>
              </div>
              <div class="media-body">
                 <p class="h4 text-white font-weight-bold">CONSULTAS?</p><p class="text-white">Llamános al (379) 154722082 / (379) 154545627 o encontrános en nuestras sucursales!</p>
              </div>
           </div>
                
            </div>
  
            <div class="col-md-3">
              <div class="media align-items-center ml-auto">
              
              <div class="media-left mr-3">
                    <i class="text-white far fa-credit-card fa-3x"></i>
              </div>

              <div class="media-body">
                 <p class="h4 text-white font-weight-bold ">FINANCIACION</p><p class="text-white">Podés pagar en cuotas c/s interés mediante MERCADOPAGO.</p>
              </div>
               
             </div>
        
            </div>


            <div class="col-md-3">
              <div class="media align-items-center ml-auto">
              
              <div class="media-left mr-3">
                    <i class="text-white fas fa-wine-glass-alt fa-3x"></i>
              </div>

              <div class="media-body">
                 <p class="h4 text-white font-weight-bold ">CATALOGO DE VINOS</p><p class="text-white">Disfrutá de nuestro catálogo de vinos exclusivos.</p>
              </div>
               
             </div>
        
            </div>

        <div class= "row"> <!--Segunda Fila-->
            
              <h6 class="text-white">© 2021 Gomez Daniel Fernando. Todos los derechos reservados.</h6>       
        </div>
</div>
</div>

    <script src="<?php echo base_url ('assets/js/jquery-3.4.1.js');?>"></script>

    <script src="<?php echo base_url ('assets/js/bootstrap.bundle.min.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url ('assets/js/adminlte.min.js');?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url ('assets/js/demo.js');?>"></script>
    <script src="<?php echo base_url ('assets/js/all.js');?>"></script> <!--Iconos de FontAwesome-->
    <script src="<?php echo base_url ('assets/js/sweetalert2.min.js');?>"></script>
    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';

        if (mensaje == 'modif_ok') {
            swal(':D','Modificado con exito!','success');
        } else if (mensaje == 'modif_error'){
            swal(':(','Fallo al modificar!','error');
        } else if (mensaje == 'add_ok'){
            swal(':D','Producto Agregado con exito!','success');
        } else if (mensaje == 'modifuser_ok'){
            swal(':(','Usuario Modificado Exitosamente!','success');              
        } else if (mensaje == 'add_error'){
            swal(':(','Fallo al Agregar producto!','error');
        } else if (mensaje == 'delet_ok'){
            swal(':D','Eliminado con exito!','success');
        } else if (mensaje == 'act_ok'){
            swal(':D','Producto Activado!','success');
        }else if (mensaje == 'user_error'){
            swal(':(','Error al Registrarte!','error');
        }else if(mensaje == 'user_ok'){
            swal(':D','Te Has registrado Exitosamente!','success');
        }else if(mensaje == 'stock_error'){
            swal(':(','No Contamos con esa cantidad de productos! Vuelva a ingresar','error');
        }else if(mensaje == 'stock_ok'){
            swal(':D','Productos Agregados Correctamente!','success');
        } else if(mensaje == 'compra_ok'){
            swal(':D','Tu Compra se ha realizado Correctamente!','success');}  
    </script>


</footer>
</div>
</body>
</html>

