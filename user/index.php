<?php
include("../includes/common.php");
$title="用户中心";
include "./head.php";
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<?php
function vip($sta){
if($sta == 1){
return "普通用户";
}elseif($sta == -1){
 return "<script type='text/javascript'>layer.alert('违反用户协议，账号已被停封！',{icon:5,closeBtn:0},function(){window.location.href='login.php?logout'});</script>";
 }elseif($sta == 2){
return "初级会员";
}elseif($sta == 3){
return "中级会员";
}elseif($sta == 4){
return "超级会员";
}
}
$count1=$DB->count("SELECT count(*) from moyu_dl WHERE 1");
$count2=$DB->count("select count(*) from moyu_dl where dl_sta <=-1");
$count6=$DB->count("select count(*) from moyu_dl where dl_sta <=1");
?> 
<script language="JavaScript">
function startTime() 
{ 
var today=new Date();//定义日期对象 
var yyyy = today.getFullYear();//通过日期对象的getFullYear()方法返回年
var MM = today.getMonth()+1;//通过日期对象的getMonth()方法返回年
var dd = today.getDate();//通过日期对象的getDate()方法返回年 
var hh=today.getHours();//通过日期对象的getHours方法返回小时 
var mm=today.getMinutes();//通过日期对象的getMinutes方法返回分钟 
var ss=today.getSeconds();//通过日期对象的getSeconds方法返回秒 
// 如果分钟或小时的值小于10，则在其值前加0，比如如果时间是下午3点20分9秒的话，则显示15：20：09 
MM=checkTime(MM);
dd=checkTime(dd);
mm=checkTime(mm); 
ss=checkTime(ss);
var day; //用于保存星期（getDay()方法得到星期编号）
if(today.getDay()==0) day = "星期日 " 
if(today.getDay()==1) day = "星期一 " 
if(today.getDay()==2) day = "星期二 " 
if(today.getDay()==3) day = "星期三 " 
if(today.getDay()==4) day = "星期四 " 
if(today.getDay()==5) day = "星期五 " 
if(today.getDay()==6) day = "星期六 " 
document.getElementById('nowDateTimeSpan').innerHTML=yyyy+"-"+MM +"-"+ dd +" " + hh+":"+mm+":"+ss+" " + day; 
setTimeout('startTime()',1000);//每一秒中重新加载startTime()方法 
} 

function checkTime(i) 
{ 
if (i<10){
i="0" + i;
} 
return i;
}
</script>
<div class="container" style="padding-top: 0px;">
<div class="col-md-20 col-lg-20 center-block" style="float: none;">
<section id="main-content">
<section class="wrapper">
<!-- page start-->
<div class="row">
<div class="col-lg-12">
<!--breadcrumbs start -->
<ul class="breadcrumb"> 
<h4><i class="fa fa-qq"></i><strong>控制台</strong></h4><br> 

<p class="pull-right text-navy feed-element widget-text-box" for="field-2" id="load">
</p>
<div class="row m-t-lg"> 
</div>
<ul class="list-group">
 <center><img src="http://q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $row['dl_qq']?>&spec=100" style="width: 100px; height: 100px;" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"><h2 class="widget-heading h3 text-dark"><font color=red>H</font><font color=blue>e</font>l<font color=tan>l</font><font color=red>o</font></h2></center></a></li>
 <div class="tab-content">

<div class="tab-pane active" id="sss">
 
<form action="index.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered" >
 <br>
<li class="list-group-item"><span class="icon-user"></span> <b>用户id：</b> <span class="badge"> <?php echo $row['id']?></span></li>	
 <li class="list-group-item"><span class="icon-github-alt"></span> <b>用户权限：</b><span class="badge"> <?php echo vip($row['dl_sta']);?></span></li>

</li>
</ul>
</div>

</div>
<!-- page start-->
<div class="row">
<div class="col-lg-12">
<!--breadcrumbs start -->
<ul class="breadcrumb"> 
<h4><i class="fa fa-qq"></i><strong>个人信息</strong></h4><br> 
<ul class="list-group">
<li class="list-group-item">
<span class="badge">陌屿加密系统</span>
程序名称：
</li>
	 <li class="list-group-item">
<span class="badge"><?php echo $_SESSION['user']?></span>
用户名称:
</li>
	 <li class="list-group-item">
<span class="badge"><?php echo $row['dl_money']?>￥</span>
账户余额：
</li>
	 <li class="list-group-item">
<span class="badge"><?php echo $row['dl_qq'] ?></span>
 代理 QQ：
</li>
	<li class="list-group-item">
<body onload="startTime()"><span class="badge"><font><span id="nowDateTimeSpan"></font></span>
现在时间:
</li>
</ul>
</div>
</div>
</body>
</html>
 </li>
</ul>
</div>
</div>
<?php
if($row['dl_pwd']==$row['dl_user']){
echo "<script type='text/javascript'>layer.alert('您的密码与用户名相同，请立即修改，防止别人盗取账号！',{icon:5,closeBtn:0},function(){window.location.href='./set.php'});</script>";
}
?>
<?php include './foot.php';?>