<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Busqueda_model extends CI_Model {

	/*
    * Constructor de la clase
    */
    public function __construct() {
        parent::__construct();
    }

//
public function busqueda($query){//$Query es la cadena que le paso por parametro
		$this->db->Like('nombre_producto', $query);//Me va a devolver todo aquello que tengo una parte de la cadena

		$query= $this->db->get_where('productos', array('eliminado' => 'NO'));//En la tabla productos que no esten eliminados

		if($query->num_rows()>0){//Si tiene al menos un resultado
			return $query;
		}
		else{
			return FALSE;
		}
}
	

}