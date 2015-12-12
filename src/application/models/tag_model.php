<?php

class tag_model extends CI_Model{
	protected $_tag_id;
	protected $_tag_name;

	public function __construct() {

        parent::__construct();
		
		$this->load->database();

	}

    public function get_marks($tag_id, $theme_id, $order = 'newest'){
    	switch ($order) {
		case 'newest':
		case 'latest':
		  	$order_by = 'datetime';
		  	$direction = 'desc';
		  	break;  
		case 'oldest':
		  	$order_by = 'datetime';
		  	$direction = 'asc';
		  	break;

		default:
			show_error('Error in theme_model.get_marks: unknown cases!');
		}


    	$this->db->select('mark_id,title,url,contributor,value,username,contribution')
		 		->where('tagid', $tag_id)
		 		->where('themeid', $theme_id)
		 		->from('mark_to_tag')
		 		->order_by($order_by, $direction)
		 		->join('mark','mark.mark_id = markid')
				->join('auth_users', 'auth_users.id = contributor');

	    $query = $this->db->get();
	    $result = $query->result();

		return $result;
    }
}