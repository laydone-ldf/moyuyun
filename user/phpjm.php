<?php
$title='混淆加密';
include './head.php';
function vip($sta){
include("../includes/common.php");
    if($sta == 1){
        return '您是<span class="label label-default">普通用户</span> '.$conf['ptjg'].'元一个文件';
    }elseif($sta == -1){
        return "<span class='label label-danger'>已封号</span>";
    }elseif($sta == 2){
        return '您是<span class="label label-primary">初级会员</span> '.$conf['djjg'].'元一个文件';
    }elseif($sta == 3){
        return '您是<span class="label label-info">中级会员</span> '.$conf['zjjg'].'元一个文件';
    }elseif($sta == 4){
        return '您是<span class="label label-warning">超级会员</span> '.$conf['gjjg'].'元一个文件';
    }
}
function rmb($sta){
include("../includes/common.php");
    if($sta == 1){
        return $conf['ptjg'];
    }elseif($sta == -1){
       return "<script type='text/javascript'>layer.alert('违反用户协议，账号已被停封！',{icon:5,closeBtn:0},function(){window.location.href='login.php?logout'});</script>";
     }elseif($sta == 2){
        return $conf['djjg'];
    }elseif($sta == 3){
        return $conf['zjjg'];
    }elseif($sta == 4){
        return $conf['gjjg'];
    }
}
if($row["dl_money"]=="0.00"){
	echo "<script type='text/javascript'>layer.alert('您的余额为0.00请充值！',{icon:5,closeBtn:0},function(){window.location.href='./pay.php'});</script>";
}
if(isset($_POST['sajm'])){
$ra=$DB->query("select * from moyu_dl where dl_user = '{$_SESSION['user']}'");
$row = $DB->fetch($ra);
$jiage=rmb($row['dl_sta']);
if($row['dl_money']>=$jiage){
$extension=explode('.',$_FILES['file']['name']);
if (($length = count($extension)) > 1) {
$jie = strtolower($extension[$length - 1]);
}
if($jie=='php'){
$DB->query("update moyu_dl set dl_money=dl_money-{$jiage} where dl_user = '{$_SESSION['user']}'");
copy($_FILES['file']['tmp_name'],ROOT.base64_decode('L2Fzc2V0cy9Nb1l1L21veXUvam0vbW95dV9qbS5waHA='));
copy($_FILES['file']['tmp_name'],'../assets/MoYu/moyu/cache/'.rand(11111,99999).'.txt');
require_once(ROOT.base64_decode('L2Fzc2V0cy9Nb1l1L21veXUvZW5jaXBoZXIucGhw'));
$dir1= ROOT.base64_decode('L2Fzc2V0cy9Nb1l1L21veXUvam0=');
$encipher = new Encipher($dir1, $dir1);
$encipher->advancedEncryption = true;
echo "<div style='display: none;'>";
$encipher->encode();
echo "</div>";
echo "<script type='text/javascript'>layer.msg('加密成功请稍等！',{icon:1});</script>";
echo"<script language='javascript'>setTimeout('sajmts()',2000);</script>";
}else{
echo "<script type='text/javascript'>layer.msg('请上传php文件！',{icon:5});</script>";
}
}else{
echo "<script type='text/javascript'>layer.msg('余额不足请充值！',{icon:5});</script>";
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
<form action="phpjm.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered" >
<div class="form-group">
<label class="col-md-12 control-label" style="text-align: center;" for="example-text-input">
<?php $raa=$DB->query("select * from moyu_dl where dl_user = '{$_SESSION['user']}'");
$roww = $DB->fetch($raa);
echo vip($roww['dl_sta']);?>
</label>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="example-text-input">选择文件</label>
<div class="col-md-8">
<input  class="form-control" type="file" name="file" id="file" />
</div>
</div>
	<div class="form-group form-actions">
<div class="col-md-12 ">
<button type="submit" name="sajm" class="btn btn-block btn-primary">开始加密</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</ul>
</div>
</div>
</div>
</div>               
</div>
</div>
</div>
</div>
</div>
<?php include './foot.php'; ?>
<script>$(function(){ ReadyDashboard.init(); });
setTimeout("document.getElementById('ts').style.display = 'none';", 2000);
</script>
<script language="JavaScript">
function sajmts()
{
window.location.href='/assets/MoYu/smtp.class.php?my=cs';
}
</script>
</body>
</html>    