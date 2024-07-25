<?php

class Madmin extends CI_Model {

    public function cek_login($u, $p){
        $q = $this->db->get_where('admin', array('username'=>$u, 'password'=>$p));
        return $q;
    }

    public function cek_login_user($u, $p){
        $q = $this->db->get_where('tbl_customer', array('Cnama'=>$u, 'Cpassword'=>$p));
        return $q;
    }

     //get_where
     public function get_where($table, $conditions) {
        $query = $this->db->get_where($table, $conditions);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_all_data($tabel){
        $q = $this->db->get($tabel);
        return $q;
    }

    public function get_count($tabel){
        return $this->db->count_all($tabel);
    }

    public function get_data_per_page($tabel, $limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->get($tabel);
        return $query->result();
    }

    public function insert($tabel, $data){
        $this->db->insert($tabel, $data);
    }

    public function get_by_id($tabel, $id){
        return $this->db->get_where($tabel, $id);
    }

    public function update($tabel, $data, $pk, $id){
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }

    public function delete($tabel, $id, $val){
        $this->db->delete($tabel, array($id => $val));
    }

}
?>