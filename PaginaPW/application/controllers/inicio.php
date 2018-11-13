<?php
    error_reporting(E_ALL ^ E_DEPRECATED);

    class inicio extends CI_Controller{
        public function _construct(){
            parent::_construct();
        }
        
        public function index() {
            $this->load->helper('url');
            $this->load->view('inicio_view');
        }
    }
?>