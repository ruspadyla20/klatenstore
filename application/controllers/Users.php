<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

	public function index()
	{
		$data['users'] = $this->Madmin->get_all_data('admin')->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/users/tampilUser', $data);
		$this->load->view('admin/layout/footer');
	}

	public function delete($id){
        $this->Madmin->delete('admin', 'id', $id);
        redirect('users');
    }
}