<?php

class Users extends MY_Controller {

// 显示所有用户
	public function view($page = 'home'){
		$data['title'] = 'User name';
		$data['heading'] = 'User heading';
		
		$this->load->database();
		$data['query'] = $this->db->get('user');
		
		$this->load->view('user_view',$data);
	}
}