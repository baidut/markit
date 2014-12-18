<?php
// Membership_model的生命周期只有登录这段时间
class Membership_model extends MY_Model {
	private $member;

	function _encrypt($password){
		return $password;//md5($password);
	}
	function exist() {
		$this->db->where('username', $this->input->post('username')); // limit 1
		$query = $this->db->get('user'); // membership
		// return ($query->num_rows == 1)?true:false;
		return $this->member = $query-> row();
	}
	function validate() {
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', $this->_encrypt($this->input->post('password')));
		$query = $this->db->get('user'); // membership

		return $this->member = $query-> row();
	}
	function get_userid() {
		if( $this->member && $userid = $this->member->userid){
			return $userid;
		}
		else return FALSE;
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