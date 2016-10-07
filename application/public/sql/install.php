<?php
/**
*安装程序1
*/
if(!is_writable("config/config.php")){
	exit("config文件不能写入");
}
if(isset($_POST['send'])){
	//表单提交的数据写入配置文件
	//print_r($_POST);
	$config_str="<?php";
	$config_str.="\n";
	$config_str.='$mysql_host="'.$_POST['db_host'].'";';
	$config_str.="\n";
	$config_str.='$mysql_user="'.$_POST['db_user'].'";';
	$config_str.="\n";
	$config_str.='$mysql_pass="'.$_POST['db_pass'].'";';
	$config_str.="\n";
	$config_str.='$mysql_name="'.$_POST['db_name'].'";';
	$config_str.="\n";
	$config_str.='$mysql_tag="'.$_POST['db_tag'].'";';
	$config_str.="\n";
	$config_str.="?>";
	//打开外部的文件，如果文件不存在，就创建
	$file=fopen("config/config.php","w+");
	//var_dump($file);
	fwrite($file, $config_str);
	//导入配置文件；
	include 'config/config.php';
	//echo $mysql_host;
	if(!mysql_connect($mysql_host,$mysql_user,$mysql_pass)){
		exit("mysql服务器访问不成功");
	}
	mysql_query("set names utf8");
	//创建数据库
	mysql_query("create database if not exists ".$mysql_name);
	//选择数据库
	mysql_select_db($mysql_name)or die("数据库选择不成功".mysql_error());
	$query[]="create table if not exists ".$mysql_name.".".$mysql_tag."admin(
	id int not null auto_increment,
	username varchar(30) not null,
	pwd      varchar(35) not null,
	primary key(id)
	)";
	$query[]="create table if not exists ".$mysql_name.".".$mysql_tag."user(
	id int not null auto_increment,
	username varchar(30) not null,
	pwd      varchar(35) not null,
	content  text,
	primary key(id)
	)";
	$query[]="insert into ".$mysql_tag."user(username,pwd,content)values('tom',md5('123456'),'haha'),
	('peter',md5('123456'),'haha'),
	('mary',md5('123456'),'haha')
	";
	foreach ($query as $value){
		mysql_query($value);
	}
	rename("install.php", "install.lock");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<form action="" method="post">
	主机名：<input type="text" name="db_host"><br>
	用户名：<input type="text" name="db_user"><br>
	密&nbsp;&nbsp;&nbsp;码:<input type="password" name="db_pass"><br>
	数据库：<input type="text" name="db_name"><br>
	表前缀：<input type="text" name="db_tag" value="k_"><br>
	<input type="submit" name="send" value="提交">
</form>
</body>
</html>