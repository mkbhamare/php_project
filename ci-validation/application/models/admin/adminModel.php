<?php
class adminModel extends CI_Model
{
	public function adminLogin($data){
		$txt_email = $data['txt_email'];
		$txt_password = md5($data['txt_password']);

		$query = $this->db->query("select * from tbl_admin where admin_email = '$txt_email'  and  admin_password = '$txt_password'");
		return $query->result();
	}

	public function findAdmin($id){
		$query = $this->db->query("select * from tbl_admin");
		return $query->result();
	}

	public function update($data){
		$this->admin_id = $data['admin_id'];
		$this->admin_name = $data['txt_name'];
		$this->admin_email = $data['txt_email'];
		return $this->db->update('tbl_admin' , $this , array('admin_id' => $data['admin_id']));
	}	

	public function register($data)
	{
		///extract($data);
		$user_name = $data['txt_name'];
		$user_email = $data['txt_email'];
		$user_password = md5($data['txt_password']);
		$user_gender = $data['rdo_gender'];
		$user_city = $data['cmb_city'];
		$user_hobby = implode(',',$data['chk_hobby']);
		$user_contact = $data['txt_contact'];
		
		$data = array(
			'user_name' => $user_name,
			'user_email' => $user_email,
			'user_password' => $user_password,
			'user_gender' => $user_gender,
			'user_city' => $user_city,
			'user_hobby' => $user_hobby,
			'user_contact' => $user_contact
		);
		return $this->db->insert('tbl_user',$data);
	}

	public function getAllUsers()
	{
		$query = $this->db->query("select * from tbl_user");
		return $query->result();
	}

	function getRows($params = array()){
		$this->db->select('*');
		$this->db->from('tbl_user');
		if(array_key_exists("id",$params)){
			$this->db->where('id',$params['id']);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
            //set start and limit
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			}
			
			if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
				$result = $this->db->count_all_results();
			}else{
				$query = $this->db->get();
				$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
			}
		}
        //return fetched data
		return $result;
	}

	public function countRecord($table){
		return $query = $this->db->select('*')->get($table)->num_rows();
	}

	public function getParentCategory(){
		$query = $this->db->query("SELECT * FROM `tbl_product_category` where `parent_category_id`='0'");
		return $query->result();
	}

	public function addProduct($data){
		$product_name = $data['txt_name'];
		$product_description = $data['ta_desc'];
		$product_price = $data['txt_price'];
		$product_status = $data['cmb_available'];
		$product_category = $data['cmb_parent_cat'];
		$product_sub_category = $data['cmb_sub_cat'];
		$product_image = $data['product_image'];

		$data = array(
			'product_name' => $product_name,
			'product_description' => $product_description,
			'product_price' => $product_price,
			'product_status' => $product_status,
			'product_category' => $product_category,
			'product_sub_category' => $product_sub_category,
			'product_image' => $product_image
		);
		return $this->db->insert('tbl_product',$data);
	}

	public function addMainCategory($data)
	{
		$category_name = $data['txt_name'];
		$category_description = $data['ta_desc'];
		$category_status = $data['cmb_available'];

		$data = array(
			'category_name' => $category_name,
			'category_description' => $category_description,
			'category_status' => $category_status
		);
		return $this->db->insert('tbl_product_category',$data);
	}

	public function addSubCategory($data)
	{
		$category_name = $data['txt_name'];
		$category_description = $data['ta_desc'];
		$category_status = $data['cmb_available'];
		$parent_category_id = $data['cmb_parent_cat'];

		$data = array(
			'category_name' => $category_name,
			'category_description' => $category_description,
			'category_status' => $category_status,
			'parent_category_id' => $parent_category_id		
		);
		return $this->db->insert('tbl_product_category',$data);
	}	

	public function getSubCategory($id){
		//print_r($data);
		$query = $this->db->query('SELECT * FROM tbl_product_category where parent_category_id = '.$id);
		return $query->result();
	}

	public function getAllProducts($id){
		$query = $this->db->query('SELECT * FROM tbl_product where is_deleted = 0 and product_sub_category = '.$id );	
		return $query->result();
	}

	public function allProducts($txt_search,$cmb_sub_cat,$cmb_available,$cmb_parent_cat){

		if($txt_search != ''){
			$sWhere .= " and product_name like '%$txt_search%'";
		}
		if($cmb_sub_cat != ''){
			$sWhere .= " and product_sub_category like '%$cmb_sub_cat%'";
		}
		if($cmb_available != ''){
			$sWhere .= " and product_status like '%$cmb_available%'";
		}
		if($cmb_parent_cat != ''){
			$sWhere .= " and product_category = '$cmb_parent_cat'";
		}

		$sql = "select * from tbl_product where is_deleted = 0 $sWhere";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function displayMainCategory(){
		$query = $this->db->query("SELECT * FROM `tbl_product_category` where `parent_category_id`='0'");
		return $query->result();
	}

	public function findMainCategory($id){
		$query = $this->db->query("select * from tbl_product_category where category_id = '$id' ");
		return $query->result();
	}

	public function findSubCategory($id){
		$query = $this->db->query("select * from tbl_product_category where category_id = '$id' ");
		return $query->result();
	}

	public function updateMainCategory($data){
		$this->category_id = $data['category_id'];
		$this->category_name = $data['txt_name'];
		$this->category_description = $data['ta_desc'];
		$this->category_status = $data['cmb_available'];
		return $this->db->update('tbl_product_category' , $this , array('category_id' => $data['category_id']));
	}

	public function updateSubCategory($data){
		$this->category_id = $data['category_id'];
		$this->category_name = $data['txt_name'];
		$this->category_description = $data['ta_desc'];
		$this->category_status = $data['cmb_available'];
		return $this->db->update('tbl_product_category' , $this , array('category_id' => $data['category_id']));
	}

	public function deleteMainCategory($id){
		$query = $this->db->query("delete from tbl_product_category where category_id = '$id' ");
		return $query;
	}

	public function deleteSubCategory($id){
		$query = $this->db->query("delete from tbl_product_category where category_id = '$id' ");
		return $query;	
	}

	public function deleteUser($id){
		$query = $this->db->query("delete from tbl_user where user_id = '$id' ");
		return $query;
	}

	public function deleteProduct($id){
		$query = $this->db->query("update tbl_product set is_deleted = 1 where product_id = '$id'");
		return $query;
	}

	public function findUser($id){
		$query = $this->db->query("select * from tbl_user where user_id = '$id' ");
		return $query->result();	
	}

	public function findProduct($id){
		$query = $this->db->query("select * from tbl_product where product_id = '$id' ");
		return $query->result();		
	}

	public function updateUser($data){
		$this->user_id = $data['user_id'];
		$this->user_name = $data['txt_name'];
		$this->user_email = $data['txt_email'];
		$this->user_gender = $data['rdo_gender'];
		$this->user_password = $data['txt_password'];
		$this->user_contact = $data['txt_contact'];
		$this->user_city = $data['cmb_city'];
		$this->user_hobby = implode(',',$data['chk_hobby']);
		return $this->db->update('tbl_user' , $this , array('user_id' => $data['user_id']));
	}

	public function updateSelectedProduct($data){
		$this->product_id = $data['product_id'];
		$this->product_name = $data['txt_name'];
		$this->product_description = $data['ta_desc'];
		$this->product_price = $data['txt_price'];
		$this->product_status = $data['cmb_available'];
		$this->product_category = $data['cmb_parent_cat'];
		$this->product_sub_category = $data['cmb_sub_cat'];
		
		return $this->db->update('tbl_product' , $this , array('product_id' => $data['product_id']));
	}

	public function search($txt_user_search){
		$query = $this->db->query("select * from tbl_user where user_name like '%$txt_user_search%' or user_contact like '%$txt_user_search%' or user_gender like '%$txt_user_search%' or user_city like '%$txt_user_search%' or user_hobby like '%$txt_user_search%' or user_id like '%$txt_user_search%'");
		return $query->result();
	}

	public function insertMultiForm($data){

		if($data['firstname']){
			$firstname = $data['firstname'];
			$lastname = $data['lastname'];
			$contact_num = $data['contact_num'];
			$email = $data['email'];
			$gender = $data['gender'];

			$data = array(
				'firstname' => $firstname,
				'lastname' => $lastname,
				'contact_num' => $contact_num,
				'email' => $email,
				'gender' => $gender);
		}
		return $this->db->insert('tbl_multi_form',$data);

	}

	public function updateMultiForm($data){
		$this->user_id = $data['user_id'];
		$this->firstname = $data['firstname'];
		$this->lastname = $data['lastname'];
		$this->contact_num = $data['contact_num'];
		$this->email = $data['email'];
		$this->gender = $data['gender'];
		
		return $this->db->update('tbl_multi_form' , $this , array('user_id' => $data['user_id']));
	}

	public function updateMultiSecondForm($data){
		$this->user_id = $data['user_id'];
		$this->city = $data['city'];
		$this->address = $data['address'];

		return $this->db->update('tbl_multi_form' , $this , array('user_id' => $data['user_id']));
	}


	public function updateMultiThirdForm($data){
		$this->user_id = $data['user_id'];
		$this->education = $data['education'];
		$this->designation = $data['designation'];

		return $this->db->update('tbl_multi_form' , $this , array('user_id' => $data['user_id']));
	}

	public function mobileList() {
		$this->db->select(array('m.id', 'm.model_no', 'm.mobile_name', 'm.company', 'm.price', 'm.mobile_category'));
		$this->db->from('mobiles as m');
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>