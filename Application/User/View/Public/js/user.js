//用户中心去掉点赞
function collect_user(id,like,wo){
    // 提交地址
    $.get("ajaxCollect",
    //提交内容
    {id:id,like:like},
    //返回的内容
      function(data){
        if(data['status']){
          $(wo).parents('li').fadeOut();
        }else{
          mistake('刷新页面');
        }
      });
}