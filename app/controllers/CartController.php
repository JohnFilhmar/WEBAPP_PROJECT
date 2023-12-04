<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class CartController extends Controller {
    public function addToCart($id)
    {
        $item = $this->product_model->searchProducts($id);
        $cart = $this->cart_model->searchCart($id);
        if ($cart == null) {
            $bind = array(
                'item_id' => $id,
                'user_id' => $this->session->userdata('userId'),
                'quantity' => 1,
                'total' => $item['price']
            );
            $this->cart_model->addCart($bind);
            $this->updateProductQuantity($id, 1);
            $this->session->set_flashdata('message', 'Item Added to the Cart!');
        } else {
            $newQuantity = $cart['quantity'] + 1;
            $bind = array(
                'item_id' => $id,
                'quantity' => $newQuantity,
                'total' => $item['price'] * $newQuantity
            );
            $this->cart_model->updateCart($bind, $id);
            $this->updateProductQuantity($id, 1);
            $this->session->set_flashdata('message', 'Item Added to the Cart!');
        }
    
        redirect('/');
    }
    
    private function updateProductQuantity($id, $quantityChange)
    {
        $products = $this->product_model->searchProducts($id);
        $currentQuantity = $products['quantity'];
        $this->product_model->updateProducts(['quantity' => $currentQuantity - $quantityChange],$id);
    }    

    public function remove($id)
    {
        $this->cart_model->deleteCart($id);
        $this->session->set_flashdata('message',"Successfully Removed!");
        redirect('/');
    }
}
?>