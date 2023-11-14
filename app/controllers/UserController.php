<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function logForm() {
        if(!$this->session->userdata('isLoggedIn')){
            $this->call->view('login');
        } else {
            return redirect('');
        }
    }

    public function regForm() {
        if(!$this->session->userdata('isLoggedIn')){
            $this->call->view('register');
        } else {
            return redirect('');
        }
    }

    public function goToFrontPage() {
        if($this->session->userdata('isLoggedIn')){
            $this->call->view('dashboard');
        } else {
            return redirect('login');
        }
    }

    public function logout() {
        $this->session->set_userdata('isLoggedIn', false);
        $this->call->view('login');
    }

	public function authenticate() {
        $username = $this->io->post('username');
        $password = $this->io->post('password');
        $this->session->set_userdata('isLoggedIn', false);

        $data = $this->user_model->getusers();
        // echo var_dump($data);
        foreach($data as $users){
            if($users['username'] == $username){
                if(password_verify($password, $users['password'])){
                    $this->session->set_userdata('isLoggedIn', true);
                    $this->call->view('dashboard');
                    return;
                } else {
                    $this->call->view('login');
                }
            } else {
                $this->call->view('login');
            }
        }
    }

    public function register() {
        $username = $this->io->post('username');
        $password = $this->io->post('password');

        $data = array(
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        );
        $this->user_model->addUser($data);
        redirect('login');
    }
}
?>
