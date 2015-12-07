<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;
class CommonController extends Controller {
    public function _initialize(){
    	// 判断用户是否登录
        if(!isset($_SESSION[C('USER_AUTH_KEY')])){
        	$this->redirect('Admin/Login/index');
        }
        $notAuth = in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));
        if(C('USER_AUTH_ON') && !$notAuth){
        	RBAC::AccessDecision() || $this->error('没有权限');
        }
    }
}