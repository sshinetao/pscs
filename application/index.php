<?php
include_once 'common/mssql.php';

$link = connect();
$query = "select * from PACS_USER";

/* $result = execute($link, $query);
while ($data=sqlsrv_fetch_array($result)){
	var_dump($data);
} */

echo rows_num($link, $query);

echo $suishu = date('Y',time())-date('Y',strtotime('2016-05-18'))+1;
echo  date('Y-m-d',time());





echo '<br>';
echo $a = time();echo '<br>';
echo md5('111111'.'1462180610');



