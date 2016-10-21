function $(id) {
	return document.getElementById(id);
}
function delHtmlTag(str)
{
          //var str=str.replace(/<\/?[^>]*>/gim,"");//去掉所有的html标记
        var result=str.replace(/(^\s+)|(\s+$)/g,"");//去掉前后空格
        return  result.replace(/\s/g,"");//去除文章中间空格
}



window.onload = function() {
	$('regname').focus();
	var cname1, cname2, cpwd1, cpwd2, cemail, cphone, crealname;
	// 设置激活按钮
	function chkreg() {
		if ((cname1 == 'yes') && (cname2 == 'yes') && (cpwd1 == 'yes')
				&& (cpwd2 == 'yes') && (cemail == 'yes') && (cphone == 'yes')
				&& (crealname == 'yes')) {
			$('regbtn').disabled = false;
		} else {
			$('regbtn').disabled = true;
		}
	}
	// 验证用户名
	$('regname').onkeyup = function() {
		name = $('regname').value;
		// hanzi =/^[\u2E80-\uFE4F]+$/ ;
		cname2 = '';
		if (name.match(/^[a-zA-Z_]*/) == '') {
			$('namediv').innerHTML = '<font color=red>必须以字母或下划线开头</font>';
			cname1 = '';
		} else if (name.length < 6) {
			$('namediv').innerHTML = '<font color=red>用户名必须大于5位</font>';
			cname1 = '';
		} else if (name.length > 30) {
			$('namediv').innerHTML = '<font color=red>用户名必须小于30位</font>';
			cname1 = '';
		} else if (name.match(/[\u4e00-\u9fa5]+/)) {
			$('namediv').innerHTML = '<font color=red>用户名不能含有汉字</font>';
			cname1 = '';
		} else {
			$('namediv').innerHTML = '<font color=green>注册名称符合标准</font>';
			cname1 = 'yes';
		}

		chkreg();
	}
	// 验证是否存在该用户
	$('regname').onblur = function() {
		
		name = $('regname').value;
		name = delHtmlTag(name);
		if (cname1 == 'yes') {
			xmlhttp.open('get', 'chkname.php?name=' + name, true);
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4) {
					if (xmlhttp.status == 200) {
						var msg = xmlhttp.responseText;
						if (msg == '1') {
							$('namediv').innerHTML = "<font color=green>恭喜您，该用户名可以使用!</font>";
							cname2 = 'yes';
						} else if (msg == '2') {
							$('namediv').innerHTML = "<font color=red>用户名被占用！</font>";
							cname2 = '';
						} else {
							$('namediv').innerHTML = "<font color=red>" + msg
									+ "</font>";
							cname2 = '';
						}
					}
				}
				chkreg();
			}
			xmlhttp.send(null);
		}
	}

	// 验证密码
	$('regpwd1').onblur = function() {
		pwd = $('regpwd1').value;
		pwd2 = $('regpwd2').value;
		if (pwd.length < 6) {
			$('pwddiv1').innerHTML = '<font color=red>密码长度最少需要6位</font>';
			cpwd1 = '';
		} else if (pwd.length >= 6 && pwd.length < 12) {
			$('pwddiv1').innerHTML = '<font color=green>密码符合要求。密码强度：弱</font>';
			cpwd1 = 'yes';
		} else if ((pwd.match(/^[0-9]*$/) != null)
				|| (pwd.match(/^[a-zA-Z]*$/) != null)) {
			$('pwddiv1').innerHTML = '<font color=green>密码符合要求。密码强度：中</font>';
			cpwd1 = 'yes';
		} else {
			$('pwddiv1').innerHTML = '<font color=green>密码符合要求。密码强度：高</font>';
			cpwd1 = 'yes';
		}
		if (pwd2 != '' && pwd != pwd2) {
			$('pwddiv2').innerHTML = '<font color=red>两次密码不一致!</font>';
			cpwd2 = '';
		} else if (pwd2 != '' && pwd == pwd2) {
			$('pwddiv2').innerHTML = '<font color=green>密码输入正确</font>';
			cpwd2 = 'yes';
		}
		chkreg();
	}
	// 验证确认密码
	$('regpwd2').onblur = function() {
		pwd1 = $('regpwd1').value;
		pwd2 = $('regpwd2').value;
		if (pwd1 != pwd2) {
			$('pwddiv2').innerHTML = '<font color=red>两次密码不一致!</font>';
			cpwd2 = '';
		} else {
			$('pwddiv2').innerHTML = '<font color=green>两次密码输入一致</font>';
			cpwd2 = 'yes';
			chkreg();
		}
	}
	// 验证email
	$('email').onblur = function() {
		emailreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;

		$('email').value.match(emailreg);
		if ($('email').value.match(emailreg) == null) {
			$('emaildiv').innerHTML = '<font color=red>错误的email格式</font>';
			cemail = '';
		} else {
			$('emaildiv').innerHTML = '<font color=green>email输入正确</font>';
			cemail = 'yes';

		}
		chkreg();
	}

	// 验证手机号
	$('phone').onblur = function() {
		cellphone = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;

		if ($('phone').value.match(cellphone)) {
			$('phonediv').innerHTML = '<font color=green>手机号符合标准</font>';
			cphone = 'yes';

		} else {
			$('phonediv').innerHTML = '<font color=red>手机号不符合标准</font>';
			cphone = '';
		}

		chkreg();
	}

	// 验证姓名
	$('realname').onkeyup = function() {
		uname = $('realname').value;
		uname = delHtmlTag(uname);
		crealname = '';
		if (uname.length == 0) {
			$('realnamediv').innerHTML = '<font color=red>真实姓名必须填写位</font>';
			crealname = '';
		} else {
			$('realnamediv').innerHTML = '<font color=green>真实姓名符合标准</font>';
			crealname = 'yes';
		}

		chkreg();

	}

	// 显示/隐藏详细信息
	/*
	 * $('morebtn').onclick = function(){
	 * 
	 * if($('morediv').style.display == ''){ $('morediv').style.display =
	 * 'none'; }else{ $('morediv').style.display = ''; } }
	 */
	// 登录按钮
	/*	  $('logbtn').onclick = function(){
	 window.open('/login.php','_parent','',false); }
	 */
	//忘记密码 forgotbtn
	//sleep
	function sleep(numberMillis) {
		var now = new Date();
		var exitTime = now.getTime() + numberMillis;
		while (true) {
			now = new Date();
			if (now.getTime() > exitTime)
				return;
		}
	}

	// 正式注册
	$('regbtn').onclick = function() {
		//$('imgdiv').style.visibility = 'visible';
		url = 'register_check.php?user_name=' + $('regname').value
				+ '&user_password=' + $('regpwd1').value + '&user_email='
				+ $('email').value + '&user_phone=' + $('phone').value
				+ '&user_realname=' + $('realname').value + '&user_birthday='
				+ $('birthday').value + '&user_sex=' + $('sex').value
				+ '&user_address=' + $('address').value;
		//alert(url);
		xmlhttp.open('get', url, true);
		xmlhttp.onreadystatechange = function() {
			sleep(100);
			if (xmlhttp.readyState == 4) {

				//alert(xmlhttp.status);

				if (xmlhttp.status == 200) {
					msg = xmlhttp.responseText;
					//alert('msg='+msg);			
					if (msg == '1') {
						var mb = myBrowser();

						if (mb == "IE") {
							alert('注册成功,请登陆!');
							window.location = 'login.php';
						}
						if (mb != "IE") {
							alert('注册成功,请登陆!');
							window.open('login.php');
						}

					} else {
						alert('注册失败！');
					}

				}
			}
		}
		xmlhttp.send(null);
	}
}