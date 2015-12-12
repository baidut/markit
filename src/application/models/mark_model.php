<?php

class mark_model extends CI_Model{
	protected $_mark_id;
	protected $_theme_id;
	protected $_tag_id;

	public function __construct() {

        parent::__construct();
		
		$this->load->database();

	}

    public function get_tags($mark_id){
    	$this->db->select('tagid, tag_name')
		 		->where('markid', $mark_id)
		 		->from('mark_to_tag')
		 		->join('tag','tagid = id');

	    $query = $this->db->get();
	    $result = $query->result();

		return $result;
    }
}