<?php
/**
 * 代理设置
**/
include("../includes/common.php");
$title='代理管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
</script>
$(function(){ ReadyDashboard.init(); UiTables.init();}); 
setTimeout("document.getElementById('ts').style.display = 'none';", 2000) 
</script>
<section id="main-content">
<section class="wrapper">
<?php
function chkSta($sta){
    if($sta == 1){
        return "<span class='label label-default'>普通用户</span>";
    }elseif($sta == -1){
        return "<span class='label label-danger'>已封号</span>";
    }elseif($sta == 2){
        return "<span class='label label-primary'>初级会员</span>";
    }elseif($sta == 3){
        return "<span class='label label-info'>中级会员</span>";
    }elseif($sta == 4){
        return "<span class='label label-warning'>超级会员</span>";
    }
}
?>
<?php
$ok=isset($_POST['ok'])?$_POST['ok']:null;
if($ok==1){

$user=$_POST['user'];
$mail=$_POST['mail'];
$qq=$_POST['qq'];
$rows=$DB->get_row("select * from moyu_dl where dl_user='$user' limit 1");
$rowss=$DB->get_row("select * from moyu_dl where dl_mail='$mail' limit 1");
$rowsss=$DB->get_row("select * from moyu_dl where dl_qq='$qq' limit 1");
if($rows){
echo"<div class='col-md-12'><div id='ts' class='alert alert-danger alert-dismissable'><h4><strong>用户名已存在</strong></h4></div></div>";
   
}elseif($rowss){
echo"<div class='col-md-12'><div id='ts' class='alert alert-danger alert-dismissable'><h4><strong>邮箱已存在</strong></h4></div></div>";
   
}elseif($rowsss){
echo"<div class='col-md-12'><div id='ts' class='alert alert-danger alert-dismissable'><h4><strong>QQ已存在</strong></h4></div></div>";
   
}else{
$pass=$_POST['pass'];
$rmb=$_POST['rmb'];
$sta=$_POST['sta'];
if($user==NULL or $pass==NULL){
echo"<div class='col-md-12'><div id='ts' class='alert alert-danger alert-dismissable'><h4><strong>添加失败，请填写完整</strong></h4></div></div>";
} else {
if($DB->query("insert into `moyu_dl` values(null,'{$user}','{$pass}','{$mail}','{$qq}','{$rmb}',$sta)")){
echo"<div class='col-md-12'><div id='ts'  class='alert alert-info alert-dismissable'><h4><strong>用户已添加</strong></h4></div></div>";
}
}

}}

if($ok==2){
$id=$_POST['id'];
$ro=$DB->get_row("select * from moyu_dl where id='$id' limit 1");
if(!$ro){
echo"<div class='col-md-12'><div id='ts' class='alert alert-danger alert-dismissable'><h4><strong>用户不存在</strong></h4></div></div>";
}else{
$user=$_POST['user'];
$mail=$_POST['mail'];
$qq=$_POST['qq'];
$pass=$_POST['pass'];
$rmb=$_POST['rmb'];
$sta=$_POST['sta'];
if($user==NULL or $pass==NULL){
echo"<div class='col-md-12'><div id='ts' class='alert alert-danger alert-dismissable'><h4><strong>修改失败，请填写完整</strong></h4></div></div>";
} else {
if($DB->query("update moyu_dl set dl_user='$user',dl_pwd = '$pass',dl_mail = '$mail',dl_money = '$rmb',dl_qq='$qq',dl_sta='$sta' where id='{$id}'"))
echo"<div class='col-md-12'><div id='ts'  class='alert alert-info alert-dismissable'><h4><strong>修改成功</strong></h4></div></div>";
}
}
}
if($_GET['ok']=='delete')
{
$id=$_GET['id'];
$sql="DELETE FROM moyu_dl WHERE id='$id'";
if($DB->query($sql))
echo"<div class='col-md-12'><div id='ts'  class='alert alert-info alert-dismissable'><h4><strong>用户已删除</strong></h4></div></div>";
else
echo"<div class='col-md-12'><div id='ts' class='alert alert-danger alert-dismissable'><h4><strong>删除失败</strong></h4></div></div>";
}
?>
<?php
if($_GET['ok']==2){
$idd=$_GET['id'];
$row=$DB->get_row("select * from moyu_dl where id='$idd' limit 1");
?>
<!-- page start-->
<div class="row">
<div class="col-lg-12">
<ul class="breadcrumb">   
<h4><i class="fa fa-qq"></i><strong><?php echo $title ?></strong></h4>
<div class="tab-content">
<form action="userlist.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
<input type="hidden" name="ok" value="2">
<input type="hidden" name="id" value="<?php echo $idd?>">
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">用户名</label>
<div class="col-md-6">
<input type="text"  name="user" class="form-control" value="<?php echo $row['dl_user']?>" readonly="readonly">                            </div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">密码</label>
<div class="col-md-6">
<input type="text"  name="pass" class="form-control" value="<?php echo $row['dl_pwd']?>" >
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">邮箱</label>
<div class="col-md-6">
<input type="text"  name="mail" class="form-control" value="<?php echo $row['dl_mail']?>" readonly="readonly">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">QQ</label>
<div class="col-md-6">
<input type="text"  name="qq" class="form-control" value="<?php echo $row['dl_qq']?>" >
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">余额</label>
<div class="col-md-6">
<input type="text"  name="rmb" class="form-control" value="<?php echo $row['dl_money']?>" >
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">用户级别</label><br>
<div class="col-md-6">
<select class="form-control" id="sta" name="sta">
<option value="-1" >封号处理</option>
<option value="1" selected>普通会员</option>
<option value="2" selected>初级会员</option>
<option value="3" selected>中级会员</option>
<option value="4" selected>超级会员</option>  
</select>
</div>
</div>
	<div class="form-group form-actions">
<div class="col-md-12 col-md-offset-3">
<button type="submit" name="submit" class="btn btn-block btn-primary">修改用户</button>
</div>
</div>
</form>
</div>
</div>
<?php }else{ ?>
<!-- page start-->
<div class="row">
<div class="col-lg-12">
<ul class="breadcrumb">   
<h4><i class="fa fa-qq"></i><strong><?php echo $title ?></strong></h4>
<div class="tab-content">
<form action="userlist.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
<input type="hidden" name="ok" value="1">
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">用户名</label>
<div class="col-md-6">
<input type="text"  name="user" class="form-control" value="" >
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">密码</label>
<div class="col-md-6">
<input type="text"  name="pass" class="form-control" value="" >
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">邮箱</label>
<div class="col-md-6">
<input type="text"  name="mail" class="form-control" value="" >
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">QQ</label>
<div class="col-md-6">
<input type="text"  name="qq" class="form-control" value="" >
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">余额</label>
<div class="col-md-6">
<input type="text"  name="rmb" class="form-control" value="" >
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">用户级别</label><br>
<div class="col-md-6">
<select class="form-control" id="sta" name="sta">
<option value="-1" >封号处理</option>
<option value="1" selected>普通会员</option>
<option value="2" selected>初级会员</option>
<option value="3" selected>中级会员</option>
<option value="4" selected>超级会员</option>
</select>
</div>
</div>
	<div class="form-group form-actions">
<div class="col-md-12">
<button type="submit" name="submit" class="btn btn-block btn-primary">添加用户</button>
</div>
</div>
</form>
</div> 
</div>
<?php } ?>
<div class="col-md-6">
<div class="block full">
<div class="block-title">
<h2>用户列表</h2>
</div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-vcenter">
<thead>
<tr>
<th>账号</th>
<th>等级</th>
<th>操作</th>
</tr>
</thead>
<tbody>
<?php
$numrows=$DB->count("SELECT count(*) from moyu_dl");
$pagesize=10;
$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize)
{
 $pages++;
 }
if (isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
$page=1;
}
$offset=$pagesize*($page - 1);

$rs=$DB->query("SELECT * FROM moyu_dl WHERE 1 order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{
echo '<tr><td class="text-center"><strong>'.$res['dl_user'].'</strong></td><td class="text-center">'.chkSta($res['dl_sta']).'</td><td class="text-center"><a href="./userlist.php?ok=2&id='.$res['id'].'"  <span class="label label-primary">修改信息</span></a><a href="./userlist.php?ok=delete&id='.$res['id'].'" <span class="btn btn-effect-ripple btn-xs btn-danger">删除</span></a></td></tr>';
}
?>
</tbody>
</table>
</div>
 <?php
echo'<ul class="pagination">';
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page>1)
{
echo '<li><a href="userlist.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="userlist.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="userlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="userlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="userlist.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="userlist.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
?>
</div>
</div>
</div>               
</div>
</div>
</div>
</div>
</div>
<?php include './foot.php';?>
</body>
</html>