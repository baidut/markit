<?php

class theme_model extends CI_Model{

	protected $_id;
	protected $_name;
	protected $_mark_num;
	protected $_like_num;

	public function __construct() {

        parent::__construct();
		
		$this->load->database();

	}

	public function select($id) {
		if($id){
			$query = $this->db->select('theme_name, mark_num, like_num')
	    					  ->where('id', $id)
							  ->get('theme');
			$result = $query->row();

			if(!$result){
				show_error('Error in theme_model.select: Theme cannot found!');
			}
			else {
				$this->_id = $id;
				$this->_name = $result->theme_name;
				$this->_mark_num = $result->mark_num;
				$this->_like_num = $result->like_num;	
			}
		}
    }

    public function get_id() {
    	return $this->_id;
    }
    
    public function get_name() {
    	return $this->_name;
    }

    public function get_mark_num() {
    	return $this->_mark_num;
    }

    public function get_like_num() {
    	return $this->like_num;
    }

    public function get_marks($order = 'newest') {
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
    	 		 ->from('mark');
		if($this->_id){
			$this->db->where('theme_id', $this->_id);
		}
		$this->db->order_by($order_by, $direction);
		$this->db->join('auth_users', 'auth_users.id = contributor');

		$query = $this->db->get();
		return $query->result();
    }

    public function get_all($order = 'newest') {

    	switch ($order) {
		case 'newest':
		case 'latest':
		  	$order_by = 'create_time';
		  	$direction = 'desc';
		  	break;  
		case 'oldest':
		  	$order_by = 'create_time';
		  	$direction = 'asc';
		  	break;

		default:
			show_error('Error in theme_model.get_all: unknown cases!');
		}

		$this->db->select('id,theme_name,like_num,mark_num')->from('theme');;
		$this->db->order_by('create_time', 'desc'); // 

		$query = $this->db->get();
		return $query->result();
    }
}