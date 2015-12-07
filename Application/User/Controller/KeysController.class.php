<?php

namespace User\Controller;

use Think\Controller;

class KeysController extends CommonController {

    //申请成为会员
    public function index(){
        $this->display();
    }

    //会员提交处理表单
    public function addKeys(){
        $data = array(
            'uid'      => $_SESSION['uid'],
            'use_time'  => date('Y-m-d H:i:s',time()),
            );
        $keys = M('keys');
        if($keysPage = $keys->where(array('key'=>$_GET['secret']))->find()){
            
            if($keysPage['uid'] == ''){

                $keys->where(array('id'=>$keysPage['id']))->data($data)->save();
                M('user')->where(array('id'=>$data['uid']))->data(array('status'=>'1'))->save();
                $this->success('欢迎您成为图昔网会员',U("User/index"));
            }else{
                $this->error('密钥已经被使用亲重新输入密钥');
            }
        }else{
            $this->error('密钥有误亲重新输入');
        }
    }
}