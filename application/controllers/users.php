<?php

class Users extends CI_Controller {
	// 显示所有用户
	public function view(){
		$data['title'] = 'User name';
		$data['heading'] = 'User heading';
		
		$this->load->database();
		$data['query'] = $this->db->get('user');
		
		$this->load->view('user_view',$data);
	}
	// 显示用户排行榜
	public function top(){

		$this->load->database();
		$data['query'] = $this->db->get('user');

		$data['title'] = '用户排行榜';
		$data['main_content'] = 'user_view';
		
		$this->load->view('includes/template', $data);
	}
}