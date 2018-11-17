<?php
class Catalogo_model extends CI_Model{

	public function _construct(){
 			parent::_construct();
 		}

 	/*funcion que devuelve el numero de moviles que hay*/
 	function filas() {
       $consulta = $this->db->get('moviles');
       return $consulta->num_rows();
    }

    /*Devuelve todos los moviles*/
    function moviles($por_pagina, $segmento) {
        $consulta = $this->db->get('moviles', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }

}





?>
