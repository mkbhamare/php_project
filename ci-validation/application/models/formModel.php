<?php
class formModel extends CI_Model 
{
	public function insert($data)
	{
		print_r($data);

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

    public function login($data){
        $txt_email = $data['txt_email'];
        $txt_password = md5($data['txt_password']);

        $query = $this->db->query("select * from tbl_user where user_email = '$txt_email'  and  user_password = '$txt_password'");
        return $query->result();
    }

    public function findUser($id){
        //$id = $_SESSION['user_id'];
        $query = $this->db->query("select * from tbl_user where user_id='$id'");
        return $query->result();
    }

    public function update($data){
        $id = $_SESSION['user_id'];
        
        $this->user_name=$data['txt_name'];
        $this->user_email=$data['txt_email'];
        $this->user_gender=$data['rdo_gender'];
        $this->user_city=$data['cmb_city'];
        $this->user_hobby=implode(',',$data['chk_hobby']);
        $this->user_contact=$data['txt_contact'];  
           
        return $this->db->update('tbl_user', $this, array('user_id' => $id));
    }
}
?>