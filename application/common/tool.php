<?php

// 转义
function new_html_special_chars($string) {
	if (! is_array ( $string ))
		return htmlspecialchars ( $string );
	foreach ( $string as $key => $val )
		$string [$key] = new_html_special_chars ( $val );
	return $string;
}




// 检验普通用户
function is_user_login($link)
{
	if (isset($_COOKIE['user']['user_name']) || isset($_COOKIE['user']['user_password'])||isset($_COOKIE['user']['user_id'])) {
		
		{
			//$query = "select * from PACS_USER where user_name = '{$user_name}' and user_password= '{$user_passwod}'";
			//$count = rows_num($link, $query);
			
			  $query = "select * from PACS_USER where user_name = '{$_COOKIE['user']['user_name']}' 
			and user_password = '{$_COOKIE['user']['user_password']}'
			and user_id = '{$_COOKIE['user']['user_id']}'
			";
			//var_dump($query);exit();
			//$result = execute($link, $query);
			$count = rows_num($link, $query);
			if ($count== 1) {

				return true;
			} else {
				return false;
			}
		}
	} else {
		return false;
	}
}