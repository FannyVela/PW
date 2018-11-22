<?php
    error_reporting(E_ALL ^ E_DEPRECATED);

    class recuperar extends CI_Controller{
        public function _construct(){
            parent::_construct();
        }

        public function index() {
            $this->load->view('recuperar_view');
        }

        public function correo(){
            if($this->input->post('submit_reg')){
                //verificar
                $this->form_validation->set_rules('correo','Correo',
                'required|valid_email|trim|callback_verify_mail');
                $this->form_validation->set_message('valid_email','El campo %s es invalido.');
                $this->form_validation->set_message('verify_mail', 'No existe el email');
                    if($this->form_validation->run() ==FALSE){
                        $this->index();
                    }else{
                        //$this->index();
                        $correo = $this->usuarios_model->recuperar_correo();
                            echo "Perfe";
                            echo $correo;
                            date_default_timezone_set('Europe/Madrid');
                            $config = Array(
                                'protocol' => 'smtp',
                                'smtp_host' => 'ssl://smtp.googlemail.com',
                                'smtp_port' => 465,
                                'smtp_user' => 'tecnophonepw@gmail.com',
                                'smtp_pass' => 'tecnophonepassword',
                                'mailtype'  => 'html', 
                                'charset'   => 'iso-8859-1'
                            );
                            $this->load->library('email', $config);
                            $this->email->set_newline("\r\n");
                            
                            $this->email->from('tecnophonepw@gmail.com');
                            $this->email->to($correo);
                            $this->email->subject('Recuperacion password');
                            $password = $this->usuarios_model->recuperar_password();
                            $this->email->message(
                                "password: " . $password
                                );
                            if($this->email->send()){
                                $this->session->set_flashdata('envio', 'Email enviado correctamente');
                                redirect(base_url("login"));
                            }else{
                                echo "ERROR al enviar";
                            }
                            
                        
                    //aqui va el correo 
                    }
                    //redirect(base_url().'inicio');
                }
                
        }

        function verify_mail($correo)
 	    {
 		    $bool = $this->usuarios_model->verify_mail($correo);
 		    if($bool == true){ //existe el email
 		    return true; 
 		    }else{
 		    return false;
 		    }
 	    }

    }
?>