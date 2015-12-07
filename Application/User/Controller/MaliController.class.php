<?php

namespace User\Controller;

use Think\Controller;

class MaliController extends Controller {

    //申请成为注册会员邮箱确认页面
    public function index(){
        if(!$_SESSION['uid'])$this->redirect("Login/Landing");//判断用户是否登录
        if($_SESSION['status'] != '1')$this->redirect("Index/index");//判断用户是否验证
        $this->display();
    }

    //验证
    public function Verify(){
        $uid = base64_decode($_GET['uid']);
        $code = base64_decode($_GET['code']);
        if(!$data = M('mail_verify')->where(array('uid'=>$uid,'code'=>$code))->setField('state','2'))$this->error('验证失败重新验证1');
        if(!M('user')->where('id='.$uid)->setField('status','1'))$this->error('验证失败重新验证2');
        $User = M('user')->where('id='.$uid)->find();
        inSession(array(
                    'uid'=>        $User['id'],
                    'username'=>   $User['user_name'],
                    'mail'=>       $User['user_mail'],
                    'status'=>     $User['status'],
                    ));
        $this->success("验证成功！", U("Index/index"));
    }
    // 找回密码
    public function forgot(){
        $this->display();
    }
}