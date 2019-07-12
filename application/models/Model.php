<?php

class Model extends CI_Model {

    
    public function lista() {
		$this->db->order_by('position_order','asc');
        $resultado = $this->db->get('sorting_items');
        if ($resultado->num_rows() > 0) {
            return $resultado->result();
        }
        return;
    }

    public function alterarCliente($idCliente, $position) {
        $this->db->set('position_order',$position);
        $this->db->where('id', $idCliente);
        return $this->db->update('sorting_items');
    }

    
    public function update(){

    }
    

}