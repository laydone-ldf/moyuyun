<?php
error_reporting(0);
define('IN_CRONLITE', true);
define('CACHE_FILE', 0);
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
date_default_timezone_set('Asia/Shanghai');
if (function_exists("set_time_limit"))
{
	@set_time_limit(0);
}
if (function_exists("ignore_user_abort"))
{
	@ignore_user_abort(true);
}

$scriptpath=str_replace('\\','/',$_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$sitepath.'/';
$date = date("Y-m-d H:i:s");
require ROOT.'config.php';
//连接数据库
include_once(ROOT."db.class.php");
$DB=new DB($host,$user,$pwd,$dbname,$port);

include ROOT.'cache.class.php';
$CACHE=new CACHE();
$conf=$CACHE->pre_fetch();//获取系统配置

include ROOT.'function.php';

$clientip=real_ip();

function showalert($msg,$status,$orderid){
	if($orderid)
	echo '<meta charset="utf-8"/><script>alert("'.$msg.'");window.location.href="../order.php?orderid='.$orderid.'";</script>';
	else
	echo '<meta charset="utf-8"/><script>alert("'.$msg.'");window.location.href="../";</script>';
}


?>