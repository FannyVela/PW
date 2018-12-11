<?php
    class Productos_model extends CI_Model
    {
        public function _construct(){
                parent::_construct();
            }

        function buscar($bus) {
            $this->db->like('nombre',$bus);
            $this->db->like('descripcion',$bus);
            $this->db->like('precio',$bus);
            $this->db->like('marca',$bus);
           $query = $this->db->get('moviles');
        }

    }
?>
