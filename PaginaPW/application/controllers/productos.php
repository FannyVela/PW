<?php
    error_reporting(E_ALL ^ E_DEPRECATED);

    class productos extends CI_Controller
    {
        public function _construct() {
 		       parent::_construct();
           $this->load->model('productos_model');
 	      }


        public function index()
        {
            $buscar = $this->input->post('buscando');
            $data['moviles'] = $this->productos_model->buscar($buscar);
            $this->load->view('productos_view', $data);
        }

    }
?>
