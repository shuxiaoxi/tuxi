<?php

/** 
 * 验证码检查 
 */  

function check_verify($code, $id = ""){  

    $verify = new \Think\Verify();  

    return $verify->check($code, $id);  

} 



/** 
 * RBAC
 * 递归重组节点信息多为数组
 * 
 */  

function node_merge($node, $access = null, $pid = 0){ 

	$arr = array();

	foreach($node as $v){

		if(is_array($access)){

			$v['access'] = in_array($v['id'],$access) ?1:0;

		}

		if($v['pid'] == $pid){

			$v['child'] = node_merge($node,$access,$v['id']);

			$arr[] = $v;

		}

	}

	return $arr;

}

//递归
function recursion($array,$name = "child", $pid = 0){
    $arr = array();
    foreach ($array as $v){
        if($v['pid'] == $pid){
            $v[$name] = recursion($array,$name,$v['id']);
            $arr[] = $v;
        } 
    }
    return $arr;
} 


function photo_opt($node, $access = null,$key){
	$arr = array();
	foreach($node as $v){
		if(is_array($access)){
			$v['access'] = in_array($v[$key],$access) ?1:0;
			$arr[] = $v;
		}
	}
	return $arr;
} 
function Qiniu_Encode($str) // URLSafeBase64Encode
 {
    $find = array('+', '/');
    $replace = array('-', '_');
    return str_replace($find, $replace, base64_encode($str));
 }
 function Qiniu_Sign($url) {//$info里面的url
    $setting = C ( 'UPLOAD_SITEIMG_QINIU' );
    $duetime = NOW_TIME + 86400;//下载凭证有效时间
    $DownloadUrl = $url . '?e=' . $duetime;
    $Sign = hash_hmac ( 'sha1', $DownloadUrl, $setting ["driverConfig"] ["secrectKey"], true );
    $EncodedSign = Qiniu_Encode ( $Sign );
    $Token = $setting ["driverConfig"] ["accessKey"] . ':' . $EncodedSign;
    $RealDownloadUrl = $DownloadUrl . '&token=' . $Token;
    return $RealDownloadUrl;
 }
?>