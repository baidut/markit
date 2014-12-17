<?php

class User extends MY_Controller {

	/**
	 * 为登录用户提供的操作，登录用户继承自游客
	 * index.php/user/index
	 */
	 
	// 显示当前用户的收藏
	public function index() { 
		$data['title'] = 'User name';
		$data['heading'] = 'User heading';
		$data['marks'] = array(
			array('title'=>'百度','link'=>'http://www.baidu.com'),
			array('title'=>'github','link'=>'https://github.com'),
		);
		
		$this->load->view('user_view',$data);
	}
	
	// 添加书签页面
	public function add_mark(){
		$data['main_content'] = 'create_mark_form';
		$this->load->view('includes/template', $data);
	}
}