<?php
// 负责about/home/contact等独立页面的访问，独立页面放置在view/pages文件夹下
class Pages extends CI_Controller {

	public function view($page = 'home'){

		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')){
		// 页面不存在
			show_404();
		}
		$data['title'] = ucfirst($page); // 将title中的第一个字符大写
		$data['main_content'] = 'pages/'.$page;
		$this->load->view('includes/template', $data);
	}
}