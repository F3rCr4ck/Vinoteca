<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carrito_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('carrito_model');
		$this->load->model('producto_model');
        $this->load->library('cart');
	}

	public function index()
	{

	}

	public function catalogo($offset=''){

		$mensaje= $this->session->flashdata('mensaje');
		if($mensaje == 'compra_ok'){
			$mensaje= false;
		}
		//Offset se posiciona en el registro que le indique sino coloco nada es cero
		//Si mi offset es igual a 10 y mi limite es 8 me va a mostrar el registro 11,12...18 
		$data = array('titulo' => 'Todos los productos',
						'mensaje' =>$mensaje);
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		
		$limit= 8;/*Es el limite de productos que me va a mostrar por pagina*/
		$total= $this->producto_model->contar();/*Me devuelve la cantidad de registros que tengo*/

		$dat = array('productos' => $this->producto_model->get_productos($limit,$offset));
		
       

		/*Configuro la paginacion*/
		$config['base_url'] = base_url().'catalogo';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 2; /*Es Donde va a colocar el dato de paginacion*/
		

		/*Estilos*/
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		/*Inicializo el paginador*/
		$this->pagination->initialize($config);

		$data['pag_links'] = $this->pagination->create_links();//Crea los links para mostrarme en la paginacion "< 123 >"
		$this->load->view('front/head_view', $data);
		$this->load->view('front/navbar_view1');

		if ($session_data) 
		{
			$this->load->view('carrito/carritoparte_view');
		}
		
		$this->load->view('partes/ProductosMenu', $dat);
		$this->load->view('front/footer_view');


	}

	function info_producto($id) 
		{

			$dat = array('productos' => $this->producto_model->get_un_producto2($id));
			$id = $this->uri->segment(2);
			$datos_producto = $this->producto_model->get_un_producto2($id);

			if ($datos_producto != FALSE) {
				foreach ($datos_producto->result() as $row) 
				{
					$nombre_producto = $row->nombre_producto;
					$descripcion = $row->descripcion;
					$id_categoria = $row->id_categoria;
					$imagen = $row->imagen;
					$precio_costo = $row->precio_costo;
					$precio_venta = $row->precio_venta;
					$stock = $row->stock;
					$stock_min = $row->stock_min;	
				}

				$dat = array('producto' =>$datos_producto,
					'id_producto'=>$id,
					'nombre_producto'=>$nombre_producto,
					'descripcion'=>$descripcion,
					'id_categoria'=>$id_categoria,
					'imagen'=>$imagen,
					'precio_costo'=>$precio_costo,
					'precio_venta'=>$precio_venta,
					'stock'=>$stock,
					'stock_min'=>$stock_min
				);
			} 
			else 
			{
				return FALSE;
			}

			if($datos_producto != FALSE){
			$mensaje= $this->session->flashdata('mensaje');
			$data = array('titulo' => 'Informacion',
						  'mensaje' => $mensaje);
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('front/head_view', $data);
			$this->load->view('front/navbar_view1');

			if ($session_data){

				$this->load->view('carrito/carritoparte_view');
			}

			$this->load->view('info_productos/info', $dat);
			$this->load->view('front/footer_view');
			}else{
			redirect('IniciarSesion', 'refresh');}
		}

//Este funcion llama a la página de productos de la seccion cables, con el carrito si está logueado
	public function seccion_tintos($offset='')
	{
		$mensaje= $this->session->flashdata('mensaje');

		$data = array('titulo' => 'Vinos Tintos',
						'mensaje' => $mensaje);

		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		
		$categoria=1;//Es el nro de categoria de la seccion tintos
		$limit= 8;/*Es el limite de productos que me va a mostrar por pagina*/
		$total= $this->producto_model->contar($categoria);/*Me devuelve la cantidad de registros que tengo*/

		$dat = array('productos' => $this->producto_model->get_tintos($limit,$offset));

		/*Configuro la paginacion*/
		$config['base_url'] = base_url().'seccion_tintos';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 2; /*Es Donde va a colocar el dato de paginacion*/
		

		/*Estilos*/
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		/*Inicializo el paginador*/
		$this->pagination->initialize($config);

		$data['pag_links'] = $this->pagination->create_links();//Crea los links para mostrarme en la paginacion "< 123 >"

		$this->load->view('front/head_view', $data);
		$this->load->view('front/navbar_view1', $data);
		if ($session_data) 
		{	/*Encabezado del carrito*/
			$this->load->view('carrito/carritoparte_view' );
		}
		$this->load->view('carrito/tintos_view', $dat);
		$this->load->view('front/footer_view');
	}

//Este funcion llama a la página de productos de la seccion climatizacion, con el carrito si está logueado
	public function seccion_blancos($offset='')
	{
		$mensaje= $this->session->flashdata('mensaje');
		$data = array('titulo' => 'Vinos Blancos',
						'mensaje' => $mensaje);
		$session_data = $this->session->userdata('logged_in');
		
		$categoria=2;//Es el nro de categoria de la seccion blancos
		$limit= 8;/*Es el limite de productos que me va a mostrar por pagina*/
		$total= $this->producto_model->contar($categoria);/*Me devuelve la cantidad de registros que tengo*/

		$dat = array('productos' => $this->producto_model->get_blancos($limit,$offset));

		/*Configuro la paginacion*/
		$config['base_url'] = base_url().'seccion_blancos';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 2; /*Es Donde va a colocar el dato de paginacion*/
		

		/*Estilos*/
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		/*Inicializo el paginador*/
		$this->pagination->initialize($config);

		$data['pag_links'] = $this->pagination->create_links();//Crea los links para mostrarme en la paginacion "< 123 >"
		

		$this->load->view('front/head_view', $data);
		$this->load->view('front/navbar_view1', $data);
		if ($session_data) 
		{
			$this->load->view('carrito/carritoparte_view' );
		}
		
		$this->load->view('carrito/blancos_view', $dat);
		$this->load->view('front/footer_view');
	}

	//Este funcion llama a la página de productos de la seccion climatizacion, con el carrito si está logueado
	public function seccion_rosados($offset='')
	{
		$mensaje= $this->session->flashdata('mensaje');
		$data = array('titulo' => 'Vinos Blancos',
						'mensaje' => $mensaje);
		$session_data = $this->session->userdata('logged_in');
		
		$categoria=3;//Es el nro de categoria de la seccion rosados
		
		$limit= 8;/*Es el limite de productos que me va a mostrar por pagina*/
		$total= $this->producto_model->contar($categoria);/*Me devuelve la cantidad de registros que tengo*/

		$dat = array('productos' => $this->producto_model->get_rosados($limit,$offset));

		/*Configuro la paginacion*/
		$config['base_url'] = base_url().'seccion_blancos';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 2; /*Es Donde va a colocar el dato de paginacion*/

		/*Estilos*/
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		/*Inicializo el paginador*/
		$this->pagination->initialize($config);

		$data['pag_links'] = $this->pagination->create_links();//Crea los links para mostrarme en la paginacion "< 123 >"

		$this->load->view('front/head_view', $data);
		$this->load->view('front/navbar_view1', $data);
		if ($session_data) 
		{
			$this->load->view('carrito/carritoparte_view' );
		}
		
		$this->load->view('carrito/rosados_view', $dat);
		$this->load->view('front/footer_view');
	}

		
	//Agrega elemento al carrito
	function add() 
	{
        // Genera array para insertar en el carrito
		$insert_data = array(//Array que ya trae la libreria
			'id' => $this->input->post('id'),//recibe los que esta en el formulario
			'name' => $this->input->post('nombre_producto'),
			'price' => $this->input->post('precio_venta'),
			'qty' => 1 //Cantidad/
			);	
		
		$id = $insert_data['id'];
		$cart_info =  $this->cart->contents();
		$cantidad_act = 0;
		foreach ($cart_info as $producto_carrito) {
			# code...
			if($producto_carrito['id'] == $id){
				$cantidad_act = $producto_carrito['qty'];
			}
		}

		$producto = $this->producto_model->get_un_producto2($id);
		
		foreach ($producto->result() as $row) 
		{
			$stock_actual = $row->stock;
				
		}
				// Inserta elemento al carrito
				if($cantidad_act + 1 > $stock_actual){
					$this->session->set_flashdata('mensaje', 'stock_error');
			 		// Redirige a la misma página que se encuentra
					header('Location: '.$_SERVER['HTTP_REFERER']);
				}
				else{
					$this->cart->insert($insert_data);
					$this->session->set_flashdata('mensaje', 'stock_ok');
					// Redirige a la misma página que se encuentra
					header('Location: '.$_SERVER['HTTP_REFERER']);
				}
	}


	
	//Elimina elemento del carrito o el carrito entero
	function remove($rowid) {
        //Si $rowid es "all" destruye el carrito
		if ($rowid=== "all")
		{
			$this->cart->destroy();
		}
		else //Sino destruye sola fila seleccionada
		{ 
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
				);
            // Actualiza los datos
			$this->cart->update($data);
		}
		
        // Redirige a la misma página que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	

	//Actualiza el carrito que se muestra
	function actualiza_carrito()
    {        
	    // Recibe los datos del carrito, calcula y actualiza
       	$cart_info =  $_POST['cart'];

		foreach( $cart_info as $id => $cart){
			
			$id = $cart['id'];
		    $rowid = $cart['rowid'];
	    	$price = $cart['price'];
	    	$amount = $price * $cart['qty'];
	    	$qty = $cart['qty'];
	    	$producto= $this->producto_model->get_un_producto2($id);


	    	foreach ($producto->result() as $row) 
			{
				
					$stock_actual = $row->stock;
				
			}

	    	if(($qty <= $stock_actual) && ($qty > 0)){//Si la cantidad del producto que se esta recorriendo es menor o igual a sus stock actual va a Actualizar y la cantidad tiene que ser mayor a 1
	    		$data = array(
				'rowid'   => $rowid,
	            'price'   => $price,
	            'amount' =>  $amount,
				'qty'     => $qty
				);

				$this->cart->update($data);//Actualiza el carrito
				$this->session->set_flashdata('mensaje', 'stock_ok');//Mensaje de que esta hay en stock
	    		header('Location: '.$_SERVER['HTTP_REFERER']);// Redirige a la misma página que se encuentra
	    		
	 
	    	}
	    	else{//Mensaje de que no hay en stock

	    		$this->session->set_flashdata('mensaje', 'stock_error');
	    		header('Location: '.$_SERVER['HTTP_REFERER']);// Redirige a la misma página que se encuentra
	    		
	    		
			}
		
	    	}	
	    	


	}
 

	//Muestra los detalles de la venta y confirma(función guarda_compra())
	function muestra_compra()
	{
		$data = array('titulo' => 'Confirmar compra');
		
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
		
		$this->load->view('front/head_view', $data);
		$this->load->view('front/navbar_view1', $data);
		$this->load->view('carrito/compra_view', $data);
		$this->load->view('front/footer_view');
    }
    

    //Guarda los datos de la venta en la base de datos    
    public function guarda_compra()
	{
		
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$total = $this->input->post('total_venta');

		
		$venta = array(
			'fecha' 		=> date('Y-m-d'),
			'usuario_id' 	=> $data['id'],
			'total_venta'	=> $total
		);	
		$venta_id = $this->carrito_model->insert_venta($venta);
		
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$venta_detalle = array(
					'venta_id' 		=> $venta_id,
					'producto_id' 	=> $item['id'],
					'cantidad' 		=> $item['qty'],
					'precio' 		=> $item['price'],
					'total' 		=> $item['subtotal']
					);	
            
            	$cust_id = $this->carrito_model->insert_venta_detalle($venta_detalle);

            	//Descuenta del stock y lo guarda en la base de datos
            	$producto = $this->producto_model->edit_producto($item['id']);
            	foreach ($producto->result() as $row) 
				{
					$stock = $row->stock;
				}

            	$stock_edit = $stock - 	$item['qty'];

            	$stock_nuevo = array(
            		'stock'	=> $stock_edit
            		);
            	
            	$modifica = $this->producto_model->update_producto($item['id'], $stock_nuevo);

			endforeach;
		endif;
		$this->session->set_flashdata('mensaje', 'compra_ok');
	  	$mensaje= $this->session->flashdata('mensaje');
	   	$data = array('titulo' => 'Compra Finalizada',
	   				  'mensaje' => $mensaje);

		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];

        $this->load->view('front/head_view', $data);
		$this->load->view('front/navbar_view1', $data);
		$this->load->view('carrito/compra_realizada_view');
		$this->load->view('front/footer_view');

		$final = $this->cart->destroy();

		

	 }

}