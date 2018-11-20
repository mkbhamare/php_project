<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data = $this->input->post();
		if(isset($data['btn_login'])){
			$this->load->model('formModel');
			$rows = $this->formModel->login($data);
			
			if(count($rows)==1){
				$user = $rows[0];
				$this->session->set_userdata('user_id', $user->user_id);
				$this->session->set_userdata('user_name', $user->user_name);
				$this->session->set_userdata('user_email', $user->user_email);
				redirect('/Welcome/dashboard');
			}else{
				echo "Invalid Login Details";
			}
		}
		$this->load->view('loginView',$data);
	}

	public function form()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('txt_name', 'Name', 'required');
		$this->form_validation->set_rules('txt_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('txt_password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('txt_conf_password', 'Password Confirmation', 'required|matches[txt_password]');
		$this->form_validation->set_rules('rdo_gender', 'Gender', 'required');
		$this->form_validation->set_rules('cmb_city', 'City', 'required');
		$this->form_validation->set_rules('chk_hobby[]', 'Hobby', 'required');
		$this->form_validation->set_rules('txt_contact', 'Contact', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('formView');	
		}else{
			$data = $this->input->post();
			$this->load->model('formModel');

			$this->formModel->insert($data);
        	
        	redirect('/Welcome/index');
		}
	}

	public function dashboard(){
		$this->load->view("dashboardView");
	}

	// public function display(){
	// 	$this->load->model('formModel');
	// 	$data["rows"] = $this->formModel->getAll('display',$data);
	// 	$this->load->view("")
	// }

	public function update(){
		$id = $_SESSION['user_id'];
		
		$data = $this->input->post();

		if(isset($data['btn_update'])){
			$this->load->model('formModel');
			$result = $this->formModel->update($data);
			if($result){
				echo "updated successfully";
			}
		}else{
				$this->load->model("formModel");
				$result = $this->formModel->findUser($id);
				
				$data = array();
				$data['user_name'] = $result[0]->user_name;
				$data['user_email'] = $result[0]->user_email;
				$data['user_gender'] = $result[0]->user_gender;
				$data['user_city'] = $result[0]->user_city;
				$data['user_hobby'] = explode(',',$result[0]->user_hobby);
				$data['user_contact'] = $result[0]->user_contact;

				$this->load->view("updateView",$data);
			}
		}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/Welcome/index');
	}
}
