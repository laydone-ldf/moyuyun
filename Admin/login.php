<?php
/**
 * 登录
**/
include("../includes/common.php");
include("../includes/delete.php");
?>
<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>登录-<?php echo $conf['title'] ?></title>
<meta name="description" content="<?php echo $conf['description']?>">
<meta name="keywords" content="<?php echo $conf['keywords']?>">
<meta name="author" content="pixelcave">
<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
<link rel="shortcut icon" href="/assets/static/img/favicons/favicon.ico">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
<link rel="stylesheet" href="/assets/static/css/slick.min.css">
<link rel="stylesheet" href="/assets/static/css/slick-theme.min.css">
<link rel="stylesheet" id="css-main" href="/assets/static/css/oneui.css">
</head>
<body background="/assets/static/login.jpg">
<body>
	<br>
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 center-block animated zoomIn" style="float: none;">
<div class="block block-themed block-rounded">
<div class="block-header bg-primary-light">
<h3 class="block-title"><?php echo $conf['title'] ?></h3>
</div>
<div class="panel-body">
<div class="form-group">
<label for="exampleInputEmail1">账号</label>
<input type="text" name="user" value="<?php echo @$_GET['user']?>" class="form-control no-border" required>
</div>
<div class="form-group">
<label for="exampleInputEmail1">密码</label>
<input type="password" name="pass" value="<?php echo @$_GET['pass']?>" class="form-control no-border" required>
</div><button id="submit" class="btn btn-block btn-primary" ng-click="login()" ng-disabled='form.$invalid'>立即登录</button>
<hr>
<a ui-sref="access.forgotpwd" href="../user" class="btn btn-minw btn-rounded btn-warning"><i class=""></i>代理登入</a>
<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf["zzqq"] ?>&site=qq&menu=yes" ui-sref="access.signup" class="btn btn-minw btn-rounded btn-danger " style="float:right;"><i class=""></i>联系客服</a>
</div> 		
</form>				
</div>
<div class="text-center">
<p>
<small class="text-muted"><?php echo $conf['title'] ?><br>&copy; 2015~2019</small>
</p>
</div>
</div>
<script src="/assets/static/js/jquery.min.js"></script>
<script src="/assets/static/js/bootstrap.js"></script>
<script src="//cdn.bootcss.com/layer/3.0.1/layer.min.js"></script>
<script>
$("#submit").click(function(){
	var user=$("input[name='user']").val();
	var pass=$("input[name='pass']").val();
	if(!user || !pass){
		layer.msg('账号或密码不能为空！');
		return false;
	}
	load=layer.load(0);
	$.ajax({
		type:"post",
		url:"ajax.php?act=login",
		data:{
			user:user,pass:pass
		},
		dataType:"json",
		success:function(data){
			layer.close(load);
			if(data.code==0){
				layer.msg(data.msg,{icon:1,shade:0.3});
				$.ajax({
					type:"get",
					url:"index.php",
					dataType:"html",
					success:function(html){
						window.location.href="./index.php";
					}
				});
			}else{
				layer.msg(data.msg,{icon:5,shade:0.3});
			}
		}
	});
});
</script>
</body>
</html>