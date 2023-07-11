<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class  Busqueda_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('carrito_model');
		$this->load->model('producto_model');
		$this->load->model('busqueda_model');
        $this->load->library('cart');
	}
//
	public function busqueda_productos(){
		$dat= array();
		$query = $this->input->get('query',TRUE);//Extraigo la informacion del formulario
		//Le mandamos al modelo para que me devuelva la informacion
		if($query){//Si tiene informacion retorna los registros sino Retorna el arreglo vacio
			$result= $this->busqueda_model->busqueda(trim($query));
			if($result != FALSE){//Si tenemos resultado
				$dat = array('result'=> $result);//Creo un array que va a contener lo que acabamos de obtener $result
			}else{
				$dat= array('result' => '');
			}

		}

		//Pasamos el dat en la vista de buscar
		$data = array('titulo' => 'Todos los productos');
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		
		$this->load->view('front/head_view', $data);
		$this->load->view('front/navbar_view1');
		if ($session_data) 
		{
			$this->load->view('carrito/carritoparte_view');
		}
		
		$this->load->view('Productos/buscar', $dat);//Vista de Buscar
		$this->load->view('front/footer_view');
		

	}
}
