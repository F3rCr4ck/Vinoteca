<?php 

	class Informes_controller extends CI_Controller{
		
		function __construct() 
		{
			parent::__construct();
			$this ->load->model('informes_model');
		}
		
		function form_nuevo_informe()
		{
			$data = array('titulo' => 'Contacto');
			$data['titulo'] = 'Contacto';
			$session_data = $this->session->userdata('logged_in');

			$this->load->view('front/head_view', $data);
			$this->load->view('front/navbar_view1');
			$this->load->view('partes/Contacto', $session_data);	
			$this->load->view('front/footer_view');
		}

 

		function agregar_informe()
		{
			$session_data = $this->session->userdata('logged_in');

			//Genero las reglas de validacion
			$this->form_validation->set_rules('descripcion', 'descripcion', 'required');
			

			//Preparo los datos para guardar en la base, en caso de que pase la validacion
			$informe = array(
				
				'id_usuario' 	=> $session_data['id'],
				'fecha' 		=> date('Y-m-d'),
				'descripcion'=>$this->input->post('descripcion',true)
				
			);

			 
			//Si no pasa la validacion de datos
			if ($this->form_validation->run() == FALSE)
			{
				//Muestra la página de registro con el título de error
				$data = array('titulo' => 'Error de formulario');
				$this->load->view('front/head_view', $data);
				$this->load->view('front/navbar_view1');
				$this->load->view('partes/Contacto', $session_data);
				$this->load->view('front/footer_view');		
			}
			
			else 	//Pasa la validacion
			{
				//Envio array al metodo insert para registro de datos
				$informes = $this->informes_model->add_informe($informe);

				//Redirecciono a la pagina de perfil
				redirect('principal');
				return true;
			}	
		}

		function agregar_informe_anonimo()
		{
			$session_data = $this->session->userdata('logged_in');

			//Genero las reglas de validacion
			$this->form_validation->set_rules('descripcion', 'descripcion', 'required');
			

			//Preparo los datos para guardar en la base, en caso de que pase la validacion
			$informe = array(
				
				'id_usuario' 	=> 0,
				'nombre'        =>$this->input->post('nombre',true),
				'apellido'		=>$this->input->post('apellido',true),
				'email'			=>$this->input->post('email',true),
				'fecha' 		=> date('Y-m-d'),
				'descripcion'=>$this->input->post('descripcion',true)
				
			);

			 
			//Si no pasa la validacion de datos
			if ($this->form_validation->run() == FALSE)
			{
				//Muestra la página de registro con el título de error
				$data = array('titulo' => 'Error de formulario');
				$this->load->view('front/head_view', $data);
				$this->load->view('front/navbar_view1');
				$this->load->view('partes/Contacto', $session_data);
				$this->load->view('front/footer_view');		
			}
			
			else 	//Pasa la validacion
			{
				//Envio array al metodo insert para registro de datos
				$informes = $this->informes_model->add_informe($informe);

				//Redirecciono a la pagina de perfil
				redirect('principal');
				return true;
			}	
		}



		function listar_informes()
	    { 
             
			$data = array('titulo' => 'Informes');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];


			$dat = array('informes' => $this->informes_model->get_informes());

			$this->load->view('front/head_view',$data);
			$this->load->view('front/navbar_view1',$data);
			$this->load->view('informes/muestra_informes',$dat);
			$this->load->view('front/footer_view');
          }



        		function listar_informes_anonimos()
	    { 
             
			$data = array('titulo' => 'Informes');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];


			$dat = array('informes' => $this->informes_model->get_informes_anonimos());

			$this->load->view('front/head_view',$data);
			$this->load->view('front/navbar_view1',$data);
			$this->load->view('informes/muestra_informes_anonimos',$dat);
			$this->load->view('front/footer_view');
          }
         

		
	}
/* End of file 
*/