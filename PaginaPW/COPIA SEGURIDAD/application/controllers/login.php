<?php
    error_reporting(E_ALL ^ E_DEPRECATED);

    class login extends CI_Controller{
        public function _construct(){
            parent::_construct();
        }

        public function index() {
            $this->load->view('login_view');
        }

        public function verify_sesion(){
       		//Si hay un submit...
       	  if($this->input->post('submit')){
         		//verificar
         		$variable = $this->usuarios_model->verify_sesion();
         		if($variable == true){
         			$variables = array ('username' => $this->input->post('user'));
         			$this->session->set_userdata($variables);
         			redirect(base_url().'index.php/inicio');
         		} else { //el login no es correcto
         			$mensaje = array('mensaje' => 'El usuario/contraseña no son
        			correctos.');
         			$this->load->view('login_view',$mensaje);
              }
         	} else { //si no hay submit, redirecciona a usuarios.php
         		   redirect(base_url().'index.php/usuarios');
         		}
       }

     		public function logout()
     		{
     			$this->session->sess_destroy();
          return redirect('inicio');
     		}

    }
?>
