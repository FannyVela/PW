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
            if($_POST)
                $buscar = $this->input->post('search');
            else
                $buscar="";
            
            $data['productos_view']  = $this->productos_model->buscar($buscar);
            $this->load->view('productos_view',$data);
        }
        
    }
?>