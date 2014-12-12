<?php

// about/home/contact等独立页面的访问
class Pages extends CI_Controller {

	public function view($page = 'home'){

		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')){
		// 页面不存在
			show_404();
		}
  
		$data['title'] = ucfirst($page); // 将title中的第一个字符大写
  
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}