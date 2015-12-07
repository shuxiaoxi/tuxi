/**
 * LOGIN公共函数文件
 */


/**
 * login手机验证
 */
var secs = 60; //倒计时的秒数
function doUpdate(a){ 
            abc = a +'秒后重新发送';
            document.getElementById('send').innerHTML = abc;
            if(a == 0) {
                $("#send").removeAttr('disabled');
                document.getElementById('send').innerHTML = "重新发送";
                //$("#send").parent().append("<p style='margin:0px;color:red;'>验证码有效时间为30分钟</p>");
            }
        }
function Load(){
            $('#send').attr("disabled","disabled");

            for(var i=secs;i>=0;i--){ 
             window.setTimeout('doUpdate(' + i + ')', (secs-i) * 1000); 
            }
        }

/**
 * 密码强度判断
 */
function CharMode(iN){    
        if (iN>=48 && iN <=57) //数字    
            return 1;    
        if (iN>=65 && iN <=90) //大写    
            return 2;    
        if (iN>=97 && iN <=122) //小写    
            return 4;    
        else    
            return 8;     
    }  
    //bitTotal函数    
    //计算密码模式    
    function bitTotal(num){    
        modes=0;    
        for (i=0;i<4;i++){    
            if (num & 1) modes++;    
            num>>>=1;    
        }  
        return modes;    
    }  
    //返回强度级别    
    function checkStrong(sPW){    
        if (sPW.length<6)    
            return 0; //密码太短，不检测级别  
        Modes=0;    
        for (i=0;i<sPW.length;i++){    
            //密码模式    
            Modes|=CharMode(sPW.charCodeAt(i));    
        }  
        return bitTotal(Modes);    
    }  
    
    //显示颜色    
    function pwStrength(pwd){    
        Dfault_color="#dbdbdb";     //默认颜色  
        L_color="#FF0000";      //低强度的颜色，且只显示在最左边的单元格中  
        M_color="#FF9900";      //中等强度的颜色，且只显示在左边两个单元格中  
        H_color="#33CC00";      //高强度的颜色，三个单元格都显示  
        if (pwd==null||pwd==''){    
            Lcolor=Mcolor=Hcolor=Dfault_color;  
        }    
        else{    
            S_level=checkStrong(pwd);    
            switch(S_level) {    
            case 0:    
                Lcolor=Mcolor=Hcolor=Dfault_color;  
                break;  
            case 1:    
                Lcolor=L_color;  
                Mcolor=Hcolor=Dfault_color;  
                break;    
            case 2:    
                Lcolor=Mcolor=M_color;    
                Hcolor=Dfault_color;    
                break;    
            default:    
                Lcolor=Mcolor=Hcolor=H_color;    
        }    
    }    
    document.getElementById("weak").style.background=Lcolor;    
    document.getElementById("middle").style.background=Mcolor;    
    document.getElementById("strong").style.background=Hcolor;    
    return;  
}  