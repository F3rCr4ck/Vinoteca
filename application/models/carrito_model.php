﻿<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrito_model extends CI_Model {

	/*
    * Constructor de la clase
    */
    public function __construct() {
        parent::__construct();
    }
       
	public function insert_venta($data)
	{
		$this->db->insert('ventas_cabecera', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE; /*Si la variable esta definida o no*/
	}
	
	public function insert_venta_detalle($data)
	{
		$this->db->insert('ventas_detalles', $data);
	}

       
}