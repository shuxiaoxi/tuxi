<?php

namespace User\Controller;

use Think\Controller;

class DisposeController extends CommonController {

   //退出
    public function logout(){
        session('uid',null);
        session('username',null);
        session('mail',null);
        session('nicename',null);
        session('avatar',null);
        session('status',null);
        redirect(__ROOT__."/");

    }

    //ajax图片上传
    public function ajax_login() {
        $setting=C('UPLOAD_SITEIMG_QINIU');
        $upload = new \Think\Upload($setting);
        $info   =   $upload->upload($_FILES);
        if($info) {
            // 修改用户信息
            $Model = M('user');
            $Model->avatar = $info['file']['name'];
            $Model->where(array('id'=>$_SESSION['uid']))->save();
            // 返回信息
            $json_arr = array('name'=>$info['file']['name']); 
            echo json_encode($json_arr);exit;
        } else {
            $json_arr = array('name'=>'上传失败'); 
            echo json_encode($json_arr);exit; 
        }

    }


    //取消收藏&取消点赞
    public function ajaxCollect(){

        $Model = M('collect'); // 实例化collect对象

        $data = array(

                'like_id'  => $_GET['like'],

                'works_id' => $_GET['id'],

                'user_id'  => $_SESSION['uid'],

            );

        if($Model->where($data)->delete()){

            $this->success('取消成功');

            

        }else{

            $this->error('取消失败');

        }

    }
}