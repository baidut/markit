<?php

class Membership_model extends CI_Model {

	function _encrypt($password){
		return $password;//md5($password);
	}
	function exist() {
		$this->db->where('username', $this->input->post('username'));
		$query = $this->db->get('user'); // membership
		
		return ($query->num_rows == 1)?true:false;
	}
	function validate() {
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', $this->_encrypt($this->input->post('password')));
		$query = $this->db->get('user'); // membership
		
		return ($query->num_rows == 1)?true:false;
	}
	function create_member() {
		$new_member_insert_data = array(
			'email' => $this->input->post('email'),			
			'username' => $this->input->post('username'),
			'password' => $this->_encrypt($this->input->post('password'))				
		);
		$insert = $this->db->insert('user', $new_member_insert_data);
		return $insert;
	}
}