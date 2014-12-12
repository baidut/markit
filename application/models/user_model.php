<?php 
/* 
 模型中可以直接用超级对象的属性
 模型被控制器加载后成为超级对象的属性，可以起别名
 数据库中的实体表一般都建立对应的模型，而关联表或数据库视图则一般不建立对应模型
 模型向控制器屏蔽数据库部分，控制器需要何数据都由模型负责提供
*/
	class User_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		public function getBookmark(){
		
		}
		public function addBookmark(){
		
		}
	}