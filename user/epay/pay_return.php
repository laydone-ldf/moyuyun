<?php
require '../../includes/common.php';
require_once("pay/pay.config.php");
require_once("pay/lib/pay_notify.class.php");
;echo '<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
';
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {
$out_trade_no = $_GET['out_trade_no'];
$trade_no = $_GET['trade_no'];
$trade_status = $_GET['trade_status'];
$type = $_GET['type'];
$name = $_GET['name'];
$rmb = $_GET['money'];
if($_GET['trade_status'] == 'TRADE_SUCCESS') {
$DB->query("update `moyu_dl` set `dl_money`=`dl_money`+'{$rmb}' WHERE `id`='{$name}'");
exit("<script language='javascript'>alert('成功充值{$rmb}元!');window.location.href='/user/pay.php';</script>");
}
else {
echo "trade_status=".$_GET['trade_status'];
}
echo "验证成功<br />";
}
else {
echo "验证失败";
}
;echo '        <title>易支付即时到账交易接口</title>
	</head>
    <body>
    </body>
</html>
';
?>