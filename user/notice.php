<?php
include("../includes/common.php");
$title="用户中心";
include "./head.php";
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<section id="main-content">
  <section class="wrapper">
  <!-- page start-->
  <div class="row">
  <div class="col-lg-12">
  <!--breadcrumbs start -->
  <ul class="breadcrumb">   
<h4><i class="fa fa-qq"></i><strong>网站公告</strong></h4><br> 
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-6">
<div class="widget">
<div class="widget-content border-bottom">
<center><img src="../assets/icon/wzgg.jpg" draggable="false"></center>
</div>
</div>
</br>
<?php
$rs=$DB->query("SELECT * FROM moyu_notice WHERE 1 order by position asc");
while($res = $DB->fetch($rs))
{
$ggdate=date("Y-m-d H:i:s",strtotime("-8 day"));
if($res['active']==1){
echo '<div class="list-group-item">';
if($res['setop']==1){
echo '<img src="../assets/icon/zd.gif" draggable="false"> ';
}elseif($res['setop']==0 && $res['date'] > $ggdate){
echo '<img src="../assets/icon/hot.gif" draggable="false"> ';
}else{
echo '<img src="../assets/icon/gg.gif" draggable="false"> ';
}
echo $res['center'].'<span class="badge label-warning">'.$res['date'].'</span></div>';
}
}
?>
</div>
</div>
<?php include './foot.php'; ?>