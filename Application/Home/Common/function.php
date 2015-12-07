<?php
/** 
 * 验证码检查 
 */  
function check_verify($code, $id = ""){  
    $verify = new \Think\Verify();  
    return $verify->check($code, $id);  
} 


//递归二维数组
function photo_opt($node, $access = null){
    $arr = array();
    foreach($node as $v){
        if(is_array($access)){
            $v['access'] = in_array($v['label_id'],$access) ?1:0;
            $arr[] = $v;
        }
    }
    return $arr;
}

function photo_name($node, $access = null){
    $arr = array();
    foreach($node as $v){
        if(is_array($access)){
            $v['access'] = in_array($v['label_name'],$access) ?1:0;
            $arr[] = $v;
        }
    }
    return $arr;
} 

/**
 * 判断用户是否点赞
 */
function photoPraise($item,$like){
    $arr = array();
    foreach ($item as $v) {
        $v['praise'] = in_array($v['id'], $like)?1:0;
        $arr[] = $v;
    }
    return $arr;
}

/**
 * 判断用户是否收藏
 */
function photoCollect($datas,$like){
    $arr = array();
    foreach ($datas as $v) {
        $v['collect'] = in_array($v['id'], $like)?1:0;
        $arr[] = $v;
    }
    return $arr;
}
?>