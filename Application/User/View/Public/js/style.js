

//提示
//data=>提示内容
//url=>跳转地址
//succ=>是否成功。成功绿色未成功蓝色

function mistake(data,url,succ){

    if(succ){
      $(".error_message").css("color","#66cc99");
    }else{
      $(".error_message").css("color","#fd6c68");
    }
    $(".error_message").html("<p>"+data+"</p>")

    $(".error_message").animate({right:'0px'});

    setTimeout(function(){

        $(".error_message").animate({right:'-200px'});

        if(url){
          if(url=='loca'){
            window.location.reload();
          }else{
            window.location.href="http://www.sohozl.com/"+url;
          }
        }
        
    },3000);

    return false; 

}





//µ¯³öµÇÂ½ÌáÊ¾¿ò

function login(){

    $("#login").show();

    $("#shade").show();

}





//µã»÷ÕÚÕÖ²ã

function shade(){

    $("#login").hide();

    $("#shade").hide();

}





//提交表单

    $("form.login").submit( function () {

      

      $("form :input").trigger("blur");

        //Ìá½»ÄÚÈÝ

        var data = $(this).serialize();

        //     //Ìá½»µØÖ·

        $.get(this.action,data,

            //·µ»ØµÄÄÚÈÝ

        function(data){

            if(data['status']){

              window.location.href=data['url'];

            }else{

              mistake(data['info']);

            }

        });

        return false;

  

    });



//ÏÔÊ¾Ó¦ÓÃµ¼º½
$('#navigation_hover').hover(
  function(){

     $(".navigation").show();

  },
  function () {
     $(".navigation").hide();
    }
  );



//收藏或者点赞
//id-----目标ID,
//like---1收藏2赞
//wo-----点击的DOM
//genre--1,作品  2,评论
function collect(id,like,wo,genre){

    // Ìá½»µØÖ·

    $.get("http://sohozl.com/Home/Photo/ajaxCollect",

    //Ìá½»ÄÚÈÝ

    {id:id,like:like,genre:genre},

    //url 返回1取消成功  url返回2点赞成功 url返回3

      function(data){

          if(data['url']=='1'){

            if(like=='1'){

              $(wo).find("i").html("&#xe61a;");

            }else{

              $(wo).find("i").html("&#xe618;");

            }

          }else if(data['url']=='2'){

            if(like=='1'){

              $(wo).find("i").html("&#xe619;");

            }else{

              $(wo).find("i").html("&#xe61b;");

            }

          }else if(data['url']=='3'){

            mistake(data['info']);

          }

      });

}


//评论赞comment
function comment_praise(id,wo){


    $.get("http://sohozl.com/Home/Photo/ajaxComment_Praise",

    {id:id},

    //url 返回1取消成功  url返回2点赞成功 url返回3

      function(data){

          if(data['con']=='1'){
            $(wo).find('i').html("&#xe61b;");
          }else{
            $(wo).find('i').html("&#xe618;");
          }
          $(wo).find('span').html(data['count']);

      });

}


//文章内容页展示左右滑动

      function basis(){

        var aPage = $('#layer .normal .right .list .page');   //分页按钮

        var aImg = $('#layer .normal .left .img span');   //图像集合

        var iSize = aImg.size();    //图像个数

        

        var index = 0;    //切换索引

        $('#btnLeft').click(function(){   //左边按钮点击

          index--;

          if(index<0){

            index=iSize-1

          }

          change()

        })

        $('#btnRight').click(function(){    //右边按钮点击

          index++;

          if(index>iSize-1){

            index=0

          }

          change()

        })

        //分页按钮点击

        aPage.click(function(){

          index = $(this).index();

          change()

        });

        //切换过程

        function change(){

          aPage.removeClass('active');

          aPage.eq(index).addClass('active');

          aImg.stop();

          //隐藏除了当前元素，所以图像

          aImg.eq(index).siblings().hide();

          //显示当前图像

          aImg.eq(index).show();

        }

      }

      $("#layer .content .right .list a:first").addClass("active");

      $("#layer .normal .left .img span:first").show();





// 案例详情页自适应

$(document).ready(function(){

  $(window).resize(function() {

    carousel();

  });

  carousel();
  bottom_location();

});

function carousel(){

  var width = $(document.body).width()-380;

  $("#layer .normal .left").css("width",width);

  var img_height = $("#layer").height();

  $("#layer .normal .left .img span").css("line-height",img_height+"px");

  $("#layer .normal .left a").css("width",width/2);

  $("#layer .normal .left .btnRight").css("left",width/2);

}