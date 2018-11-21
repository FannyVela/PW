<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	class registro extends CI_Controller {
 	public function _construct() {
 		parent::_construct();
 	}
 	public function index() {
 		$this->load->view('registro_view');
 	}

 	public function verify_registro() {
 		//si se envia un submit_reg por el metodo post, entonces...
 		if($this->input->post('submit_reg')){
 //validamos usando la libreria form_validation
 //asignamos un rol (set_rules, uso(name,title,required[|...])
 //trim = limpia los espacios en blanco
 //callback_ = para llamar un método
 		$this->form_validation->set_rules('nombre','Nombre', 'required');
 		$this->form_validation->set_rules('correo','Correo',
		'required|valid_email|trim|callback_verify_mail');
 		$this->form_validation->set_rules('usuario','Usuario',
		'required|trim|callback_verify_user');
 		$this->form_validation->set_rules('pass','Contraseña',
		'required|trim');
 		$this->form_validation->set_rules('pass2','Confirmación de
		contraseña','required|trim|matches[pass]');
		//mensaje de error de validacion
 		$this->form_validation->set_message('required','El campo %s es
		obligatorio.');
		$this->form_validation->set_message('valid_email','El campo %s es
		invalido.');
 		$this->form_validation->set_message('verify_user','El %s ya
		existe.');
		$this->form_validation->set_message('verify_mail','El %s ya
		existe.');
 		$this->form_validation->set_message('matches','El campo %s no es
		igual que el campo %s.');
 		if($this->form_validation->run() ==FALSE){
 			$this->index();
		 }else{
 			$this->usuarios_model->add_usuario();
 		$datos=array('mensaje'=>'El usuario se ha registrado
		correctamente.');
 		$this->load->view('registro_view',$datos);
 		}
 	}
 }

 	function verify_user($usuario){
 	$variable = $this->usuarios_model->verify_user($usuario);
 	if($variable == true){ //existe el usuario
 	return false; //no pasaria la validación porque el usuario ya existe
 	}else{
 	return true;
 	}
 }
 	function verify_mail($correo)
 	{
 		$bool = $this->usuarios_model->verify_mail($correo);
 		if($bool == true){ //existe el email
 		return false; //no pasaria la validación porque el email ya existe
 		}else{
 		return true;
 		}
 	}
 
}
?>