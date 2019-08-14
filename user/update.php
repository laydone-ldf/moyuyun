<?php
/**
 * 自助升级站点
**/
include("../includes/common.php");
$title='自助升级站点';
include './head.php';
?>
<?php
if($_POST['type']=='do'){
	if($conf['cjsj']>$row['dl_money'])
	exit("<script language='javascript'>alert('你的余额不足，请充值！');window.location.href='pay.php';</script>");
	$q=daddslashes($_POST['kind']);
	$sql="update `moyu_dl` set `dl_sta` ='{$q}',`dl_money`=`dl_money`-{$conf['cjsj']} where `id`='{$row['id']}'";
if($row['dl_sta']=='4'){
	exit("<script language='javascript'>alert('您已经是超级会员了！无需再次升级');history.go(-1);</script>");
}
	if($DB->query($sql)){
		exit("<script type='text/javascript'>layer.alert('恭喜你超级会员升级成功！',{icon:1,closeBtn:0},function(){window.location.href='./update.php'});</script>");
	}else{
		exit("<script type='text/javascript'>layer.msg('升级失败！',{icon:1});</script>");
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
<div class="tab-content"><div class="form-group">

			<form class="form-horizontal" action="update.php" method="post" name="auth">
		<div class="panel-body">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						升级会员
					</div>
					<select name="kind" class="form-control"><option value="4">超级会员</option></select>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						升级所需
					</div>
					<input name="need" class="form-control" value="<?php echo $conf['cjsj']?> " disabled/>
					<div class="input-group-addon">
						元
					</div>
				</div>
			</div>
			<button type="radio" name="type"  style="background:(to right,#b221ff,#14b7ff)" class="btn btn-warning btn-block" value="do">升级
				</button>
		</div>
	</div>
  </div>
</div>
<?php
include("./foot.php");
?>