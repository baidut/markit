<?php

class Marks extends MY_Controller {

// ��ʾ������ǩ
	public function view($page = 'home'){
		$this->load->database();
		
		$data['query'] = $this->db->get('mark');
		$data['main_content'] = 'mark_view';
		$data['title'] = 'Mark name';
		$this->load->view('includes/template', $data);
	}
}