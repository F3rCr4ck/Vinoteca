<div class="content-wrapper">

<section class="content-header">
<?php if (!$productos) { ?>

  <div class="container">
    <div class="well">
      <h1 class="text-center">No hay productos Vinos Blancos.</h1>
    </div>

    <?php if( ($this->session->userdata('logged_in')) and ($perfil_id == '1') ) { ?>
      <div class="text-center">
        <div>
          <a type="button" class="btn btn-success" href="<?php echo base_url('AgregarProducto'); ?>">Agregar</a>
        </div>  
      </div>
      <br>
    <?php } ?>
  </div>

<?php } else { ?>

  <div class="container">
    <div class="well">
      <h1 class="text-center"style="font-family:mifuente;font-size: 60px;">Todos los Vinos Blancos.</h1>
    </div>  
    <div class="text-center">
      <br>
      <div>
        <a type="button" class="btn btn-success" href="<?php echo base_url('AgregarProductos'); ?>">Agregar</a>
      </div>  
    </div>
    <br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Categoria</th>
          <th>Nombre</th>
          <th>Foto</th>
          <th>Precio Costo</th>
          <th>Precio Venta</th>
          <th>Stock</th>
          <th>Eliminado</th>
          <th>Accion</th>
        </tr>
      </thead>
      <tbody >
        <?php foreach($productos->result() as $row){ ?>
        <tr>
          <td><?php echo $row->id_producto;  ?></td>
          <td><?php echo $row->id_categoria;  ?></td>
          <td><?php echo $row->nombre_producto;  ?></td>
          <td><?php ?><img width="100" height="100" src="<?php echo base_url()?>/<?php echo $row->imagen ?>"></td>
          <td>$<?php echo $row->precio_costo;  ?></td>
          <td>$<?php echo $row->precio_venta;  ?></td>
          <?php if($row->stock<= 0){?> <td class="badge badge-danger"><?php echo 'Sin Stock';?></td><?php } else{?><!--Pregunta si hay stock, sino muestra "Sin Stock"--> 
                <td><?php echo $row->stock;?></td><?php } ?>
          <td><?php echo $row->eliminado;  ?></td>
          
          <td><a class="btn btn-app bg-info" href="<?php echo base_url("Modificar_producto/$row->id_producto");?>"><i class="fas fa-edit"></i>Modificar</a><a class="btn btn-app bg-danger" href="<?php echo base_url("Eliminar_producto/$row->id_producto");?>"><i class="fas fa-trash-alt"></i>Eliminar</a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table> 

    <?php $this->load->view('template/pag_links'); ?>             
  </div>

<?php } ?>
  </section>        
  </div>