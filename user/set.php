<?php
include("../includes/common.php");
$title="个人信息";
include "./head.php";
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<?php
$ra=$DB->query("select * from moyu_dl where dl_user = '{$_SESSION['user']}'");
$row = $DB->fetch($ra);
if(isset($_POST['sajm'])){ 
if(!empty($_POST['user']) && !empty($_POST['qq']) &&!empty($_POST['mail']) && !empty($_POST['pass'])){
$pass=daddslashes($_POST['pass']);
$user= daddslashes($_POST['user']);
$DB->query("insert into `moyu_log` (`uid`,`type`,`date`) values ('".$user."','修改密码','".$date."')");
$DB->query("update moyu_dl set dl_pwd = '{$pass}' where dl_user = '{$user}'");
echo '<script>layer.msg("修改成功，请重新登录！", {icon: 6})</script>';
echo"<script language='javascript'>setTimeout('qqts()',1000);</script>";
}else{
echo '<script>layer.msg("修改失败，密码不能为空！", {icon: 5})</script>';
}
}
?>
<section id="main-content">
<section class="wrapper">
<!-- page start-->
<div class="row">
<div class="col-lg-12">
<ul class="breadcrumb">   
<h4><i class="fa fa-qq"></i><strong><?php echo $title ?></strong></h4>
<br>
<div class="tab-content">
<div class="tab-pane active" id="sajm">
<form action="set.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered" >
<div class="form-group">
<label class="col-md-4 control-label" for="example-text-input">用户名</label>
<div class="col-md-8">
<input type="text"  name="user" class="form-control" value="<?php echo $row['dl_user']?>" readonly="readonly">
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="example-text-input">QQ</label>
<div class="col-md-8">
<input type="text"  name="qq" class="form-control" value="<?php echo $row['dl_qq']?>" readonly="readonly">
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="example-text-input">邮箱</label>
<div class="col-md-8">
<input type="text"  name="mail" class="form-control" value="<?php echo $row['dl_mail']?>" readonly="readonly">
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="example-text-input">密码</label>
<div class="col-md-8">
<input type="text"  name="pass" class="form-control" value="<?php echo $row['dl_pwd']?>" >
</div>
</div>
<div class="form-group form-actions">
<div class="col-md-12">
<button type="submit" name="sajm" class="btn btn-block btn-primary">立即修改</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</ul></div></div></div>
</div>               
</div>
</div>
</div>
</div>
</div>
<?php include './foot.php';?>
<script>$(function(){ ReadyDashboard.init(); });
setTimeout("document.getElementById('ts').style.display = 'none';", 2000);
</script>
<script language="JavaScript">
function qqts()
{
window.location.href='./login.php?logout';
}
</script>
</body>
</html>      