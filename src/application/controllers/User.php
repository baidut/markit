<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MARKIT_Controller {

	protected $_userid;
	protected $_username;
	
	public function __construct() {

        parent::__construct();

        $this->load->model('user_model');
		
		$this->load->library(array('form_validation'));
		if (!$this->user_model->is_logged_in()) {
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
  }

	public function index() {
		redirect('explore/themes', 'refresh');
	}

	public function contrib($theme_id = null, $theme_name = null) {
		if($theme_id && $theme_name){
			$data['opt_themes'] = array($theme_id=>urldecode($theme_name));
		} else {
			$data['opt_themes'] = $this->user_model->liked_theme();
		}
		$data['mark_url'] = urldecode($this->input->get('url')); // $mark_url
		$data['mark_title'] = urldecode($this->input->get('title')); // $mark_title
		// print_r($data['opt_themes']);
		$this->load->view('new_mark_page', $data);
	}
	public function contrib_mark() {

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('url', 'url', 'required');

		if ($this->form_validation->run() == FALSE) {
			show_error('填写不正确');
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('user/contrib_mark', $data);
			// redirect('user/contrib_mark', 'refresh');
		} else {
			$this->user_model->new_mark(
	    		$this->input->post('title'),
	    		$this->input->post('url'),
	    		$this->input->post('theme_id'));
			redirect('explore/marks/'.$this->input->post('theme_id').'/newest', 'refresh');
		}
	}

	// user/new_mark
	public function new_mark($theme_id) {

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('url', 'url', 'required');

		if ($this->form_validation->run() == FALSE) {
            $this->load->view('new_mark_page', array('theme_id'=>$theme_id));
        }
        else {
        	$this->user_model->new_mark(
        		$this->input->post('title'),
        		$this->input->post('url'),
        		$theme_id);
			redirect('explore/themes', 'refresh');
        }
	}

	public function new_tag($mark_id, $theme_id = 0) {
		$data['theme_id'] = $theme_id;
		$data['mark_id'] = $mark_id;
		$this->load->view('new_tag_page', $data);
	}

	public function add_tag($mark_id, $theme_id = null) {
		$this->user_model->add_tag(
			$this->input->post('name'), $mark_id, $theme_id);
		redirect('explore/marks/'.$theme_id, 'refresh');
	}

	public function new_theme() {
		$this->user_model->new_theme(
			$this->input->post('name'));
		redirect('explore/themes', 'refresh');
	}

	public function like_theme($theme_id) {
		$status = $this->user_model->like_theme($theme_id);
		// 删除前提醒等放到前端
		redirect('explore/themes', 'refresh');
	}

	public function vote_mark($action,$mark_id) {
		$this->user_model->vote_url($mark_id,$action);
		$this->redirect_back(); 
	}
}
