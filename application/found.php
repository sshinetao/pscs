<?php
if (isset ( $_POST ['submit'] )) {
	// var_dump ( $_POST );
	
	if (mb_strlen ( $_POST ['email'] ) == 0) {
		return false;
	}
	if (mb_strlen ( $_POST ['phone'] ) == 0) {
		return false;
	}
	include_once 'common/mssql.php';
	include_once 'common/email.class.php';
	$link = connect ();
	$query = "select * from PACS_USER where user_email = '{$_POST['email']}'and user_phone = '{$_POST['phone']}'";
	// var_dump ( $query );
	$count = rows_num ( $link, $query );
	if ($count != 1) {
		echo "<script type='text/javascript'>alert('信息错误！');document.getElementById('foundForm').reset();</script>";
	} else {
		//查出用户姓名
		$query = "select user_name from PACS_USER where user_email = '{$_POST['email']}'and user_phone = '{$_POST['phone']}'";
		$result = execute ( $link, $query );
		$data = sqlsrv_fetch_array($result);
		$user = $data['user_name'];
		// 下面开始重置密码
		for($i = 1; $i <= 6; $i ++) {
			$newPassword .= rand ( 0, 9 );
		}
		//
		$smtpserver = "smtp.exmail.qq.com"; // SMTP服务器
		$smtpserverport = 25; // SMTP服务器端口
		$smtpusermail = "findpasswd@pacsmedical.com"; // SMTP服务器的用户邮箱
		$smtpemailto = $_POST ['email']; // 发送给谁
		$smtpuser = $smtpusermail; // SMTP服务器的用户帐号
		$smtppass = "PACStech123"; // SMTP服务器的用户密码
		$mailsubject = "找回密码"; // 邮件主题
		$mailbody = "亲爱的 ".$user.":<br/>"." \r\n 您的密码已被重置为:<b>" . $newPassword . " </b>,请及时登录，并修改！</span> <br/><b>PACS TEC</b><br/>".date('Y年m月d日 ',time()); // 邮件内容
		$mailtype = "HTML"; // 邮件格式（HTML/TXT）,TXT为文本邮件
		$smtp = new smtp ( $smtpserver, $smtpserverport, true, $smtpuser, $smtppass ); // 这里面的一个true是表示使用身份验证,否则不使用身份验证.
		$smtp->debug = false; // 是否显示发送的调试信息
		$smtp->sendmail ( $smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype );
		if ($smtp) {
			$newPassword = md5 ( $newPassword );
			$query = "UPDATE dbo.PACS_USER SET user_password='{$newPassword}' WHERE user_email='{$_POST ['email']}' ";
			$result = execute ( $link, $query );
			$count = sqlsrv_rows_affected ( $result );
			if ($count == 1) {
				echo "<script type='text/javascript'>
						alert('密码重置，新密码已发送至您的邮箱！');
						window.close();
						</script>";
			}
		}
	}
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<title>找回密码</title>
<link rel="stylesheet" href="../public/index_files/bootstrap.min.css" />
<link rel="shortcut icon" href="../public/index_files/login_logo.png">
</head>
<body>

	<div class="container">
		<h3 class="text-center">找回密码</h3>
		<form class="form-horizontal" method="post" id="foundForm">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">邮件</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="email"
						placeholder="邮件">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">手机号</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="phone"
						placeholder="手机号">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button name='submit' type="submit"
						class="btn btn-success btn-block">找 回</button>
				</div>
			</div>
		</form>
	</div>

</body>
</html>