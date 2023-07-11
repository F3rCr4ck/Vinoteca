<?php 

	class Usuario_controller extends CI_Controller{
		
		function __construct() 
		{
			parent::__construct();
			$this ->load->model('usuario_model');

		}
		
		/* */ 
		function index()
		{
			//Genero las reglas de validacion
			//$this->form_validation->set_rules('nombre_campo', 'Nombre leible', reglas=array());
			//Las reglas se separan por "|"
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('apellido', 'Apellido', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuarios.email]', array('valid_email' => '
<div class="alert alert-danger">El campo Correo electrónico debe contener una dirección de correo electrónico válida</div>'));
			/*$this->form_validation->set_rules('username', 'Usuario', 
											'trim|required|xss_clean|is_unique[usuarios.username]');*/
			$this->form_validation->set_rules('usuario', 'Usuario', 
											'trim|required|is_unique[usuarios.usuario]');
			//$this->form_validation->set_rules('password', 'Contraseña','required|xss_clean');
			$this->form_validation->set_rules('pass', 'Contraseña','required');

			$this->form_validation->set_rules('re_password', 'Repetir contraseña', 'required|matches[pass]');

			//Mensaje de error si no pasan las reglas
			$this->form_validation->set_message('required',
										'<div class="alert alert-danger">El campo %s es obligatorio</div>');

			$this->form_validation->set_message('matches',
										'<div class="alert alert-danger">Las contraseña ingresada no coinciden</div>');

			$this->form_validation->set_message('is_unique',
										'<div class="alert alert-danger">El campo %s ya existe</div>');

			$pass = $this->input->post('re_password',true);

			//Preparo los datos para guardar en la base, en caso de que pase la validacion
			$data = array(
				'nombre'=>$this->input->post('nombre',true),
				'apellido'=>$this->input->post('apellido',true),
				'email'=>$this->input->post('email',true),
				'usuario'=>$this->input->post('usuario',true),
				'pass'=>($pass),
				'perfil_id'=>'2'
				
			);

			//Si no pasa la validacion de datos
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('mensaje', 'user_error');
				$mensaje = 'user_error';
				//Muestra la página de registro con el título de error
				$data = array('titulo' => 'Error de formulario',
							  'mensaje' => $mensaje);

				$this->load->view('front/head_view',$data);
				$this->load->view('front/navbar_view1');
				$this->load->view('partes/Registrarse');
				$this->load->view('front/footer_view');
				
				
			}
			
			else 	//Pasa la validacion
			{
				//Envio array al metodo insert para registro de datos
				$usuario = $this->usuario_model->add_user($data);
				
				//Redirecciono a la pagina Iniciar Sesion

				$this->session->set_flashdata('mensaje', 'user_ok');
				redirect('IniciarSesion');
				

			}	
		}
		

		function listar_usuarios($offset='')
	    { 
         
			$data = array('titulo' => 'Lista de Usuarios');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];


			$limit= 8;/*Es el limite de productos que me va a mostrar por pagina*/
			$total= $this->usuario_model->contar();/*Me devuelve la cantidad de registros que tengo*/

			$dat = array('usuarios' => $this->usuario_model->get_usuarios($limit,$offset));

			/*Configuro la paginacion*/
			$config['base_url'] = base_url().'Mostrar_usuarios';
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
			$this->load->view('usuarios/mostrar_usuarios',$dat);
			$this->load->view('front/footer_view');
           
         }



         function muestra_modificar_usuario()
		{
			//$id = 5;
			/*Le permite recuperar un segmento específico. Donde n es el número de segmento que desea recuperar. Los segmentos están numerados de izquierda a derecha
			la función devuelve FALSE (booleano) si el segmento no existe.
			ej: https://localhost/Vinoteca_1eraParte/modificar_usuario/11
			segment(1)=modificar_usuario segment(2)=11 segment(3)=Null	
			*/
			$id = $this->uri->segment(2);/*Capturo el id del usuario*/
			//var_dump($id); exit();
			$datos_usuario = $this->usuario_model->edit_usuario($id);
			//var_dump($id); exit;
			if ($datos_usuario != FALSE) {
				foreach ($datos_usuario->result() as $row) 
				{
					$id_usuario = $row->id_usuario;
					$nombre_usuario = $row->nombre;
					$apellido_usuario = $row->apellido;
					$email = $row->email;
					$usuario = $row->usuario;
					$pass = $row->pass;
					$perfil_id = $row->perfil_id;
					$baja = $row->baja;	
				}
					
				$dat = array('usuarios' =>$datos_usuario,
					'id_usuario'=>$id_usuario,
					'nombre_usuario'=>$nombre_usuario,
					'apellido_usuario'=>$apellido_usuario,
					'email'=>$email,
					'usuario'=>$usuario,
					'pass'=>$pass,
					'perfil_id'=>$perfil_id,
					'baja'=>$baja);

			} 
			else 
			{
				return FALSE;
			}
			

			$data = array('titulo' => 'Modificar Usuario');
			$session_data = $this->session->userdata('logged_in');

			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('front/head_view', $data);
			$this->load->view('front/navbar_view1');
			$this->load->view('usuarios/modificar_usuario', $dat);
			$this->load->view('front/footer_view');
			
		}

         function modificar_usuario($id_usuario)
		{
			$session_data = $this->session->userdata('logged_in');

			$data_session['perfil_id'] = $session_data['perfil_id'];
			$data_session['nombre'] = $session_data['nombre'];

			//Validación del formulario $this->form_validation->set_rules('1', '2', '3');
			//1.El nombre del campo: el nombre exacto que le ha dado al campo del formulario.
			//2.Un nombre "humano" para este campo, que se insertará en el mensaje de error
			//3.Las reglas de validación para este campo de formulario.
			$this->form_validation->set_rules('nombre_usuario', 'nombre_usuario', 'required');
			$this->form_validation->set_rules('apellido_usuario', 'apellido_usuario', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('usuario', 'usuario', 'required');
			$this->form_validation->set_rules('pass', 'pass', 'required');
			$this->form_validation->set_rules('perfil_id', 'perfil_id', 'required|numeric');
			$this->form_validation->set_rules('baja', 'baja', 'required');
			

			//Mensaje del form_validation
			$this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio, al intentar modificar estaba vacio</div>');

			$this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico, al intentar modificar estaba vacio</div>'); 
		
		
			$usuario = array(
				//Armo mi arrary columnaBD => $variable_formulario
				'id_usuario'=>$id_usuario,
				'nombre'=>$this->input->post('nombre_usuario',true),
				'apellido'=>$this->input->post('apellido_usuario',true),
				'email'=>$this->input->post('email',true),
				'usuario'=>$this->input->post('usuario',true),
				'pass'=>$this->input->post('pass',true),
				'perfil_id'=>$this->input->post('perfil_id',true),
				'baja'=>$this->input->post('baja',true)
			);
			
			if($data_session['perfil_id'] == 2){//Si el perfil no es admin muestra Catalogo

			$datos_usuario = $this->usuario_model->update_usuario($id_usuario, $usuario);

			if ($this->form_validation->run()==FALSE){
			
				$data = array('titulo' => 'Error de formulario');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				
				
				$this->load->view('front/head_view', $data);
				$this->load->view('front/navbar_view1');
				$this->load->view('usuarios/modificar_usuario', $datos_usuario);
				$this->load->view('front/footer_view');

			}

			else{
				
					$usuario = $this->usuario_model->add_user_modif($datos_usuario);
					$this->session->set_flashdata('mensaje', 'modifuser_ok');
					redirect('catalogo','refresh');
				}

			}else if($data_session['perfil_id'] == 1){//Si es administrador redirige a Ventas(INICIO)

			$datos_usuario = $this->usuario_model->update_usuario($id_usuario, $usuario);

			if ($this->form_validation->run()==FALSE){

				$data = array('titulo' => 'Error de formulario');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$this->load->view('front/head_view', $data);
				$this->load->view('front/navbar_view1');
				$this->load->view('usuarios/modificar_usuario', $datos_usuario);
				$this->load->view('front/footer_view');
			}

			else{

				$usuario = $this->usuario_model->add_user_modif($datos_usuario);
				$this->session->set_flashdata('mensaje', 'modifuser_ok');
				redirect('Muestra_ventas', 'refresh');
				}

			}else{

				
				redirect('principal', 'refresh');
			}
			}


		 function eliminar_usuario(){

	    	$id = $this->uri->segment(2); 

	    	$this->usuario_model->delete_usuario($id);
	    	redirect('Mostrar_usuarios', 'refresh');
	    }




}
