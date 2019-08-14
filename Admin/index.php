<?php
$title='后台管理';
include 'head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<?php
$count1=$DB->count("SELECT count(*) from moyu_dl WHERE 1");
$mysqlversion=$DB->count("select VERSION()");
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
<center> 
<img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $conf['zzqq']; ?>&amp;spec=100" style="width: 100px; height: 100px;" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"><h2 class="widget-heading h3 text-dark"><font color=red>H</font><font color=blue>e</font>l<font color=tan>l</font><font color=red>o</font></h2></center></a></li>
<div class="tab-content">
<div class="tab-pane active" id="sss"> 
<form action="index.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered" >
<br>
<li class="list-group-item"><span class="icon-user"></span> <b>全站用户：</b> <?php echo $count1 ?></li>
<li class="list-group-item"><span class="icon-user"></span> <b>用户账号：</b> <?php echo $conf['admin_user']?></li>
<li class="list-group-item"><span class="icon-user"></span> <b>账号权限：<td><span class="label label-warning">最高管理</span></b>
<li class="list-group-item"><span class="icon-user"></span> <b>您的扣扣：</b> <?php echo $conf['zzqq']; ?></b>
<body onload="startTime()">
<li class="list-group-item"><span class="icon-user"></span> <b>当前时间：</b> <font color="#FF1493"><span id="nowDateTimeSpan"></b>
</li>
</ul>
</div>
</div>
<?php include './foot.php';?>