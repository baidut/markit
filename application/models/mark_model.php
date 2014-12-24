<?php
	class Mark_model extends CI_Model{
		function get_id($url){
			$this->db->where('link', $url); // limit 1
			$query = $this->db->get('mark'); 
			return ($row = $query-> row())?$row->markid:FALSE;
		}
		function create($url,$title,$info,$keywords){
			$userid = $this->session->userdata('userid');
			$username = $this->session->userdata('username');
			$markid = $this->get_id($url);
			// 多个用户新建动作并发时，数据库可能会出错
			// BUG Duplicate entry '11-11' for key 'PRIMARY'
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
				$this->db->update('mark', array('usernum' => 'usernum+1')); 
			}
			if($keywords){
				$tags = explode(',',$keywords); //按逗号分离字符串
				foreach ($tags as $key => $tag) {
					if($tag=trim($tag)) // 防止最后一个逗号产生空标签或者用户连续输入多个逗号造成的空标签
						$this->db->insert('mark_tag', array('markid' => $markid,'tag'=>$tag)); 
					// 标签重复问题由数据库自行处理
				}
			}
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
		function remove($markid){
			$userid = $this->session->userdata('userid');
			$username = $this->session->userdata('username');
		// 从user_mark表中删除mark
			$this->db->delete('user_mark',array('userid' => $userid,'markid' => $markid)); 
			$query = $this->db->get_where('mark', array('markid' => $markid));
			$row = $query->row();
			if(!$row){
				return '删除失败'.$markid.'失败';
			}
			if($row->usernum<=1){
				// 如果收藏人数为0，则删除此书签，并删除相关标签
				$this->db->delete('mark', array('markid' => $markid));
				$this->db->delete('mark_tag', array('markid' => $markid));
			}
			else{// 收藏人数减一
				$this->db->where('markid', $markid);
				$this->db->update('mark', array('usernum' => 'usernum-1')); 
			}
			return "删除成功了";
		}
	}