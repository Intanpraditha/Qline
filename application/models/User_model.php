<?php
class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function login($username, $password) {
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        return $query->row();
    }

    public function tambah_user($data) {
        return $this->db->insert('users', $data);
    }
    
    public function get_user($id = null) {
        if ($id === null) {
            return $this->db->get('users')->result();
        } else {
            return $this->db->get_where('users', array('id' => $id))->row();
        }
    }
    
    public function update_user($id, $data) {
        return $this->db->update('users', $data, array('id' => $id));
    }
    
    public function hapus_user($id) {
        return $this->db->delete('users', array('id' => $id));
    }

}
?>
