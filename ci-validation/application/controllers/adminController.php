<?php
class adminController extends CI_Controller
{
	public function index(){
		if(isset($_SESSION['admin_id'])){
			redirect('/adminController/dashboard');
		}
		$data = $this->input->post();
		if(isset($data['btn_login'])){
			$this->load->model('admin/adminModel');
			$rows = $this->adminModel->adminLogin($data);
			
			if(count($rows)==1){
				$admin = $rows[0];
				$this->session->set_userdata('admin_id', $admin->admin_id);
				$this->session->set_userdata('admin_name', $admin->admin_name);
				$this->session->set_userdata('admin_email', $admin->admin_email);
				redirect('/adminController/dashboard');
			}else{
				echo "Invalid Login Details";
			}
		}
		$this->load->view('admin/login',$data);
	}

	public function dashboard(){
		$data['page'] = 'dashboard';
		$data['title'] = 'Administrator Panel';

		//$data = array('page'=>'dashboard' , 'title'=>'Administrator Panel');
		$this->load->model('admin/adminModel');
		$data['users_counts'] = $this->adminModel->countRecord('tbl_user');
		$data['products_counts'] = $this->adminModel->countRecord('tbl_product');
		//print_r($data);exit();
		
		$this->load->view('admin/index',$data);
	}

	public function profile(){
		$data = array('page'=>'profile' , 'title'=>'Administrator Panel' , 'btn_update'=>$this->input->post('btn_update') , 'admin_id'=>$this->input->post('admin_id') ,'txt_name'=>$this->input->post('txt_name') ,'txt_email'=>$this->input->post('txt_email'));
		
		$id = "";
		if(isset($data['btn_update'])){		
			$this->load->model("admin/adminModel");
			$result = $this->adminModel->update($data);
			if($result){
				echo "Record Updated Successfully";
			}
		}else{
			$this->load->model("admin/adminModel");
			$result = $this->adminModel->findAdmin($id);
			$data['admin_name'] = $result[0]->admin_name;
			$data['admin_email'] = $result[0]->admin_email;
			$data['admin_id'] = $result[0]->admin_id;
			$this->load->view('admin/index',$data);
		}
	}	

	public function register(){
		$data = array('page'=>'register' , 'title'=>'Administrator Panel');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('txt_name', 'Name', 'required');
		$this->form_validation->set_rules('txt_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('txt_password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('rdo_gender', 'Gender', 'required');
		$this->form_validation->set_rules('cmb_city', 'City', 'required');
		$this->form_validation->set_rules('chk_hobby[]', 'Hobby', 'required');
		$this->form_validation->set_rules('txt_contact', 'Contact', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/index',$data);	
		}else{
			$data = $this->input->post();
			$this->load->model('admin/adminModel');
			$result = $this->adminModel->register($data);
			if($result){
				redirect('/adminController/user');
			}else{
				echo "Error";
			}
		}
	}

	public function user(){
		$this->load->model("admin/adminModel");
		$data = array('page'=>'users' , 'title'=>'Administrator Panel');
		$data['users'] = $this->adminModel->getAllUsers();
		$this->load->view("admin/index",$data);
	}

	public function updateUser($id){
		$data = array('page'=>'updateuser' , 'title'=>'Administrator Panel' , 'btn_update'=>$this->input->post('btn_update') , 'user_id'=>$this->input->post('user_id') ,'txt_name'=>$this->input->post('txt_name') ,'txt_email'=>$this->input->post('txt_email') , 'rdo_gender'=>$this->input->post('rdo_gender') , 'txt_contact'=>$this->input->post('txt_contact') , 'cmb_city'=>$this->input->post('cmb_city') , 'chk_hobby'=>$this->input->post('chk_hobby'));

		if(isset($data['btn_update'])){		
			print_r($data);
			$this->load->model("admin/adminModel");
			$result = $this->adminModel->updateUser($data);
			if($result){

				redirect('/adminController/user');
			}
		}else{
			$this->load->model("admin/adminModel");
			$result = $this->adminModel->findUser($id);
			
			$data['user_name'] = $result[0]->user_name;
			$data['user_email'] = $result[0]->user_email;
			$data['user_gender'] = $result[0]->user_gender;
			$data['user_contact'] = $result[0]->user_contact;
			$data['user_city'] = $result[0]->user_city;
			$data['user_hobby'] = explode(',',$result[0]->user_hobby);
			$data['user_id'] = $result[0]->user_id;
			
			$this->load->view('admin/index',$data);
		}
	}

	public function deleteUser($id){
		$this->load->model("admin/adminModel");
		$result = $this->adminModel->deleteUSer($id);
		if($result){
			redirect('/adminController/user');	
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/adminController/index');
	}

	public function data(){
		$this->load->library('pagination');
		$this->perPage = 10;
		$this->load->model("admin/adminModel");
		$data = array('page'=>'data' , 'title'=>'Administrator Panel');
		 //get rows count
		$conditions['returnType'] = 'count';
		$totalRec = $this->adminModel->getRows($conditions);

        //pagination config
		$config['base_url']    = base_url().'adminController/data/';
		$config['uri_segment'] = 3;
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;

         //styling
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

         //initialize pagination library
		$this->pagination->initialize($config);

         //define offset
		$page = $this->uri->segment(3);
		$offset = !$page?0:$page;

        //get rows
		$conditions['returnType'] = '';
		$conditions['start'] = $offset;
		$conditions['limit'] = $this->perPage;
		$data['users'] = $this->adminModel->getRows($conditions);

		//$data['users'] = $this->adminModel->getAllUsers();
		$this->load->view("admin/index",$data);
	}

	public function multiForm(){
		$data['page'] = 'multiform';
		$data['title'] = 'Administrator Panel';
		$this->load->view('admin/index',$data);
	}

	public function multistepform(){
		$data = $this->input->post();

		if($data['user_id']){
			$this->load->model("admin/adminModel");
			$this->adminModel->updateMultiForm($data);	
		}else{	
			$this->load->model("admin/adminModel");
			$this->adminModel->insertMultiForm($data);	
			$lastid = $this->db->insert_id();

			$data = array('inserted_id'=>$lastid);
			echo json_encode($data);
		}
	}

	public function multisecondstepform(){
		$data = $this->input->post();
		if($data['user_id']){
			$this->load->model("admin/adminModel");
		$this->adminModel->updateMultiSecondForm($data);	
		}
	}

	public function multithirdstepform(){
		$data = $this->input->post();
		if($data['user_id']){
			$this->load->model("admin/adminModel");
		$this->adminModel->updateMultiThirdForm($data);	
		}
	}


}
?>