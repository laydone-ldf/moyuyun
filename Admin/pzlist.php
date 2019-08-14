<?php
/**
 * 工单管理
**/
include("../includes/common.php");
$title='工单管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
if($_GET['id']){
$row=$DB->get_row("SELECT * FROM moyu_gd WHERE id='{$_GET['id']}'");
if(isset($_POST['submit']) && isset($_POST['type']) && isset($_POST['pzqq']) && isset($_POST['text'])){
$level=daddslashes($_POST['type']);
$pzqq=daddslashes($_POST['pzqq']);
$note=daddslashes($_POST['text']);
}
?>
<section id="main-content">
<section class="wrapper">
<!-- page start-->
<div class="row">
<div class="col-lg-12">
<ul class="breadcrumb">   
<h4><i class="fa fa-qq"></i><strong><?php echo $title ?></strong></h4>
<div class="tab-content">
<form action="./pzlist.php?id=<?php echo $row['id']?>" method="POST" class="form-horizontal" role="form">
<div class="form-group">
<label class="col-lg-3 control-label">用户名</label>
<div class="col-lg-8">
<input type="text" class="form-control" name="qq" value="<?=$row['qq']?>" maxlength="11" readonly>
</div></div>
<div class="form-group">
<label class="col-lg-3 control-label">提交QQ</label>
<div class="col-lg-8">
<input type="text" class="form-control" name="pzqq" value="<?=$row['pzqq']?>" maxlength="11" readonly>
</div></div>
<div class="form-group">
<label class="col-lg-3 control-label">问题讲述</label>
<div class="col-lg-8">
<textarea type="text" class="form-control" name="text" readonly><?php echo htmlspecialchars($row['text']);?></textarea>
</div></div>
<br/>
<a href="./pzlist.php">>>返回系统</a>
</form>

</div>
</div>
</div>
</div>
</div>

<?php include "foot.php";?>
<?php }else{ ?>

<section id="main-content">
<section class="wrapper">
<!-- page start-->
<div class="row">
<div class="col-lg-12">
<ul class="breadcrumb">   
<h4><i class="fa fa-qq"></i><strong><?php echo $title ?></strong></h4>
<div class="tab-content">
<div class="table-responsive">
<table class="table table-bordered table-condensed table-hover table-striped table-vertical-center">
<thead>
<tr><th class="text-center">ID</th><th class="text-center">用户名</th></th><th class="text-center">提交者QQ</th><th class="text-center">问题类型</th><th class="text-center">问题讲述</th><th class="text-center">提交时间</th><th class="text-center">状态</th></tr>
</thead>
<tbody>
<?php
$numrows=$DB->count("SELECT count(*) from moyu_gd");
$pagesize=5;
if (!isset($_GET['page'])) {
	$page = 1;
	$pageu = $page - 1;
} else {
	$page = $_GET['page'];
	$pageu = ($page - 1) * $pagesize;
}


$rs=$DB->query("SELECT * FROM moyu_gd WHERE 1 order by id desc limit $pageu,$pagesize");
while($res = $DB->fetch($rs))
{
if($res['type']==1){
	$type="充值问题";
}elseif($res['type']==2){
	$type="加密问题";
}elseif($res['type']==3){
	$type="网站问题";
}

if($res['state']==0){
	$state="<a href='./pzlist.php?id=".$res['id']."'>查看详细</a>";
}

echo '<tr><td class="text-center"><b>'.$res['id'].'</b></td><td class="text-center"><b>'.$res['qq'].'</b></td></td><td class="text-center"><b>'.$res['pzqq'].'</b></td><td class="text-center"><b>'.$type.'</b></td><td class="text-center"><b>'.$res['text'].'</b></td><td class="text-center"><b>'.$res['addtime'].'</b></td><td class="text-center"><b>'.$state.'</b></td></tr>';
}
?>
</tbody>
</table>
<div class="text-center">
<?php
echo'<ul class="pagination">';
$s = ceil($numrows / $pagesize);
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$s;
if ($page>1)
{
echo '<li><a href="pzlist.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="pzlist.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="pzlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$s;$i++)
echo '<li><a href="pzlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$s)
{
echo '<li><a href="pzlist.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="pzlist.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页
?>
</div>
</div>
</div>
</div>
</div>
<?php include "foot.php";}?>