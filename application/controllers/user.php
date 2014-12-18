﻿<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('SPIDER_PATH',APPPATH.'third_party/php_web_spider/');
require_once(SPIDER_PATH.'php_web_spider.php');
require_once(SPIDER_PATH.'simple_html_dom.php');

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
	function index() { 
		$data['marks'] = array(
			array('title'=>'百度','link'=>'http://www.baidu.com'),
			array('title'=>'github','link'=>'https://github.com'),
		);
		$data['query'] = $this->db->get('user');
		$data['main_content'] = 'user_view';
		$this->load->view('includes/template', $data);
	}
	// 添加书签页面
	function add_url(){
		if($url = $this->input->post('url')){
			// 抓取页面，分析提取页面的标题
			$sp = new spider;
			$info = $sp-> fetch_info($url);

			$data['url'] = $url;
			$data['fetched_title'] = $info['title'];
			$data['fetched_keywords'] = $info['keywords'];
			$data['fetched_description'] = $info['description'];
		}
		$data['main_content'] = 'create_mark_form';
		$this->load->view('includes/template', $data);
	}
	function add_mark(){
		$data['main_content'] = 'create_mark_form';
		$this->load->view('includes/template', $data);
	}
}