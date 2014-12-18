<?php
// MY_Model 自动装载database，而控制器不装载database
	class MY_Model extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
	}