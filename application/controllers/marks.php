<?php

class Marks extends MY_Controller {
	// 显示大家正在收藏的书签
	function index(){
		$this->load->database();

		$data['query'] = $this->db->get('mark');
		$data['title'] = '大家正在收藏';
		$data['main_content'] = 'mark_view';
		
		$this->load->view('includes/template', $data);
	}
	// 显示最近的书签
	function latest(){
		$this->load->database();

		$data['query'] = $this->db->get('mark');
		$data['title'] = '最新收藏';
		$data['main_content'] = 'mark_view';
		
		$this->load->view('includes/template', $data);
	}
}