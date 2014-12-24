<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';	
			//die();
			redirect('login');
		}
	}
	// 用户主页-显示当前用户的收藏
	function index() { 
		$userid = $this->session->userdata['userid'];
		// $this->db->where('userid', $userid);
		// $data['query'] = $this->db->get('user_mark');
		// TODO： 查询被多少人收藏以及url $sql = "SELECT usernum FROM mark WHERE mark "

		// AR操作的好处是可以进行数据校验，这里不需要，所以直接采用sql语句
		// 先从user_mark中筛选中user的mark，然后和mark连接
		$sql = "SELECT * FROM user_mark,mark WHERE userid = '$userid' AND user_mark.markid = mark.markid";// 最粗暴的写法
		$data['query'] = $this->db->query($sql);
		$data['main_content'] = 'user_main_page';
		$data['sidebar'] = 'user_sidebar';
		$data['is_self'] = TRUE;
		$this->load->view('includes/template', $data);
	}
	// 显示用户收藏的标签
	function tags() { 
	}
	// 显示用户好友
	function friends() { 
	}
	// 显示用户个人资料
	function profile() { 
	}
	// 添加书签页面
	function add_url(){
		if($url = $this->input->post('url')){
			// 抓取页面，分析提取页面的标题
			$sp = new spider;
			$data['url'] = $url;
			$data['fetched_info'] = $sp-> fetch_info($url);
// A PHP Error was encountered
// Severity: Notice
// Message: Undefined index: keywords
// Filename: controllers/user.php
// Line Number: 57
// A PHP Error was encountered
// Severity: Notice
// Message: Undefined index: description
// Filename: controllers/user.php
// Line Number: 58
		}
		$data['title']='收藏新网页';
		$data['main_content'] = 'create_mark_form';
		$this->load->view('includes/template', $data);
	}
	function add_mark(){
		// 用户提交收藏
		$this->load->model('mark_model');
		$url = $this->input->post('geturl');
		$title = $this->input->post('gettitle');
		$info = $this->input->post('info');
		$keywords = $this->input->post('tags');
		// echo "$url,$title,$info";
		$this->mark_model->create($url,$title,$info,$keywords);
		redirect('user/index');
	}
	function remove_mark(){
		// 删除需要用户确认，确认工作交给js做
		// 删除采用AJAX实现
		if($this->input->is_ajax_request()){
			$this->load->model('mark_model');
			$markid = $this->input->post('markid');
			echo $this->mark_model->remove($markid);
		}
	}
}