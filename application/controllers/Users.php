<?php
class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    public function index() {
        $data['users'] = $this->User_model->get_user();
        $this->load->view('templates/header.php');
		$this->load->view('templates/sidebar.php');
		$this->load->view('templates/topbar.php');
        $this->load->view('users/index', $data);
		$this->load->view('templates/footer.php');
    }
    
    public function tambah() {
        $this->load->view('templates/header.php');
		$this->load->view('templates/sidebar.php');
		$this->load->view('templates/topbar.php');
        $this->load->view('users/tambah');
		$this->load->view('templates/footer.php');
    }
    
    public function simpan() {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->User_model->tambah_user($data);
        redirect('users');
    }
    
    public function edit($id) {
        $data['user'] = $this->User_model->get_user($id);
        $this->load->view('templates/header.php');
		$this->load->view('templates/sidebar.php');
		$this->load->view('templates/topbar.php');
        $this->load->view('users/edit', $data);
		$this->load->view('templates/footer.php');
    }
    
    public function update($id) {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->User_model->update_user($id, $data);
        redirect('users');
    }
    
    public function hapus($id) {
        $this->User_model->hapus_user($id);
        redirect('users');
    }
}
?>
