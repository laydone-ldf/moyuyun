<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>免签约支付宝即时到账交易接口</title>
</head>
<?php
/* *
 * 功能：即时到账交易接口接入页
 * 
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。
 */
require '../../includes/common.php';
require_once("pay/pay.config.php");
require_once("pay/lib/pay_submit.class.php");
$rs=$DB->query("select * from moyu_dl where dl_user = '{$_SESSION['user']}'");
$row = $DB->fetch($rs);
/**************************请求参数**************************/
		
		$notify_url = $siteurl."pay_notify.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数
        //页面跳转同步通知页面路径
        $return_url = $siteurl."pay_return.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
        //商户订单号
        $out_trade_no = $_POST['out_trade_no'];
        //商户网站订单系统中唯一订单号，必填
		//支付方式
        $type = $_POST['type'];
        //授权的域名
        
		//付款金额
        $money = $_POST['WIDtotal_fee'];
        $name= "陌屿加密-在线充值";
		//站点名称
        $sitename = "陌屿加密";
        $user = $row['dl_user'];
        //必填
        //订单描述

/************************************************************/
//将订单信息写入数据库，以便于在异步通知时进行处理
//构造要请求的参数数组，无需改动
$parameter = array(
		"pid" => trim($alipay_config['partner']),
		"type" => $type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"out_trade_no"	=> $out_trade_no,
 "name"=>$row['id'],
 "user"=>$row['dl_user'],
		"money"	=> $money,
		"sitename"	=> $sitename
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter);
echo $html_text;

?>
</body>
</html>