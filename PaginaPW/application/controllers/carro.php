<?php
  error_reporting(E_ALL ^ E_DEPRECATED);
  class carro extends CI_Controller{

    public function _construct() {
      parent::_construct();
    }
    public function index() {
      $this->load->view('carro_view');
    }

    public function agregarProducto()
    {

    }

    public function eliminarProducto($rowid)
    {
      $producto = array()
    }

    public function vaciarCarrito()
    {
      $this->cart->destroy();
      redirect('carrito');
    }
  }
 ?>
