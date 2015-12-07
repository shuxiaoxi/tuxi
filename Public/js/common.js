//底部的位置
function bottom_location(){
  var window_height = $(window).height();//获取网页的宽度
  var document_height = $(document).height();//获取页面内容的宽度
  if(window_height >= document_height){
    $(".deanft_bottom").css({"top":document_height,"position": "absolute"});
  }
}