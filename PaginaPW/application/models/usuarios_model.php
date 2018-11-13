<?php
	class Usuarios_model extends CI_Model{
 		public function _construct(){
 			parent::_construct();
 		}
 //Comprueba si el usuario existe o no
 		public function verify_user($user){
 		$conexion = mysqli_connect("localhost", "root", "", "paginapw")
 			or die("Error en la conexion");
 		$ssql = "select * from usuarios where username ='". $user . "'";
 		$consulta = mysqli_query($conexion, $ssql);
 		if(mysqli_num_rows($consulta) == 0){ //el usuario no existe
 			return false;
 		}else{ //el usuario existe
 			return true;
 		}	
 	}

 	public function verify_mail($mail){
 		$conexion = mysqli_connect("localhost", "root", "", "paginapw")
 			or die("Error en la conexion");
 		$ssql = "select * from usuarios where correo ='". $mail . "'";
 		$consulta = mysqli_query($conexion, $ssql);
 		if(mysqli_num_rows($consulta) == 0){ //el email no existe
 			return false;
 		}else{ //el email existe
 			return true;
 		}	
 	}

 	//añade un usuario
 	public function add_usuario(){
 	$this->db->insert('usuarios', array(
 	//el true es para que limpie este campo de inyecciones xss
	'nombre'=>$this->input->post('nombre',TRUE),
 	'correo'=>$this->input->post('correo',TRUE),
 	'username'=>$this->input->post('usuario',TRUE),
 	'password'=>$this->input->post('pass',TRUE),	
 	));
 }
}