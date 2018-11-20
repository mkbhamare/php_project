<?php
class uploadController extends CI_Controller
{
	public function index(){
		$this->load->library('upload');
		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']      = 100;
		$config['max_width']     = 1024;
		$config['max_height']    = 768;


		$this->load->library('upload', $config);
		$this->load->view("upload");

		$data['upload_data'] = $this->upload->data();
	}
}
?>