<?php if (!defined('THINK_PATH')) exit();?><!doctype html> 

<html lang="zh-cn"> 

<head> 

	<title>冬青|素材站。</title>

  <meta name="keywords" content="分享创意，助力数码师。">

  <meta name="description" content="冬青|数码站，免费下载：婚纱摄影模板、儿童摄影模板、写真摄影模板。">

  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <link rel="shortcut icon" href="/Application/User/View/Public/icon/icon.ico">
   	<!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link href="/Application/User/View/Public/icon/iconfont.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/Public/css/style.css" type="text/css"/>
	

</head> 

<body>

<div id="nav">
  <div class="nav">
    <div class="content">
      <div class="login">
        <a href="<?php echo U('Home/Index/index');?>"><img src="/Application/User/View/Public/image/LOGO.png"></a>
      </div>
      <div class="app">
        <a href="<?php echo U('Home/Photo/index');?>">最新模板</a>
      </div>
      <div class="user">
        <?php if($_SESSION['status'] != 0): ?><a href="<?php echo U('User/Index/index',array('genre'=>1));?>"><i class="icon iconfont">&#xe60f;</i>个人中心</a><?php endif; ?>
      </div>
    </div>
  </div>
</div>
<!-- 错误提示框 -->
<div class="error_message">
  </div>
<!-- 灰色遮罩层 -->
<div id="shade" onclick="shade()">
</div>
<!-- 登陆弹出层 -->
<div id="login">
    <div class="login_option">
      <div class="login_option_a">
        <a href="javascript:void(0);" onclick="click_login_pop()">登陆</a>
      </div>
      <div class="login_option_b">
        <a href="<?php echo U('User/login');?>">注册</a>
      </div>
    </div>
    <div class="login_action" id="login_login">
      <div class="login_action_a">
        <form  action="<?php echo U('User/debark');?>" method="post" class="login">
          <div class="controls">
            <input type="username" name="username" id="login_username" placeholder="账号">
            <input type="password" name="password" id="login_password" placeholder="请输入密码">
          </div>
          <div class="submit">
            <button id="submit" type="submit">登　　陆</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <div class="container">

    <div class="row">

      <div class="">

        <div class="title"><b>登陆</b><a href="<?php echo U('login/index');?>">立即注册</a></div>
        <div class="box">
        <form  action="<?php echo U('Login/debark');?>" method="post" class="login">



            <div class="control-group">

              <label for="mobile">账号</label>

              <div class="controls">

                <input type="username" name="username" id="login_username" placeholder="请输入用户名或者邮箱">

              </div>

            </div>

            <div class="control-group">

              <label for="password">密码</label>

              <div class="controls">

                <input type="password" name="password" id="login_password" placeholder="请输入密码">
              </div>

            </div>

            
            <div class="submit">

              <button type="submit" id="submit">提交</button>

            </div>

            <div class="submit">

              <a href="<?php echo U('Mali/forgot');?>">忘记密码</a>

            </div>

        </form>
        </div>
      </div>

    </div>

    <div class="unite">

      <!-- <div class="title"><b>或使用以下帐号直接登录</b></div> -->

      <ul class="unite">

        <!-- <li><img src="__TMPL__Public/images/unite_microblog.jpg"></li>

        <li><img src="__TMPL__Public/images/unite_qq.jpg"></li>

        <li><img src="__TMPL__Public/images/unite_wechat.jpg"></li> -->

      </ul>

    </div>

    <div class="both"></div>

  </div>


<div class="deanft_bottom">
	<div class="w1150">
        <p>冬青网素材为用户免费分享产生，若发现您的权利被侵害，请联系363340104@qq.com ，我们尽快处理。&nbsp;&nbsp;&nbsp;京ICP备13016701号</p>
    </div>
	
</div>

	<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
	<script src="/Application/User/View/Public/js/style.js" charset="utf-8"></script>
	<script src="/Public/js/common.js" charset="utf-8"></script>
	<script>
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "//hm.baidu.com/hm.js?9c8045cbc59858ac5566ec4a3d513014";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
	</script>

</body> 

</html>