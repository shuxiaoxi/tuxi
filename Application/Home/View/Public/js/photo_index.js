window.onload=function(){
  waterfall();
}
//瀑布流
$(document).ready(function(){
  //获取LI的数量
  
  var $boxs=$('#main>li');
  
  var istrolley = 1; // 控制变量
  
  $(window).on('scroll',function(){
    
      var liLength=$('#main>li').length;
      //获取数据的长度
      var jsondatas = $(jsondata).length;
      // 判断滚动到底部了嘛
      if(checkScrollSlide()&&liLength<jsondatas){
      	if(istrolley == '1'){
        istrolley = 0;
        //加载6条
        for (var i=liLength;i<liLength+6;i++)
        {
          if(jsondata[i]){
          var page_img = fillLi(jsondata[i]['photo_title'],jsondata[i]['photo_size'],jsondata[i]['id'],jsondata[i]['praise'],jsondata[i]['photo_img'],jsondata[i]['photo_description'],jsondata[i]['collect']);
        	page_img.load(function(){
			  istrolley = 1;
              waterfall();
			});
          };

        }
        
      }
    }
    waterfall();
  });



});


//设置UL的高和宽
function ulHW(W,H){
	$('#main').width(W).css({'height':H+'px'});
}

 //瀑布流布局方式
function waterfall(){
      var $boxs=$('#main>li');
      var w=412;
      var cols=Math.floor($(window).width()/w);
      var ulW =cols*w;
      var hArr=[];
      $boxs.each(function(index,value){
      var h=$boxs.eq(index).outerHeight()+10;
      if(index<cols){
        hArr[index]=h;
        $boxs.eq(index).css({
          'opacity':'1'
        })
      }else{
        var minH=Math.min.apply(null,hArr);
        var minHIndex=$.inArray(minH,hArr);
        $(value).css({
          'position':'absolute',
          'top':minH+'px',
          'left':minHIndex*w+'px',
          'opacity':'1'
        })
        hArr[minHIndex]+=$boxs.eq(index).outerHeight()+10;
      }

      
    })
    // $('#main').width(w*cols).css({'height':maxH+'px'});
    ulHW(ulW,Math.max.apply(null,hArr));
  };


// 判断图片加载的函数
function isImgLoad(callback){
  var t_img; // 定时器
  var isLoad = true; // 控制变量

    // 注意我的图片类名都是cover，因为我只需要处理cover。其它图片可以不管。
    // 查找所有封面图，迭代处理
    $('.LoadComplete').each(function(){
        // 找到为0就将isLoad设为false，并退出each
        if(this.height === 0){
            isLoad = false;
            return false;
        }
    });
    // 为true，没有发现为0的。加载完毕
    if(isLoad){
        clearTimeout(t_img); // 清除定时器
        // 回调函数
        callback();
    // 为false，因为找到了没有加载完成的图，将调用定时器递归
    }else{
        isLoad = true;
        t_img = setTimeout(function(){
            isImgLoad(callback); // 递归扫描
        },500); // 我这里设置的是500毫秒就扫描一次，可以自己调整
    }
}




//判断是否执行加载信息
function checkScrollSlide(){
  var $lastBox=$("#main>li").last();
  var lastBoxDis=$lastBox.offset().top+Math.floor($lastBox.outerHeight()/2);
  var scrollTop=$(window).scrollTop();
  var documentH=$(window).height();
  return(lastBoxDis<scrollTop+documentH)?true:false;
};

//添加信息
function fillLi(title,time,id,praise,img,description,collect){
  var oLi=$('<li>').appendTo("#main"); 
  var details=$('<div>').addClass('details').appendTo($(oLi));   
  var detaTitle=$('<p>').addClass('title').text(title).appendTo($(details));
  var detaRests=$('<p>').addClass('rests').text(time).appendTo($(details));
  if(collect){
    $('<a>').addClass('cancel').attr({"href":"javascript:void(0)","onclick":"collect("+id+",1,this,1)"}).html("<i class='iconfont'>&#xe619;</i>取消").appendTo($(detaRests));
  }else{
    $('<a>').attr({"href":"javascript:void(0)","onclick":"collect("+id+",1,this,1)"}).html("<i class='iconfont'>&#xe61a;</i>收藏").appendTo($(detaRests));
  }
  
  if(praise){
    $('<a>').addClass('cancel').attr({"href":"javascript:void(0)","onclick":"collect("+id+",2,this,1)"}).html("<i class='icon iconfont'>&#xe61b;</i>取消").appendTo($(detaRests));
  }else{
    $('<a>').attr({"href":"javascript:void(0)","onclick":"collect("+id+",2,this,1)"}).html("<i class='icon iconfont'>&#xe618;</i>赞").appendTo($(detaRests));
  }
  var imgS=$('<div>').addClass('img').appendTo($(oLi));
  var imgA=$('<a>').attr({"href":"javascript:void(0)","onclick":"photo_page("+id+")"
  }).appendTo($(imgS));
  var imgImg=$('<img>').attr({"src":""+img+"?imageView2/2/w/340"}).addClass('LoadComplete').appendTo($(imgA));
  // console.log(img);
  var text=$('<div>').addClass('text').appendTo($(oLi));
  var ption=$('<div>').addClass('ption').appendTo($(text));
  $('<p>').text(description).appendTo($(ption));
  $('<a>').attr({"target":"_blank","href":"/index.php/Home/Photo/page/id/"+id+".html"}).html("详情<i class='icon iconfont'>&#xe60a;</i>").appendTo($(ption));
  $('<div>').addClass('both').appendTo($(ption));
  return $(imgImg);
}



//查看具体图片隐藏滚动条
function blacken(){

  $("body").css({"overflow":"visible","overflow-y":"scroll"});

  $("#layer").hide();

}


//弹出具体相册
function unfold(data,praise,collect){

  //标题

  $("#layer .normal .right .title h2").text(data['photo_title'])

  //介绍

  $("#layer .normal .right .title .referral").text(data['photo_description'])

  //喜欢

  if(praise==1){

    $("#popup_praise").html("<i class='icon iconfont'>&#xe61b;</i>");

  }else{
    $("#popup_praise").html("<i class='icon iconfont'>&#xe618;</i>");
  }

  $("#popup_praise").attr("onclick","collect("+data['id']+","+2+","+'this'+",1)");

  if(collect==1){

    $("#popup_collect").html("<i class='icon iconfont'>&#xe619;</i>");

  }else{
    $("#popup_collect").html("<i class='icon iconfont'>&#xe61a;</i>");
  }

  //收藏

  $("#popup_collect").attr("onclick","collect("+data['id']+","+1+","+'this'+",1)");

  //下载

  $("#popup_download").attr("href","/Home/Photo/download?id="+data['id']);



  $("#layer .content .right .list").empty();

  $("#layer .normal .left .img").empty();

  var strs= new Array(); //定义一数组 

  strs=data['photo_atlas'].split(","); //字符分割 

  for (i=0;i<strs.length-1 ;i++ ) 

  { 

    $("#layer .content .right .list").append("<a class='page' href='javascript:void(0)'><img src="+strs[i]+"?imageView2/1/w/100/h/100></a>");

    $("#layer .normal .left .img").append("<span style='display:none;'><img src="+strs[i]+"></span>");

  }

  $("#layer .content .right .list a:first").addClass("active");

  $("#layer .normal .left .img span:first").show();


//   var labels = '';

//   for (var i = 0; i < label.length; i++) {

//     labels = labels+"&nbsp;&nbsp;&nbsp;"+label[i]['label_name'];

//   };
// alert(labels);
//   $("#layer .content .actio .ation p .label_con").html(labels);

  $("body").css({"overflow":"hidden"});

  $("#layer").css({"overflow":"hidden"});

  carousel();

  basis();

  $("#layer").show();

}


//收藏与喜欢切换
// function filtrate(own){
//   if($(own).attr("data-state")==1){
//     $(own).attr("data-state","0");
//     $(own).css({"border":"1px solid #fff","color":"#fff"});
//   }else{
//     $(own).attr("data-state","1");
//     $(own).css({"border":"1px solid red","color":"red"});
    
//   }
// }



 //ajax加载具体内容

function photo_page(id){

    // 提交地址

    $.post("/Home/photo/ajaxPhotoPage",

    //提交内容

    {id:id},

    //返回的内容

    function(data){

      if(data['WebSite']=="1"){

        unfold(data['data'],data['praise'],data['collect']);

      }else{

        alert("失败");

      }

    });
};


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

});

function carousel(){

  var width = $(document.body).width()-380;

  $("#layer .normal .left").css("width",width);

  var img_height = $("#layer").height();

  $("#layer .normal .left .img span").css("line-height",img_height+"px");

  $("#layer .normal .left a").css("width",width/2);

  $("#layer .normal .left .btnRight").css("left",width/2);

}