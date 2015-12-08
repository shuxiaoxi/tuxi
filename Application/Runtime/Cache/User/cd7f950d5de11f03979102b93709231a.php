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

        <div class="title"><b>注册新瓣网账号</b><a href="<?php echo U('login/Landing');?>">已有账号，现在登录</a></div>
        <div class="box">
        <form method="Get" class="register" action="<?php echo U('Login/handleLogin');?>">



            <div class="control-group">

              <label for="mobile">账号</label>

              <div class="controls">

                <input type="text" id="username" name="username" placeholder="账号">

              </div>

            </div>

            <div class="control-group">

              <label for="mobile">邮箱</label>

              <div class="controls">

                <input type="text" id="mail" name="mail" placeholder="邮箱">

              </div>

            </div>

            <div class="control-group">

              <label for="password">密码</label>

              <div class="controls">

                <input type="password" id="password" name="password" placeholder="密码长度为6-16个字符,区分大小写,空格无效" size=20 onKeyUp=pwStrength(this.value) onBlur=pwStrength(this.value)>

              </div>

            </div>

            <div class="strength">

              <div class="con">

                <div id="weak">

                  <p>弱</p>

                </div>

                <div id="middle">

                  <p>中</p>

                </div>

                <div id="strong">

                  <p>强</p>

                </div>

              </div>

            </div>

            <div class="control-group">

              <label for="password">重复密码</label>

              <div class="controls">

                <input type="password" id="cpassword" name="password" placeholder="与密码相同">

              </div>

            </div>

            <div class="submit">

            <button type="submit" id="submit">提交</button>

            </div>

            <div class="strength">

              <div class="con">

                <label class="checkbox persistent"><input type="checkbox" name="terms" value="1" checked="false">

                我同意<a href="#">网站内容服务条款</a></label>

              </div>
            </div>
            <div class="both"></div>
        </form>
      </div>

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


<script src="/Application/User/View/Public/js/login.js"></script>

<script language=javascript>



    // JavaScript 判断表单

  $(document).ready(function(){

      

    $("form :input").blur(function(){

      $(this).parent().find(".error").remove();

      //邮箱验证  
      if ($(this).is("#username")){

        

        if (this.value==""){

          

          

          $(this).parent().append("<p class='error'>4-20位字符，支持汉字，字母，数字及-，_组合</p>");

          $('#send').attr("disabled","disabled");

          }else{



          $("#send").removeAttr('disabled');        

        }



      }

      var pattern = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;  

      if ($(this).is("#mail")){

        

        if (this.value=="" ||  !pattern.test(this.value)){

          

          

          $(this).parent().append("<p class='error'>请输入正确的邮箱</p>");

          $('#send').attr("disabled","disabled");

          }else{



          $("#send").removeAttr('disabled');        

        }



      }

      //密码

      if ($(this).is("#cpassword")){

        if (this.value=="" || this.value.length > 16 || this.value.length < 6 || this.value!= $("#password").val()){

          

          $(this).parent().append("<p class='error error_suer'>密码有误</p>");

          }else{

            $(this).next().remove();

          }

      }

    }); 

    //注册

    $("form.register").submit( function () {

      

      $("form :input").trigger("blur");

      

      var hdw3 = $(".error").length; 

      

      if (hdw3){

        return false;

        

        }else{;

            //账号

            var username = $("#username").val();

            //密码

            var mail = $("#mail").val();
            //密码
            var password = $("#password").val();

            //     //提交地址

            $.get(this.action,

                //提交内容

            {username:username,password:password,mail:mail},

                //返回的内容

            function(data){

                if(data['status']){

                  window.location.href=data['url'];

                }else{

                  mistake(data['info']);

                }

            });

            return false;

        } 

  

    });

  }); 

</script>

</body> 

</html>