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

class MARKIT_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
        
        session_start();

		/// 调整配置
		// 优先为用户设定的语言
		// $idiom = $this->session->get_userdata('language');
		// print_r($idiom);
        //$this->load->library('session');

		// 默认为浏览器语言
		//判断浏览器语言
		$default_lang_arr = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$strarr = explode(",",$default_lang_arr);
		$default_lang = $strarr[0]; // zh-CN
		// zh-CN zh_cn
		$lang = str_replace('-', '_', strtolower($default_lang));
        
        // 目前仅提供两种语言
        switch($lang){
            case 'zh_cn':
            case 'english':
           		break;
            default:
            $lang = 'english';
            break;
        }

		if(isset($_SESSION['lang'])){
			$lang =$_SESSION['lang'];
		}

		// 设置为该语言
		$this->config->set_item('language', $lang);

		/// 加载必要的文件，可在autoload中配置
		$this->load->dbutil();
		$this->load->database();
		$this->load->library('ion_auth');
		$this->load->helper(array('url','language'));

		$this->lang->load('markit');
		$this->lang->load('auth');
		$this->lang->load('ion_auth');
		
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

	function redirect_back() {
        
        if(isset($_SESSION['referred_from'])){
        $referred_from = $_SESSION['referred_from']; //$this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
        } else {
            redirect('explore/themes', 'refresh');
        }
        
	}

	function render_page($page, $data) {
		$data['view_mode'] = $this->session->userdata('view_mode');
		$this->load->view($page, $data);
	}

}