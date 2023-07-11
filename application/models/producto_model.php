<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Producto_model extends CI_Model{
		
	/**
    * Constructor de la clase
    */
    public function __construct() {
        parent::__construct();
    }

    /**
    * Retorna todos los productos
    *Obtengo la lista de productos limitados a la cantidad de $Limit
    */
    function get_productos($limit,$offset)
    {
        
        $this->db->limit($limit,$offset);
        $query = $this->db->get_where('productos', array('eliminado' => 'NO'));

        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }            
    }


        function contar($tipo='')
    {   /**/
        if(!empty ($tipo)){
        $query = $this->db->get_where('productos', array('eliminado' => 'NO', 'id_categoria' => $tipo));
        }else
        {$query = $this->db->get_where('productos', array('eliminado' => 'NO'));}

        return $query->num_rows();/*Me devuelve la cantidad de productos en mi BDD*/
    }

        function contar_vent()
    {   /**/
        
        $this->db->select('*');
        $this->db->from('ventas_cabecera');
        $this->db->join('usuarios','ventas_cabecera.usuario_id = usuarios.id_usuario');
        $query = $this->db->get();
        
        if($query->num_rows()>0) {
            return $query->num_rows();;
        } else {
            return FALSE;
        }    
    }

    /**
    * Retorna todos los vinos tintos
    */
    function get_tintos($limit,$offset)
    {   
        $this->db->limit($limit,$offset);
        $query = $this->db->get_where('productos', array('eliminado' => 'NO', 'id_categoria' => '1'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }


    /**
    * Retorna todos los vinos blancos
    */
    function get_blancos($limit,$offset)
    {
        $this->db->limit($limit,$offset);
        $query = $this->db->get_where('productos', array('eliminado' => 'NO', 'id_categoria' => '2'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }


    /**
    * Retorna todos los vinos 
    */
    function get_rosados($limit,$offset)
    {   
        $this->db->limit($limit,$offset);
        $query = $this->db->get_where('productos', array('eliminado' => 'NO', 'id_categoria' => '3'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    function get_un_producto()
    {
        $query = $this->db->get_where('productos', array('eliminado' => 'NO',));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    function get_un_producto2($id)
    {
        $query = $this->db->get_where('productos', array('id_producto' => $id),1);
        
        if($query->num_rows()==1) {
            return $query;
        } else {
            return FALSE;
        }        
    }


    function get_ventas_cabecera($limit,$offset)
    {
        $this->db->limit($limit,$offset);
        $this->db->select('*');
        $this->db->from('ventas_cabecera');
        $this->db->join('usuarios','ventas_cabecera.usuario_id = usuarios.id_usuario');
        $query = $this->db->get();
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }    

    }

    function get_ventas_detalle($id)
    {
        
        $this->db->join('productos','ventas_detalles.producto_id = productos.id_producto');
        $query = $this->db->get_where('ventas_detalles', array('venta_id' => $id));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }  
    }

    function get_mis_compras()
    {
        $session_data = $this->session->userdata('logged_in');
        $id = $session_data['id'];

        $query = $this->db->get_where('ventas_cabecera', array('usuario_id' => $id));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }    

    }


    /**
    * Inserta un producto
    */
    public function add_producto($data){
        $this->db->insert('productos', $data);
    }

    /**
    * Retorna todos los datos de un producto
    */
    function edit_producto($id){

        $query = $this->db->get_where('productos', array('id_producto' => $id),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /**
    * Actualiza los datos de un producto
    */
    function update_producto($id, $dat){
        $this->db->where('id_producto', $id);
        $query = $this->db->update('productos', $dat);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
    * Eliminación y activación logica de un producto
    */
    function estado_producto($id, $data){
        $this->db->where('id_producto', $id);
        $query = $this->db->update('productos', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
    * Retorna todos los productos inactivos
    */
    function not_active_productos()
    {
        $query = $this->db->get_where('productos', array('eliminado' => 'SI'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }


} 