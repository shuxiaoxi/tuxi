<?php
namespace User\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
        if(!$_SESSION['uid'])$this->redirect("Login/Landing");//判断用户是否登录
        if($_SESSION['status']==0)$this->redirect("Mali/index");//判断用户是否验证
    }
}