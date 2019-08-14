<?php
@header('Content-Type: text/html; charset=UTF-8');
include("../../../includes/common.php");
?>
<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-focus" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
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
	<title><?php echo $conf['title']?> - PHP在线加密-简单-快捷-方便-便宜-安全可靠</title>
<meta name="description" content="<?php echo $conf['description']?>">
<meta name="keywords" content="<?php echo $conf['keywords']?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <link rel="shortcut icon" href="./favicon.ico">
    <link rel="stylesheet" href="./assets/template-js/mobai/css/select2.min.css">
    <link rel="stylesheet" href="./assets/template-js/mobai/css/bootstrap.min-3.0.css">
    <link rel="stylesheet" id="css-main" href="./assets/template-js/mobai/css/oneui.min-3.3.css">
  <script src="//lib.baomitu.com/modernizr/2.8.3/modernizr.min.js"></script> 
  <script src="//lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
  <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<style>
a{ text-decoration:none}
</style>

    <main id="main-container">
        <div class="content bg-image overflow-hidden"
             style="background-image: url('./assets/template-js/mobai/img/background.jpg');">
            <div class="push-50-t push-15">
                <h1 class="h2 text-white animated zoomIn text-center"><?php echo  $conf['title'] ?></h1>
                <h2 class="h5 text-white-op animated zoomIn text-center"></br>带你体验不一样的感觉</h2>
            </div>
        </div>
           
<?php {?>			
        <div class="content">
            <div class="row">
                <div class="col-lg-6">
<br>
                    <div class="js-wizard-simple block">
       
                        <div class="block">
                            <div class="block-header">
                                <h3 class="fa fa-bullhorn"  class="block-title"> 平台公告</h3>
                    <div class="col-lg-6">
                            </div>
                            <div class="block-content">
                                <div class="row">
                                </div>
	  <?php echo $conf['anounce']?>
   <br>
                                </div>
                            </div>
                        </div>
                    </div>
<br>
</div>
</div>
</div>
</div>
<?php }?>


        <div class="content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="js-wizard-simple block">
                            <div class="block-header">
                                <h3 class="fa fa-folder-open"  class="block-title"> 免费加密</h3></i></a>
                            </li>
                        </ul>
                            
                            <div class="block-content tab-content">
                                <div class="tab-pane fade fade-up push-30-t push-50 active in" id="onlinebuy">
                                
             
    	<div class="text" style=" text-align:center;">
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
<button class="btn btn-minw btn-rounded btn-success" id="submit" name="sajm"  style="width: 100%;">立即加密</button>
<!-- <button type="submit" name="sajm" class="btn btn-block btn-primary">开始加密</button><br/>  	-->
</div>
</div>
</form>
</div>
</div>
</div>
</main>
<!--底部导航-->

<!-- 加载弹窗END -->
<script src="./assets/template-js/mobai/js/oneui.min-3.4.js"></script>
<!-- 表单 JS 验证 -->
<script src="./assets/template-js/mobai/js/jquery.bootstrap.wizard.min.js"></script>
<script src="./assets/template-js/mobai/js/jquery.validate.min.js"></script>
<script src="./assets/template-js/mobai/js/base_forms_wizard.js"></script>
<!-- 表单 JS 验证 END -->
<script src="./assets/template-js/mobai/js/select2.full.min.js"></script>
<script>
    jQuery(function () {
        App.initHelpers('select2');
    });
</script>
<!-- Layer Model -->
<script src="//lib.baomitu.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
<script src="//cdn.bootcss.com/layer/3.0.1/layer.min.js"></script>
<!-- Ajax -->

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