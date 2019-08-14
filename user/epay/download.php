<?php
/*
Auat：陌屿
QQ：2763994904
Name：批量加密
*/
if($_GET['my']=='zipUtil') {
?>
<?php
Header( "Content-type:   application/octet-stream "); 
Header( "Accept-Ranges:   bytes "); 
header( "Content-Disposition:   attachment;   filename=批量加密.zip "); 
header( "Expires:   0 "); 
header( "Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 "); 
header( "Pragma:   public "); 
$filename = fopen("../zipUtil/code_encode.zip", "r") or die("加密失败，请重试！");
echo fread($filename,filesize("../zipUtil/code_encode.zip"));
fclose($filename);
exit();
}?>