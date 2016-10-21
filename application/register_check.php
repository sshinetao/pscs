<?php
include_once 'common/mssql.php';
include_once 'common/tool.php';
$reback = '0';
if (count ( $_GET ) == 0) {
	$reback = '错误！';
	echo $reback;
	exit ();
}


$_GET = new_html_special_chars ( $_GET );
$_GET['user_name']= str_replace(' ','',$_GET['user_name']);
$_GET['user_address']= str_replace(' ','',$_GET['user_address']);
if (isset($_GET['user_birthday'])){
	
	$suishu = date('Y',time())-date('Y',strtotime($_GET['user_birthday']))+1; 
}else {
	$suishu = 0;
}


if (mb_strlen ( $_GET ['user_name'] ) < 5){
	echo $reback = '用户名长度错误!';
}

$link = connect ();
$query = "INSERT INTO dbo.PACS_USER( user_id ,user_name ,user_password ,user_email ,user_sex ,user_phone ,user_realname , user_birthday , user_address ,user_age)
			VALUES 
			( NEWID() , 
          '{$_GET['user_name']}' ,
        substring(sys.fn_sqlvarbasetostr(HashBytes('MD5','{$_GET['user_password']}')),3,32),
          '{$_GET['user_email']}' ,
          '{$_GET['user_sex']}' , 
          '{$_GET['user_phone']}' ,
          '{$_GET['user_realname']}',
         '{$_GET['user_birthday']}',
          '{$_GET['user_address']}' ,
          '{$suishu}'
        )";

$query = iconv ( "utf-8", "gbk", $query );
$result = execute ( $link, $query );
$result = sqlsrv_rows_affected ( $result );
if ($result == 1) {
	$reback = 1;
}
echo $reback;
	