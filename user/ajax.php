<?php
@header('Content-Type: text/html; charset=UTF-8');
include("../includes/common.php");
function send_mail($to, $sub, $msg){	
require_once "smtp.php";
include("../includes/common.php");
	$From = $conf['smtpmail'];
	$Host = $conf['smtpfwq'];
	$Port = $conf['smtpdk'];
	$SMTPAuth = 1;
	$Username = $conf['smtpuser'];
	$Password = $conf['smtppass'];
	$Nickname = $conf['smtpname'];
	$SSL = 465;
	$mail = new SMTP($Host, $Port, $SMTPAuth, $Username, $Password, $SSL);
	$mail->att = array();
	if ($mail->send($to, $From, $sub, $msg, $Nickname)) {
		return true;
	}
	return $mail->log;
}

$emlog = array('txt' => false,'error' =>'');
if($_POST['action']=='3'){
include("../includes/common.php");
		$randCode = '';
$chars = 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPRSTUVWXYZ23456789';
for ( $i = 0; $i < 5; $i++ ){
	$randCode .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
}
$_SESSION['mailcode'] = strtoupper($randCode);
$result = send_mail($_POST['mail'], '注册验证码','验证码【'.strtoupper($randCode).'】请尽快使用！如非本人操作，请无视！');

if ($result == 1) {
	$emlog["txt"]=true;
		$emlog["error"]='邮件已发送至邮箱';
} else{

		$emlog["error"]='发送失败，请联系站长';
}
echo json_encode($emlog);
}

if($_POST['action']=='2'){
 
 $user=daddslashes($_POST['user']);
	$pass=daddslashes($_POST['pass']);
		$mail=daddslashes($_POST['mail']);
		$code=daddslashes(strtoupper($_POST['code']));
	
				if($code!=$_SESSION['mailcode']){
								    		$emlog["error"]='验证码错误';
								  	        echo json_encode($emlog);
								    		exit();
							}
							
	if(strlen($user) <6 || strlen($pass) <6){
	$emlog["error"]='账号和密码不得低于6位数';
								    	        echo json_encode($emlog);
								    		exit();
	}
	
	if (is_numeric(daddslashes($_POST['qq']))){
	    $qq = daddslashes($_POST['qq']);
	}else{
	$emlog["error"]='请输入合法QQ';
								   	        echo json_encode($emlog);
								    		exit();
	}
	
	if(strlen($qq) <5 ){
	$emlog["error"]='请输入正确QQ';
								    		        echo json_encode($emlog);
								    		exit();
	}

    $rs=$DB->query("select * from moyu_dl where dl_user = '{$user}'");
     $rmail=$DB->query("select * from moyu_dl where dl_mail = '{$mail}'");
     
    if($res = $DB->fetch($rs)){
	$emlog["error"]='用户名已被注册';
								    		        echo json_encode($emlog);
								    		exit();
    }elseif($remail = $DB->fetch($rmail)){
        	$emlog["error"]='邮箱已被注册';
								    			        echo json_encode($emlog);
								    		exit();
    }else{ 
        $DB->query("insert into moyu_dl values(null,'{$user}','{$pass}','{$mail}','{$qq}',10,1)");
	$emlog["txt"]=true;
	$emlog["error"]='注册成功，返回登录';
								        echo json_encode($emlog);
								    		exit();
    }
    
    echo json_encode($emlog);
}



if($_POST['action']=='1'){
 $user=daddslashes($_POST['user']);
	$pass=daddslashes($_POST['pass']);
 $rs=$DB->query("select * from moyu_dl where dl_user = '{$user}'");
   
    if($res = $DB->fetch($rs)){
    if($res['dl_sta']>=0){
        if($pass == $res['dl_pwd']){
            $_SESSION['user'] = $user;
            $_SESSION['islogin'] = 1;
            $emlog["txt"]=true;
	$emlog["error"]='尊敬的'.$_SESSION['user'].'欢迎回来！';
								    	        echo json_encode($emlog);
								    		exit();
        }else{
	$emlog["error"]='密码错误，请重新输入';
	        echo json_encode($emlog);
								    		exit();
        }
        }else{
        
	$emlog["error"]='账号已被封停';
	        echo json_encode($emlog);
								    		exit();
        }
        
        
    }else{
	$emlog["error"]='用户名不存在';
	        echo json_encode($emlog);
								    		exit();
    }
        echo json_encode($emlog);
}

?>