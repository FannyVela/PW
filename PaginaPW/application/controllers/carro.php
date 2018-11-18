<?php
    error_reporting(E_ALL ^ E_DEPRECATED);

    class carro extends CI_Controller {
        public function _construct(){
            parent::_construct();
            $this->load->model('carro_model');
        }

        public function index() {
          $this->load->view('carro_view');
        }

        public function agregarProducto() {

          $id = $this->input->post('id');
          $producto = $this->carro_model->porId($id);
          $cantidad = 1;
          //obtenemos el contenido del carrito
          $carrito = $this->cart->contents();

          foreach ($carrito as $item) {
            //si el id del producto es igual que uno que ya tengamos
            //en la cesta le sumamos uno a la cantidad
            if ($item['id'] == $id)
            {
                $cantidad = $item['qty']+1;
            }
          }

          //cogemos los productos en un array para insertarlos en el carrito
          $insert = array(
              'id' => $id,
              'qty' => $cantidad,
              'price' => $producto->precio,
              'name' => $producto->nombre
          );

          //insertamos al carrito
          $this->cart->insert($insert);
          //cogemos la url para redirigir a la página en la que estabamos
    //      $uri = $this->input->post('uri');
          //redirigimos mostrando un mensaje con las sesiones flashdata
          //de codeigniter confirmando que hemos agregado el producto
          $this->session->set_flashdata('agregado', 'El producto fue añadido a su carrito');
          redirect(base_url().'inicio', 'refresh');
          }

        function eliminarProducto($rowid){
          //para eliminar un producto en especifico lo que hacemos es conseguir su id
          //y actualizarlo poniendo qty que es la cantidad a 0

          $producto = array(
            'rowid' => $rowid,
            'qty' => 0
          );

          //después simplemente utilizamos la función update de la librería cart
          //para actualizar el carrito pasando el array a actualizar

          $this->cart->update($producto);

          //Para avisar al usuario. El primer parámetro que le pasamos es el nombre que le queremos dar a dicha sesión,
          //y después el mensaje que queremos que contenga, a continuación redirigimos donde queramos
          //y utilizamos como segundo parámetro ‘refresh’.
          $this->session->set_flashdata('productoEliminado', 'El producto fue eliminado correctamente');
            redirect(base_url().'carro', 'refresh');

        }

        function eliminarCarrito(){
          $this->cart->destroy();
          $this->session->set_flashdata('destruido', 'El carrito fue eliminado correctamente');
            redirect(base_url(). 'carro', 'refresh');
        }
  }
?>
