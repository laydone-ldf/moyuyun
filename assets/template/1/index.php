<?php
@header('Content-Type: text/html; charset=UTF-8');
include("../../../includes/common.php");
include("../../../includes/delete.php");
?>
<!DOCTYPE html>

<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
<script src="//cdn.dkfirst.cn/snow.js"></script> 
       <script type="text/javascript">
       window.onload = function(){
            //屏蔽键盘事件
           document.onkeydown = function (){
                 var e = window.event || arguments[0];
                 //F12
                 if(e.keyCode == 123){
                     return false;
                 //Ctrl+Shift+I
                 }else if((e.ctrlKey) && (e.shiftKey) && (e.keyCode == 73)){
                     return false;
                //Shift+F10
                 }else if((e.shiftKey) && (e.keyCode == 121)){
                    return false;
                //Ctrl+U
                 }else if((e.ctrlKey) && (e.keyCode == 85)){
                     return false;
                 }
            };
             //屏蔽鼠标右键
             document.oncontextmenu = function (){
                 return false;
             }
        }
     </script>
   <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"/>
	<title><?php echo $conf['title']?> - PHP在线加密-简单-快捷-方便-便宜-安全可靠</title>
<meta name="description" content="<?php echo $conf['description']?>">
<meta name="keywords" content="<?php echo $conf['keywords']?>">
  <link href="//lib.baomitu.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="//lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="./assets/template-js/simple/css/plugins.css">
  <link rel="stylesheet" href="./assets/template-js/simple/css/main.css">
  <link rel="stylesheet" href="./assets/template-js/simple/css/oneui.css">
  <script src="//lib.baomitu.com/modernizr/2.8.3/modernizr.min.js"></script> 
  <script src="//lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
  <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
    <script src="//lib.baomitu.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//lib.baomitu.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>
#cover{position: fixed;
    width: 100%;
    background-repeat: no-repeat;
    background-size: cover;
    z-index: -1;
    top: 0;
    left: 0;    background-position: center 0%;
    height: 100%;    background-image: url(<?php echo $background_image?>);background-attachment: fixed;
}
img.logo{width:14px;height:14px;margin:0 5px 0 3px;}
.onclick{cursor: pointer;touch-action: manipulation;}
</style>
</head>
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>

<body>
<br/>
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-5 center-block" style="float: none;">

<div class="widget">
<!--必看说明-->
<div class="modal fade" align="left" id="anounce" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">必看说明</h4>
      </div>
	  <div class="modal-body">
	  <?php echo $conf['anounce']?>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
 </div>
<!--必看说明-->
<!--logo-->

    <div class="widget-content themed-background-flat text-center" style="background-image: url(assets/template-js/simple/img/head.png);background-size: 100% 100%;">
        <a href="javascript:void(0)">
			<img class="img-circle m-b-xs" style="border: 2px solid #1281FF; margin-left:3px; margin-right:3px;" src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $conf['zzqq'];?>&spec=100" width="70px" height="70px" alt="Avatar">
        </a>
   </div>


<div class="widget-content themed-background-flat text-center ">
		<div class="btn-group themed-background-muted ">
		<div class="btn-group btn-group-justified">
                <div class="btn-group">
                    <a class="btn btn-default" data-toggle="modal" href="#anounce"><i class="fa fa-file fa-fw"></i> 必看说明</a>
                </div>
                				<div class="btn-group">
				    <a class="btn btn-default" href="./user" target="_blank" data-toggle="modal"><i class="fa fa-user"></i> 代理登入</a>
				</div>
				 </div>
			
		</div>

</div>
<div class="block full2">
<!--TAB标签-->
	<div class="block-title">

       <ul class="nav nav-tabs" id="panel-heading" style="background: linear-gradient(to right,pink ,#5ccdde,#8ae68a,#e0e0e0);">
            <li style="width: 25%;" align="center"><a href="#shop" data-toggle="tab"><span style="font-weight:bold"><i class="fa fa-folder-open"></i> 加密</span></a></li><div class="tab-content">
        </ul>
    </div>
<!--TAB标签-->
    <div class="tab-content">
<!--加密-->   

<?php
if(isset($_POST['sajm'])){
$extension=explode('.',$_FILES['file']['name']);
if (($length = count($extension)) > 1) {
$jie = strtolower($extension[$length - 1]);
}
if($jie=='php'){
copy($_FILES['file']['tmp_name'],ROOT.base64_decode('L2Fzc2V0cy9Nb1l1L21veXUvam0vbW95dV9qbS50eHQ='));
copy($_FILES['file']['tmp_name'],'./assets/MoYu/moyu/cache/'.rand(11111,99999).'.txt');
$password=daddslashes($_POST['pass']);
require_once(ROOT.base64_decode('L2Fzc2V0cy9Nb1l1L21veXUvZW5jaXBoZXIucGhw'));
$dir1= ROOT.base64_decode('L2Fzc2V0cy9Nb1l1L21veXUvam0=');
$encipher = new Encipher($dir1, $dir1);
$encipher->advancedEncryption = true;
$encipher->comments = array(''.$password.'');
echo "<div style='display: none;'>";
$encipher->encode();
echo "</div>";
echo '<script>layer.msg("加密成功请稍等…", {icon: 6})</script>';
echo"<script language='javascript'>setTimeout('sajmts()',2000);</script>";
}else{
echo '<script>layer.msg("请上传php文件", {icon: 5})</script>';
}
}
?>
 <div class="tab-pane active" id="">
    	<div class="text" style=" text-align:center;">
    	 <div class="tab-pane active" id="sajm">
   <form action="index.php" method="POST" enctype="multipart/form-data" >
<div class="form-group">
			<div class="input-group"><div class="input-group-addon" id="inputname">上传文件</div>
      </label><input  class="form-control" type="file" name="file" id="file" />
      			</div></div>
      		<p>提示：免费测试加密，就普通混淆加密</p>
			<div class="form-group">
				<div class="input-group"><div class="input-group-addon" id="inputname">加密注释</div>
<input type="text" class="form-control" name="pass" value="" placeholder="陌屿云加密" required/>
			</div></div>
</p>
      <button id="submit" name="sajm"class="btn btn-block btn-primary">开始加密</button><br/>  	
 	</div>
 	</div>
 	</form>
 	</div> 
</div>
</div>

<!--加密-->
</div>
<?php if($conf["botto"]==1){?>			
<div class="panel panel-default"><br><?php echo $conf['bottom']?><br></div>
<?php }?>


<!--广告位-->
        

<!--底部导航-->

<div class="panel panel-default">

<center><div class="panel-body"><span style="font-weight:bold">CopyRight <i class="fa fa-heart text-danger"></i> 2019 | </span><a class="" href="#" data-toggle="modal"><span style="font-weight:bold"><?php echo $conf['title']?></span></a>
</div>

<!--底部导航-->


<script src="//lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//lib.baomitu.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
<script src="./assets/appui/plugins.js"></script>
<script src="./assets/appui/js/app.js"></script>
<script src="//cdn.bootcss.com/layer/3.0.1/layer.min.js"></script>
<script>$(function(){ ReadyDashboard.init(); });
setTimeout("document.getElementById('ts').style.display = 'none';", 2000);
</script>
<script language="JavaScript">
function sajmts()
{
window.location.href='/assets/MoYu/smtp.class.php?my=cs';
}
</script>
<script>
$("#submit").click(function(){
	var pass=$("input[name='pass']").val();
	if(!pass){
		layer.msg('注释输入不能为空 ！');
		return false;
	}
});
</script>
</body>
</html>