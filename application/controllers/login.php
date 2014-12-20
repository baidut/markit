<?php

/*
Login控制器负责进行用户登陆校验和

login/		 点击登录	
login/signup 点击注册
login/logout 点击退出
*/

class Login extends MY_Controller {

	function index() {
		$data['main_content'] = 'login_form';
		$this->load->view('includes/template', $data);
	}

	function logout() {
		$this->session->sess_destroy();
		$this->index();
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
		$data['cap'] = $this->get_captcha();
		$this->load->view('includes/template', $data);
	}
	function captcha_check($str){
		// 验证码是否正确
		if (!session_id()) session_start();
		// session_start(); // Message: Undefined variable: _SESSION
		if($this->input->post('vcode') != $_SESSION['cap']){
			$this->form_validation->set_message('captcha_check', '验证码输入有误');
			$this->signup();
			return FALSE;
		}
		return TRUE;
	}

	function create_member() {
		$this->load->library('form_validation');
		$this->load->model('membership_model');

		// field name, error message, validation rules
//		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_username_checkReg');
//		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
//		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');		
		$this->form_validation->set_rules('vcode', '验证码', 'trim|required|callback_captcha_check');		
		if($this->form_validation->run() == False) {
			redirect('login/signup'); // 页面刷新后数据丢失，需要在表单里面set_value()
			//$this->signup(); 不刷新页面显示在当前页面下面
		}
		else {			
			if($query = $this->membership_model->create_member()) {
				// TODO 注册完成系统自动完成登录，用户友好
				$data['main_content'] = 'signup_successful';
				$data['cap'] = $this->get_captcha();
				$this->load->view('includes/template', $data);
			}
			else {
				$this->signup();			
			}
		}
	}
}