<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    // BASE LOGIN REGISTER AUTHENTICATION
    public function login() {
        if(!$this->session->userdata('isLoggedIn')){
            $prompt['success'] = $this->session->flashdata('registered');
            $prompt['fail'] = $this->session->flashdata('fail');
            $this->call->view('login',$prompt);
        } else {
            redirect('/home');
        }
    }
    public function home() {
        if($this->session->userdata('isLoggedIn')){
            $data['username'] = $this->session->userdata('username');
            $data['email'] = $this->session->userdata('email');
            $data['role'] = $this->session->userdata('role');
            $data['status'] = $this->session->userdata('status');
            $data['image'] = $this->session->userdata('image');
            $data['products'] = $this->product_model->getProducts();
            $data['message'] = $this->session->flashdata('message');
            $data['cart'] = $this->cart_model->getCart($this->session->userdata('userId'));
            $this->call->view('home',$data);
        } else {
            $this->session->set_flashdata('fail','Login First!');
            redirect('/login');
        }
    }

    public function register() {
        if($this->session->userdata('isLoggedIn')){
            redirect('/home');
        } else {
            $this->call->view('register');
        }
    }

    public function logout() {
        $sesData = array('username','isLoggedIn','userId','image','email');
        $this->session->unset_userdata($sesData);
        $this->session->set_flashdata('registered' , 'Successfully Logged Out!');
        redirect('/login');
    }

    public function auth() {
        $username = $this->io->post('username');
        $password = $this->io->post('password');
    
        $user = $this->user_model->getUserByUsername($username);

        if($user['status'] == 'UP'){
            if ($user && password_verify($password, $user['password'])) {
                $sesData = array(
                    'userId' => $user['id'],
                    'username' => $username,
                    'image' => $user['image'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'status' => $user['status'],
                    'isLoggedIn' => true
                );
                $this->session->set_userdata($sesData);
                $this->session->set_flashdata('message', "Logged In Successfully!");
                redirect('/home');
            } else {
                $this->session->set_flashdata('fail', "Username or Password not found!");
                redirect('/login');
            }
        } else {
            $this->session->set_flashdata('fail', "Your account is down. Contact an Administrator!");
            redirect('/login');
        }
    }
    
    public function createaccount() {
        $username = $this->io->post('username');
        $password = password_hash($this->io->post('password'), PASSWORD_DEFAULT);
        $key = $this->io->post('secretkey');

        $role = ($key == "ADMINISTRATOR") ? 'ADMIN' : (($key == "SALESCLERK") ? 'CLERK' : 'USER');

        $data = array(
            'username' => $username,
            'password' => $password,
            'role' => $role,
            'status' => 'DOWN'
        );
        $this->user_model->addUser($data);
        $this->session->set_flashdata('registered','New User Added');
        redirect('/login');
    }

    public function profileEdit($id) {
        if($this->session->userdata('isLoggedIn')){
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $image = 'bebe.png';

            $data = array(
                'username' => $username,
                'email' => $email,
                'image' => $image
            );
            $this->user_model->updateUser($data,$id);
            $this->session->set_userdata($username);
            $this->session->set_userdata($email);
            $this->session->set_userdata($image);

            redirect('/home');
        } else {
            $this->session->set_flashdata('fail' , 'Login First!');
            redirect('/login');
        }
    }

    public function useraccounts() {
        if (!$this->session->userdata('isLoggedIn')) {
            $this->session->set_flashdata('fail', 'Login First!');
            redirect('/login');
        } else {
            $userId = $this->session->userdata('userId');
    
            $data['userId'] = $this->session->userdata('userId');
            $data['username'] = $this->session->userdata('username');
            $data['email'] = $this->session->userdata('email');
            $data['role'] = $this->session->userdata('role');
            $data['status'] = $this->session->userdata('status');
            $data['image'] = $this->session->userdata('image');
            $data['users'] = $this->user_model->getUsers();
            $data['message'] = $this->session->flashdata('message');
            $data['cart'] = $this->cart_model->getCart($userId);
            $this->call->view('useraccounts', $data);
        }
    }

    public function deleteuser($id){
        if (!$this->session->userdata('isLoggedIn')) {
            $this->session->set_flashdata('fail', 'Login First!');
            redirect('/login');
        } else {
            $this->user_model->deleteUser($id);
            $this->session->set_flashdata('message','User account deleted!');
            redirect('/useraccounts');
        }
    }

    public function toggleaccess($id){
        if (!$this->session->userdata('isLoggedIn')) {
            $this->session->set_flashdata('fail', 'Login First!');
            redirect('/login');
        } else {
            $data = $this->user_model->searchUser($id);
            if($data['status'] == 'UP'){
                $this->user_model->updateUser(['status' => 'DOWN'], $id);
                $this->session->set_flashdata('message','User account disabled!');
                redirect('/useraccounts');
            } else {
                $this->user_model->updateUser(['status' => 'UP'], $id);
                $this->session->set_flashdata('message','User account enabled!');
                redirect('/useraccounts');
            }
        }
    }

    public function profile() {
        $this->redirectTo('profile');
    }

    public function settings() {
        $this->redirectTo('settings');
    }

    public function about() {
        $this->redirectTo('about');
    }

    public function services() {
        $this->redirectTo('services');
    }

    public function contact() {
        $this->redirectTo('contact');
    }

    public function policies() {
        $this->redirectTo('policies');
    }

    public function licensing() {
        $this->redirectTo('licensing');
    }

    public function redirectTo($to)
    {
        if (!$this->session->userdata('isLoggedIn')) {
            $this->session->set_flashdata('fail', 'Login First!');
            redirect('/login');
        } else {
            $userId = $this->session->userdata('userId');
    
            $data['username'] = $this->session->userdata('username');
            $data['email'] = $this->session->userdata('email');
            $data['role'] = $this->session->userdata('role');
            $data['status'] = $this->session->userdata('status');
            $data['image'] = $this->session->userdata('image');
            $data['products'] = $this->product_model->getProducts();
            $data['message'] = $this->session->flashdata('message');
            $data['cart'] = $this->cart_model->getCart($userId);
            $this->call->view($to, $data);
        }
    }
}
?>
