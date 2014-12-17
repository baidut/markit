<?php

class User extends MY_Controller {
	/**
	 * 为登录用户提供的操作，登录用户继承自游客
	 * index.php/user/index
	 */
	function __construct() {
		parent::__construct();
		$this->is_logged_in();
	}
	function is_logged_in() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true) {
			//echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';	
			//die();		
			redirect('login');
		}
	}
	// 用户主页-显示当前用户的收藏
	public function index() { 
		$data['marks'] = array(
			array('title'=>'百度','link'=>'http://www.baidu.com'),
			array('title'=>'github','link'=>'https://github.com'),
		);
		$data['query'] = $this->db->get('user');
		$data['main_content'] = 'user_view';
		$this->load->view('includes/template', $data);
	}
	// 添加书签页面
	public function add_mark(){
		$data['main_content'] = 'create_mark_form';
		$this->load->view('includes/template', $data);
	}
}