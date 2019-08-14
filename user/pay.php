<?php
include("../includes/common.php");
$title="在线充值";
include "./head.php";
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
<form class="form-horizontal form-bordered" action="./epay/submit.php?" method="post" name="auth">
<div class="form-group">
<label class="col-md-3 control-label" for="example-hf-email">订单号</label>
<div class="col-md-9">
<input type="text" name="out_trade_no" value="<?php echo date("YmdHis").rand(100000,999999); ?>" class="form-control" required>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-hf-email">金额</label>
<div class="col-md-9">
<input type="text" name="WIDtotal_fee" placeholder="输入要充值的余额"  class="form-control" required>
</div>
</div>
<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3">
<button type="radio" name="type" value="alipay"  class="btn btn-effect-ripple btn-primary">支付宝</button>
<button type="radio" name="type" value="qqpay" class="btn btn-effect-ripple btn-primary">QQ扫码</button>
<button type="radio" name="type" value="wxpay" class="btn btn-effect-ripple btn-primary">微信支付</button>
</div>
</div>
</div>
</form>
<!-- page start-->
<div class="row">
<div class="col-lg-12">
<ul class="breadcrumb">   
<h4><i class="fa fa-qq"></i><strong>收费介绍</strong></h4>
<br>
<div class="row m-t-lg">                               
</div>
<center>
<p>
<center class="label label-default">普通用户</center>
<center class="label label-default">( <?php echo $conf['ptjg'] ?> )元一个文件</center>
<p>
<center class="label label-primary">初级会员</center>
<center class="label label-primary">( <?php echo $conf['djjg'] ?> )元一个文件</center>
<p>
<center class="label label-info">中级会员</center>
<center class="label label-info">( <?php echo $conf['zjjg'] ?> )元一个文件</center>
<p>
<center class="label label-warning">超级会员</center>
<center class="label label-warning">( <?php echo $conf['gjjg'] ?> )元一个文件</center>
<p>
</center>
</div>
</div>
</form>
</div>
</div>
</div>
<?php include './foot.php';?>