<?php
class Pasien_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Memuat pustaka database
    }

    public function get_last_no_antrian() {
        $this->db->select_max('no_antrian');
        $query = $this->db->get('pasien');
        $row = $query->row();
        return ($row->no_antrian) ? $row->no_antrian + 1 : 1;
    }

    // Fungsi untuk menambahkan data pasien
    public function tambah_pasien($data) {
        $data['no_antrian'] = $this->get_last_no_antrian();
        $data['status'] = 'belum datang'; // Status otomatis diisi 'dalam antrian'
        $this->db->insert('pasien', $data);
        return $this->db->insert_id();
        // $data['waktu_daftar'] = date('Y-m-d H:i:s'); // Mendapatkan waktu saat ini
        // $this->db->insert('pasien', $data);
        // return $this->db->insert_id();
    }

    // Tambahkan fungsi untuk mengubah status menjadi 'selesai'
    public function selesai_pasien($id) {
        $data = array('status' => 'selesai');
        $this->db->where('id_pasien', $id);
        $this->db->update('pasien', $data);
    }
    public function dalam_antrian_pasien($id) {
        $data = array('status' => 'dalam antrian');
        $this->db->where('id_pasien', $id);
        $this->db->update('pasien', $data);
    }

    // Fungsi untuk mendapatkan data pasien berdasarkan ID
    public function get_pasien_by_id($id) {
        return $this->db->get_where('pasien', array('id_pasien' => $id))->row();
    }

    // Fungsi untuk mengupdate data pasien berdasarkan ID
    public function update_pasien($id, $data) {
        $this->db->where('id_pasien', $id);
        $this->db->update('pasien', $data);
    }

    // Fungsi untuk menghapus data pasien berdasarkan ID
    public function hapus_pasien($id) {
        $this->db->where('id_pasien', $id);
        $this->db->delete('pasien');
    }

    // Fungsi untuk mendapatkan semua data pasien
    public function get_all_pasien() {
        return $this->db->get('pasien')->result();
    }

    public function get_pasien_with_status($status) {
        $this->db->where('status', $status);
        $query = $this->db->get('pasien');
        return $query->result();
    }
    public function get_nomor_antrian_by_id($id) {
        $this->load->model('Pasien_model');
        $nomor_antrian = $this->Pasien_model->get_nomor_antrian_by_id($id);
        echo $nomor_antrian;
    }
    public function get_all_statuses() {
        return array(
            'dalam antrian' => 'Dalam Antrian',
            'selesai' => 'Selesai',
            'belum datang' => 'Belum Datang', // Tambahkan opsi "belum datang"
        );
    }
    // public function get_pasien_selesai() {
    //     $this->db->where('status =', 'belum datang');
    //     $query = $this->db->get('pasien');
    //     return $query->result();
    // }
    
    public function hitung_pasien_hari_ini() {
        $this->db->where('status', 'selesai');
        $this->db->where('DATE(waktu_daftar)', date('Y-m-d'));
        $query = $this->db->get('pasien');
        return $query->num_rows();
    }
    
    public function hitung_pasien_bulan_ini() {
        $this->db->where('status', 'selesai');
        $this->db->where('MONTH(waktu_daftar)', date('m'));
        $this->db->where('YEAR(waktu_daftar)', date('Y'));
        $query = $this->db->get('pasien');
        return $query->num_rows();
    }
    
    
    
}
