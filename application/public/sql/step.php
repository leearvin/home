<?php
/**
*
*/
if(isset($_POST['send'])){
	//print_r($_POST);
	$config="<?php";
	$config.="\n";
	$config.='$host="'.$_POST['db_host'].'";';
	$config.="\n";
	$config.='$user="'.$_POST['db_user'].'";';
	$config.="\n";
	$config.='$pwd="'.$_POST['db_pwd'].'";';
	$config.="\n";
	$config.='$dbname="'.$_POST['db_name'].'";';
	$config.="\n";	
	$config.="?>";
	$file=fopen("config/config.php","w+");
	fwrite($file,$config);
	include 'config/config.php';
	if(!mysql_connect($host,$user,$pwd)){
		exit("mysql服务器访问不成功！");
	}
	if(empty($_POST['admin_user'])||empty($_POST['admin_pwd'])){
		exit("管理员名或密码不得为空");
	}
	mysql_query("set names utf8");
	mysql_query("create database if not exists ".$dbname." default character set utf8 collate utf8_general_ci");
	mysql_select_db($dbname)or die("数据库选择不正确".mysql_error());
	$query[]="CREATE TABLE IF NOT EXISTS `cms_ad` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `title` varchar(20) NOT NULL COMMENT '//标题',
  `thumbnail` varchar(100) NOT NULL COMMENT '//图片',
  `link` varchar(100) NOT NULL COMMENT '//链接',
  `description` varchar(200) NOT NULL COMMENT '//描述',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//广告类型，1是通栏广告，2是banner广告，3是侧边栏广告',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//是否前台广告',
  `date` datetime NOT NULL COMMENT '//时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ";
	$query[]="INSERT INTO `cms_ad` (`id`, `title`, `thumbnail`, `link`, `description`, `type`, `state`, `date`) VALUES
(15, '昂立教育教育大飞跃', '', 'http://www.yc60.com', '昂立教育教育大飞跃', 1, 1, '2011-08-21 22:00:49'),
(16, '网易开始代理魔兽世界', '', 'http://www.163.com', '网易开始代理魔兽世界', 1, 1, '2011-08-21 22:01:04'),
(32, '新sidebar广告', '20130703105547416.jpg', 'http://www.sidebar.com', '新sidebar广告 新sidebar广告 新sidebar广告', 0, 0, '2012-08-30 14:04:18'),
(40, '测试状态的广告', '20130703133302713.png', '测试状态的广告', '测试状态的广告', 2, 0, '0000-00-00 00:00:00'),
(30, 'sdfgsdfgsdfgsdfgsdg', '20130703115751925.jpg', 'dfgs dfgsd', '11', 0, 0, '2012-08-30 13:48:06'),
(33, '奥迪', '20130617154035237.jpg', 'http://www.audi.com', 'Q7', 2, 0, '0000-00-00 00:00:00'),
(34, '宝马', '20130617154807331.jpg', 'http://www.bmw.com', 'sdfg sdfg ', 1, 0, '0000-00-00 00:00:00'),
(37, '修改过的广告', '20130703102143372.jpg', 'http://www.qq.com', '修改过的广告NOD', 0, 0, '0000-00-00 00:00:00'),
(36, '新banner', '20130703092228615.jpg', 'http://www.google.com', '新banner', 2, 0, '0000-00-00 00:00:00'),
(38, '修改过的广告', '20130703114934406.jpg', '修改过的广告', '修改过的广告', 3, 0, '0000-00-00 00:00:00'),
(39, '新厕栏广告', '20130703105059103.jpg', 'http://www.google.com', 'adfas asdf adf ', 3, 1, '0000-00-00 00:00:00'),
(41, 'new banner', '20130703133322910.png', 'new banner', 'new banner', 2, 1, '0000-00-00 00:00:00'),
(47, '新banner', '20130703154826538.gif', 'http://www.google.com', '', 2, 1, '0000-00-00 00:00:00'),
(44, '通栏广告', '20130703135011730.gif', '通栏广告', '通栏广告', 0, 1, '0000-00-00 00:00:00'),
(45, '是大法师地方', '20130703135040741.gif', '', '', 1, 1, '0000-00-00 00:00:00'),
(46, '有连接的banner', '20130703135238899.gif', 'http://www.abc.com', '', 2, 0, '0000-00-00 00:00:00'),
(48, 'wert', '20130713011118719.jpg', 'wertwert', 'sdd', 2, 1, '0000-00-00 00:00:00'),
(49, 'adsf', '20130722062249405.gif', 'asd', '', 2, 1, '0000-00-00 00:00:00')";
	$query[]="CREATE TABLE IF NOT EXISTS `cms_administrator` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `admin_user` varchar(20) NOT NULL COMMENT '//管理员账号',
  `admin_pwd` char(40) NOT NULL COMMENT '//管理员密码',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '//管理员等级',
  `login_count` smallint(5) NOT NULL DEFAULT '0' COMMENT '//登录次数',
  `last_ip` varchar(20) NOT NULL DEFAULT '000.000.000.000' COMMENT '//最后一次IP',
  `last_time` datetime NOT NULL COMMENT '//最后一次登录时间',
  `reg_time` datetime NOT NULL COMMENT '//注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57";	
	$query[]="insert into ".$dbname.".".$prefix."admin(username,pwd)values('".$_POST['admin_user']."',md5('".$_POST['admin_pwd']."'))";
	foreach ($query as $value){
		mysql_query($value);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<style>
body{
	font-size:14px;
}
#container{
	margin:0 auto;
	width:500px;
	border:1px solid #999;
	height:300px;
}
#header{
	height:30px;
	line-height:30px;
	background:gray;
	border-bottom:1px solid #999;
	text-align:center;
}
#main{
	height:350px;
	background:#eee;
}
#content{
	height:20px;
	background:gray;
	border-top:1px solid #999;
}
.input{
	width:90px;
	height:21px;
	border:1px solid #717171;
	text-align:center;
	line-height:21px;
	font-size:13px;	
	font-weight:bold;
	cursor:pointer;
	/* float:left; */
	margin-left:200px;
	margin-top:8px;
}
p{
	margin:0 auto;
	border-bottom:1px solid #717171;
	overflow:auto;
	height:300px;
}
span{	
	float:left;
	width:60px;
	text-align:right;
}
</style>
</head>
<body>
<div id="container">
	<div id="header">安装程序</div>	
		<div id="content">
		<form action="" method="post">
			<dl>
				<dt>数据库配置</dt>
				<dd><span>主机名：</span><input type="text" name="db_host" value='localhost'></dd>
				<dd><span>用户名：</span><input type="text" name="db_user"></dd>
				<dd><span>密码：</span><input type="password" name="db_pwd"></dd>
				<dd><span>数据库：</span><input type="text" name="db_name" value="kongcms" readonly="readonly"></dd>				
				<dt>管理员配置</dt>
				<dd><span>管理员:</span><input type="text" name="admin_user" value="admin"></dd>
				<dd><span>密码：</span><input type="password" name="admin_pwd"></dd>
				<dd><input type="submit" name="send" value="提交"></dd>
			</dl>
		</form>
		</div>
		<div id="footer">www.google.com</div>
	</div>
</body>
</html>