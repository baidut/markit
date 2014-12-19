<?php
	class Mark_model extends CI_Model{
		function get_id($url){
			$this->db->where('link', $url); // limit 1
			$query = $this->db->get('mark'); 
			return ($row = $query-> row())?$row->markid:FALSE;
		}
		function create($url,$title,$info){
			$userid = $this->session->userdata('userid');
			$username = $this->session->userdata('username');
			$markid = $this->get_id($url);
			// 多个用户新建动作并发时，数据库可能会出错
			if(!$markid){// 不存在则新建mark 为首次建立用户
				$data = array(
					'title' => $title,// 最好采用网站默认title
					'link' => $url,
	               	'createby' => $username,
	               	// 数据库插入时自动触发记录时间'createtime' => datetime() // "NOW()" 不可用
	            );
				$this->db->insert('mark', $data);
				// 返回刚刚插入数据的id
				$markid = $this->db->insert_id();
			}
			else { // 存在则收藏人数加一
				$this->db->where('markid', $markid);
				$this->db->update('mytable', array('usernum' => 'usernum+1')); 
			}
			echo "[$userid]($username):$markid";
			// 再更新user_mark数据库
			$data = array(
               'userid' => $userid ,
               'markid' => $markid ,
               // 'datetime' => datetime() ,
               'markname' => $title ,
               'description' => $info
            );
			$this->db->insert('user_mark', $data); 
		}
	}