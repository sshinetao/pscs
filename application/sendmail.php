<?php
require_once ('common/email.class.php');
//##########################################
		$smtpserver = "smtp.sina.com";//SMTP服务器
		$smtpserverport =25;//SMTP服务器端口
		$smtpusermail = "taoxin1992@sina.com";//SMTP服务器的用户邮箱
		$smtpemailto = '1099588894@qq.com';//发送给谁
		$smtpuser = "taoxin1992@sina.com";//SMTP服务器的用户帐号
		$smtppass = "135138";//SMTP服务器的用户密码
		$mailsubject = "找回密码";//邮件主题
		$mailbody = "密码为<h3>adasdasdas </h3>";//邮件内容
		$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件		
		$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
		$smtp->debug = TRUE;//是否显示发送的调试信息
		$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);

		if ($smtp){
			echo 1;
		}
		
		
?>