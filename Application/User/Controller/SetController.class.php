<?php

namespace User\Controller;

use Think\Controller;

class SetController extends CommonController {


    //账号设置页面settings

    public function settings(){
        $User = M('user');

        $this->data = $User->where(array('id'=>$_SESSION['uid']))->find();

        $this->display();

    }

    //修改密码changepass

    public function changepass(){

        $this->display();

    }



    //修改密码

    public function changePassword(){

        $pwd = I('original','','md5');

        $User = M("user");

        $User=M('user')->where(array('id'=>$_SESSION['uid']))->find();

        if($User['user_pass']==$pwd){

            $User = M("user");

            $password = I('password','','md5');

            $User->where(array('id'=>$_SESSION['uid']))->save(array('user_pass'=>$password));

            $this->success("设置成功",U("User/index"));

        }else{

            dump($pwd);

            $this->error("密码错误");

        }

    }


    //不确定是否使用
    //更改

    public function update(){

        $User = M("user"); // 实例化User对象

        $User->where(array('id'=>$_SESSION['uid']))->save(array($_GET['name']=>$_GET['value']));

    }
}