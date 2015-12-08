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

<body style="background-color:#f1f1f1">

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

  <div id="user">

    <div class="func">

      <div class="person">

        <div class="avatar">

          <div class="img">

            <?php
 ?>
            <img src='<?php echo ($_SESSION['avatar']); ?>?imageView2/2/w/80/h/80'>

          </div>

          <div class="name">

            <?php
 ?>
            <p><?php echo ($_SESSION['nicename']); ?></p>


          </div>

        </div>

        <ul>

          <?php if($data['status'] == 0): ?><li><a href="<?php echo U('Keys/index');?>">立即成为会员</a></li><?php endif; ?>
      
          <li><a href="<?php echo U('Set/settings');?>">账号设置</a></li>

          <li><a href="<?php echo U('Set/changepass');?>">修改密码</a></li>

          <li><a href="<?php echo U('Dispose/logout');?>">退出</a></li>

        </ul>

      </div>

      <div class="collect">

        <ul>

          <?php if($_GET['genre']==1): ?><li class="one"><a href="<?php echo U('Index/index',array('genre'=>1));?>">我的收藏</a></li>

          <?php else: ?>

                <li><a href="<?php echo U('Index/index',array('genre'=>1));?>">我的收藏</a></li><?php endif; ?>

          <?php if($_GET['genre']==2): ?><li class="one"><a href="<?php echo U('Index/index',array('genre'=>2));?>">我喜欢的</a></li>

          <?php else: ?>

                <li><a href="<?php echo U('Index/index',array('genre'=>2));?>">我喜欢的</a></li><?php endif; ?>

        </ul>

      </div>

    </div>

    <div class="oper">

      <ul>

        <?php if(is_array($page)): foreach($page as $key=>$v): ?><li>

            <a target="_blank" href="<?php echo U('Photo/page',array('id'=>$v['id']));?>"><p class="img"><img src='<?php echo ($v["photo_img"]); ?>?imageView2/1/w/391/h/210'</p></a>

          <div class="text">

          <p class="bg">

            <a href="javascript:void(0)" onclick="collect_user(<?php echo ($v["id"]); ?>,<?php echo ($v["like_id"]); ?>,this)">取消</a>

            <a target="_blank" href="<?php echo U('Photo/page',array('id'=>$v['id']));?>">查看</a>

            <a target="_blank" href="<?php echo U('Photo/download',array('id'=>$v[id]));?>">下载</a>

          </p>

          <p><?php echo ($v["photo_title"]); ?></p>

          </div>

          </li><?php endforeach; endif; ?>

        <div class="both"></div>

      </ul>

    </div>

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


<script src="/Application/User/View/Public/js/user.js" charset="utf-8"></script>

</body> 

</html>