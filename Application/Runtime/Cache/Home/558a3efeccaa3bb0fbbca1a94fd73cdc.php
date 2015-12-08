<?php if (!defined('THINK_PATH')) exit();?><!doctype html> 

<html lang="zh-cn"> 

<head> 

	<title>冬青|素材站。</title>
  <meta name="baidu-site-verification" content="nFApCGpVo0" />
  <meta name="keywords" content="影楼模板，婚纱模板，儿童写真模板，个人写真模板，相册模板，PSD模板，影楼素材下载，儿童模板下载，写真模板下载，衣服模板下载">

  <meta name="description" content="冬青|数码站，影楼模板下载：儿童摄影模板、写真摄影模板。">

  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <link rel="shortcut icon" href="/Application/Home/View/Public/icon/icon.ico">
   	<!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link href="/Application/Home/View/Public/icon/iconfont.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Public/css/style.css" type="text/css"/>

	

</head> 

<body>

<div id="nav">

  <div class="nav">

    <div class="content">

      <div class="login">

        <a href="<?php echo U('Home/Index/index');?>"><img src="/Application/Home/View/Public/image/LOGO.png"></a>

      </div>

      <div class="app">

        <a href="<?php echo U('Photo/index');?>">最新模板</a>
        
      </div>

      <div class="user">

        <?php if($_SESSION['uid']): ?><a href="<?php echo U('User/Index/index',array('genre'=>1));?>"><i class="icon iconfont">&#xe60f;</i>个人中心</a>

        <?php else: ?>

          <a href="javascript:void(0)" onclick="login()">登陆</a>

          <a href="<?php echo U('User/Login/index');?>">注册</a><?php endif; ?>

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



        <a href="<?php echo U('User/Login/index');?>">注册</a>



      </div>



    </div>



    <div class="login_action" id="login_login">



      <div class="login_action_a">

        <form  action="<?php echo U('User/Login/debark');?>" method="post" class="login">

          <div class="controls">



            <input type="username" name="username" id="login_username" placeholder="账号">



            <input type="password" name="password" id="login_password" placeholder="请输入密码">



          </div>



          <div class="submit">



            <button id="submit" type="submit">登　　陆</button>



          </div>

        </form>



      </div>



      <!-- <div class="login_action_b">



        <div class="unite">



          <div class="Sina">



            <a href="<?php echo U('api/oauth/login',array('type'=>'sina'));?>"><i class="icon iconfont">&#xe600;</i><span class="name">新浪微博登陆</span></a>



          </div>



          <div class="qq">



            <a href="<?php echo U('api/oauth/login',array('type'=>'qq'));?>"><i class="icon iconfont">&#xe603;</i><span class="name">腾讯QQ登陆</span></a>



          </div>



        </div>



      </div> -->



    </div>

  </div>

</div>

<div id="layer">

  <div class="content normal">

    <div class="left">

      <a class='btnLeft' id="btnLeft" href="javascript:void(0);"><i class="iconfont">&#xe614;</i></a>

      <a class='btnRight' id="btnRight" href="javascript:void(0);"><i class="iconfont">&#xe617;</i></a>

      <div class="img">

      </div>

    </div>

    <div class="right">

    <div class="del_button">
      <!-- 删除 -->
      <a href="javascript:void(0)" onclick="blacken()"><i class="icon iconfont">&#xe610;</i></a>

      <!-- 收藏 -->
      <a href="javascript:void(0)" id="popup_collect"><i class="icon iconfont">&#xe61a;</i></a>
      
      <!-- 喜欢 -->
      <a href="javascript:void(0)" id="popup_praise"><i class="icon iconfont">&#xe618;</i></a>

      <!-- 下载 -->
      <a href="#" id="popup_download" target="_blank"><i class="icon iconfont">&#xe609;</i></a>

      
    </div>

      <div class="title">

        <h2>title</h2>

        <div class="referral">介绍</div>

      </div>

      <div class="list">
      </div>
      
    </div>

  </div>

</div>
<div class="introduction">
</div>
<div id="bander_photo">
    <div class="box">
        <div class="screen">
        	<a href="javascript:void(0);" data-id="screen_1">
        		<i class="iconfont">&#xe616;</i><span>尺寸</span>
	        		<?php if(is_array($screen)): foreach($screen as $k=>$v): if($v[name]==尺寸): if(is_array($v["child"])): foreach($v["child"] as $key=>$s): ?><span class="selected"><?php if($s[price] == $demand[size]): ?>: <?php echo ($s["name"]); endif; ?></span><?php endforeach; endif; endif; endforeach; endif; ?>
        		<i class="iconfont">&#xe61e;</i>
        	</a>
        	|
        	<a href="javascript:void(0);" data-id="screen_2">
        		<i class="iconfont">&#xe615;</i><span>分类</span>
        			<?php if(is_array($screen)): foreach($screen as $k=>$v): if($v[name]==分类): if(is_array($v["child"])): foreach($v["child"] as $key=>$s): ?><span class="selected"><?php if($s[price] == $demand[genre]): ?>: <?php echo ($s["name"]); endif; ?></span><?php endforeach; endif; endif; endforeach; endif; ?>
        		<i class="iconfont">&#xe61e;</i>
        	</a>
        	|
        	<a href="javascript:void(0);" data-id="screen_3">
        		<i class="iconfont">&#xe613;</i><span>板式</span>
        			<?php if(is_array($screen)): foreach($screen as $k=>$v): if($v[name]==板式): if(is_array($v["child"])): foreach($v["child"] as $key=>$s): ?><span class="selected"><?php if($s[name] == $demand[format]): ?>: <?php echo ($s["name"]); endif; ?></span><?php endforeach; endif; endif; endforeach; endif; ?>
        		<i class="iconfont">&#xe61e;</i>
        	</a>
        	|
        	<a href="javascript:void(0);" data-id="screen_4">
        		<i class="iconfont">&#xe622;</i><span>排序</span>
        			<?php if(is_array($screen)): foreach($screen as $k=>$v): if($v[name]==排序): if(is_array($v["child"])): foreach($v["child"] as $key=>$s): ?><span class="selected"><?php if($s[price] == $demand[rank]): ?>: <?php echo ($s["name"]); endif; ?></span><?php endforeach; endif; endif; endforeach; endif; ?>
        		<i class="iconfont">&#xe61e;</i>
        	</a>
        </div>
    </div>
    <div class="elects">
    	<?php if(is_array($screen)): foreach($screen as $k=>$v): if($v[name]==尺寸): ?><div class="elect" id="screen_1">
	          <ul>
	            <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$s): ?><li><a <?php if($s[price] == $demand[size]): ?>class="selected"<?php endif; ?> <?php if($s[price] == 'all' && $demand[size]==''): ?>class="selected"<?php endif; ?>href="<?php echo U('Photo/index',array('genre'=>$demand['genre'],'format'=>$demand['format'],'rank'=>$demand['rank'],'size'=>$s['price']));?>"><?php echo ($s["name"]); ?></a></li><?php endforeach; endif; ?>
	          </ul>
	        </div><?php endif; ?>
          <?php if($v[name]==分类): ?><div class="elect" id="screen_2">
	            <ul>
		            <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$s): ?><li><a <?php if($s[price] == $demand[genre]): ?>class="selected"<?php endif; ?> <?php if($s[price] == '0.4' && $demand[genre]==''): ?>class="selected"<?php endif; ?>href="<?php echo U('Photo/index',array('genre'=>$s['price'],'format'=>$demand['format'],'rank'=>$demand['rank'],'size'=>$demand['size']));?>"><?php echo ($s["name"]); ?></a></li><?php endforeach; endif; ?>
	          	</ul>
			</div><?php endif; ?>
          <?php if($v[name]==板式): ?><div class="elect" id="screen_3">
	            <ul>
		            <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$s): ?><li><a <?php if($s[name] == $demand[format]): ?>class="selected"<?php endif; ?> <?php if($s[name] == '全部' && $demand[format]==''): ?>class="selected"<?php endif; ?>href="<?php echo U('Photo/index',array('genre'=>$demand['genre'],'format'=>$s['name'],'rank'=>$demand['rank'],'size'=>$demand['size']));?>"><?php echo ($s["name"]); ?></a></li><?php endforeach; endif; ?>
	          	</ul>
	        </div><?php endif; ?>
          <?php if($v[name]==排序): ?><div class="elect" id="screen_4">
	            <ul>
		            <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$s): ?><li><a <?php if($s[price] == $demand[rank]): ?>class="selected"<?php endif; ?>href="<?php echo U('Photo/index',array('genre'=>$demand['genre'],'format'=>$demand['format'],'rank'=>$s['price'],'size'=>$demand['size']));?>"><?php echo ($s["name"]); ?></a></li><?php endforeach; endif; ?>
	          	</ul>
          	</div><?php endif; endforeach; endif; ?>
        <div class="both"></div>
    </div>
</div>

  <section class="contents" style="min-height:500px;">

    <ul id="main">

      <?php if(is_array($photo)): $i = 0; $__LIST__ = array_slice($photo,0,12,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li style="opacity: 0;">

          <div class="details">

            <p class="title"><?php echo ($v["photo_title"]); ?>

            </p>

            <p class="rests"><?php echo ($v["photo_size"]); ?>

            <?php if($v['collect']): ?><a class="cancel" href="javascript:void(0)" onclick="collect(<?php echo ($v["id"]); ?>,1,this,1)"><i class="iconfont">&#xe619;</i>取消</a>

              <?php else: ?>

                <a href="javascript:void(0)" onclick="collect(<?php echo ($v["id"]); ?>,1,this,1)"><i class="iconfont">&#xe61a;</i>收藏</a><?php endif; ?>

              <?php if($v['praise']): ?><a class="cancel" href="javascript:void(0)" onclick="collect(<?php echo ($v["id"]); ?>,2,this,1)"><i class="icon iconfont">&#xe61b;</i>取消</a>

              <?php else: ?>

                <a href="javascript:void(0)" onclick="collect(<?php echo ($v["id"]); ?>,2,this,1)"><i class="icon iconfont">&#xe618;</i>赞</a><?php endif; ?>

            </p>

          </div>

          <div class="img">

            <a href="javascript:void(0)" onclick="photo_page('<?php echo ($v["id"]); ?>')">

              <img src="<?php echo ($v["photo_img"]); ?>?imageView2/2/w/340" class="LoadComplete">

            </a>

          </div>

          <div class="text">

            <div class="ption">

              <p><?php echo ($v["photo_description"]); ?></p>

              <a href="<?php echo U('Photo/page',array('id'=>$v['id']));?>" target="_blank">详情<i class="icon iconfont">&#xe60a;</i></a>

              <div class="both"></div>

            </div>

          </div>

          

        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>

  </section>
  <div class="both"></div>
  <div id="page">
  	<?php echo ($page); ?>
  </div>

<div id="ft" style="padding:0; border:0;">
    	<div class="deanfooter">
    	<div class="deanft_bottom">
        	<div class="w1150">
                <p>冬青网素材为用户免费分享产生，若发现您的权利被侵害，请联系363340104@qq.com ，我们尽快处理。&nbsp;&nbsp;&nbsp;京ICP备13016701号</p>
            </div>
        	
        </div>
    </div>
</div>

	<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
	<script src="/Application/Home/View/Public/js/style.js" charset="utf-8"></script>
	<script>
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "//hm.baidu.com/hm.js?9c8045cbc59858ac5566ec4a3d513014";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
	</script>


<script>
var jsondata = <?php echo json_encode($photo); ?>;
</script>

<script src="/Application/Home/View/Public/js/photo_index.js" charset="utf-8"></script>
<script>
$(window).scroll(function () {
            var menu_top = $('#bander_photo').offset().top;			
				if ($(window).scrollTop() >= 255) {
					$("#bander_photo").css("top",50);
					$("#bander_photo").css("position","fixed");
					$('#bander_photo').addClass('menuFixed')  
				}	
				if($(window).scrollTop() < 255) {  
					$("#bander_photo").css("position","relative"); 
					$("#bander_photo").css("top",255);
					$('#bander_photo').removeClass('menuFixed')	
				}
});
$(document).ready(function(){
	$("#bander_photo .box .screen a").hover(function(){
	  	var id = $(this).attr("data-id");
	  	$("#bander_photo .elects .elect").hide();
	  	$("#"+id).show();
	});
  	$("#bander_photo .elects .elect").mouseleave(function(){
	  	$("#bander_photo .elects .elect").hide();
	});
});
</script>
</body> 

</html>