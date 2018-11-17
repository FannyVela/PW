<?php
    error_reporting(E_ALL ^ E_DEPRECATED);

    class inicio extends CI_Controller{
        public function _construct(){
            parent::_construct();
            $this->load->model('catalogo_model');
        }
        
        public function index() {

        $data['title'] = 'Catálogo codeIgniter';
        $pages = 6; //Número de registros mostrados por páginas
        $config['base_url'] = base_url() . 'inicio/index';
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['total_rows'] = $this->catalogo_model->filas();
        $config['per_page'] = $pages;
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera';
        $config['last_link'] = 'Última';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div id="paginacion">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        
        $data["productos"] = $this->catalogo_model->moviles($config['per_page'], $this->uri->segment(3));
            $this->load->helper('url');
            $this->load->view('inicio_view', $data);
        }
    }
?>