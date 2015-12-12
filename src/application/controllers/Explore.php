<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 控制器不知道数据库的细节，只知道模型，所以这里不能出现字段名

class Explore extends MARKIT_Controller {

	public function index() {
		redirect('explore/themes', 'refresh');
	}
	
	// Explore/themes
	// 查看 themes 列表
	public function themes($order = 'newest') {
	// Explore/theme/newest 显示最近的主题

		$this->load->model('theme_model');

		$data['themes'] = $this->theme_model->get_all();
		$this->load->view('explore_themes_page', $data);

	}

	// Explore/marks
	// 查看 marks 列表 或指定theme里的marks
	// latest:
	public function marks($theme_id = null, $order = 'newest') { 
		
		$this->load->model('theme_model');
		$this->theme_model->select($theme_id);
		$this->load->model('mark_model');

		$data['marks'] 		= $this->theme_model->get_marks($order);
		$data['theme_name'] = $this->theme_model->get_name();
		$data['theme_id'] 	= $theme_id;

        foreach ($data['marks'] as $key => $mk):
            $data['tags'][$key] = $this->mark_model->get_tags($mk->mark_id);
        endforeach;	

		$this->load->view('explore_marks_page', $data);
	}

	public function users($theme_id = null, $order = 'top') { 
		$this->load->model('user_model');

		$data['users'] = $this->user_model->get_leaderboard($order);
		$this->load->view('explore_users_page', $data);
	}
}
