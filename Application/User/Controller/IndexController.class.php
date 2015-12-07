<?php

namespace User\Controller;

use Think\Controller;

class IndexController extends CommonController {

    //用户中心
    public function index(){

        $this->data = M('user')->where(array('id'=>$_SESSION['uid']))->find();

        $Model = M('collect');

        $this->page = $Model

        ->join('x_photo ON x_photo.id = x_collect.works_id')

        ->where(array('user_id'=>$_SESSION['uid'],'like_id'=>$_GET['genre']))->select();

        $this->display();
    }

    //错误跳转页面
    public function mistake(){
        $this->display();
    }
}