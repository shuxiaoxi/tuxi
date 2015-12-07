<?php

namespace User\Controller;

use Think\Controller;

class LoginController extends Controller {

    //登录页面
    public function Landing(){
        $this->display();
    }

    //注册页面

    public function index(){
        $this->display();

    }

    //注册操作方法

    public function handleLogin(){
        $Model = M('user');
        if($Model->where(array('user_name'=>$_GET['username']))->find()){$this->error('账号已经注册');}
        if($Model->where(array('user_mail'=>$_GET['mail']))->find()){$this->error('邮箱已经被使用');}
            $data = array(
                'user_name'=>$_GET['username'],             //用户名
                'user_mail'=>$_GET['mail'],                 //邮箱
                'user_pass'=>I('password','','md5'),        //用户密码
                'create_ip'=>get_client_ip(),               //登陆IP
                'create_time'=>date('Y-m-d H:i:s',time()),  //注册时间
                );

            if($User=$Model->data($data)->add()){
                inSession(array(
                    'uid'=>        $User,
                    'username'=>    $data['user_name'],
                    'mail'=>        $data['user_mail'],
                    'status'=>      '0',
                    ));
                $Mali = inMail(array('uid'=>$User,'mail'=>$data['user_mail'],'type'=>"1",'title'=>"欢迎注册冬青网账号",'name'=>$data['user_name']));
                if(!$Mali)$this->error('邮箱发送失败');
                $this->success("注册成功！", U("Mali/index"));
            }else{
                $this->error('注册失败');
            }
    }



    //处理登陆表单

    public function debark(){

        //判断是否POST提交

        if(!IS_GET){

            $this->error("页面不存在");

        }

        

        //获取密码MD5加密

        $pwd = I('password','','md5');



        //查询是否有这个用户

        $User=M('user')->where(array('user_name' => $_GET['username']))->find();

        if(!$User){

            $this->error("账号不存在");

        }else{

            //验证密码是否正确

            if($User['user_pass']==$pwd){

                //写入本次登陆数据

                behavior($User['id'],'2');

                inSession(array(
                    'uid'=>        $User['id'],
                    'username'=>    $User['user_name'],
                    'mail'=>        $User['user_mail'],
                    'nicename'=>    $User['user_nicename'],
                    'avatar'=>      $User['avatar'],
                    'status'=>      $User['status'],
                    ));

                $this->success("添加成功！", U("Index/index"));

            }else{

                $this->error("密码错误");

            }

        }

    }
}