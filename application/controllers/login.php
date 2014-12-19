<?php

/*
Login控制器负责进行用户登陆校验和注册功能

*/

class Login extends CI_Controller {

	function index() {
		$data['main_content'] = 'login_form';
		$this->load->view('includes/template', $data);
	}

	function username_check($str){
		if(!$this->membership_model->exist() ){
			$this->form_validation->set_message('username_check', '用户名不存在!');
			return FALSE;
		}
		return TRUE;
	}
	
	function username_checkReg($str){
		if(!$this->membership_model->exist() ){
			$this->form_validation->set_message('username_checkReg', 'Username \'%s\' does exist!');
			return True;
		}
		return False;
	}
	
	function password_check($str){
		if(!$this->membership_model->validate() ){
			$this->form_validation->set_message('password_check', '账号或者密码不对请重新填写');
			return FALSE;
		}
		return TRUE;
	}
	
	function validate_credentials() {
		$this->load->library('form_validation');		
		$this->load->model('membership_model');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_password_check');

		if($this->form_validation->run() == FALSE) {
			$this->index();//$this->load->view('login_form');
		}
		else{ // if the user's credentials validated...
			$data = array(
				'username' => $this->input->post('username'), 
				'userid' => $this->membership_model->get_userid(),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('user/index'); // 登录后到用户主页
		}
	}	
	
	function signup() {
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	
	function create_member() {
		$this->load->library('form_validation');
		$this->load->model('membership_model');
		
		// field name, error message, validation rules
//		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_username_checkReg');
//		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
//		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');		
		if($this->form_validation->run() == False) {
			$this->signup();
		}
		else {			
			
			if($query = $this->membership_model->create_member()) {
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
			}
			else {
				$this->load->view('signup_form');			
			}
		}
	}
	
	function logout() {
		$this->session->sess_destroy();
		$this->index();
	}

}