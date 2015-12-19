<?php
/**
 * Markit
 *
 * An open source application for bookmark sharing.
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015, PKUSZ-OOAD-Team-2
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	Markit
 * @author	PKUSZ-OOAD-Team-2
 * @copyright	Copyright (c) 2015, PKUSZ-OOAD-Team-2
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://markit.sinaapp.com
 * @since	Version 2.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Markit Ui Class
 *
 * This class enables the configuration of web user interface
 *
 * @package		Markit
 * @subpackage	Controller
 * @category	Controller
 * @author		Zhenqiang YING
 * @link		https://github.com/baidut/markit/user_guide/Controller/ui.html
 */
class Ui extends MARKIT_Controller {

	public function index() {
		
	}
	public function language($lang) {
		$this->session->lang = $lang;
		$this->redirect_back(); // 设置语言后页面变化。。需要传入当前页面信息
		// echo '<script language=\"javascript\">alert("ok");location.href = "javascript:history.go(-2);"</script>';
	}
}
		