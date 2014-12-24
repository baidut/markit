<?php
/* 
|--------------------------------------------------------------------------
| 扩展CI的控制器
|--------------------------------------------------------------------------
| 
| 不能直接修改内核，而是新建控制器类继承自内核控制器
| application/core/MY_Controller.php必须用这个名字结构，前缀不一定是MY_
| 可以通过修改这个配置来更改
| application/config/config.php
| $config['subclass_prefix'] = 'MY_';
| 
| http://codeigniter.com/user_guide/general/core_classes.html
| http://codeigniter.com/user_guide/general/creating_libraries.html
|
*/
	class MY_Controller extends CI_Controller{
		function __construct(){
			parent::__construct();
			
			// 登陆验证
			// 权限验证
		
		}
		function get_captcha() {
			$this->load->helper('captcha');
			$vals = array(
			    'word' => rand(1000,9999),//'Random word',
			    'img_path' => './captcha/',
			    'img_url' => base_url().'captcha/',  // base_url('captcha/') 会缺少/造成图片无法显示
			    'img_width' => '60',
			    'img_height' => 30,
			    'expiration' => 7200
			    );
			$cap = create_captcha($vals);

			if (!session_id()) session_start();
			$_SESSION['cap']= $cap['word'];

			return $cap['image'];
		}
		
	
	}

