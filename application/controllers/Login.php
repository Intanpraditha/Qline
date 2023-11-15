<?php
class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->database();
        $this->load->library('session');

    }
    
    public function index() {
        $this->load->view('login');
    }
    
    public function process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->User_model->login($username, $password);
        
        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            redirect('pasien/dashboard'); // Ganti 'dashboard' dengan URL halaman setelah login
        } else {
            $data['error'] = 'Waduh... kamu gagal Login nih. Coba cek Username atau passwordnya ya..';
            $this->load->view('login', $data);
        }
    }
    
    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('home');
    }
}
?>
