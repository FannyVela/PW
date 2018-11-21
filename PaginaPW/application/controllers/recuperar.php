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
                'required|valid_email|trim');
                    if($this->form_validation->run() ==FALSE){
                        echo "Peto en el verify";
                        $this->index();
                    }else{
                        //$this->index();
                        $correo = $this->usuarios_model->recuperar_correo();
                        if($correo === 0)
                        {
                            echo "Se formo";
                            echo $correo;
                        }
                        else{
                            echo "Perfe";
                            echo $correo;
                            date_default_timezone_set('Europe/Madrid');
                            $this->load->library('email');
                            $config = array(
                                'protocol' => 'smtp',
                                'smtp_host' => 'ssl://smtp.googlemail.com',
                                'smtp_user' => 'tecnophonepw@gmail.com', //Su Correo de Gmail Aqui
                                'smtp_pass' => 'tecnophonepassword', // Su Password de Gmail aqui
                                'smtp_port' => 465,
                                'mailtype' => 'html',
                                'wordwrap' => TRUE,
                                'charset' => 'utf-8'
                                );
                            $this->email->initialize($config);
                            
                            $this->email->from('tecnophonepw@gmail.com');
                            //$enviar = "'".$correo."'";
                            $this->email->to($correo);
                            $this->email->subject('Recuperación contraseña');
                            $password = $this->usuarios_model->recuperar_password();
                            $password = "'". $password . "'";
                            $this->email->message(
                                $password
                                );
                            //$this->email->message('Hola');
                            if($this->email->send()){
                                $this->session->set_flashdata('envio', 'Email enviado correctamente');
                                redirect(base_url("login"));
                            }else{
                                echo "ERROR al enviar";
                            }
                            
                        }
                        
                    //aqui va el correo 
                    }
                    //redirect(base_url().'inicio');
                }
        }

    }
?>