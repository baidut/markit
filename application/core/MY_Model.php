<?php
// MY_Model 自动装载database，而控制器不装载database
	class MY_Model extends CI_Model{  
	// Unable to locate the specified class: Model.php 把CI_Model写成CI_Controller了
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
	}