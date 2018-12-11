<?php
    error_reporting(E_ALL ^ E_DEPRECATED);

    class pago extends CI_Controller {
        public function _construct(){
            parent::_construct();
            $this->load->model('carro_model');
        }

        public function index() {
          $this->load->view('pago_view');
        }


        public function verify_compra() {
    //si se envia un submit_reg por el metodo post, entonces...
    if($this->input->post('submit_reg')){
 //validamos usando la libreria form_validation
 //asignamos un rol (set_rules, uso(name,title,required[|...])
 //trim = limpia los espacios en blanco
 //callback_ = para llamar un método
    $this->form_validation->set_rules('nombre','Nombre', 'required');
    $this->form_validation->set_rules('apellido','Apellido',
    'required');
    $this->form_validation->set_rules('correo','Correo',
    'required|valid_email|trim');
    $this->form_validation->set_rules('tarjeta','Tarjeta','required');
    //mensaje de error de validacion
    $this->form_validation->set_message('required','El campo %s es
    obligatorio.');
    $this->form_validation->set_message('valid_email','El campo %s es
    invalido.');
    $this->form_validation->set_message('verify_mail','El %s ya
    existe.');
    if($this->form_validation->run() ==FALSE){
      $this->index();
     }else{
      $this->carro_model->realizar_compra();
    $datos=array('mensaje'=>'Compra realizada correctamente');
    $this->load->view('pago_view',$datos);
    }
  }
 }

  }
?>