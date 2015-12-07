<?php
/**
 * 验证码检查
 * @access public
 */
function check_verify($code, $id = ""){  
    $verify = new \Think\Verify();  
    return $verify->check($code, $id);  
} 
/**
 * 递归二维数组
 * @access public
 */
function photo_opt($node, $access = null){
    $arr = array();
    foreach($node as $v){
        if(is_array($access)){
            $v['access'] = in_array($v['label_id'],$access) ?1:0;
            $arr[] = $v;
        }
    }
    return $arr;
}

function photo_name($node, $access = null){
    $arr = array();
    foreach($node as $v){
        if(is_array($access)){
            $v['access'] = in_array($v['label_name'],$access) ?1:0;
            $arr[] = $v;
        }
    }
    return $arr;
} 

/**
 * 判断用户是否点赞
 * @access public
 * @param string $method 方法名
 * @return mixed
 */
function photoPraise($item,$like){
    $arr = array();
    foreach ($item as $v) {
        $v['praise'] = in_array($v['id'], $like)?1:0;
        $arr[] = $v;
    }
    return $arr;
}

/**
 * 判断用户是否收藏
 * @access public
 * @param string $method 方法名
 * @return mixed
 */
function photoCollect($datas,$like){
    $arr = array();
    foreach ($datas as $v) {
        $v['collect'] = in_array($v['id'], $like)?1:0;
        $arr[] = $v;
    }
    return $arr;
}

/**
 * SESSION 的写入
 * @access public
 * @param $uid             ID
 * @param $username         账号
 * @param $mail             邮箱
 * @param $nicename         昵称
 * @param $avatar           头像
 * @param $status           状态:0,邮箱未激活，1，激活邮箱，2付费会员
 * @return mixed
 */
function inSession($data){
    session(C('USER_AUTH_KEY'),$data['uid']);
    session('username',$data['username']);
    session('mail',$data['mail']);
    session('status',$data['status']);
    if($data['nicename']){
        session('nicename',$data['nicename']);
    }else{
        session('nicename',$data['username']);
    }
    if($data['avatar']){
        session('avatar',C('TMPL_PARSE_STRING.__QINIU__').'/'.$data['avatar']);
    }else{
        session('avatar',__ROOT__.'/Public/Avatar.jpg');
    }
}

/**
 * 用户行为记录
 * @access public
 * @param $uid             用户ID
 * @param $type             行为类型
 * @param $ope_ip           登录IP
 * @param $ope_time         登录时间
 * @param $remark           备注
 * @return mixed
 */
function behavior($uid,$type,$remark = ''){
    $data = array(
        'uid' =>       $uid,
        'type' =>       $type,
        'ope_time' =>   date('Y-m-d H:i:s',time()),
        'ope_ip'  =>    get_client_ip(),
        'remark'  =>    $remark,
        );
    M('user_behavior')->add($data);
}

 /**
 * 用户行为记录
 * @access public
 * @param $uid              用户ID
 * @param $mail             邮件
 * @param $type             类型
 * @param $title            标题
 * @param $name             用户名
 * @return mixed
 */
function inMail($data){
    $code=rand(000000,999999);
    $verify = array(
        'uid'          =>$data['uid'],
        'mail'          =>$data['mail'],
        'code'          =>$code,
        'type'          =>$data['type'],
        'beg_time'      =>date('Y-m-d H:i:s',time()),
        'state'         =>'1',
        );
    M("mail_verify")->add($verify);
    $uid = base64_encode($data['uid']);
    $code = base64_encode($code);
    $result = SendMail($data['mail'],$data['name'],$data['title'],'<b>'.$data['name'].'您好，感谢您注册图昔网：</b><br /><br />请在 1 小时内点击此链接以完成注册<br/><a href="http://www.sohozl.com/User/Mali/verify/uid/'.$uid.'/code/'.$code.'">http://www.sohozl.com/User/Mali/verify/uid/'.$uid.'/code/'.$code.'</a><br/>再次感谢您的关注与支持！');
    return $result;
}
?>