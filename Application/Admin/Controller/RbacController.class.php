<?php

namespace Admin\Controller;

use Admin\Controller\CommonController;

class RbacController extends CommonController{

    //加载公共

    function _initialize() {

        parent::_initialize();

    }



    public function index(){

        $this->display();

    }



    //角色列表

    public function role(){

        $this->role = M('role')->select();

        $this->display();

    }



    //添加角色

    public function addRole(){

        $this->User=M('role')->where(array('id'=>$_GET['id']))->find();

        $this->display();

    }



    //添加角色表单处理

    public function addRoleHandle(){

        //如果传过来的值有ID

        if($_POST['id']){

            if(M('role')->save($_POST)){

                $this->success('修改成功', U('Rbac/role'));

            }else{

                $this->error('添加失败');

            }

        }else{

            if(M('role')->add($_POST)){

                $this->success('保存成功', U('Rbac/role'));

            }else{

                $this->error('添加失败');

            }

        }

    }



    //节点列表

    public function node(){

        $field = array('id','name','title','pid');

        $node = M('node')->field($field)->order('sort')->select();

        $this->node = node_merge($node);

        $this->display();

    }



    //修改节点

    public function alterNode(){

        $node=M('node')->where(array('id'=>$_GET['id']))->find();

        $this->pid=$node['pid'];

        $this->level=$node['level'];

        $this->id=$node['id'];

        $this->name=$node['name'];

        $this->title=$node['title'];

        $this->status=$node['status'];

        $this->sort=$node['sort'];

        $this->display('Rbac/addNode');

    }



    //添加节点

    public function addNode(){

        $this->pid = I('pid',0,'intval');

        $this->level = I('level',1,'intval');

        switch($this->level){

            case 1;

                $this->type = '应用';

                break;

            case 2;

                $this->type = '控制器';

                break;

            case 3;

                $this->type = '方法';

                break;

        }

        $this->display();

    }



    //添加节点表单处理

    public function addNodeHandle(){



        if($_POST['id']){

            if(M('node')->save($_POST)){

                $this->success('修改成功', U('Rbac/node'));

            }else{

                $this->error('添加失败');

            }

        }else{

            if(M('node')->add($_POST)){

                $this->success('保存成功', U('Rbac/node'));

            }else{

                $this->error('添加失败');

            }

        }

    }



    //为角色配置权限

    public function access(){

        $rid = I('rid', 0 , 'intval');

        $field = array('id','name','title','pid');

        $node = M('node')->field($field)->order('sort')->select();

        $access = M('access')->where(array('role_id'=>$rid))->getField('node_id',true);

        $this->node = node_merge($node,$access);

        $this->rid=$rid;

        $this->display();

    }



    //处理角色权限

    public function setAccess(){

        $rid = I('rid', 0 , intval);

        $db = M('access');



        // 清空原权限

        $db -> where(array('role_id' => $rid))->delete();



        //重组新权限

        $data = array();

        foreach($_POST['access'] as $v){

            $tmp = explode('_',$v);

            $data[] = array(

                'role_id' => $rid,

                'node_id' => $tmp[0],

                'level' => $tmp[1]

                );



        }

        if($db->addALL($data)){

            $this->success('修改成功',U('Rbac/role'));

        } else {

            $this->error('修改失败');

        }

    }

    // 用户列表

    public function user(){

        $this->user = D('User')->field('user_pass',true)->relation(true)->select();

        $this->display();

    }



    //添加用户

    public function addUserHandle(){

        // 判断是否有本用户

        $data = M('user')->where(array('user_name'=>$_POST['user_name']))->find();

        if($data){

            $this->error('账号已存在');

        }else{

            //组合需要插入用户表的内容

           $user = array(

            'user_name' => I('user_name'),

            'user_pass' => I('user_pass','','md5'),

            'user_nicename' => I('user_nicename'),

            'create_time' => date('Y-m-d H:i:s',time()),

            'last_login_time' => date('Y-m-d H:i:s',time()),

            'last_login_ip' => get_client_ip(),

            );

           $role = array();

           if($uid=M('user')->add($user)){

                if($_POST['role_id']){

                    //重组用户角色

                    foreach ($_POST['role_id'] as $v) {

                        $role[] = array(

                            'role_id' => $v,

                            'user_id' => $uid,

                            );

                    }

                    M('role_user')->addALL($role);

                    $this->success('修改成功',U('Rbac/user'));

                }else{

                    $this->success('修改成功未选择角色',U('Rbac/user'));

                }

           }else{

                $this->error('添加用户失败');

           }

        }

    }



    //添加用户

    public function addUser(){

        $this->role = M('role')->select();

        $this->display();

    }



    //锁定与解锁用户

    public function state(){

        if(M('user')->save($_GET)){

            $this->success('修改成功',U('Rbac/user'));

        }else{

            $this->error('修改失败');

        }

    }



    //删除节点

    public function delNode(){

        if(M('node')->where(array('id'=>$_GET['id']))->delete() and M('access')->where(array('node_id'=>$_GET['id']))->delete()){

            $this->success('修改成功',U('Rbac/node'));

        }else{

            $this->error('修改失败');

        }

    }


    //密钥列表
    public function keys(){
        $this->keys = M('keys')->select();
        $this->display();
    }

    //生成密钥
    public function addKeys(){
        $pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        $in = $_POST['in'];
        if(is_numeric($in) && $in>1){
            for ($i=0;$i<$in;$i++){
                $key = '';
                for ($j=0;$j<18;$j++){
                   $key .= $pattern{mt_rand(0,35)};    //生成php随机数
                 }
                $data = array(
                    'key' => $key,
                    'create_time' => date('Y-m-d H:i:s',time()),
                    );
                M("keys")->data($data)->add();
            }
            $this->success('添加成功',U('Rbac/keys'));
        }else{
            $this->error('您输入的内容有误');
        }
    }
    
}