<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Producto_controller extends CI_Controller{
		
		function __construct() 
		{
			parent::__construct();
			$this ->load->model('producto_model');
			$this ->load->library('pagination');
		}

		private function _veri_log()
    	{
	    	if ($this->session->userdata('logged_in')) 
	    	{
	    		return TRUE;
	    	} else {
	    		return FALSE;
	    	}
    	}
		
		/**
	    * Muestra todos los productos en tabla
	    */
		function index($offset= '')
		{
			if($this->_veri_log()){
		

			$data = array('titulo' => 'Productos');
			
			$session_data = $this->session->userdata('logged_in');
			$mensaje = $this->session->flashdata('mensaje');
			
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$limit= 6;/*Es el limite de productos que me va a mostrar por pagina*/
			$total= $this->producto_model->contar();/*Me devuelve la cantidad de registros que tengo*/

			$dat = array('productos' => $this->producto_model->get_productos($limit,$offset),
						 'mensaje' => $mensaje);

			/*Configuro la paginacion*/
			$config['base_url'] = base_url().'MostrarProductos';
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
			$this->load->view('Productos/Muestra_productos', $dat);
			$this->load->view('front/footer_view');
			}else{
			redirect('IniciarSesion', 'refresh'); }
		}

	    /**
	    * Muestra todos los Vinos Tinto en tabla
	    */
		function muestra_vinos_tinto($offset= '')
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'Vinos Tintos');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$limit= 6;/*Es el limite de productos que me va a mostrar por pagina*/
			$total= $this->producto_model->contar(1);/*Me devuelve la cantidad de registros que tengo*/

			$dat = array('productos' => $this->producto_model->get_tintos($limit,$offset) );

			/*Configuro la paginacion*/
			$config['base_url'] = base_url().'MostrarProductos';
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
			$this->load->view('Productos/Muestra_vinos_tinto', $dat);
			$this->load->view('front/footer_view');
			}else{
			redirect('IniciarSesion', 'refresh'); }
		}
		/**
	    * Muestra todos los vinos blancos en tabla
	    */
		function muestra_vinos_blanco($offset= '')
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'Vinos Blancos');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$limit= 6;/*Es el limite de productos que me va a mostrar por pagina*/
			$total= $this->producto_model->contar(2);/*Me devuelve la cantidad de registros que tengo*/

			$dat = array('productos' => $this->producto_model->get_blancos($limit,$offset) );

			/*Configuro la paginacion*/
			$config['base_url'] = base_url().'MostrarProductos';
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
			$this->load->view('Productos/Muestra_vinos_blanco', $dat);
			$this->load->view('front/footer_view');
			}else{
			redirect('IniciarSesion', 'refresh'); }
		}


		function muestra_vinos_rosado($offset= '')
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'Vinos Rosados');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$limit= 6;/*Es el limite de productos que me va a mostrar por pagina*/
			$total= $this->producto_model->contar(3);/*Me devuelve la cantidad de registros que tengo*/

			$dat = array('productos' => $this->producto_model->get_rosados($limit,$offset) );

			/*Configuro la paginacion*/
			$config['base_url'] = base_url().'MostrarProductos';
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
			$this->load->view('Productos/Muestra_vinos_rosado', $dat);
			$this->load->view('front/footer_view');
			}else{
			redirect('IniciarSesion', 'refresh'); }
		}



		function informacion_producto()
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'Informatica');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];


			$this->load->view('front/head_view', $data);
			$this->load->view('front/navbar_view', $data);
			$this->load->view('producto/Muestra_informatica', $dat);
			$this->load->view('front/footer_view');
			}else{
			redirect('LoginVista', 'refresh'); }
		}
		
		/**
	    * Muestra formulario para agregar producto
	    */
		function form_agrega_producto()  	//Si se modifica, modificar (agrega_producto) tambien
		{
			if($this->_veri_log()){
			$mensaje= $this->session->flashdata('mensaje');
			$data = array('titulo' => 'Agregar Producto',
						  'mensaje'=> $mensaje);
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('front/head_view', $data);
			$this->load->view('front/navbar_view1');
			$this->load->view('Productos/Agregar_producto');
			$this->load->view('front/footer_view');
			}else{
			redirect('IniciarSesion', 'refresh'); }
		}

		/**
	    * Verifica datos ingresados en el formulario para agregar producto
	    */
		function agrega_producto()
		{
			//Genero las reglas de validacion
			$this->form_validation->set_rules('nombre_producto', 'Nombre', 'required|is_unique[productos.nombre_producto]');
			$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
			$this->form_validation->set_rules('id_categoria', 'Categoria', 'required');
			$this->form_validation->set_rules('imagen', 'Imagen', 'required|callback__image_upload');
			$this->form_validation->set_rules('precio_costo', 'Precio Costo', 'required|numeric');
			$this->form_validation->set_rules('precio_venta', 'Precio Venta', 'required|numeric');
			$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
			$this->form_validation->set_rules('stock_min', 'Stock Minimo', 'required|numeric');
			

			//Mensaje de error si no pasan las reglas
			$this->form_validation->set_message('required',
										'<div class="alert alert-danger">El campo %s es obligatorio</div>');

			$this->form_validation->set_message('is_unique',
										'<div class="alert alert-danger">El campo %s ya existe</div>');

			$this->form_validation->set_message('numeric',
							'<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>');


			if (!$this->form_validation->run())
			{	

				$mensaje= $this->session->flashdata('mensaje');

				$data = array('titulo' => 'Error de formulario');
				$dat = array('mensaje' => $mensaje);
				
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];


				$this->load->view('front/head_view', $data);
				$this->load->view('front/navbar_view1');
				$this->load->view('Productos/Agregar_producto');
				$this->load->view('front/footer_view',$dat);
			}
			else
			{
				$this->_image_upload();			
			}
		}
		
		/**
		* Obtiene los datos del archivo imagen.
		* Permite archivos gif, jpg, png
		* Verifica si los datos son correcto en conjunto con la imagen y lo inserta en la tabla correspondiente
		* En la tabla guarda la URL de donde se encuentra la imagen.
		*/
		function _image_upload()
		{
			$this->load->library('upload');
	 
            //Comprueba si hay un archivo cargado
            if (!empty($_FILES['filename']['name']))
            {
                // Especifica la configuración para el archivo
                $config['upload_path'] = 'assets/img/Productos/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';

                $config['max_size'] = '5000';
                $config['max_width']  = '2000';
                $config['max_height']  = '2000';       
 
                // Inicializa la configuración para el archivo 
                $this->upload->initialize($config);
 
                if ($this->upload->do_upload('filename'))
                {
                	// Mueve archivo a la carpeta indicada en la variable $data
                    $data = $this->upload->data();

                    // Path donde guarda el archivo..
                    $url ="assets/img/Productos/".$_FILES['filename']['name'];

                    // Array de datos para insertar en productos
                    $data = array(
						'nombre_producto'=>$this->input->post('nombre_producto',true),
						'descripcion'=>$this->input->post('descripcion',true),
						'id_categoria'=>$this->input->post('id_categoria',true),
						'imagen'=>$url,
						'precio_costo'=>$this->input->post('precio_costo',true),
						'precio_venta'=>$this->input->post('precio_venta',true),
						'stock'=>$this->input->post('stock',true),
						'stock_min'=>$this->input->post('stock_min',true),
						'eliminado'=>'NO',
					);

					$productos = $this->producto_model->add_producto($data);

	    		    $this->session->set_flashdata('mensaje', 'add_ok');
	    		    redirect('MostrarProductos','refresh');

                }

            }
            else
            {	
            	$this->session->set_flashdata('mensaje', 'add_error');
            	redirect('verifico_nuevo_producto');		        	
            }
		}

		/**
	    * Muestra para modificar un producto
	    */
		function muestra_modificar()
		{
			$id = $this->uri->segment(2);
			$datos_producto = $this->producto_model->edit_producto($id);

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

				$dat = array('productos' =>$datos_producto,
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
			if($this->_veri_log()){

			$mensaje = $this->session->flashdata('mensaje');
			$data = array('titulo' => 'Modificar Producto',
						  'mensaje' => $mensaje);
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('front/head_view', $data);
			$this->load->view('front/navbar_view1');
			$this->load->view('Productos/Modificar_producto', $dat);
			$this->load->view('front/footer_view');
			}else{
			redirect('IniciarSesion', 'refresh');}
		}

		/**
	    * Verifica datos para modificar un producto
	    */
		function modificar_producto()
		{
			//Validación del formulario
			$this->form_validation->set_rules('nombre_producto', 'Nombre', 'required');
			$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
			$this->form_validation->set_rules('id_categoria', 'Categoria', 'required');
			$this->form_validation->set_rules('precio_costo', 'Precio Costo', 'required|numeric');
			$this->form_validation->set_rules('precio_venta', 'Precio Venta', 'required|numeric');
			$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
			$this->form_validation->set_rules('stock_min', 'Stock Minimo', 'required|numeric');
			

			//Mensaje del form_validation
			$this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio, al intentar modificar estaba vacio</div>');

			$this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico, al intentar modificar estaba vacio</div>'); 

			$id = $this->uri->segment(2);
			$datos_producto = $this->producto_model->edit_producto($id);

			foreach ($datos_producto->result() as $row) 
			{
				$imagen = $row->imagen;
			}

			$dat = array(
				'id_producto'=>$id,
				'nombre_producto'=>$this->input->post('nombre_producto',true),
				'descripcion'=>$this->input->post('descripcion',true),
				'id_categoria'=>$this->input->post('id_categoria',true),
				'imagen'=>$imagen,
				'precio_costo'=>$this->input->post('precio_costo',true),
				'precio_venta'=>$this->input->post('precio_venta',true),
				'stock'=>$this->input->post('stock',true),
				'stock_min'=>$this->input->post('stock_min',true)
			);

			if ($this->form_validation->run()==FALSE)
			{
				$mensaje = $this->session->flashdata('mensaje');
				$data = array('titulo' => 'Error de Formulario',
						  	  'mensaje' => $mensaje);

				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$this->load->view('front/head_view', $data);
				$this->load->view('front/navbar_view1');
				$this->load->view('Productos/Modificar_producto', $dat);
				$this->load->view('front/footer_view');
			}
			else
			{
				$this->_image_modif();		
			}
			
		}

		/**
		* Obtiene los datos del archivo imagen.
		* Permite archivos gif, jpg, png
		* Verifica si los datos son correcto en conjunto con la imagen y lo inserta en la tabla correspondiente
		* Si el campo imagen se encuentra vacio asume que la imagen no fue moficado.
		* En la tabla guarda la URL de donde se encuentra la imagen.
		*/
		
	    function _image_modif()
	    {
			//Cargo la libreria para subir archivos
	    	$this->load->library('upload');

			// Obtengo el id del 
	    	$id = $this->uri->segment(2);
	    	$mensaje = $this->session->flashdata('mensaje');
	        // Array de datos para obtener datos de libros sin la imagen 
	    	$dat = array(
				'id_producto'=>$id,
				'nombre_producto'=>$this->input->post('nombre_producto',true),
				'descripcion'=>$this->input->post('descripcion',true),
				'id_categoria'=>$this->input->post('id_categoria',true),
				'precio_costo'=>$this->input->post('precio_costo',true),
				'precio_venta'=>$this->input->post('precio_venta',true),
				'stock'=>$this->input->post('stock',true),
				'stock_min'=>$this->input->post('stock_min',true)
			);

			// Si la iamgen esta vacia se asume que no se modifica
	    	if (!empty($_FILES['filename']['name']))
	    	{            
	            // Especifica la configuración para el archivo
	    		$config['upload_path'] = 'assets/img/Productos/';//Este era el problema "Tiene que coincidir con url"
	    		$config['allowed_types'] = 'gif|jpg|jpeg|png';

	    		$config['max_size'] = '5000';//kb es igual a 40mb
	    		$config['max_width']  = '2000';
	    		$config['max_height']  = '2000';       

	            // Inicializa la configuración para el archivo 
	    		$this->upload->initialize($config);

	    		if ($this->upload->do_upload('filename'))
	    		{
	                	// Mueve archivo a la carpeta indicada en la variable $data
	    			$data = array('upload_data' => $this->upload->data());//modifique esto

	                    // Path donde guarda el archivo..
	    			$url ="assets/img/Productos/".$_FILES['filename']['name'];

	                 	// Agrego la imagen si se modifico.  
	    			$dat['imagen']=$url;

						// Actualiza datos del libro
	    			$respuesta= $this->producto_model->update_producto($id, $dat);

	    		     	if ($respuesta == TRUE) {
	    		     		
	    		     		$this->session->set_flashdata('mensaje', 'modif_ok');
	    		     		redirect('MostrarProductos','refresh');
							
						}
	    			
	    		}
	    		else
	    		{
	                	//Mensaje de error si no existe imagen correcta
	    			$this->session->set_flashdata('mensaje', 'modif_error');//Creo una session flash
	    		    redirect('Modificar_producto/'.$id, 'refresh');


	    		    $imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';
	    			$this->form_validation->set_message('_image_modif',$imageerrors);

	    		} 
	    	}
	    	else
	    	{
	    			$respuesta= $this->producto_model->update_producto($id, $dat);

	    		     	if ($respuesta == TRUE) {
	    		     		
	    		     		$this->session->set_flashdata('mensaje', 'modif_ok');//Capturo respuesta
	    		     		redirect('MostrarProductos','refresh');
							
						}
	    	}
	    }


	    /**
		* Obtiene los datos del producto a eliminar
		*/
	    function eliminar_producto(){
	    	$id = $this->uri->segment(2); 
	    	$data = array(
	    		'eliminado'=>'SI'
	    	);

	    	$this->producto_model->estado_producto($id, $data);
	    	$this->session->set_flashdata('mensaje', 'delet_ok');
	    	redirect('ProductosEliminados', 'refresh');
	    }

	    /**
		* Obtiene los datos del producto a activar
		*/
	    function activar_producto(){
	    	$id = $this->uri->segment(2);
	    	$data = array(
	    		'eliminado'=>'NO'
	    	);

	    	$this->producto_model->estado_producto($id, $data);
	    	$this->session->set_flashdata('mensaje', 'act_ok');
	    	redirect('MostrarProductos', 'refresh');
	    }

	    /**
		* Productos eliminados logicamente
		*/
	    function muestra_eliminados()
	    {    	
	    	if($this->_veri_log()){

	    	$mensaje = $this->session->flashdata('mensaje');

	    	$data = array('titulo' => 'Productos eliminados',
	    				  'mensaje' => $mensaje);
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			
			$dat = array(
		        'productos' => $this->producto_model->not_active_productos()
			);

			$this->load->view('front/head_view', $data);
			$this->load->view('front/navbar_view1');
			$this->load->view('Productos/Muestra_eliminados', $dat);
			$this->load->view('front/footer_view');
			}else{
			redirect('IniciarSesion', 'refresh');}
		}
 
		function listar_ventas($offset='')
	    { 
             if($this->_veri_log()){
             	$mensaje = $this->session->flashdata('mensaje');
			$data = array('titulo' => 'Ventas',
						'mensaje' => $mensaje);
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$limit= 8;/*Es el limite de productos que me va a mostrar por pagina*/
			$total= $this->producto_model->contar_vent();/*Me devuelve la cantidad de registros que tengo*/

			$dat = array('ventas_cabecera' => $this->producto_model->get_ventas_cabecera($limit,$offset));

			/*Configuro la paginacion*/
			$config['base_url'] = base_url().'Muestra_ventas';
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

			$this->load->view('front/head_view',$data);
			$this->load->view('front/navbar_view1',$data);
			$this->load->view('ventas/muestra_ventas',$dat);
			$this->load->view('front/footer_view');
            }else{
			redirect('IniciarSesion', 'refresh');
            }
         }
        
        
        function muestra_detalle($id)
		{
             if($this->_veri_log()){
			$data = array('titulo' => 'Detalle');
		
				$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
                 
			$dat = array('ventas_detalle' => $this->producto_model->get_ventas_detalle($id));

			$this->load->view('front/head_view', $data);
			$this->load->view('front/navbar_view1', $data);
			$this->load->view('ventas/muestra_detalle', $dat);
			$this->load->view('front/footer_view');
            }else{
			redirect('IniciarSesion', 'refresh');
            }
        }

        function listar_compras()
	    { 
             if($this->_veri_log()){
			$data = array('titulo' => 'Compras');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];


			$dat = array('ventas_cabecera' => $this->producto_model->get_mis_compras());

			$this->load->view('front/head_view',$data);
			$this->load->view('front/navbar_view1',$data);
			$this->load->view('ventas/compras_usuario',$dat);
			$this->load->view('front/footer_view');
            }else{
			redirect('IniciarSesion', 'refresh');
            }
         }
	    

		
		
		
	}
/* End of file
*/