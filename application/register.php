<?php include_once 'top.php';?>
<script language="javascript" type="text/javascript" src="../public/js/datepicker/WdatePicker.js"></script>
<script language="javascript" type="text/javascript" src="../public/js/datepicker/calendar.js"></script>
		</div>
		<!-- /END COLOR OVER IMAGE -->
	</header>
	<!-- /END HOME / HEADER  -->

	<div itemprop="" id="content" class="container" role="main">
		<div id="rgbgdiv">
	
					<form class="form-horizontal"
						style="border: 3px solid #f7f8fa;margin-top:50px; padding: 50px 0 50px 0">
						<div class="form-group">
							<label for="regname" class="col-sm-2 control-label">用户名</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="regname"
									>
							</div>
							<label id="namediv" class="col-sm-3 control-label">请输入用户名</label>
						</div>

						<div class="form-group">
							<label for="regpwd1" class="col-sm-2 control-label">密码</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="regpwd1"
									>
							</div>
							<label id="pwddiv1" class="col-sm-3 control-label">请输入密码</label>
						</div>
						<div class="form-group">
							<label for="regpwd2" class="col-sm-2 control-label">确认密码</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="regpwd2"
									>
							</div>
							<label id="pwddiv2" class="col-sm-3 control-label">请输入确认密码</label>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">邮箱</label>
							<div class="col-sm-4">
								<input type="email" class="form-control" id="email"
									>
							</div>
							<label id="emaildiv" class="col-sm-3 control-label">找回密码使用</label>
						</div>
						<div class="form-group">
							<label for="phone" class="col-sm-2 control-label">手机号</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="phone"
									>
							</div>
							<label id="phonediv" class="col-sm-3 control-label">请填写手机号</label>
						</div>

						<div class="form-group">
							<label for="realname" class="col-sm-2 control-label">姓名</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="realname"
									>
							</div>
							<label id="realnamediv" class="col-sm-3 control-label">请填写真实姓名</label>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">性别</label>
							<div class="col-sm-4">

								
								<select class="form-control" id="sex">
  <option value='1'>男</option>
  <option value='0'>女</option>
</select>
								
								
								
								
							</div>

						</div>
						<div class="form-group">
							<label for="brithday" class="col-sm-2 control-label">出生日期</label>
							<div class="col-sm-4">
								<input type="text" readOnly class="form-control" id="birthday" onClick="WdatePicker()"
									>
									
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-sm-2 control-label">联系住址</label>
							<div class="col-sm-4">

								<textarea name="" id="address" cols="" rows=" "></textarea>
							</div>

						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button id="regbtn" disabled="disabled" type="submit"
									class="btn btn-success  text-center">注册</button>
								&nbsp;	 &nbsp; &nbsp;<a target='_balnk' href='login.php'  type="submit" class="btn btn-default ">登录</a>
								
							</div>
							<br />
						
							<div class="col-sm-offset-2 col-sm-10">
						<a target='_balnk' onclick='found()' class="btn btn-link btn-sm " role="button"><small>忘记密码</small></a>	
					
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
	fd.moveTo((screen.width-480)/2,(screen.height-480)/2);
}
</script>

		

</body>
</html>