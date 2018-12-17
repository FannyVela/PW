<?php
class Carro_model extends CI_Model
{

	public function _construct(){
 			parent::_construct();
 		}

    //cuando pulsemos en añadir al carrito esta función será la encargada
    //de saber que producto hemos seleccionado por su id, que la envíamos desde
    //la vista al controlador, y desde el controlador aquí, el modelo.

  //  nos devuelve los datos del producto completo para después en el controlador
  //  meterlo en el array de nuestro carro como otro producto más.
    function porId($id)
    {
        $this->db->where('id', $id);
        $productos = $this->db->get('moviles');
        foreach ($productos->result() as $producto) {
            $data[] = $producto;
        }

        return $producto;
    }

    function realizar_compra()
    {
        foreach ($this->cart->contents() as $item)
        {
            echo $item['name'];
            $id = $item['id'];
            $stock = $this->db->query("select stock from moviles where id = '$id'");
            $stock = $stock->row()->stock; 
            //$nuevo = $stock['stock'];
            $stock -= $item['qty'];    
            $this->db->query("update moviles SET stock = '$stock' where id = $id");   
        }
        $this->cart->destroy();
        $this->session->set_flashdata('destruido', 'Compra realizada correctamente');
            redirect(base_url(). 'carro', 'refresh');
    }

}
?>
