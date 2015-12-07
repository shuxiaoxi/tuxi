<?php
    
    /**
     * 发送邮件函数
     * @param $email        邮件接收邮箱
     * @param $name         接收人NAME
     * @param $string       邮件标题
     * @param $content      接收内容
     */
    function sendMail($email,$name,$title,$content){
    Vendor('PHPMailer.PHPMailerAutoload');
    $mail=new PHPMailer(); //建立邮件发送类
    $mail->IsSMTP(); // 使用SMTP方式发送
    $mail->Host       = C('MAIL_HOST'); // 您的企业邮局域名
    $mail->SMTPAuth   = C('MAIL_SMTPAUTH'); // 启用SMTP验证功能
    $mail->SMTPSecure = 'ssl';
    $mail->Username   = C('MAIL_USERNAME'); // 邮局用户名(请填写完整的email地址)
    $mail->Password   = C('MAIL_PASSWORD'); // 邮局密码
    $mail->Port       = 465;
    $mail->From       = C('MAIL_FROM'); //邮件发送者email地址
    $mail->FromName   = C('MAIL_FROMNAME');//发件人姓名
    $mail->CharSet  = "utf-8";
    $mail->Encoding = "base64";
    $mail->AddAddress("$email","$name"); //收件人email","收件人姓名
    $mail->Subject = "$title"; //邮件标题
    $mail->IsHTML(TRUE);
    $mail->Body = "$content"; //邮件内容
    return($mail->Send());

}

?>

