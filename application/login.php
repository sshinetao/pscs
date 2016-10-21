<?php 
//var_dump($_COOKIE['user']['user_password']);

/* if (isset($_COOKIE['user']['user_id'])){
	//echo "<script type='text/javascript'>alert('请不要重复登录！');location.href='index.php'</script>";	
} */





include_once 'common/mssql.php';

$link  = connect();
include_once 'common/tool.php';
if (is_user_login($link)){
	echo "<script type='text/javascript'>location.href='apply.php'</script>";
}




if (isset($_POST['log'])){
	
	include_once 'login_ckeck.php';
	$_POST = new_html_special_chars ( $_POST );
	$user_name = $_POST['logname'];
	$user_passwod = md5($_POST['logpwd']);
	$query = "select * from PACS_USER where user_name = '{$user_name}' and user_password= '{$user_passwod}'";
	$count = rows_num($link, $query);
	if ($count==1){
		$result = execute($link, $query);
		$data = sqlsrv_fetch_array($result);
		//var_dump($data);
		setcookie('user[user_id]', $data['user_id']);
		setcookie('user[user_name]', $data['user_name']);
		setcookie('user[user_password]',$data['user_password']);
		echo "<script type='text/javascript'>alert('登陆成功');location.href='apply.php'</script>";
	}
	
	//var_dump($count);
	
	
	
}
include_once 'top.php';
?>
<script src="../public/js/login.js" type="text/javascript"></script>
		</div>
		<!-- /END COLOR OVER IMAGE -->
	</header>
	<!-- /END HOME / HEADER  -->

	<div itemprop="" id="content" class="container" role="main">
		<div id="rgbgdiv">
	
					<form method="post" class="form-horizontal"
						style="border: 3px solid #f7f8fa;margin-top:50px; padding: 50px 0 50px 0">
						<div class="form-group">
							<label for="logname" class="col-sm-2 control-label">用户名</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="logname" name='logname'
									>
							</div>
							<label id="lognamediv" class="col-sm-3 control-label">请输入用户名</label>
						</div>

						<div class="form-group">
							<label for="logpwd" class="col-sm-2 control-label">密码</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="logpwd" name='logpwd'
									>
							</div>
							<label id="logpwddiv" class="col-sm-3 control-label">请输入密码</label>
						</div>

						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button id="log" name='log' disabled="disabled" type="submit"
									class="btn btn-success  text-center">登录</button>
								&nbsp;	 &nbsp; &nbsp;<button id="reg"  type="submit" class="btn btn-default ">注册</button>
								
							</div>
							<br />
						
							<div class="col-sm-offset-2 col-sm-10">
						<a target='_balnk' onclick="found()" class="btn btn-link btn-sm " role="button"><small>忘记密码</small></a>	
					
							</div>
							</div>
						</div>
					</form>




		</div>
		<div id="imgdiv" style="visibility: hidden;">&nbsp;</div>
		<!--  -->




	</div>
	<!-- container -->
		


	<script type="text/javascript"
		src="../public/index_files/bootstrap.min.js"></script>
	<script type="text/javascript">
/* <![CDATA[ */
var screenReaderText = {"expand":"<span class=\"screen-reader-text\">expand child menu<\/span>","collapse":"<span class=\"screen-reader-text\">collapse child menu<\/span>"};
/* ]]> */
</script>
	<script type="text/javascript"
		src="../public/index_files/custom.all.js"></script>
	<script type="text/javascript"
		src="../public/index_files/plugin.home.js"></script>
	<script type="text/javascript"
		src="../public/index_files/custom.home.js"></script>
	<script type="text/javascript"
		src="../public/index_files/skip-link-focus-fix.js"></script>
	<style type="text/css"></style>
 
<script>
function found(){
	//alert(screen.width);
	fd  = window.open('found.php','found','width=480,height=480');
	//alert(screen.width);
	fd.moveTo((screen.width-480)/2,(screen.height-480)/2);
}
</script>

		

</body>
</html>