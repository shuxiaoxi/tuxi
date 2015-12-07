<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;
class LoginController extends Controller {
    //登陆首页
    public function index(){
        $this->display();
    }

    //退出
    public function logout(){
        session('uid',null);
        session('user_name',null);
        redirect(__ROOT__."/");
    }

    public function login(){
        //判断是否POST提交
        if(!IS_POST){
            $this->error("页面不存在");
        }
        $verify = I('param.verify','');
        //判断验证码  
//        if(!check_verify($verify)){
//            $this->error("亲，验证码输错了哦！");
//        }
        //获取密码MD5加密
        $pwd = I('user_pass','','md5');

        //查询是否有这个用户
        $User=M('user')->where(array('user_name' => $_POST['user_name']))->find();
        if(!$User){
            $this->error("账号不存在");
        }else{
            //查询密码是否正确于用户名类型是否是1ADMIN用户
            if($User['user_pass']==$pwd){
                //写入本次登陆数据
                // $data = array(
                //     'id' => $User['id'],
                //     'last_login_time' => date('Y-m-d H:i:s',time()),
                //     'last_login_ip'  => get_client_ip(),
                //     );
                // M('user')->save($data);

                session(C('USER_AUTH_KEY'),$User['id']);
                session('user_name',$User['user_name']);

                //超级管理员识别
                if($User['user_name']==C('RBAC_SUPERADMIN')){
                    session(C('ADMIN_AUTH_KEY'),true);
                }
                //读取用户权限
                RBAC::saveAccessList();
                $this->success("添加成功！", U("Index/index"));
            }else{
                $this->error("密码错误");
            }
        }
    }

    //验证码
    public function Verify(){
        ob_clean();
        $config =    array(
            'imageW'  => I('width'),
            'imageH'  => I('height'),
            'expire'  => 180,
            'fontSize'=> I('font_size'),
            'length'  => I('code_len'),
            );
        $Verify = new \Think\Verify($config);
        $Verify->entry($id);

    }
}