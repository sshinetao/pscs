<?php

/*
 * |————————————————————————————————————
 * | Author: 陶欣 <sshinetao@qq.com> Created on : 2016-4-26, 1:02:28
 * |————————————————————————————————————
 */
include_once 'common/mssql.php';
$link = connect ();
$query = "select * from PACS_USER where USER_NAME='" . $_GET ['name'] . "'";
$num = rows_num($link, $query);
if ($num != 0) {
	echo '2';
} elseif ($num == 0) {
	echo '1';
}