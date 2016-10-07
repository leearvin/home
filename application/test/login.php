<?php
/**
*
*/
session_start();
include 'DB.class.php';
include 'Tools.class.php';
$db=new DB("localhost", "root", "", "php2", "admin");
if(isset($_POST['send'])){
	//print_r($_POST);
	if($db->checkLogin($_POST['username'], md5($_POST['pwd']))){
		//把登录的用户名写入session;
		$_SESSION['admin']=$_POST['username'];
		Tools::Success("欢迎登录", "admin.php");
	}else{
		Tools::Error("非法登录"); 
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<style>
dl{
	width:300px;
	border:1px solid #ccc;
	border-radius:5px;
	margin:0 auto;
	padding:5px;
}
dl dt{
	margin-bottom:5px;
	text-align:center;
}
dd{
	margin-bottom:5px;
}
</style>
</head>
<body>
<form method="post" action="">
<dl>
	<dt>欢迎登录</dt>
	<dd><input type="text" name="username"></dd>
	<dd><input type="password" name="pwd"></dd>
	<dd><input type="submit" value="登录" name="send"></dd>
</dl>
</form>
</body>
</html>