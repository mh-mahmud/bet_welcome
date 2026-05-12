<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	
	public function authenticate()
	{
		$data = array();
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$result = $this->login_model->authentication($data);	

		if(!empty($result) && isset($result)) {
			$random_str = "123456";
			// $random_str = strtoupper(substr(md5(rand()), 0, 6));
			$random_otp = md5($random_str);
			$this->db->query("UPDATE admin SET otp='{$random_otp}' WHERE id='{$result->id}'");
			// send email to user
			$msg_body = "Dear User, Your login OTP is " . $random_str;
			@mail($data['email'], "Login OTP", $msg_body);
			$this->load->view('admin/otp_check', $data);
			return false;
		}
		else {
		     $this->session->set_flashdata('error', 'Incorrect Crediantials');
		     redirect('admin_login');
		}
	}

	public function authenticate_otp()
	{
		$data = array();
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$result = $this->login_model->authentication_otp($data);
		
		if(count($result) > 0) {
		     $this->session->set_userdata('admin_user_data', $result);
		     redirect('/admin');
		     $this->load->view('admin/otp_check', $data);
		     return false;
		}
		else {
		     $this->session->set_flashdata('error', 'Incorrect Crediantials');
		     redirect('login/authenticate');
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('msg', 'Logged Out Successfully');
		redirect( '/' );
	}
}
