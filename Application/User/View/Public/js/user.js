//�û�����ȥ������
function collect_user(id,like,wo){
    // �ύ��ַ
    $.get("ajaxCollect",
    //�ύ����
    {id:id,like:like},
    //���ص�����
      function(data){
        if(data['status']){
          $(wo).parents('li').fadeOut();
        }else{
          mistake('ˢ��ҳ��');
        }
      });
}