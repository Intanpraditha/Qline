<?php
class Pasien extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Pasien_model');
    }


    public function index() {
        //$data['pasien'] = $this->Pasien_model->get_all_pasien();
        
        // Mengambil data pasien yang statusnya "dalam antrian" atau belum "selesai"
        $data['pasien'] = $this->Pasien_model->get_pasien_with_status('dalam antrian');
        $this->load->view('templates/header.php');
		$this->load->view('templates/sidebar.php');
		$this->load->view('templates/topbar.php');
        $this->load->view('pasien/index', $data);
		$this->load->view('templates/footer.php');
    }


    public function index_selesai() {
        //$data['pasien'] = $this->Pasien_model->get_all_pasien();

        // Mengambil data pasien yang statusnya "dalam antrian" atau belum "selesai"
        $data['pasien'] = $this->Pasien_model->get_pasien_with_status('selesai');
        $this->load->view('templates/header.php');
		$this->load->view('templates/sidebar.php');
		$this->load->view('templates/topbar.php');
        $this->load->view('pasien/index-selesai', $data);
		$this->load->view('templates/footer.php');
    }

    public function index_belum_datang() {
        //$data['pasien'] = $this->Pasien_model->get_all_pasien();

        // Mengambil data pasien yang statusnya "dalam antrian" atau belum "selesai"
        $data['pasien'] = $this->Pasien_model->get_pasien_with_status('belum datang');
        $this->load->view('templates/header.php');
		$this->load->view('templates/sidebar.php');
		$this->load->view('templates/topbar.php');
        $this->load->view('pasien/index-belum-datang', $data);
		$this->load->view('templates/footer.php');
    }


    public function dashboard() {
        //$data['pasien'] = $this->Pasien_model->get_all_pasien();        
        
        // $this->load->view('pasien/dashboard', $data);
        // Mengambil data pasien yang statusnya "dalam antrian" atau belum "selesai"
        $data['pasien'] = $this->Pasien_model->get_all_pasien();
        $data['pasien_hari_ini'] = $this->Pasien_model->hitung_pasien_hari_ini();
        $data['pasien_bulan_ini'] = $this->Pasien_model->hitung_pasien_bulan_ini();
        $this->load->view('templates/header.php');
		$this->load->view('templates/sidebar.php');
		$this->load->view('templates/topbar.php');
        $this->load->view('pasien/dashboard', $data);
		// $this->load->view('templates/footer.php');
    }

    public function tambah() {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $data = array(
        //         'no_antrian' => $this->input->post('no_antrian'),
        //         'nama' => $this->input->post('nama'),
        //         'usia' => $this->input->post('usia'),
        //         'no_telp' => $this->input->post('no_telp'),
        //         'jk' => $this->input->post('jk'),
        //         'keluhan' => $this->input->post('keluhan'),
        //         'status' => $this->input->post('status'),
        //         'waktu_daftar' => date('Y-m-d H:i:s')
        //     );

        //     $this->Pasien_model->tambah_pasien($data);
        //     redirect('pasien');
        // } else {
        //     $this->load->view('pasien/tambah');
        // }
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $data = array(
        //         'no_antrian' => $this->input->post('no_antrian'),
        //         'nama' => $this->input->post('nama'),
        //         'usia' => $this->input->post('usia'),
        //         'no_telp' => $this->input->post('no_telp'),
        //         'jk' => $this->input->post('jk'),
        //         'keluhan' => $this->input->post('keluhan'),
        //         'status' => $this->input->post('status')
        //     );
    
        //     $this->Pasien_model->tambah_pasien($data);
        //     redirect('pasien');
        // } else {
        //     $this->load->view('pasien/tambah');
        // }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'keluhan' => $this->input->post('keluhan'),
                'status' => $this->input->post('status'),
                'penjamin' => $this->input->post('penjamin'),
                'no_bpjs' => $this->input->post('no_bpjs'),
                'nik' => $this->input->post('nik')
            );
    
            $this->Pasien_model->tambah_pasien($data);
            redirect('pasien');
        } else {
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('templates/topbar.php');
            $this->load->view('pasien/tambah');
            $this->load->view('templates/footer.php');
        }
    }

    public function edit($id) {
        $data['pasien'] = $this->Pasien_model->get_pasien_by_id($id);

        if (empty($data['pasien'])) {
            show_404();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                // 'no_antrian' => $this->input->post('no_antrian'),
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'keluhan' => $this->input->post('keluhan'),
                'status' => $this->input->post('status'),
                'penjamin' => $this->input->post('penjamin'),
                'no_bpjs' => $this->input->post('no_bpjs'),
                'nik' => $this->input->post('nik')
            );

            $this->Pasien_model->update_pasien($id, $data);
            redirect('pasien');
        } else {
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('templates/topbar.php');
            $this->load->view('pasien/edit', $data);
            $this->load->view('templates/footer.php');
        }
    }

    // public function edit_selesai($id) {
    //     $data['pasien'] = $this->Pasien_model->get_pasien_by_id($id);

    //     if (empty($data['pasien'])) {
    //         show_404();
    //     }

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $data = array(
    //             'no_antrian' => $this->input->post('no_antrian'),
    //             'nama' => $this->input->post('nama'),
    //             'usia' => $this->input->post('usia'),
    //             'no_telp' => $this->input->post('no_telp'),
    //             'jk' => $this->input->post('jk'),
    //             'keluhan' => $this->input->post('keluhan'),
    //             'status' => $this->input->post('status')
    //         );

    //         $this->Pasien_model->update_pasien($id, $data);
    //         redirect('pasien/index_selesai');
    //     } else {
    //         $this->load->view('templates/header.php');
    //         $this->load->view('templates/sidebar.php');
    //         $this->load->view('templates/topbar.php');
    //         $this->load->view('pasien/edit', $data);
    //         $this->load->view('templates/footer.php');
    //     }
    // }

    public function hapus($id) {
        $this->Pasien_model->hapus_pasien($id);
        redirect('pasien');
    }

    public function dalam_antrian($id) {
        $this->Pasien_model->dalam_antrian_pasien($id);
        redirect('pasien');
    }
    public function selesai($id) {
        $this->Pasien_model->selesai_pasien($id);
        redirect('pasien');
    }

    public function check_status_change() {
        // Lakukan pemrosesan untuk memeriksa perubahan status
        // Anda perlu menentukan logika yang sesuai di sini
    
        $data['status_changed'] = true; // Misalnya, status berubah
    
        echo json_encode($data);
    }

    public function get_nomor_antrian_teratas() {
        $this->load->model('Pasien_model');
        $nomor_antrian = $this->Pasien_model->get_nomor_antrian_teratas();
        echo $nomor_antrian;
    }
    
    public function hapus_banyak() {
        if (isset($_POST['hapus'])) {
            $data = $this->input->post('pilih');
    
            if (!empty($data)) {
                foreach ($data as $id_pasien) {
                    $this->Pasien_model->hapus_pasien($id_pasien);
                }
    
                redirect('pasien/index'); // Redirect kembali ke halaman data pasien
            } else {
                redirect('pasien/index'); // Redirect jika tidak ada data yang dipilih
            }
        } else {
            redirect('pasien/index'); // Redirect jika tombol "Hapus" tidak ditekan
        }
    }
    
    
    
}
