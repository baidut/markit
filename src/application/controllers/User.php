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

	public function contrib2theme($theme_id) {
		$data['theme_id'] = $theme_id;
		$this->load->view('new_mark_page', $data);

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

	public function contrib_theme() {
		$this->load->view('new_theme_page');
	}

	public function new_tag($mark_id, $theme_id = 0) {
		$data['theme_id'] = $theme_id;
		$data['mark_id'] = $mark_id;
		$this->load->view('new_tag_page', $data);
	}

	public function add_tag($mark_id, $theme_id = 0) {
		$this->user_model->add_tag(
			$this->input->post('name'), $mark_id, $theme_id);
		redirect('explore/marks/'.$theme_id, 'refresh');
	}

	public function new_theme() {
		$this->user_model->new_theme(
			$this->input->post('name'));
		redirect('explore/themes', 'refresh');
	}

	public function like_theme() {
	}

	public function vote_mark($action,$mark_id) {
		$this->user_model->vote_url($mark_id,$action);
		redirect('explore/marks','refresh');
	}
}
