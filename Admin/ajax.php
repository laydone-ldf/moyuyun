<?php
include("../includes/common.php");

$act=isset($_GET['act'])?daddslashes($_GET['act']):null;

@header('Content-Type: application/json; charset=UTF-8');

switch($act){
case 'login'://管理员登入
	$user=daddslashes($_POST['user']);
	$pass=daddslashes($_POST['pass']);
if(isset($_POST['user']) && isset($_POST['pass'])){	
	if($user==$conf['admin_user'] && $pass==$conf['admin_pwd']) {
	$session=md5($user.$pass.$password_hash);
 $token=authcode("{$user}\t{$session}", 'ENCODE', SYS_KEY);
setcookie("admin_token", $token, time() + 604800);
		@header('Content-Type: text/html; charset=UTF-8');
		exit('{"code":0,"msg":"登录成功'.$user.'欢迎回来 ! "}');
	}elseif ($pass != $conf['admin_pwd']) {
		@header('Content-Type: text/html; charset=UTF-8');
		exit('{"code":1,"msg":"用户名或密码不正确"}');
	}
}elseif(isset($_GET['logout'])){
	setcookie("admin_token", "", time() - 604800);
	@header('Content-Type: text/html; charset=UTF-8');
	exit('{"code":0,"msg":"退出成功"}');
}elseif($islogin==1){
	@header('Content-Type: text/html; charset=UTF-8');
	exit('{"code":-1,"msg":"您已登录"}');
}
break;

case 'noactive'://切换公告状态
	$id=intval($_POST['id']);
	$row=$DB->get_row("SELECT * FROM moyu_notice where id='$id' limit 1");
	if($row['active']==1)$active=0;
	else $active=1;
		$DB->query("update moyu_notice set active='$active' where id='{$id}'");
		exit('{"code":0,"msg":"succ"}');
break;

case 'nosetop'://切换公告状态
	$id=intval($_POST['id']);
	$row=$DB->get_row("SELECT * FROM moyu_notice where id='$id' limit 1");
	if($row['setop']==1)$setop=0;
	else $setop=1;
		$DB->query("update moyu_notice set setop='$setop' where id='{$id}'");
		exit('{"code":0,"msg":"succ"}');
break;

case 'delnotice'://删除用户公告
$id=intval($_POST['id']);
$row=$DB->get_row("SELECT * FROM moyu_notice where id='$id' limit 1");
if(!$row){
	exit('{"code":-1,"msg":"当前ＩＤ不存在"}');
	}else{
	$sql="ALTER TABLE `moyu_notice` AUTO_INCREMENT=1";
	$DB->query("DELETE FROM moyu_notice WHERE id='$id'");
	if($DB->query($sql))
		exit('{"code":0,"msg":"删除成功"}');
	else
	    exit('{"code":-1,"msg":"删除失败'.$DB->error().'"}');
	}
break;

case 'editnotice'://修改用户公告
	$id=intval($_POST['id']);
	$center=daddslashes($_POST['center']);
	if($DB->query("update moyu_notice set center='$center' where id='{$id}'"))
		exit('{"code":0,"msg":"修改成功","url":"./notice.php"}');
	else
	    exit('{"code":-1,"msg":"修改失败'.$DB->error().'","url":"./notice.php"}');
break;

case 'addnotice'://添加用户公告
	$center=daddslashes($_POST['center']);
	$type=daddslashes($_POST['type']);
	if($type=="0"){
		$setop=0;
		$active=0;
		$position=1;
    }elseif($type=="1"){
		$setop=0;
		$active=1;
		$position=1;
	}elseif($type=="2"){
		$setop=1;
		$active=1;
		$position=0;
	}
	
	if($DB->query("insert into `moyu_notice` (`position`, `center`, `setop`, `date`, `active`) values ('".$position."','".$center."','".$setop."','".$date."','".$active."')")){
	exit('{"code":0,"msg":"添加成功"}');
    }else{
	exit('{"code":-1,"msg":"添加失败'.$DB->error().'"}');
	}

break;

}