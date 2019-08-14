<?php
@header('Content-Type: text/html; charset=UTF-8');
include("../includes/common.php");
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $conf['title'];?> - 用户注册</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../assets/login/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="../assets/login/css/snow.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/login/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../assets/login/css/layer.css" rel="stylesheet" type="text/css" media="all" />
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
<a href="login.php"  class="active">返回登录</a>
</div>
<h1><?php echo $conf['title'];?>
</h1>
<div class="main-agileits">
		<div class="form-w3-agile">
			<h2 class="sub-agileits-w3layouts">用户注册</h2>
			<form  id="zhuce" action="" method="post" >
			  <input type="hidden" name="action" value="2">
					<input type="text" name="user" placeholder="用户名" required="" />
					<input type="password" name="pass" placeholder="密码" required="" />
					<input type="text" name="qq" placeholder="qq" required="" />
						<input type="email" name="mail" placeholder="邮箱" required="" />
							<input type="text" name="code" placeholder="邮箱验证码" required="" />
				<div class="button-w3l">
									<input type="button" id="uu" value="发送验证码">
					<input type="button" id="zc" value="立即注册">
				</div>
			</form>
		</div>
		</div>
	<div class="copyright w3-agile">
			<p>如果发现共享本站账号，一律封号处理</p>
		<p>版权所有 © 2018 <?php echo $conf['title'];?> </p>
	</div>
	<script type="text/javascript" src="../assets/login/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
 $('#uu').click(function (){
    	if($(this).val() == '已发送') return false;
    	if($("input[name=mail]").val() == ''){
layer.open({content: '不填邮箱发毛验证码',skin: 'msg',time: 1});
			return false;
    	}
		$.ajax({
 url:  'ajax.php',  
			type:'post',
			dataType:'json',
			data:{"action":"3","mail":$("input[name=mail]").val()},
			success:function(emlog){
				if(emlog.txt){
					$('#uu').val("已发送");
					layer.open({content:emlog.error,skin: 'msg',time: 1});
					return false;
				}else{
					layer.open({content:emlog.error,skin: 'msg',time: 1});
				}
			}
		});
		return false;
	});
	
		$('#zc').click(function(){
		var pa= $('#zhuce').serialize();
			$.ajax({
				url:'ajax.php',
				type:'post', 
				dataType:'json', 
				data:pa, 
				success:function(emlog){
	if(emlog.txt){
						layer.open({content:emlog.error,skin: 'msg',time: 1});
	window.location.href='./login.php';
	}else{
					layer.open({content:emlog.error,skin: 'msg',time: 1});
					}
				}
			});
		
	});
	

</script>
</body>
</html>