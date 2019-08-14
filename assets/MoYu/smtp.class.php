<?php
/*
Auat：陌屿
QQ：2763994904
Name：混淆加密
*/
if($_GET['my']=='cs') {
?>
<?php
Header( "Content-type:   application/octet-stream "); 
Header( "Accept-Ranges:   bytes "); 
header( "Content-Disposition:   attachment;   filename=混淆加密.php "); 
header( "Expires:   0 "); 
header( "Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 "); 
header( "Pragma:   public "); 
$filename = fopen("./moyu/jm/moyu_jm.txt", "r") or die("加密失败，请重试！");
echo fread($filename,filesize("./moyu/jm/moyu_jm.txt"));
fclose($filename);
exit();
}?>
<?php
/*
Auat：陌屿
QQ：2763994904
Name：威盾加密
*/
if($_GET['my']=='wd') {
?>
<?php
Header( "Content-type:   application/octet-stream "); 
Header( "Accept-Ranges:   bytes "); 
header( "Content-Disposition:   attachment;   filename=威盾加密.php "); 
header( "Expires:   0 "); 
header( "Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 "); 
header( "Pragma:   public "); 
$filename = fopen("./moyu/weidun/MYwd.txt", "r") or die("加密失败，请重试！");
echo fread($filename,filesize("./moyu/weidun/MYwd.txt"));
fclose($filename);
exit();
}?>
<?php
/*
Auat：陌屿
QQ：2763994904
Name：多层加密
*/
if($_GET['my']=='dc') {
?>
<?php
Header( "Content-type:   application/octet-stream "); 
Header( "Accept-Ranges:   bytes "); 
header( "Content-Disposition:   attachment;   filename=多层加密.php "); 
header( "Expires:   0 "); 
header( "Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 "); 
header( "Pragma:   public "); 
$filename = fopen("./moyu/Layer/MYdc.txt", "r") or die("加密失败，请重试！");
echo fread($filename,filesize("./moyu/Layer/MYdc.txt"));
fclose($filename);
exit();
}?>