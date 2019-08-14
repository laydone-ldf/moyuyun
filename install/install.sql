SET FOREIGN_KEY_CHECKS=0;</explode>
DROP TABLE IF EXISTS `moyu_config`;</explode>
CREATE TABLE `moyu_config` (
  `k` varchar(255) NOT NULL,
  `v` text,
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `moyu_config` VALUES ('admin_user', 'admin');</explode>
INSERT INTO `moyu_config` VALUES ('admin_pwd', 'My666');</explode>
INSERT INTO `moyu_config` VALUES ('title', '陌屿云加密');</explode>
INSERT INTO `moyu_config` VALUES ('zzqq', '2763994904');</explode>
INSERT INTO `moyu_config` VALUES ('keywords', '陌屿云加密系统,代码安全保护,在线加密完美系统');</explode>
INSERT INTO `moyu_config` VALUES ('description', '陌屿云加密系统,可以虚拟主机搭建,服务器安全运行！');</explode>
INSERT INTO `moyu_config` VALUES ('domain', 'http://localhost/');</explode>
INSERT INTO `moyu_config` VALUES ('zhushe', '陌屿云加密');</explode>
INSERT INTO `moyu_config` VALUES ('anounce', '欢迎使用陌屿云加密<a href="./user">（代理登入）</a>');</explode>
INSERT INTO `moyu_config` VALUES ('bottom', '<table class="table table-bordered">
<tbody>
<tr height="50">
<td><button type="button" class="btn btn-block btn-warning"><a href="./"><span style="color:#ffffff">广告位10元/月</span></a></button></td>
<td><button type="button" class="btn btn-block btn-warning"><a href="./"><span style="color:#ffffff">广告位10元/月</span></a></button></td>
</tr>
<tr height="50">
<td><button type="button" class="btn btn-block btn-success"><a href="./" target="_blank"><span style="color:#ffffff">广告位10元/月</span></a></button></td>
<td><button type="button" class="btn btn-block btn-success"><a href="./" target="_blank"><span style="color:#ffffff">广告位10元/月</span></a></button></td>
</tr></tbody>
</table>');</explode>
INSERT INTO `moyu_config` VALUES ('epay_url', 'http://pay.sddyun.cn/');</explode>
INSERT INTO `moyu_config` VALUES ('epay_pid', 'ID');</explode>
INSERT INTO `moyu_config` VALUES ('epay_key', '支付密钥');</explode>
INSERT INTO `moyu_config` VALUES ('smtpmail', '2259707021@qq.com');</explode>
INSERT INTO `moyu_config` VALUES ('smtpfwq', 'smtp.qq.com');</explode>
INSERT INTO `moyu_config` VALUES ('smtpdk', '465');</explode>
INSERT INTO `moyu_config` VALUES ('smtpuser', 'QQ');</explode>
INSERT INTO `moyu_config` VALUES ('smtppass', '邮箱授权吗');</explode>
INSERT INTO `moyu_config` VALUES ('smtpname', '陌屿云加密');</explode>
INSERT INTO `moyu_config` VALUES ('ptjg', '0.4');</explode>
INSERT INTO `moyu_config` VALUES ('djjg', '0.3');</explode>
INSERT INTO `moyu_config` VALUES ('zjjg', '0.2');</explode>
INSERT INTO `moyu_config` VALUES ('gjjg', '0.1');</explode>
INSERT INTO `moyu_config` VALUES ('cjsj', '30');</explode>
INSERT INTO `moyu_config` VALUES ('template_index', '1');</explode>
INSERT INTO `moyu_config` VALUES ('submit', '修改');</explode>

DROP TABLE IF EXISTS `moyu_dl`;</explode>
CREATE TABLE `moyu_dl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dl_user` varchar(30) DEFAULT NULL,
  `dl_pwd` varchar(30) DEFAULT NULL,
  `dl_mail` varchar(30) DEFAULT NULL,
  `dl_qq` varchar(30) DEFAULT NULL,
  `dl_money` float DEFAULT NULL,
  `dl_sta` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `moyu_notice`;</explode>
CREATE TABLE `moyu_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) DEFAULT '1',
  `setop` int(1) NOT NULL DEFAULT '0',
  `center` text,
  `date` date DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `moyu_gd`;</explode>
CREATE TABLE `moyu_gd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` varchar(10) DEFAULT NULL,
  `pzqq` varchar(10) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;</explode>