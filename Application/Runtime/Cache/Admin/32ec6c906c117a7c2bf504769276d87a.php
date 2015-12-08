<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>系统后台</title>
		<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta name="robots" content="noindex,nofollow">
		<style>
    .error_message{
      width:200px;
      height:60px;
      background-color:#fd6c68;
      position:fixed;
      top:50px;
      right:-200px;
    }
    .error_message p{
      text-align:center;
      line-height:60px;
      margin:0px;
      color:#fff;
    }
			#login_btn_wraper{
				text-align: center;
			}
			#login_btn_wraper .tips_success{
				color:#fff;
			}
			#login_btn_wraper .tips_error{
				color:#DFC05D;
			}

			#login{
        width:70%;
        margin:0 auto;
        margin-top:220px;
      }
  #login .user .code{
  		width:100%;
  		height:42px;
  		overflow:hidden;
        border:1px solid #ccc;
        border-top:none;
        border-bottom-right-radius:0.8em;
        border-bottom-left-radius:0.8em;
  }
  #login .user .code .code_img{
  		float:right;
  		border-left:1px solid #ccc;
  }
  #login .user .code .code_text{
  		float:left;
  		width:39%;
  		border:none;
  }
  #login .user input{
        display: block;
        width: 90%;
        height: 30px;
        padding: 6px 5%;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out 0.5s,-webkit-box-shadow ease-in-out 0.5s;
        -o-transition: border-color ease-in-out 0.5s,box-shadow ease-in-out 0.5s;
        transition: border-color ease-in-out 0.5s,box-shadow ease-in-out 0.5s;
        -webkit-box-shadow: 0 0 0 1000px #fff inset;
        }

    #login .user input:focus{
      border-color:#66afe9;
      outline:0;
      -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)}
    #login .user .top{
        border-top-left-radius:0.8em;
        border-top-right-radius:0.8em;
        border-bottom:1px solid #fff;
    }
    #login .user .submit{
        display: block;
        margin-top:10px;
        width:101%;
        height:44px;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 16px;
        text-align: center;
        white-space: nowrap;
        background:#fd6c68;
        color:#fff;
        border: 1px solid #fd6c68;
        border-radius: 0.8em;
        outline:0;
        cursor:pointer;
    }
    .tips_error{
    	display:block ;
    	width:100%;
    	text-align:center;
    	margin-top:10px;
    }
      /* 小屏幕（平板，大于等于 768px） */
  @media (min-width: 768px) {
    #login{
        width:300px;
      }
  }

  /* 中等屏幕（桌面显示器，大于等于 992px） */
  @media (min-width: 992px) {
    #login{
        width:300px;
      }
  }

  /* 大屏幕（大桌面显示器，大于等于 1200px） */
  @media (min-width: 1200px) {
    #login{
        width:300px;
      }
  }
}
		</style>
		<script>
			if (window.parent !== window.self) {
					document.write = '';
					window.parent.location.href = window.self.location.href;
					setTimeout(function () {
							document.body.innerHTML = '';
					}, 0);
			}
		</script>
		
	</head>
<body style="overflow-x: hidden;overflow-y: hidden;">
	<div id="login">
	    <form method="post" name="login" action="<?php echo U('Login/login');?>">
	      <div class="user">
	        <input type="text" name="user_name" class="top" placeholder="输入系统账号" required>
	        <input type="password" name="user_pass" placeholder="输入系统密码" required>

	        <div id="J_verify_code" class="code">
	        	<input class="code_text" type="text" name="verify" placeholder="请输入验证码" />
				<img class="code_img" id="code_img" alt="" src="<?php echo U('Admin/Login/Verify','code_len=4&font_size=20&width=151&height=42&font_color=&background=');?>"
				onclick="document.getElementById('code_img').src='<?php echo U('Admin/Login/Verify','code_len=4&font_size=20&width=151&height=42&font_color=&background=');?>&time='+Math.random();"
				style="cursor: pointer;" title="点击获取"/>
			  </div>
	        <button type="submit" class="submit">登陆</button>
	      </div>
	    </form>
	</div>
  <div class="error_message">
  </div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/Application/Admin/View/Public/js/nint.js"></script>
    
  <script>
    $(document).ready(function(){ 
        $("form").submit( function () { 
             var data = $(this).serialize();
            $.post(this.action,data,
             function(data){
                if(data['status']=='1'){
                 window.location.href=data['url'];
                }else{
                  mistake(data['info']);
                }
             });
            return false; 
          }); 
    });
  </script>
</body>
</html>