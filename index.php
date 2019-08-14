<?php
include("./includes/common.php");
if ($conf['template_index'] && file_exists("./assets/template/{$conf['template_index']}/index.php")){
	$index_template = $conf['template_index'];
}else{
	$index_template = "1";
}
include("./assets/template/{$index_template}/index.php");
?>