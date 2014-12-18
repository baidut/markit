<?php 
	class Mark_model extends CI_Model{
		public function get_id($url){
			$this->db->where('link', $url); // limit 1
			$query = $this->db->get('mark'); 
			return ($row = $query-> row())?$row->markid:FALSE;
		}
	}