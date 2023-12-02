<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller {
    public function __construct()
    {
        parent::__construct();
        define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
    }
	public function inventory() 
    {
        if ($this->session->userdata('isLoggedIn')) {
            $data['username'] = $this->session->userdata('username');
            $data['email'] = $this->session->userdata('email');
            $data['image'] = $this->session->userdata('image');
            $data['products'] = $this->product_model->getProducts();
            $data['toedit'] = $this->session->userdata('editItem');
            $data['message'] = $this->session->userdata('message');
            $this->call->view('inventory',$data);
        } else {
            redirect('/');
        }
    }
	public function createitem()
    {
        $this->call->library('upload', $_FILES["image"]);
		$this->upload
			->set_dir('public/uploads/items')
			->allowed_extensions(array('jpg'))
			->allowed_mimes(array('image/jpeg'))
			->is_image();
		if($this->upload->do_upload()) {
			$image = $this->upload->get_filename();
            $itemname = $this->io->post('itemname');
            $compatibility = $this->io->post('compatibility');
            $description = $this->io->post('description');
            $price = $this->io->post('price');
            $quantity = $this->io->post('quantity');
            $bind = array(
                'itemname' => $itemname,
                'compatibility' => $compatibility,
                'image' => $image,
                'description' => $description,
                'price' => $price,
                'quantity' => $quantity,
            );
            $this->product_model->addProducts($bind);
            $this->session->set_flashdata('message', 'Item Added!');
            redirect('/inventory');
		} else {
            $data['username'] = $this->session->userdata('username');
            $data['email'] = $this->session->userdata('email');
            $data['image'] = $this->session->userdata('image');
            $data['products'] = $this->product_model->getProducts();
            $this->session->set_flashdata('message' , $this->upload->get_errors());
            redirect('/inventory');
		}
    }
    public function delete($id)
    {
        $datas = $this->product_model->searchProducts($id);
        $image = $datas['image'];
        $localFilePath = FCPATH . '../../public/uploads/items/' . $image;
        if (file_exists($localFilePath)) {
            if (unlink($localFilePath)) {
                $this->product_model->deleteProduct($id);
                $this->session->set_flashdata('message', 'Deleted Item Successfully!');
                redirect('/inventory');
            } else {
                $this->session->set_flashdata('message', 'Something has gone wrong!');
                redirect('/');
            }
        } else {
            $this->product_model->deleteProduct($id);
            $this->session->set_flashdata('message', 'Deleted Item Successfully!');
            redirect('/inventory');
        }
    }
    public function edit($id)
    {
        $this->session->set_flashdata('editItem' , $this->product_model->searchProducts($id));
        redirect('/inventory');
    }
    public function submitedit($id)
    {
        $datas = $this->product_model->searchProducts($id);
        $image = $datas['image'];
        $localFilePath = FCPATH . '../../public/uploads/items/' . $image;
        if (file_exists($localFilePath)) {
            if (unlink($localFilePath)) {
                echo "File deleted: $localFilePath<br>";
                $this->call->library('upload', $_FILES["image"]);
                $this->upload->set_dir('public/uploads/items');
                if ($this->upload->do_upload()) {
                    echo "File uploaded: " . $this->upload->get_filename() . "<br>";

                    $image = $this->upload->get_filename();
                    $itemname = $this->io->post('itemname');
                    $compatibility = $this->io->post('compatibility');
                    $description = $this->io->post('description');
                    $price = $this->io->post('price');
                    $quantity = $this->io->post('quantity');
                    $bind = array(
                        'itemname' => $itemname,
                        'compatibility' => $compatibility,
                        'image' => $image,
                        'description' => $description,
                        'price' => $price,
                        'quantity' => $quantity,
                    );
                    $this->product_model->updateProducts($bind,$id);
                    $this->session->set_flashdata('message', 'Updated Successfully!');
                    redirect('/inventory');
                } else {
                    echo "Upload errors: " . $this->upload->get_errors() . "<br>";
    
                    $this->session->set_flashdata('message', $this->upload->get_errors());
                    redirect('/inventory');
                }
            } else {
                $this->session->set_flashdata('message', 'Error deleting file!');
                redirect('/inventory');
            }
        } else {
            $this->session->set_flashdata('message', 'File not found!');
            redirect('/inventory');
        }
    }
}
?>
