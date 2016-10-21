<?php
include_once 'common/mssql.php';

$link  = connect();
include_once 'common/tool.php';
if (!is_user_login($link)){
	echo "<script type='text/javascript'>location.href='login.php'</script>";
}

?>
<!doctype html>
<html class="no-js fixed-layout">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Amaze UI Admin index Examples</title>
<meta name="description" content="这是一个 index 页面">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png"
	href="..//public/assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed"
	href="../public/assets/i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet"
	href="../public/assets/css/amazeui.min.css" />
<link rel="stylesheet"
	href="../public/assets/css/admin.css">
</head>
<body>
	<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器， 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

	<header class="am-topbar admin-header">
		<div class="am-topbar-brand">
			<img style="margin-top: 10px" width="140" height="140"
				src="../public/index_files/432656386751462405.png"
				class="am-img-responsive" alt="" />
		</div>

		<button
			class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
			data-am-collapse="{target: '#topbar-collapse'}">
			<span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span>
		</button>

		<div class="am-collapse am-topbar-collapse" id="topbar-collapse">

			<ul
				class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">

				<li class="am-dropdown" data-am-dropdown><a
					class="am-dropdown-toggle" data-am-dropdown-toggle
					href="javascript:;"> <span class="am-icon-user"></span> <?php echo $_COOKIE['user']['user_name']?> <span
						class="am-icon-caret-down"></span>
				</a>
					<ul class="am-dropdown-content">
						<li><a href="logout.php"><span class="am-icon-power-off"></span> 退出</a></li>
					</ul></li>
				<li><a target="_blank"
					href="<?php echo  'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];?>"><span
						class="am-icon-home"></span> <span class="admin-fullText">首页</span></a></li>
			</ul>
		</div>
	</header>

	<div class="am-cf admin-main">
		<!-- sidebar start -->
		<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
			<div class="am-offcanvas-bar admin-offcanvas-bar">
				<ul class="am-list admin-sidebar-list" style="height: 100%;">
					<li class="admin-parent"><a class="am-cf"
						data-am-collapse="{target: '#collapse-nav'}"><span
							class="am-icon-users"></span> 用户中心 <span
							class="am-icon-angle-right am-fr am-margin-right"></span></a>
						<ul class="am-list am-collapse admin-sidebar-sub am-in"
							id="collapse-nav">
							<li><a href="apply.php" class="am-cf"><span
									class="am-icon-check"></span> 提交会诊申请</a></li>
							<li><a href="records.php"><span class="am-icon-search"></span>
									查询申请记录</a></li>
							<li><a href="usercenter.php"><span class="am-icon-cog"></span>
									账户管理</a></li>
						</ul></li>

					<li><a href="logout.php"><span class="am-icon-sign-out"></span> 注销</a></li>
				</ul>
			</div>
		</div>

		<!-- sidebar end -->