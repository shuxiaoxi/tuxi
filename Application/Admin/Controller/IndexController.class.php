<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class IndexController extends CommonController{
	//加载公共
	function _initialize() {
		parent::_initialize();
	}

    public function index(){
    	// 加载用户信息
        $user = M('user')->where(array('id'=>$_SESSION['uid']))->field('avatar')->find();
        $this->userAvatar = $user['avatar'];
    	//加载导航
    	$this->nav = recursion(M('screen')->where(array('type'=>'navAdmin'))->order('sort')->select());
        $this->display();
    }
}