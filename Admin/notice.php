<?php
/**
 * 用户公告
**/
include("../includes/common.php");
$title='用户公告';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdn.bootcss.com/layer/3.1.0/layer.js"></script>
<?php
$mod=isset($_GET['mod'])?$_GET['mod']:null;

if($mod == "edit"){
$id=intval($_GET['id']);
$row=$DB->get_row("select * from moyu_notice where id='$id' limit 1");
if(!$row){
echo "<script type='text/javascript'>layer.alert('当前用户ID不存在！',{icon:5},function(){window.location.href='./adver.php'});</script>";
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
<div class="input-group">
<span class="input-group-addon">公告内容</span>
<textarea class="form-control" name="center" rows="5"><?php echo htmlspecialchars($row['center']);?></textarea>
</div><br/>
<div class="form-group">
<button type="submit" onclick="editnotice(<?php echo $row['id'] ?>)" class="btn btn-primary btn-block">确定修改</button>
</div>
<a href="./notice.php">>>返回公告列表</a>
</div>
</div>
<script>
function editnotice(id) {
	var center=$("textarea[name='center']").val();
	if(center==""){
		layer.msg("请输入公告内容");
		return false;
	}
		var ii = layer.msg("正在修改", {icon: 16,time: 0});
		$.ajax({
			type : "POST",
			url : "ajax.php?act=editnotice",
			data : {id:id,center:center},
			dataType : "json",
			success : function(data) {
				layer.close(ii);
				if(data.code == 0){
					layer.msg(data.msg, {icon: 1});
					window.location.href=data.url;
					}else{
						layer.msg(data.msg, {icon: 2});
						window.location.href=data.url;
					}
					}
					});

}
</script>
<?php include './foot.php';?>
<?php
}else{
$numrows=$DB->count("SELECT count(*) from moyu_notice");
$con='加密平台共有 '.$numrows.' 个公告';

$pagesize=30;
if (!isset($_GET['page'])) {
	$page = 1;
	$pageu = $page - 1;
} else {
	$page = $_GET['page'];
	$pageu = ($page - 1) * $pagesize;
}
?>
<section id="main-content">
<section class="wrapper">
<!-- page start-->
<div class="row">
<div class="col-lg-12">
<ul class="breadcrumb">   
<a href="javascript:void(0)" class="btn btn-effect-ripple btn-default toggle-bordered enable-tooltip" data-toggle="button" title="<?php echo $con ?>"><b><?php echo $con; ?></b></a>
<h4><i class="fa fa-qq"></i><strong><?php echo $title ?></strong></h4>
<div class="tab-content">

<div class="input-group">
<span class="input-group-addon">公告内容</span>
<textarea class="form-control" rows="5" name="center" placeholder="请输入需要公布的公告"></textarea>
</div><br/>
<div class="input-group">
<span class="input-group-addon">公告状态</span>
<select name="type" id="type" class="form-control"><option value="1">正常</option><option value="0">隐藏</option><option value="2">置顶</option></select>
</div><br/>
<div class="form-group">
<button type="submit" onclick="addnotice()" class="btn btn-primary btn-block">添加公告</button>
</div>
<div class="table-responsive">
<table class="table table-striped">
<thead><th>UID</th><th>内容</th><th>时间</th><th>置顶</th><th>状态</th><th style="width: 100px;" class="text-center"><i class="fa fa-diamond"></i></th></tr></thead>
<tbody>
<?php
function active($active,$id=0){
	if($active==1)
		return '<span onclick="noactive('.$id.')" title="点击切换状态" class="btn btn-success btn-xs">显示</span>';
	else
		return '<span onclick="noactive('.$id.')" title="点击切换状态" class="btn btn-danger btn-xs">隐藏</span>';
}
function setop($setop,$id=0){
	if($setop==1)
		return '<span onclick="nosetop('.$id.')" title="点击切换" class="btn btn-success btn-xs">yes</span>';
	else
		return '<span onclick="nosetop('.$id.')" title="点击切换" class="btn btn-danger btn-xs">no</span>';
}
$rs=$DB->query("SELECT * FROM moyu_notice WHERE 1 order by id asc limit $pageu,$pagesize");
while($res = $DB->fetch($rs))
{
echo '<tr><td><b>'.$res['id'].'</b></td><td>'.substr($res['center'],0,50).'</td><td>'.$res['date'].'</td><td>'.setop($res['setop'],$res['id']).'</td><td>'.active($res['active'],$res['id']).'</td><td><a href="./notice.php?mod=edit&id='.$res['id'].'" class="btn btn-xs btn-info">编辑</a> <a class="btn btn-xs btn-danger" onclick="delnotice('.$res['id'].')">删除</a></td></tr>';
}
?>
</tbody>
</table>
</div>
<center>
<?php
echo'<ul class="pagination">';
$s = ceil($numrows / $pagesize);
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$s;
if ($page>1)
{
echo '<li><a href="notice.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="notice.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="notice.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$s;$i++)
echo '<li><a href="notice.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$s)
{
echo '<li><a href="notice.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="notice.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页
?>
</center>
</div>
</div>
<script>
function noactive(id) {
	$.ajax({
		type : 'POST',
		url : 'ajax.php?act=noactive',
		data : {id,id},
		dataType : 'json',
		success : function(data) {
			layer.msg('切换成功',{icon:1});
			window.location.reload();
		}
	});
};
function nosetop(id) {
	$.ajax({
		type : 'POST',
		url : 'ajax.php?act=nosetop',
		data : {id,id},
		dataType : 'json',
		success : function(data) {
			layer.msg('切换成功',{icon:1});
			window.location.reload();
		}
	});
};
function delnotice(id) {
	layer.confirm('你确实要删除此公告吗？', {
		btn: ['确定','取消']
		}, function(){
		var ii = layer.msg("正在删除", {icon: 16,time: 0});
		$.ajax({
			type : "POST",
			url : "ajax.php?act=delnotice",
			data : {id:id},
			dataType : "json",
			success : function(data) {
				layer.close(ii);
				if(data.code == 0){
					layer.msg(data.msg, {icon: 1});
					window.location.reload();
					}else{
						layer.msg(data.msg, {icon: 2});
						window.location.reload();
					}
					}
					});
			}, function(){
			});
};
function addnotice() {
	var center=$("textarea[name='center']").val();
	if(center==""){
		layer.msg("请输入公告内容");
		return false;
	}
	var ii = layer.msg("正在添加", {icon: 16,time: 0});
	$.ajax({
		type : "POST",
		url : "ajax.php?act=addnotice",
		data : {center:center,type:$('#type option:selected').val()},
		dataType : "json",
		success : function(data) {
			layer.close(ii);
			if(data.code == 0){
				layer.msg(data.msg, {icon: 1});
				window.location.reload();
				}
				}
				});
};
</script>
<?php } include './foot.php';?>