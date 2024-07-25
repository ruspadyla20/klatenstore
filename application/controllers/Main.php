<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

	public function index()
	{
		$data['product'] = $this->Madmin->get_all_data('product')->result();
		$this->load->view('home/layout/header');
		$this->load->view('home/layout/menu', $data);
		$this->load->view('home/layout/footer');
	}
}
