<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Adminpanel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Madmin');
    }
    
    public function index(){
        $this->load->view('admin/login');
    }

    public function registerView() {
        $this->load->view('admin/register');
    }

    public function dashboard(){
        if(empty($this->session->userdata('username'))){
            redirect('adminpanel');
        }
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/footer');
    }

    public function login(){
        $this->load->model('Madmin');
        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $cek = $this->Madmin->cek_login($u, $p)->num_rows();

        if($cek==1){
            $data_session = array(
                'username' => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('adminpanel/dashboard');
        }else{
            redirect('adminpanel');
        }
    }

    public function register(){
        $this->load->model('Madmin');
        
        // Ambil data dari form input
        $u = $this->input->post('username');
        $p = $this->input->post('password');
        $nama_lengkap = $this->input->post('nama_lengkap');
    
        // Validasi input
        if(empty($u) || empty($p)) {
            // Jika input kosong, redirect kembali ke halaman register dengan pesan error
            $this->session->set_flashdata('error', 'Username dan password tidak boleh kosong');
            redirect('adminpanel/registerView');
        } else {
            // Cek apakah username sudah ada di database
            $existing_user = $this->Madmin->get_where('admin', array('username' => $username));
    
            if ($existing_user) {
                $this->session->set_flashdata('error', 'Username sudah digunakan.');
                redirect('adminpanel/registerView');
                return;
            }
                // Jika username belum ada, simpan data ke database
                $data = array(
                    'username' => $u,
                    'password' => $p, 
                    'nama_lengkap' => $nama_lengkap
                );
                
                $this->Madmin->insert('admin', $data);
                $this->session->set_flashdata('success', 'Registrasi berhasil, silakan login');
                redirect('adminpanel');
            }
        }
    
    


    //logout
	public function logout(){
		$this->session->sess_destroy();
		redirect('adminpanel');
	}
}