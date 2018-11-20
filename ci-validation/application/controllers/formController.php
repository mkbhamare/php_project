<?php
class formController extends CI_Controller
{
	public function index(){
		$data = $this->input->post();
		
		if(isset($data['btn_register'])){
			if(($data['txt_name']) == "" && ($data['txt_email']) == "" && ($data['txt_contact']) == ""){
				echo "Please Fill All Fields";
			}else if($data['g-recaptcha-response'] == ""){
				echo "Please Check the captcha";
			}else{
				echo "Form Submitted Successfully";
			}
		}
		$this->load->view('form/form_one.php');
	}

	public function image_uploading(){
		
	}
}
?>