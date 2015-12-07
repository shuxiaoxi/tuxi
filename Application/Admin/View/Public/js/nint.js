//弹出提示信息
function mistake(data){
	$(".error_message").html("<p>"+data+"</p>")
	$(".error_message").animate({right:'0px'});
	setTimeout(function(){
		$(".error_message").animate({right:'-200px'});
	},6000);
	return false; 
}
//关闭提示信息
$(".error_message").click(function(){
	$(".error_message").animate({right:'-200px'});
	return false; 
});

//折叠
function fold(wo){
	$(wo).next().slideToggle(160);
}

//name=名称
//id=名称
//way=方法
//remark=类型
//删除
function hint(name,id,way,remark){
	$('#hint .choice .name').text()
	$('#hint').show();
	$('#hint .choice .button .confirm').attr({"onclick":"confirm_hint("+id+",'"+way+"',"+remark+")"});
}

//隐藏
function close_hint(){
	$('#hint').hide();
}

//确定
function confirm_hint(id,way,remark){
	$.get("http://sohozl.com/Admin/"+way+"/del"+way,
    //提交内容
    { id: id, remark: remark },
        //返回的内容
      function(data){
      	location.reload();
      });
}

