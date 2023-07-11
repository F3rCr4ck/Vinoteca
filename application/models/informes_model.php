<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Informes_model extends CI_Model{

	/* Constructor de la clase*/
    public function __construct() {
        parent::__construct();
    }

	function add_informe($informe){
		$this->db->insert('informes', $informe);
	}
	
	function get_informes()
    {
        $this->db->select('*');
        $this->db->from('informes');
        $this->db->join('usuarios','informes.id_usuario = usuarios.id_usuario');
        $query = $this->db->get();
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }    

    }


        function get_informes_anonimos()
    {
        $this->db->select('*');
        $info= $this->db->from('informes');
        $query = $this->db->get();
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }    
    
    }



} 