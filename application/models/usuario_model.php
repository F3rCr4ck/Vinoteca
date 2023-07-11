<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Usuario_model extends CI_Model{

	/* Constructor de la clase*/
    public function __construct() {
        parent::__construct();
    }

		
	function get_usuarios($limit,$offset){
		//$this->db->select('id, nombre, apellido, username');
		$this->db->limit($limit,$offset);
		$query = $this->db->get_where('usuarios', array('perfil_id' => 2));

		if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
	}
	
	  function contar()
    {   /**/
        
        $query = $this->db->get_where('usuarios', array('perfil_id' => 2));
        
        return $query->num_rows();/*Me devuelve la cantidad de usuarios en mi BDD*/
    
    }

	function add_user($data){//Funcion para agregar usuario nuevo
		$this->db->insert('usuarios', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	function add_user_modif($data){//Funcion para agregar un usuario que modif
		$this->db->set('usuarios', $data);/*Cambie Set por insert para guardar*/
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function edit_usuario($id){
		$query = $this->db->get_where('usuarios', array('id_usuario' => $id),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
	}
	
	function update_usuario($id, $data){
		$this->db->where('id_usuario', $id);
        $query = $this->db->update('usuarios', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	function delete_usuario($id){			
		$this->db->where('id_usuario', $id);
		$query = $this->db->delete('usuarios'); 
		return true;	
	}
} 