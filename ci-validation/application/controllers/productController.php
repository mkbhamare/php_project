<?php
class productController extends CI_Controller
{
	public function addMainCategory(){
		$data = array('page'=>'main_category' , 'title'=>'Product Panel');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('txt_name', 'Product Name', 'required');
		$this->form_validation->set_rules('ta_desc', 'Product Description', 'required');
		$this->form_validation->set_rules('cmb_available', 'Availability', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/index',$data);	
		}else{
			$data = $this->input->post();
			$this->load->model('admin/adminModel');
			$result = $this->adminModel->addMainCategory($data);
			if($result){
				redirect('/productController/displayMainCategory');
			}else{
				echo "Error";
			}
		}
	}

	public function addSubCategory(){
		$data = array('page'=>'sub_category' , 'title'=>'Product Panel');
		$this->load->model('admin/adminModel');
		$data['parent_category'] = $this->adminModel->getParentCategory();
		//print_r($data);exit();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('txt_name', 'Product Name', 'required');
		$this->form_validation->set_rules('ta_desc', 'Product Description', 'required');
		$this->form_validation->set_rules('cmb_available', 'Availability', 'required');
		$this->form_validation->set_rules('cmb_parent_cat', 'Availability', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/index',$data);	
		}else{
			$data = $this->input->post();
			// print_r($data);exit();
			$result = $this->adminModel->addSubCategory($data);
			if($result){
				redirect('/productController/displaySubCategory');
			}else{
				echo "Error";
			}
		}
	}

	public function uploadimage($fieldname){
		$config['upload_path']   = base_url .'assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = 50000;
		$config['max_width']     = 1024;
		$config['max_height']    = 768;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload($filedname))
		{
			return array($this->upload->display_errors());
		}
		else
		{
			$data =  $this->upload->data();

			$config['image_library']   = 'gd2';
			$config['source_image']    = base_url .'assets/uploads/'.$data['product_image'];
			$config['new_image']       = base_url .'assets/uploads/thumb/'.$data['product_image'];
			$config['maintain_ratio']  = TRUE;
			$config['width']           = 300;
			$config['height']          = 100;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return $data['product_image'];
		}
		die;
	}
	
	public function addProduct(){
		error_reporting(0);
		$data = array('page'=>'add_product' , 'title'=>'Product Panel');
		$this->load->model('admin/adminModel');
		$data['parent_category'] = $this->adminModel->getParentCategory();
		//$data['sub_category'] = $this->adminModel->getSubCategory();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('txt_name', 'Product Name', 'required');
		$this->form_validation->set_rules('ta_desc', 'Product Description', 'required');
		$this->form_validation->set_rules('txt_price', 'Product Price', 'required');
		$this->form_validation->set_rules('cmb_available', 'Availability', 'required');
		$this->form_validation->set_rules('cmb_parent_cat', 'Parent Category', 'required');
		$this->form_validation->set_rules('cmb_sub_cat', 'Sub Category', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/index',$data);	
		}else{
			
			if($_FILES["product_image"]["name"]){
				$res = $this->uploadimage('image');
			}

			$data = $this->input->post();
			if($_FILES["product_image"]["name"]){
				$data['product_image'] = $res;
			}
			//print_r($data);exit();
			$result = $this->adminModel->addProduct($data);
			if($result){
				?>
				<script type="text/javascript">
					alert("inserted successfully");
				</script>
				<?php
			}
		}
	}

	public function productSubCategory(){
		
		$this->load->model('admin/adminModel');
		if($_POST['parent_cat']){
			$sub_category = $this->adminModel->getSubCategory($_POST['parent_cat']);
			?>
			<option>---Select Sub Category---</option>
			<?php
			foreach ($sub_category as $key => $value) {
				?>
				<option value="<?=$value->category_id?>"><?=$value->category_name?></option>
				<?php
			}
		}
	}

	public function displayProduct(){
		error_reporting(0);
		$data = array('page'=>'display_product' , 'title'=>'Product Panel' , 'cmb_parent_cat'=>$this->input->post('cmb_parent_cat') ,  'cmb_sub_cat'=>$this->input->post('cmb_sub_cat') ,'txt_search'=>$this->input->post('txt_search') , 'cmb_available'=>$this->input->post('cmb_available') ,  'btn_search'=>$this->input->post('btn_search'));
		
		$this->load->model("admin/adminModel");
		$data['parent_category'] = $this->adminModel->getParentCategory();
		//print_r($data);exit();
		if($data['btn_search']){
			$data['products'] = $this->adminModel->allProducts($data['txt_search'],$data['cmb_sub_cat'],$data['cmb_available'],$data['cmb_parent_cat']);
			// print_r($products);
		}
		$this->load->view('admin/index',$data);
	}
	
	public function displayMainCategory(){
		$data = array('page'=>'display_main_cat' , 'title'=>'Product Panel' );
		//print_r($_POST);exit();
		$this->load->model("admin/adminModel");
		$data['main_category_list'] = $this->adminModel->displayMainCategory();
		$this->load->view('admin/index',$data);
	}

	public function displaySubCategory(){
		$data = array('page'=>'display_sub_cat' , 'title'=>'Product Panel');
		$this->load->model('admin/adminModel');
		$data['parent_category'] = $this->adminModel->getParentCategory();
		$this->load->view('admin/index',$data);
	}

	public function displayProductSubCategory(){
		$this->load->model('admin/adminModel');
		if($_POST['main_cat']){
			$product_sub_category = $this->adminModel->getSubCategory($_POST['main_cat']);
			foreach ($product_sub_category as $key => $value) {
				?>
				<tr>
					<td><?=$value->category_id?></td>
					<td><?=$value->category_name?></td>
					<td><?=$value->category_description?></td>
					<td><?=$value->category_status == '0' ? 'Un-Available' : 'Available';?></td>
					<td>
						<a class="btn btn-success" href="<?=base_url()?>productController/updateSubCategory/<?=$value->category_id?>">Edit</a>
						<a class="btn btn-danger" href="<?=base_url()?>productController/deleteSubCategory/<?=$value->category_id?>" onclick="return confirm('are u sure to delete selected record?')">Delete</a>
					</td>
				</tr>
				<?php
			}
		}
	}

	public function updateProduct($id){
		// $data = $this->input->post();exit();
		$data = array('page'=>'update_product' , 'title'=>'Product Panel' , 'btn_update'=>$this->input->post('btn_update') , 'product_id'=>$this->input->post('product_id') ,'txt_name'=>$this->input->post('txt_name') ,'ta_desc'=>$this->input->post('ta_desc') ,'txt_price'=>$this->input->post('txt_price') , 'cmb_available'=>$this->input->post('cmb_available') , 'cmb_parent_cat'=>$this->input->post('cmb_parent_cat') , 'cmb_sub_cat'=>$this->input->post('cmb_sub_cat'));
		//print_r($data);exit();
		$product_id = "";

		if(isset($data['btn_update'])){		
			$this->load->model("admin/adminModel");
			$result = $this->adminModel->updateSelectedProduct($data);
			
			if($result){
				redirect('/productController/displayProduct');
			}
		}else{
			$this->load->model("admin/adminModel");
			$data['parent_category'] = $this->adminModel->getParentCategory();
			$result = $this->adminModel->findProduct($id);
			
			$data['product_name'] = $result[0]->product_name;
			$data['product_description'] = $result[0]->product_description;
			$data['product_price'] = $result[0]->product_price;
			$data['product_status'] = $result[0]->product_status;
			$data['product_category'] = $result[0]->product_category;
			$data['product_sub_category'] = $result[0]->product_sub_category;
			$data['product_id'] = $result[0]->product_id;
			//print_r($data);exit();
			$this->load->view('admin/index',$data);
		}
	}

	public function updateMainCategory($id){
		$data = array('page'=>'update_main_cat' , 'title'=>'Product Panel' , 'btn_update'=>$this->input->post('btn_update') , 'category_id'=>$this->input->post('category_id') ,'txt_name'=>$this->input->post('txt_name') ,'ta_desc'=>$this->input->post('ta_desc') , 'cmb_available'=>$this->input->post('cmb_available'));
		
		$category_id = "";

		if(isset($data['btn_update'])){		
			$this->load->model("admin/adminModel");
			$result = $this->adminModel->updateMainCategory($data);
			if($result){
				redirect('/productController/displayMainCategory');
			}
		}else{
			$this->load->model("admin/adminModel");
			$result = $this->adminModel->findMainCategory($id);
			// print_r($result);
			// exit();
			$data['category_name'] = $result[0]->category_name;
			$data['category_description'] = $result[0]->category_description;
			$data['category_status'] = $result[0]->category_status;
			$data['category_id'] = $result[0]->category_id;
			$this->load->view('admin/index',$data);
		}
	}

	public function updateSubCategory($id){
		$data = array('page'=>'update_sub_cat' , 'title'=>'Product Panel' , 'btn_update'=>$this->input->post('btn_update') , 'category_id'=>$this->input->post('category_id') ,'txt_name'=>$this->input->post('txt_name') ,'ta_desc'=>$this->input->post('ta_desc') , 'cmb_available'=>$this->input->post('cmb_available'));
		
		$category_id = "";

		if(isset($data['btn_update'])){		
			$this->load->model("admin/adminModel");
			$result = $this->adminModel->updateSubCategory($data);
			if($result){
				redirect('/productController/displaySubCategory');
			}
		}else{
			$this->load->model("admin/adminModel");
			$result = $this->adminModel->findSubCategory($id);
			// print_r($result);
			// exit();
			$data['category_name'] = $result[0]->category_name;
			$data['category_description'] = $result[0]->category_description;
			$data['category_status'] = $result[0]->category_status;
			$data['category_id'] = $result[0]->category_id;
			$this->load->view('admin/index',$data);
		}
	}

	public function deleteMainCategory($id){
		$this->load->model("admin/adminModel");
		$result = $this->adminModel->deleteMainCategory($id);
		if($result){
			redirect('/productController/displayMainCategory');	
		}
	}

	public function deleteSubCategory($id){
		$this->load->model("admin/adminModel");
		$result = $this->adminModel->deleteSubCategory($id);
		if($result){
			redirect('/productController/displaySubCategory');	
		}
	}

	public function deleteProduct($id){
		$this->load->model("admin/adminModel");
		$result = $this->adminModel->deleteProduct($id);
		if($result){
			redirect('/productController/displayProduct');	
		}
	}

	public function searchUser(){
		//$data = $this->input->post();
		$data = array('page'=>'data' , 'title'=>'Product Panel' , 'txt_user_search'=>$this->input->post('txt_user_search'));
		
		$this->load->model("admin/adminModel");
		$search_result = $this->adminModel->search($data['txt_user_search']);
		if($search_result){
			?>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>City</th>
					<th>Hobby</th>
					<th>Contact</th>
				</tr>
			</thead>
			<?php
			foreach ($search_result as $key => $value) {
				?>
				<tr>
					<td><?=$value->user_id?></td>
					<td><?=$value->user_name?></td>
					<td><?=$value->user_gender?></td>
					<td><?=$value->user_city?></td>
					<td><?=$value->user_hobby?></td>
					<td><?=$value->user_contact?></td>
				</tr>
				<?php
			}
		}
	}
}
?>