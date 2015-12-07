<?php

/**
 * 配置文件
 */
return array(
    //开启静态路由
    'URL_ROUTER_ON'         => true,
    'URL_ROUTE_RULES'=>array(
        'm'               => 'Admin/Login/index',//后台
        // 'verify'          => 'User/Mali/verify',//邮箱验证
        '/^p_(\d+)$/'	=>'Home/Photo/page?id=:1',
    ),

    //邮件配置
    'MAIL_HOST' =>'smtp.mxhichina.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'shuning@tuxiwang.com',//你的邮箱名
    'MAIL_FROM' =>'shuning@tuxiwang.com',//发件人地址
    'MAIL_FROMNAME'=>'图昔网',//发件人姓名
    'MAIL_PASSWORD' =>'Yi23456789',//邮箱密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件


    // URL模式
    'URL_MODEL'=>2,



	//数据库配置文件
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '182.92.150.48',
    'DB_NAME' => 'fodder',
    'DB_USER' => 'root',
    'DB_PWD' => '87f1ba7858',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'x_',

    //开启测试
    // 'SHOW_PAGE_TRACE'=>True,
    

    // 七牛配置文件
    'UPLOAD_SITEIMG_QINIU' => array ( 
                'maxSize' => 10 * 1024 * 1024,//文件大小
                'rootPath' => './',
                'saveName' => array ('uniqid', ''),
                'driver' => 'Qiniu',
                'driverConfig' => array (
                        'secrectKey' => 'qQE9SDYA3RyUw_4qYTElma5eoXoviKeD9aEHq9CM', 
                        'accessKey' => 'oeU16wEP7uZcRf-gaHHLSD4K8y47DYHos2nwphqy',
                        'domain' => 'source.sohozl.com/',
                        'bucket' => 'xbimg', 
                ),
        ),
    //Rbac权限控制
    'RBAC_SUPERADMIN' 	=> 'admin',				//超级管理员名称
    'ADMIN_AUTH_KEY' 	=> 'superadmin',		//超级管理员识别
    'USER_AUTH_ON'    	=>  true,				//是否开启验证
    'USER_AUTH_TYPE'  	=>    1,        		// 认证类型 1 登录认证 2 实时认证
    'USER_AUTH_KEY'   	=>  'uid',    			// 用户认证SESSION标记
    'NOT_AUTH_MODULE' 	=>  '',    		// 默认无需认证模块
    'NOT_AUTH_ACTION' 	=>  '',    		// 默认无需认证方法
    'RBAC_ROLE_TABLE' 	=>  'x_role',			//角色表名称
	'RBAC_USER_TABLE' 	=>  'x_role_user',		//角色与用户中间表名称
	'RBAC_ACCESS_TABLE' => 	'x_access',			//权限表名称
	'RBAC_NODE_TABLE'   =>  'x_node',			//节点表名称
);
?>
