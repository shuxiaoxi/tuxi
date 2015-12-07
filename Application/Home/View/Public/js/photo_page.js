//点击图片显示大图
function photo_page(wo,uel){
  $("#photo_page .atlas .images .vessels ul li").removeClass("opt");
  $(wo).parent().addClass("opt");
  $('#photo_page .atlas .image span img').attr("src",uel);
}


//图片列表滚动
window.onload=function(){
  // 获取容器的宽度
  var vesselWidth = $("#photo_page .atlas .images .vessel").width();

  //获取li的宽度
    var sumWidth =0;
  $("#photo_page .atlas .images .vessels ul").find("li").each(function(){
      sumWidth += $(this).width();
  });

  if(sumWidth<vesselWidth){
    var sss = (vesselWidth-sumWidth)/2;
    $("#photo_page .atlas .images .vessels").css("left",sss);
    $(".photo_page_left,.photo_page_right").hide();
  }
  $("#photo_page .atlas .images .vessels ul li:first").addClass("opt");

  var place = 0;
  $(".photo_page_right").click(function(){
    sumWidthpage = -sumWidth;
    place = place-500;
    if(place-vesselWidth < -sumWidth){
      var places = place-vesselWidth+500;
      if(places == -sumWidth){
        place = 0;
        $("#photo_page .atlas .images .vessels").animate({left:place});
      }else{
        place = -sumWidth+vesselWidth;
        $("#photo_page .atlas .images .vessels").animate({left:place});
      }
    }else{
      $("#photo_page .atlas .images .vessels").animate({left:place});
    }
  });

  $(".photo_page_left").click(function(){
    sumWidthpage = -sumWidth;
    place = place+500;
    if(place > 0){
      if(place == 500){
        place = -sumWidth+vesselWidth;
        $("#photo_page .atlas .images .vessels").animate({left:place});
      }else{
        place = 0;
        $("#photo_page .atlas .images .vessels").animate({left:place});
      }
    }else{
      $("#photo_page .atlas .images .vessels").animate({left:place});
    }
  });

  //留言提供者赛选
  $(function(){
    var aPage = $("#photo_page .leave .photo_page_nav .photo_page_tab a");
    var details = $("#photo_page .leave .details .photo_page_details ul li");
    //分页按钮点击
    aPage.click(function(){
      var index = $(this).index();
      details.show();
      details.eq(index).hide();
      aPage.removeClass("one");
      aPage.eq(index).addClass("one");
    });
  });


  //提交表单

    $("form.page_word").submit( function () {

        //获取内容

        var data = $(this).serialize();
            //提交地址

        $.post(this.action,data,

            //返回

        function(data){

            if(data['status']){

              mistake(data['info'],data['url'],1);

            }else{

              mistake(data['info'],data['url']);

            }

        });

        return false;
    });

    var Comment_paging = Math.ceil($(Comments).length/10);
    if(Comment_paging>1){
      page_paging(Comment_paging,1);
    }
    page_message(1);

    
}
//分页按钮
function page_paging(pagings,paging){
      $('.page_paging').html('');
      if(paging==1){
        $('<span>').html("首页").appendTo(".page_paging");
        $('<span>').html("上一页").appendTo(".page_paging");
      }else{
        paging_jian = paging-1;
        $('<a>').attr({"href":"javascript:void(0)","onclick":"page_paging("+pagings+",1)"}).html("首页").appendTo(".page_paging");
        $('<a>').attr({"href":"javascript:void(0)","onclick":"page_paging("+pagings+","+paging_jian+")"}).html("上一页").appendTo(".page_paging");
      }
      for (var i=1;i<pagings+1;i++){
        if(i==paging){
          $('<a>').addClass('active').html(i).appendTo(".page_paging");
        }else{
          $('<a>').attr({"href":"javascript:void(0)","onclick":"page_paging("+pagings+","+i+")"}).html(i).appendTo(".page_paging");
        }
      }
      if(paging==pagings){
        $('<span>').html("下一页").appendTo(".page_paging");
        $('<span>').html("尾页").appendTo(".page_paging");
      }else{
        paging_jia = paging+1;
        $('<a>').attr({"href":"javascript:void(0)","onclick":"page_paging("+pagings+","+paging_jia+")"}).html("下一页").appendTo(".page_paging");
        $('<a>').attr({"href":"javascript:void(0)","onclick":"page_paging("+pagings+","+pagings+")"}).html("尾页").appendTo(".page_paging");
      }
      page_message(paging);
      
    }
//留言
function page_message(paging){
  min = (paging - 1)*10;
  max = paging*10;
  $("ul.page_comment").html('');
  for (var i=min;i<max;i++){
        if(Comments[i]){
            var oLi=$('<li>').appendTo("ul.page_comment"); 
            var logo=$('<div>').addClass('logo').appendTo($(oLi));
            //添加图片
            if(Comments[i]['avatar']){
              $('<img>').attr({"src":""+Comments[i]['avatar']+"?imageView2/2/h/60"}).appendTo($(logo)); 
            }else{
              $('<img>').attr({"src":"/Application/Home/View/Public/image/test/name.jpg"}).appendTo($(logo)); 
            }
            
            var text=$('<div>').addClass('text').appendTo($(oLi));
            // 添加名字
            if(Comments[i]['user_nicename']){
              $('<a>').html(Comments[i]['user_nicename']).appendTo($(text)); 
            }else{
              $('<a>').html(Comments[i]['user_name']).appendTo($(text)); 
            }
            $('<div>').html(Comments[i]['details']).appendTo($(text));
            var time = $('<p>').html(Comments[i]['time']).appendTo($(text));
            $('<a>').attr({"href":"javascript:void(0)","onclick":"comment_praise("+Comments[i]['this_id']+",this)"}).addClass('page_love').html('<span>'+Comments[i]['approval']+"</span><i class='icon iconfont'>&#xe618;</i>").appendTo($(time));
            $('<div>').addClass('both').appendTo($(oLi));
          };
      }
}