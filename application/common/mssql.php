<?php

include_once 'config.inc.php';

function connect() {
	$connectionInfo = array("UID"=>DB_USER, "PWD"=>DB_PASSWORD, "Database"=>DB_DATABASE);
	$link = sqlsrv_connect ( DB_HOST, $connectionInfo);
	if ($link == false) {
		echo "数据库连接错误!";
		die ( print_r ( sqlsrv_errors (), true ) );
	}
	return $link;
}




// do sql
function execute($link, $query) {
	$result = sqlsrv_query($link, $query);
	if($result === false )
	{
	     echo "Error in executing query.</br>";
	     die( print_r( sqlsrv_errors(), true));
	}
	return $result;
}

//查询记录数

function rows_num($link, $sql_count){
	$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$result = sqlsrv_query($link,$sql_count,$params,$options);	
	if($result === false )
	{
		echo "Error in executing query.</br>";
		die( print_r( sqlsrv_errors(), true));
	}
	$count = sqlsrv_num_rows( $result );
	return $count;
}

/* function num($link, $sql_count) {
	$result = execute ( $link, $sql_count );
	$count = mysqli_fetch_row ( $result );
	return $count [0];
} */

//关闭数据库连接
function close($link){
	sqlsrv_close($link);
}
