<?php

// 封装了身份验证类, 后续可以用其他验证方式
// 只和后台数据库交互，不管网页前端，对前端隐藏了后台数据库
// 数据库和用户请求分离，解耦

class User_model extends CI_Model{
	protected $_id;
	protected $_name;
	protected $_contribution;

	public function __construct() {

        parent::__construct();
		
		$this->load->library(array('ion_auth'));
		$this->load->database();

		if ($this->is_logged_in()) {
			$this->_id = $this->ion_auth->get_user_id();

			$query = $this->db->select('username, contribution')
			                  ->where('id', $this->_id)
							  ->get('auth_users');
			$result = $query->row(); // if not found
			$this->_name = $result->username;
			$this->_contribution = $result->contribution;
		}
    }

    public function get_id() {
    	return $this->_id;
    }
    
    public function get_name() {
    	return $this->_name;
    }

    public function get_contribution() {
    	return $this->_contribution;
    }

    public function is_logged_in() {
    	return $this->ion_auth->logged_in();
    }

    public function new_mark($tilte, $url, $theme_id) {
    	$new_mark_insert_data = array(
			'title' 		=> $tilte,
			'url' 			=> $url,			
			'theme_id' 		=> $theme_id,
			'contributor' 	=> $this->_id,
		);
		$this->db->insert('mark', $new_mark_insert_data);
        
        // theme mark_num + 1
		$this->db->set('mark_num', 'mark_num+1', FALSE);
		$this->db->where('id', $theme_id);
		$this->db->update('theme');
	}

	public function new_theme($name) {
		$data = array(
			'theme_name' => $name,
		);
		$this->db->insert('theme', $data);

		$theme_id = $this->db->insert_id();
		$this->like_theme($theme_id);
	}

	public function get_leaderboard($order = 'top') {
	// 添加 可以看到自己在排行榜的位置

		switch ($order) {
		case 'newest':
		case 'latest':
		  	$order_by = 'created_on';
		  	$direction = 'desc';
		  	break;  
		case 'oldest':
		  	$order_by = 'created_on';
		  	$direction = 'asc';
		  	break;
		case 'top':
		  	$order_by = 'contribution';
		  	$direction = 'desc';
		  	break;
		default:
			show_error('Error in user_model.get_leaderboard: unknown cases!');
		}

		$query = $this->db->select('id, username, contribution')
		                  ->get('auth_users');

		return $query->result();
	}

	public function like_theme($theme_id) {
		// 先查询
		$data = array(
			'user_id' => $this->_id,
			'theme_id' => $theme_id,
		);
		$query = $this->db->where($data)->get('user_like_theme');

		if($query->num_rows()) {
			 // 已喜欢 链接不可用 --- 改为 已喜欢则取消喜欢
			// 删除
			$status = $this->db->delete('user_like_theme',$data);
			if($status){
				// theme like_num + 1
				$this->db->set('like_num', 'like_num-1', FALSE);
				$this->db->where('id', $theme_id);
				$this->db->update('theme');
			}
		}
		else {
			$status = $this->db->insert('user_like_theme', $data);
			if($status){
				// theme like_num + 1
				$this->db->set('like_num', 'like_num+1', FALSE);
				$this->db->where('id', $theme_id);
				$this->db->update('theme');
			}

		}

		return $status;
	}
	// 用户喜欢的主题
	public function liked_theme() {
		$query = $this->db->select('theme_name, theme_id')
		                  ->where('user_id', $this->_id)
		                  ->join('theme', 'theme.id = user_like_theme.theme_id')
		                  ->get('user_like_theme');

		$themes = $query->result();
		// convert to an array
		$data = array();
		foreach ($themes as $key => $theme) {
			$data[$theme->theme_id] = $theme->theme_name;
		}
		return $data;
	}

	public function vote_url($mark_id,$action) {
		if($action!=1&&$action!=-1)return;  //assert failed 
		//点赞/踩
		$query=$this->db->select('type')->where('user_id', $this->_id)->where('mark_id', $mark_id)->get('vote');
		$result=$query->row();

		if(!$result){
			$new_vote_insert = array(
				'user_id'=>$this->_id,
				'mark_id'=>$mark_id,
				'type'=>$action,
			);
			$this->db->insert('vote',$new_vote_insert);
			//mark value + action
			// 要加FALSE
			$this->db->set('value',($action==1)?'value+1':'value-1', FALSE) // 'value'+'-1' 'value'+'1'  'value'+'-1'
 					->where('mark_id',$mark_id)
					->update('mark');
		}
		else if($result->type == $action){
			$this->db->delete('vote',array('user_id'=>$this->_id,'mark_id'=>$mark_id));
			$this->db->set('value',($action==1)?'value-1':'value+1', FALSE) // cancel
					->where('mark_id',$mark_id)
					->update('mark');
		}
		else {
			$this->db->update('vote',array('type'=>$action), array('user_id'=>$this->_id,'mark_id'=>$mark_id));
			$this->db->set('value',($action==1)?'value+2':'value-2', FALSE)
					->where('mark_id',$mark_id)
					->update('mark');
		}
	}

    public function add_tag($name, $mark_id, $theme_id){
		// no theme selected
		if(!$theme_id){
			$query = $this->db->select('theme_id')
							   ->where('mark_id', $mark_id)
							   ->get('mark');
			$result = $query->row();
			$theme_id = $result->theme_id;
		}
		//result1 judge whether there is tag
     	$query1 = $this->db->select('id, tag_name')
		 		->where('tag_name', $name)
		 		->get('tag');
		$result1 = $query1->row();
		
		//result2 judge whether mark have this tag
		if($result1){
     		$query2 = $this->db->select('markid, tagid')
		 			->where('tagid', $result1->id)
		 			->where('markid', $mark_id)
		 			->get('mark_to_tag');
			$result2 = $query2->row();
		}
		else{
			$result2 = 0;
		}

		if($result2){
			;
		}
		else{
			if($result1){
				$data = array(
				'markid' => $mark_id,
				'tagid' => $result1->id,
				'themeid' => $theme_id,
				);
				$this->db->insert('mark_to_tag', $data);
				$mark_to_tag_id = $this->db->insert_id();
			}
			else{
				$data = array(
				'tag_name' => $name,
				);
				$this->db->insert('tag', $data);
				$id = $this->db->insert_id();

				$data = array(
				'markid' => $mark_id,
				'tagid' => $id,
				'themeid' => $theme_id,
				);
				$this->db->insert('mark_to_tag', $data);
				$mark_to_tag_id = $this->db->insert_id();			
			}
		}
    }	

}