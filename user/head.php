<?php
@header('Content-Type: text/html; charset=UTF-8');
include("../includes/common.php");
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<title><?php echo $conf["title"] ?> - <?php echo $title ?></title>
<!-- Bootstrap core CSS -->
<link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/admin/css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="/assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="/assets/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="/assets/admin/css/owl.carousel.css" type="text/css">
<!-- Custom styles for this template -->
<link href="/assets/admin/css/style.css" rel="stylesheet">
<link href="/assets/admin/css/style-responsive.css" rel="stylesheet" />
<script src="//lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
<script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/assets/admin/js/html5shiv.js"></script>
<script src="/assets/admin/js/respond.min.js"></script>
<![endif]-->
</head>
<script>
function logout(){
	$.ajax({
		type:"get",
		success:function(){
			layer.msg('退出成功',{icon:1,shade:0.3});
			window.location.href="login.php";
		}
	});
}
</script>
<body>
<section id="container" class="">
<!--header start-->
<header class="header white-bg">
<div class="sidebar-toggle-box">
<div data-original-title="导航栏" data-placement="right" class="icon-reorder tooltips"></div>
</div>
<!--logo start-->
<a href="#" class="logo"><span>MY</span></a>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
<div id="sidebar"class="nav-collapse ">
<!-- sidebar menu start-->
<ul class="sidebar-menu">
<li class="active">
<li class="sub-menu"></a>
<a class="" href="index.php">
<i class="icon-dashboard"></i>
<span>首页</span>
</a>
<li class="sub-menu">
<a class="" href="phpjm.php">
<i class="icon-shopping-cart"></i>
<span>混淆加密</span>
</a>
</li>
</a>
<li class="sub-menu">
<a class="" href="notice.php">
<i class=" icon-comment-alt"></i>
<span>查看公告</span>
</a>
</li>
<li class="sub-menu">
<a class="" href="update.php">
<i class="icon-leaf"></i>
<span>  权限升级</span>
</a>
</li>
</a>
<li class="sub-menu">
<a href="javascript:;" class="">
<i class="icon-cogs"></i>
<span>更多功能</span>
<span class="arrow"></span>
</a>
<ul class="sub">
<li><a class="" href="query.php">工单系统</a></li>
<li><a class="" href="pay.php">在线充值</a></li>
	<li><a class="" href="set.php">个人信息</a></li>
</ul>
</li>
<li>
<a class="" href="javascript:logout()">
<i class=" icon-signout"></i>
<span> 注销登录</span>
</a>
</li>
</ul>
<!-- sidebar menu end-->
</div>
</aside>
<!--sidebar end-->
<!--main content start-->