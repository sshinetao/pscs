/**
 * 
 */

function $(id) {
	return document.getElementById(id);
}
window.onload = function() {
	$('logname').focus();
	var cname1;
	// 设置激活按钮
	function chkreg() {
		if ((cname1 == 'yes')) {
			$('log').disabled = false;
		} else {
			$('log').disabled = true;
		}
	}
	// 验证用户名
	$('logname').onblur = function() {
		name = $('logname').value;
		cname1 = '';
		// hanzi =/^[\u2E80-\uFE4F]+$/ ;

		if (name.match(/^[a-zA-Z_]*/) == '') {
			$('lognamediv').innerHTML = '<font color=red>必须以字母或下划线开头</font>';
			cname1 = '';
		} else if (name.length < 6) {
			$('lognamediv').innerHTML = '<font color=red>用户名必须大于5位</font>';
			cname1 = '';
		} else if (name.length > 30) {
			$('lognamediv').innerHTML = '<font color=red>用户名必须小于30位</font>';
			cname1 = '';
		} else if (name.match(/[\u4e00-\u9fa5]+/)) {
			$('lognamediv').innerHTML = '<font color=red>用户名不能含有汉字</font>';
			cname1 = '';
		} else {
			$('lognamediv').innerHTML = '<font color=green>用户名符合标准</font>';
			cname1 = 'yes';
		}

		chkreg();

		//alert(pwd);
	}

	$('log').onclick = function() {

		log.submit();
		

	}

}