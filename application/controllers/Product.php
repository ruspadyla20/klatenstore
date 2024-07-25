<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

	public function index()
	{
		$data['product'] = $this->Madmin->get_all_data('product')->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/product/tampilProduct',$data);
		$this->load->view('admin/layout/footer');
	}

	public function add(){
        $this->load->view('admin/layout/header');
		$this->load->view('admin/product/tambahProduct');
		$this->load->view('admin/layout/footer');
    }

    public function save(){
        $idServices = $this->input->post('id');
        $Snama = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $config['upload_path'] = './assets/foto_produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')){
            $data_file = $this->upload->data();
            $data_insert=array(
                'id' => $id,
                'nama_produk' => $Snama,
                'gambar' => $data_file['file_name'],
                'harga' => $harga,
            );
            $this->Madmin->insert('product', $data_insert);
            redirect('product');
        } else {
            redirect('product/add');
        }
    }

    public function get_by_id($id){
        $data['id'] = $id;
        $dataWhere = array('id' => $id);
        $data['product'] = $this->Madmin->get_by_id('product', $dataWhere)->row_object();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/product/editProduct', $data);
		$this->load->view('admin/layout/footer');
    }

    public function edit($id_product){
        $data['product'] = $this->Madmin->get_by_id('product', array('id' => $id_product))->row();
        $Snama = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $gambar_lama = $this->input->post('gambar_lama'); 
        
        $config['upload_path'] = './assets/foto_produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 1000; 
        $this->load->library('upload', $config);
    
        $gambar_baru = NULL;
    
        if(!empty($_FILES['gambar']['name'])) {
            if($this->upload->do_upload('gambar')){
                $data_file = $this->upload->data();
                $gambar_baru = $data_file['file_name'];
            } else {
                // Penanganan jika gagal mengunggah gambar baru
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('product/get_by_id/'.$id_product);
            }
        } else {
            // Jika tidak ada file yang diunggah, gunakan gambar lama
            $gambar_baru = $gambar_lama;
        }
        
        $dataUpdate= array(
            'nama_produk' => $Snama,
            'harga' => $harga,
            'gambar' => $gambar_baru ? $gambar_baru : $gambar_lama,
        );
    
        $this->Madmin->update('product', $dataUpdate, 'id', $id_product);
        $this->session->set_flashdata('success', 'product berhasil diupdate.');
        redirect('product');
    }
    

    public function delete($id){
        $this->Madmin->delete('product', 'id', $id);
        redirect('product');
    }
}