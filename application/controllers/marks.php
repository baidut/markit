<?php

class Marks extends MY_Controller {

// ��ʾ������ǩ
	public function view($page = 'home'){
		$data['title'] = 'Mark name';
		$data['heading'] = 'Mark heading';
		
		$this->load->database();
		$data['query'] = $this->db->get('mark');
		
		$this->load->view('mark_view',$data);
	}
}