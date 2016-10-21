<?php
include_once 'common/mssql.php';
$link  = connect();
include_once 'common/tool.php';
if (!is_user_login($link)){
	echo "<script type='text/javascript'>location.href='login.php'</script>";
}
setcookie ( 'user[user_name]', '', time () - 3600 );
setcookie ( 'user[user_password]', '' ,time()-3600);
setcookie ( 'user[user_id]', '' ,time()-3600);
echo "<script type='text/javascript'>alert('注销成功！');location.href='index.php'</script>";
