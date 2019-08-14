<?php
@header('Content-Type: text/html; charset=UTF-8');
include("../includes/common.php");
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $conf['title'];?> - 用户登录</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Internship Sign In & Sign Up Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../assets/login/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="../assets/login/css/snow.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/login/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/login/css/layer.css" rel="stylesheet" type="text/css" media="all" />
<script src="http://cdn.bootcss.com/jquery/1.12.3/jquery.min.js"></script>
<script src="../assets/login/js/layer.js"></script>
</head>
<body>
<div class="snow-container">
			  <div class="snow foreground"></div>
			  <div class="snow foreground layered"></div>
			  <div class="snow middleground"></div>
			  <div class="snow middleground layered"></div>
			  <div class="snow background"></div>
			  <div class="snow background layered"></div>
			</div>
<div class="top-buttons-agileinfo">

</div>
<h1><?php echo $conf['title'];?>
</h1>
<div class="main-agileits">
		<div class="form-w3-agile">
			<h2 class="sub-agileits-w3layouts">用户登录</h2>
			<form id="login" action="" method="post">
						  <input type="hidden" name="action" value="1">
					<input type="text" name="user" placeholder="账号" />
					<input type="password" name="pass" placeholder="密码" />
					
				<div class="button-w3l">
					<input type="button" id="dl" value="登录">
				</div>
				<p class="p-bottom-w3ls"><a href="reg.php">点击注册</a>如果你没有一个帐户。
</p>
			</form>
		</div>
		</div>
	<div class="copyright w3-agile">
			<p>如果发现共享本站账号，一律封号处理</p>
		<p>版权所有 © 2018 <?php echo $conf['title'];?> </p>
	</div>
	<script type="text/javascript" src="../assets/login/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
		$('#dl').click(function(){
		var pa= $('#login').serialize();
			$.ajax({
				url:'ajax.php',
				type:'post', 
				dataType:'json', 
				data:pa, 
				success:function(emlog){
	if(emlog.txt){
						layer.open({content:emlog.error,skin: 'msg',time: 1});
	window.location.href='./';
	}else{
					layer.open({content:emlog.error,skin: 'msg',time: 1});
					}
				}
			});
		
	});
	</script>
</body>
</html>