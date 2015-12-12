<?php

class mark_model extends CI_Model{
	protected $_mark_id;
	protected $_theme_id;
	protected $_tag_id = array();

	public function __construct() {

        parent::__construct();
		
		$this->load->database();

	}

	public function select($_mark_id) {
		if($_mark_id){
			$query = $this->db->select('mark_id, theme_id')
	    					  ->where('mark_id', $_mark_id)
							  ->get('mark');
			$result = $query->row();

			if(!$result){
				show_error('Error in mark_model.select: mark cannot found!');
			}
			else {
				$this->_mark_id = $mark_id;
				$this->_theme_id = $result->theme_id;
			}
		}
    }

    public function get_tags($mark_id){
    	$this->db->select('tag_id, tag_name')
		 		->where('mark_id', $mark_id)
		 		->from('mark_to_tag')
		 		->join('tag','tag_id = id');

	    $query = $this->db->get();
	    $result = $query->result();

		return $result;
    }
}