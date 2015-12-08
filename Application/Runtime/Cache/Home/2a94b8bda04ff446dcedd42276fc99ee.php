<?php if (!defined('THINK_PATH')) exit();?><!doctype html> 

<html lang="zh-cn"> 

<head> 

	<title>图昔网|素材站。</title>

  <meta name="keywords" content="图昔网，影楼模板，婚纱模板，儿童写真，个人写真，相册模板，PSD模板，影楼素材下载，儿童模板下载，写真模板下载，衣服模板下载">

  <meta name="description" content="冬青|数码站，免费下载：婚纱摄影模板、儿童摄影模板、写真摄影模板。">

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

	

  <style>

    /*首页*/

body{  font-family:'Microsoft YaHei', arial, helvetica, sans-serif;}

#index{background-color:#fff;}

#index .index1 img{width:100%;display:block;}

#index .index1 .title{width:100%;position:relative;}

@font-face {font-family: 'webfont';

  src: url('//at.alicdn.com/t/4gad6moj358f47vi.eot'); /* IE9*/

  src: url('//at.alicdn.com/t/4gad6moj358f47vi.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */

  url('//at.alicdn.com/t/4gad6moj358f47vi.woff') format('woff'), /* chrome、firefox */

  url('//at.alicdn.com/t/4gad6moj358f47vi.ttf') format('truetype'), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/

  url('//at.alicdn.com/t/4gad6moj358f47vi.svg#思源黑体-极细') format('svg'); /* iOS 4.1- */

}

#index .font{text-align: center;

    font-style:normal;

    -webkit-font-smoothing: antialiased;

    -moz-osx-font-smoothing: grayscale;}

#index .index1 .title h2{font-size:60px;line-height:160px;color:#fff;}

#index .index1 .title p{font-size:24px;color:#fff;}

#index .index1 .title p span{margin:0 2px;}

#index .index1 .title .text{position:absolute;top:30%;width:100%;text-align:center;}

#index .index1 .title .below{color:#fff;position:relative;bottom:100px;font-size:42px;left:50%;margin-left:-21px;animation:mymove 2s infinite;

-moz-animation:mymove 2s infinite; /* Firefox */

-webkit-animation:mymove 2s infinite; /* Safari and Chrome */

-o-animation:mymove 2s infinite; /* Opera */}

@keyframes mymove

{

0%   {bottom:50px;}

50%  {bottom:80px;}

100% {bottom:50px;}

}



@-moz-keyframes mymove /* Firefox */

{

0%   {bottom:50px;}

50%  {bottom:80px;}

100% {bottom:50px;}

}



@-webkit-keyframes mymove /* Safari and Chrome */

{

0%   {bottom:50px;}

50%  {bottom:80px;}

100% {bottom:50px;}

}



@-o-keyframes mymove /* Opera */

{

0%   {bottom:50px;}

50%  {bottom:80px;}

100% {bottom:50px;}

}

#index .index1 .title .below i{font-size:42px;}

#index .index1 .title .Avatar{top:20%;}

#index .index1 .title .Avatar a{width:138px;height:138px;display:inline-block;border-radius:77px;}

#index .index1 .title .Avatar a i{font-size:138px;line-height:138px;color:#f66;}

#index .index1 .title .Avatar a.submit{display:inline-block;width:300px;height:80px;line-height:80px;background-color:#f66;font-size:30px;color:#fff;  border-radius: 5px;}

#index .index1 .title .Avatar a.submit:hover{background-color:#dc4f4f;}

#index .index1 .title .Avatar a.submit i{font-size:40px;color:#fff;line-height:80px;margin-right:30px;}

#index .index1 .title .Avatar p{font-size:16px;}

#index .index1 .title .Avatar p span{font-size:22px;line-height:48px;}

#index .index2{padding-bottom:100px;}

#index .index2 .title{padding-top:100px;}

#index .index2 .title h2{font-size:38px;line-height:38px;color:#3e3e3e;margin-bottom:30px;}

#index .index2 .title p{color:#444444;text-align: center;font-size:16px;max-width:1000px;margin:0 auto;}

#index .index2 .title img{margin-top:60px;width:100%;}

#index .index2 .kind{width:1200px;margin:auto;margin-top:50px;}

#index .index2 .kind .page{width:300px;padding:10px 50px;float:left;height:260px;}

#index .index2 .kind .page_img{width:360px;float:left;height:260px;margin:0 20px;}

#index .index2 .kind .page_img a{display:inline-block;width:100%;}

#index .index2 .kind .page_img a img{width:100%;display:block;border:0px solid #f66;transition: width 0.2s,border 0.2s;-moz-transition: width 0.2s,border 0.2s;-webkit-transition: width 0.2s,border 0.2s;-o-transition: width 0.2s,border 0.2s;}

#index .index2 .kind .page_img a img:hover{width:340px;border:10px solid #f66;}

#index .index2 .kind .page p{text-align: center;}

#index .index2 .kind .page p .quantity{height:100px;width:100px;display: inline-block;border-radius:50px;font-size:48px;color:#fff;line-height: 100px;margin-top:30px;}

#index .index2 .kind .page p .quantity .icon{font-size:74px;}

#index .index2 .kind .page p .title{font-size:24px;color:#2a2a2a;line-height: 42px;color:#fff;}

#index .index2 .kind .page .text{padding:0;line-height: 24px;color:#fff;}

#index .index2 .collect{width:750px;margin:auto;margin-top:50px;}

#index .index2 .collect .page{float:left;width:250px;height:120px;margin:50px 0;text-align:center;}

#index .index2 .collect .page i{font-size:120px;line-height:120px;}

@media only screen and (max-width: 1366px) {

    #index .index1 .title .Avatar{top:5%;}

    #index .index1 .title h2{font-size:50px;line-height:120px;color:#fff;}

    #index .index1 .title .Avatar p{font-size:14px;}

}

  </style>

}
<meta property="qc:admins" content="327367673763707246375" />
</head> 

<body id="index">

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

<div class="index1">

  <div class="title">

    <img src="/Application/Home/View/Public/image/mate/index_bander_dong.jpg">

    <div class="text">

      <h2 class="font">《冬青•素材站》</h2>

      <p class="font">向每一个在工作中勤奋努力的人•致敬</p>

    </div>

    <a class="below"><i class="icon iconfont">&#xe61e;</i></a>

  </div>

</div>

<div class="index2">

  <div class="title">

    <h2 class="font">《三大类》</h2>

    <p class="font">三大类，覆盖整个行业，最专业的数码师设计分享平台。</p>

  </div>

  <div class="kind">

    <div class="page slide" style="background-color:#1aa1c0" data-rotate-x="90deg" data-move-z="-500px" data-move-y="-200px">

      <p><a href="#" class="quantity"><i class="icon iconfont">&#xe620;</i></a></p>

      <p><a href="#" class="title">婚纱摄影</a></p>

      <p class="text">针对影楼类网站提供专业的网络优化，<br/>提示响应与打开速度。</p>

    </div>

    <div class="page slide" style="background-color:#ff6666" data-rotate-x="90deg" data-move-z="-500px" data-move-y="0px">

      <p><a href="#" class="quantity"><i class="icon iconfont">&#xe61f;</i></a></p>

      <p><a href="#" class="title">儿童摄影</a></p>

      <p class="text">用户可通过手机，平板。<br/>

随时、随地、随身了解影楼最新的信息。</p>

    </div>

    <div class="page slide" style="background-color:#48cc83" data-rotate-x="90deg" data-move-z="-500px" data-move-y="200px">

      <p><a href="#" class="quantity"><i class="icon iconfont">&#xe621;</i></a></p>

      <p><a href="#" class="title">个人写真</a></p>

      <p class="text">帮助银楼快速实现全新的公众号服务平台。<br/>

一个包罗万象的操作平台</p>

    </div>

    <div class="both"></div>

  </div>

</div>

<div class="index1">

  <div class="title">

    <img src="/Application/Home/View/Public/image/mate/index_barder_more.jpg">

    <div class="text Avatar">

      <h2 class="font slide" data-move-x="10%">《每周更新》</h2>

      <a class="font slide"  data-move-x="-20%"><i class="iconfont">&#xe60d;</i></a>

      <p class="font slide">每周更新20-80套模板</p>

    </div>

  </div>

</div>

<div class="index2" style="background-color:#eaeaeb">

  <div class="title">

    <h2 class="font slide">实用的用户收藏</h2>

    <p class="font slide">把喜欢的收藏起来，方便使用的时候查找。</p>

  </div>

  <div class="collect">

    <div class="page slide" data-move-y="200px" data-move-x="-200px" data-rotate="-45deg">

      <i class="iconfont">&#xe61a;</i>

    </div>

    <div class="page slide" data-move-y="200px" data-move-x="0px" data-rotate="-45deg">

      <i class="iconfont" style="color:#f66">&#xe617;</i>

    </div>

    <div class="page slide" data-move-y="200px" data-move-x="200px" data-rotate="-45deg">

      <i class="iconfont">&#xe619;</i>

    </div>

    <div class="both"></div>

  </div>

</div>

<div class="index1">

  <div class="title">

    <img src="/Application/Home/View/Public/image/mate/index_barder_item.jpg">

    <div class="text Avatar">

      <!-- <h2 class="font slide" data-move-x="10%">珍惜</h2> -->

      <a class="font slide submit"  data-move-y="-20%" href="<?php echo U('Photo/index');?>" style="top:180px;position: relative;">现在开始</a>

      <!-- <p class="font slide" style="width:600px;margin:0 auto;margin-top:20px;"></p> -->

    </div>

  </div>

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


<script src="/Application/Home/View/Public/js/jquery.smoove.min.js" charset="utf-8"></script>

<script type="text/javascript">$('.slide').smoove({offset:'20%'});</script>

</body> 

</html>