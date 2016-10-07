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
	$config.='$prefix="'.$_POST['db_prefix'].'";';
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
	mysql_query("create database if not exists ".$dbname);
	mysql_select_db($dbname)or die("数据库选择不正确".mysql_error());
	$query[]="create table if not exists ".$dbname.".".$prefix."admin(
	id int not null auto_increment,
	username varchar(30) not null,
	pwd      varchar(35) not null,
	primary key(id)
	)";
	$query[]="create table if not exists ".$dbname.".".$prefix."user(
	id int not null auto_increment,
	username varchar(30) not null,
	pwd      varchar(35) not null,
	content  text,
	primary key(id)
	)";
	$query[]="insert into ".$prefix."user(username,pwd,content)values('tom',md5('123456'),'haha'),
	('peter',md5('123456'),'haha'),
	('mary',md5('123456'),'haha')
	";
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
				<dd><span>数据库：</span><input type="text" name="db_name"></dd>
				<dd><span>表前缀：</span><input type="text" name="db_prefix" value="kong_"></dd>
				<dt>管理员配置</dt>
				<dd><span>管理员:</span><input type="text" name="admin_user" value="admin"></dd>
				<dd><span>密码：</span><input type="password" name="admin_pwd" value="admin"></dd>
				<dd><input type="submit" name="send" value="提交"></dd>
			</dl>
		</form>
		</div>
		<div id="footer">www.google.com</div>
	</div>
</body>
</html>