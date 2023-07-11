<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

		public function __construct()
	{
		parent::__construct();

		$this->load->model('carrito_model');
		$this->load->model('producto_model');
        $this->load->library('cart');
	}


	public function index()
	{
		$data = array('titulo' => 'Catadores');

		$this->load->view('front/head_view',$data);
		$this->load->view('front/navbar_view1');
		$this->load->view('partes/principal');
		$this->load->view('front/footer_view');
	}


	public function NuestraVinoteca()
	{
		$data = array('titulo' => 'NuestraVinoteca');

		$this->load->view('front/head_view',$data);
		$this->load->view('front/navbar_view1');
		$this->load->view('partes/NuestraVinoteca');
		$this->load->view('front/footer_view');
	}


		public function Registrarse()
	{
		$data = array('titulo' => 'Registrarse');

		$this->load->view('front/head_view',$data);
		$this->load->view('front/navbar_view1');
		$this->load->view('partes/Registrarse');
		$this->load->view('front/footer_view');
	}



		public function IniciarSesion()
	{
		$mensaje = $this->session->flashdata('mensaje');
		$data = array('titulo' => 'Iniciar Sesion',
					  'mensaje'=> $mensaje);

		$this->load->view('front/head_view',$data);
		$this->load->view('front/navbar_view1');
		$this->load->view('partes/IniciarSesion');
		$this->load->view('front/footer_view');
	}

		public function Catalogo($offset='')
	{	

			$data = array('titulo' => 'Catalogo');

			$limit= 8;/*Es el limite de productos que me va a mostrar por pagina*/
			$total= $this->producto_model->contar();/*Me devuelve la cantidad de registros que tengo*/

			$dat = array('productos' => $this->producto_model->get_productos($limit,$offset) );

			/*Configuro la paginacion*/
			$config['base_url'] = base_url().'Catalogo_invitado';
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
			$this->load->view('front/navbar_view1');
			$this->load->view('partes/Invitado_catalogo',$dat);
			$this->load->view('front/footer_view');
	}

}
