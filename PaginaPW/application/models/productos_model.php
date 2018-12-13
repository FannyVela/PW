<?php
  if (!defined('BASEPATH'))
    exit('No direct script access allowed');

  class productos_model extends CI_Model
  {
      public function construct()
      {
        parent::__construct();
      }

      public function buscar($buscar)
      {
          $this->db->like('nombre', $buscar);
          $this->db->or_like('marca', $buscar);
          $query = $this->db->get('moviles');
          return $query->result();
      }
 }
?>
