<?php

/*
Login控制器负责进行用户登陆校验和注册功能

*/

class Login extends CI_Controller {

	function index() {
		$data['main_content'] = 'login_form';
		$data['title'] = 'User Login';
		$this->load->view('includes/template', $data);
	}

	function username_check($str){
		if(!$this->membership_model->exist() ){
			$this->form_validation->set_message('username_check', 'Username \'%s\' does not exist!');
			return FALSE;
		}
		return TRUE;
	}
	function password_check($str){
		if(!$this->membership_model->validate() ){
			$this->form_validation->set_message('password_check', 'Incorrect username or password');
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
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('site/members_area');
		}
	}	
	
	function signup() {
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	
	function create_member() {
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
				
		if($this->form_validation->run() == FALSE) {
			$this->signup();
		}
		else {			
			$this->load->model('membership_model');
			
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