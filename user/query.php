<?php
/**
 * 工单系统
**/
include("../includes/common.php");
$title='工单系统';
include './head.php';
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<?php
if(isset($_POST['qq']) && isset($_POST['pzqq']) && isset($_POST['msg'])){
$qq=daddslashes($_POST['qq']);
$pzqq=daddslashes($_POST['pzqq']);
$msg=daddslashes($_POST['msg']);
$type=daddslashes($_POST['type']);
if($type!="0" && $type!="1" && $type!="2" && $type!="3" && $type!="4"){
 echo '<script>layer.msg("非法操作，IP已经记录！", {icon: 5})</script>';
}
if($msg==''){
 echo '<script>layer.msg("资料不能为空！", {icon: 5})</script>';
}else{
	$DB->query("INSERT INTO `moyu_gd`(`qq`, `pzqq`, `state`, `type`, `text`, `addtime`) VALUES ('".$qq."','".$pzqq."',0,'".$type."','".$msg."','".$date."')");
 echo '<script>layer.msg("提交成功等待人工解决！", {icon: 6})</script>';
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
<form action="./query.php" method="POST" class="form-horizontal" role="form">
<div class="form-group">
<label class="col-lg-3 control-label">问题分类:</label>
<div class="col-lg-8">
<select class="form-control" name="type" required>
<option value="1">充值问题</option>
<option value="2">加密问题</option>
<option value="3">网站问题</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-lg-3 control-label">用户名:</label>
<div class="col-lg-8">
<input type="text" class="form-control" name="qq" value="<?php echo $_SESSION['user']?>" maxlength="11" readonly>
</div></div>
<div class="form-group">
<label class="col-lg-3 control-label">您的QQ:</label>
<div class="col-lg-8">
<input type="text" class="form-control" name="pzqq" value="<?php echo $row['dl_qq']?>" maxlength="11" readonly>
</div></div>
<div class="form-group">
<label class="col-lg-3 control-label">问题详细:</label>
<div class="col-lg-8">
<textarea name="msg" rows="5" class="form-control"></textarea>
</div></div>
<button type="submit" class="btn btn-primary btn-block btn-effect-ripple">提交工单</button>
</div>
</form>
</div>
</div>
</div>
</div>
<?php include './foot.php'; ?>
