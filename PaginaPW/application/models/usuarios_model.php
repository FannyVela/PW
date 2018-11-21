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

 	public function verify_sesion(){
 		$consulta = $this->db->get_where('usuarios',array(
 		'username'=>$this->input->post('user',TRUE),
 		'password'=>$this->input->post('pass',TRUE)
 		));
 		if($consulta->num_rows() ==1){
 		return true;
 		}else{
 		return false;
 		}
 }

	 public function recuperar_correo()
	 {
		$consulta = $this->db->query("select correo from usuarios where correo = '".
		$this->input->post('correo')."'");
			
		if($consulta->num_rows() == 1)
		{
			$correo = $consulta->row();
			return $correo->correo;
		}
		else
			return 0;
	 }
	 
	 public function recuperar_password()
	 {
		$consulta = $this->db->query("select password from usuarios where correo = '".
		$this->input->post('correo')."'");
		$password = $consulta->row();
			return $password->password;
	 }
}