<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    // BASE LOGIN REGISTER AUTHENTICATION
    public function login() {
        $this->redirectBackTo('home','login','Something have gone wrong.');
    }

    public function register() {
        $this->redirectBackTo('home','register','Something have gone wrong.');
    }

    public function logout() {
        $sesData = array('username','isLoggedIn');
        $this->session->unset_userdata($sesData);
        $this->call->view('login');
    }

    public function auth() {
        $username = $this->io->post('username');
        $password = $this->io->post('password');
    
        $user = $this->user_model->getUserByUsername($username);
    
        if ($user && password_verify($password, $user['password'])) {
            $sesData = array(
                'username' => $username,
                'image' => $user['image'],
                'email' => $user['email'],
                'isLoggedIn' => true
            );
            $this->session->set_userdata($sesData);
            redirect('home');
        } else {
            $data['fail'] = "Username or Password not found.";
            $this->call->view('login',$data);
        }
    }
    
    public function createaccount() {
        $username = $this->io->post('username');
        $password = password_hash($this->io->post('password'), PASSWORD_DEFAULT);
        $data = array(
            'username' => $username,
            'password' => $password
        );
        $this->user_model->addUser($data);
        $this->session->set_flashdata('registered','New User Added');
        $data['success'] = $this->session->flashdata('registered');
        $this->call->view('login',$data);
    }

    // USER DROPDOWN LINKS
    public function profile() {
        $this->redirectBackTo('profile','login','Login First!');
    }

    public function orders() {
        $this->redirectBackTo('orders','login','Login First!');
    }

    public function settings() {
        $this->redirectBackTo('settings','login','Login First!');
    }

    // MAIN FRONT PAGES
    public function home() {
        $this->redirectBackTo('home','login','Login First!');
    }

    public function about() {
        $this->redirectBackTo('about','login','Login First!');
    }

    public function services() {
        $this->redirectBackTo('services','login','Login First!');
    }

    public function contact() {
        $this->redirectBackTo('contact','login','Login First!');
    }

    public function policies() {
        $this->redirectBackTo('policies','login','Login First!');
    }

    public function licensing() {
        $this->redirectBackTo('licensing','login','Login First!');
    }


    


    // REUSABLE FUNCTIONS
    public function redirectBackTo($from,$to,$message) {
        if($this->session->userdata('isLoggedIn')){
            $data['username'] = $this->session->userdata('username');
            $data['email'] = $this->session->userdata('email');
            $data['image'] = $this->session->userdata('image');
            $this->call->view($from,$data);
        } else {
            $prompt['fail'] = $message;
            $this->call->view($to, $message);
        }
    }
}
?>
