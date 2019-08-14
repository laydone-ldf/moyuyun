<?php
@header("Content-type:text/html;charset=utf-8");
error_reporting(0);
define('IN_CRONLITE', true);
define('TYPE', '2');
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
define('CC_Defender', 0); //防CC攻击开关(1为session模式)
date_default_timezone_set("PRC");
$date = date("Y-m-d H:i:s");
session_start();
if(is_file(SYSTEM_ROOT.'360safe/360webscan.php')){//360网站卫士
require_once(SYSTEM_ROOT.'360safe/360webscan.php');
}
include_once SYSTEM_ROOT.'security.php';
require ROOT.'config.php';
$scriptpath = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $sitepath . '/';
if(!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname'])//检测安装
{
header('Content-type:text/html;charset=utf-8');
	echo "你还没安装！<a href=\"/install/\">点此安装</a>";
}
setcookie("user",1);
//连接数据库
include_once(SYSTEM_ROOT."db.class.php");
$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);

if($DB->query("select * from moyu_config where 1")==FALSE)//检测安装2
{
header('Content-type:text/html;charset=utf-8');
	echo "你还没安装！<a href=\"/install/\">点此安装</a>";
}
$rs=$DB->query("select * from moyu_config");
while($row=$DB->fetch($rs)){ 
	$conf[$row['k']]=$row['v'];
}
$rs=$DB->query("select * from moyu_dl where dl_user = '{$_SESSION['user']}'");
$row = $DB->fetch($rs);
$password_hash='!@#%!s!0';
include_once(SYSTEM_ROOT."function.php");
if (!file_exists(ROOT."install/install.lock") && file_exists(ROOT."/install/index.php")) {
	sysmsg("<h2>检测到无 install.lock 文件</h2><ul><li><font size=\"4\">如果您尚未安装本程序，请<a href=\"/install/\">前往安装</a></font></li><li><font size=\"4\">如果您已经安装本程序，请手动放置一个空的 install.lock 文件到 /install 文件夹下，<b>为了您站点安全，在您完成它之前我们不会工作。</b></font></li></ul><br/><h4>为什么必须建立 install.lock 文件？</h4>它是陌屿授权网的保护文件，如果检测不到它，就会认为站点还没安装，此时任何人都可以安装/重装陌屿云加密系统。<br/><br/>", true);
}
if($conf['txprotect'] == 1){
    include_once(SYSTEM_ROOT."txprotect.php");
}
if (($conf['qqjump']==1 && (!strpos($_SERVER['HTTP_USER_AGENT'],'QQ/')===false || !strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')===false))) {if ($_GET['open']==1 && !strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')===false) {
header('Content-Disposition: attachment; filename="load.doc"');
header('Content-Type: application/vnd.ms-word;charset=utf-8');
}
 else {
	 header('Content-type:text/html;charset=utf-8');
}
include_once(SYSTEM_ROOT."jump.php");
exit(0);
}
include_once(SYSTEM_ROOT."member.php");
if ($conf["payapi"] == -1) {
$payapi = $conf['epay_url'];
}else{
if ($conf["payapi"] == 1) {
$payapi = "http://pay.sddyun.cn/";
}
}
?>