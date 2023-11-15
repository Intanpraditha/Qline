<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Pasien_model');
        // $this->load->model('Waktu_model');
    }
	public function index()
	{
		$this->load->view('templates/index.php');
	}
	public function captcha()
	{
		include(APPPATH . 'views/proses.php');
	}
	// public function daftar()
	// {
	// 	$data['waktu'] = $this->Waktu_model->get_all_waktu();
	// 	$this->load->view('templates/daftar.php');
	// }
	// public function simpan()
    // {
    //     // Menyimpan data pasien baru
    //     $data = array(
    //         'no_antrian' => $this->input->post('no_antrian'),
    //         'nama_pasien' => $this->input->post('nama_pasien'),
    //         'nik' => $this->input->post('nik'),
    //         'jk' => $this->input->post('jk'),
    //         'no_telp' => $this->input->post('no_telp'),
    //         'tgl' => $this->input->post('tgl'),
    //         'Id_waktu' => $this->input->post('Id_waktu'),
    //         'status' => $this->input->post('status')
    //     );

    //     $this->Pasien_model->create_pasien($data);
    //     redirect('pasien');
    // }
	public function daftar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'keluhan' => $this->input->post('keluhan'),
                // 'status' => $this->input->post('status'),
                'status' => 'belum datang',
                'penjamin' => $this->input->post('penjamin'),
                'no_bpjs' => $this->input->post('no_bpjs'),
                'nik' => $this->input->post('nik')
            );
    
            $inserted_id = $this->Pasien_model->tambah_pasien($data);
    
            // Arahkan pengguna ke halaman dengan tombol cetak
            redirect('home/cetak/' . $inserted_id);
        } else {
            $this->load->view('pasien/daftar');
        }
    }

    public function cetak($id) {
        // Ambil data pasien berdasarkan ID
        $data['pasien'] = $this->Pasien_model->get_pasien_by_id($id);
    
        // Load halaman cetak
        $this->load->view('pasien/cetak', $data);
    }
    public function hapus($id) {
        $this->Pasien_model->hapus_pasien($id);
        redirect('home');
    }
    
    
	
}
