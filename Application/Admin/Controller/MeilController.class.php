<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class MeilController extends CommonController{
	//加载公共
	function _initialize() {
		parent::_initialize();
	}
    public function index(){
    	//邮件发送类
    	//邮件需要记录的信息
    	//3，标题
    	//4，内容
    	//5，发送时间
    	//7，用户ID
    	//2，收件地址
        // dump($EncodeStr);
        // base64_encode($num);
        // base64_encode($num);
        $id = base64_encode('uid');
        $code = base64_encode('code');
        echo "<a href=www.sohozl.com/verify/u_id/".$id."/code/".$code.">个人信息</a>";
         // if(SendMail('363340104@qq.com','测试标题','测试内容'.$num))$this->success('发送成功！');
        // $num=rand(000000,999999);
        // dump($num);
    }
}