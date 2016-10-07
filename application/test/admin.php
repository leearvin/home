<?php
/**
*
*/
session_start();
//设置错误级别，0表示不显示错误，E_ALL显示所有的错误
error_reporting(0);
include 'DB.class.php';
include 'Tools.class.php';
$db=new DB("localhost", "root", "", "php2", "member");
//var_dump($db->select());
if(isset($_POST['send'])){
	//echo "点击了删除按钮";
	//print_r($_POST['dels']);
	$ids=implode(",", $_POST['dels']);
	$sql="delete from member where id in(".$ids.")";
	if(mysql_query($sql)){
		echo "ooooooooooooooook";
	}else{
		echo "dennnnnnnnnnnnnnnnnnied";
	}
}
$result=$db->select();
if(!$_SESSION['admin']){
	Tools::Success("您还为登录，请重新登录", "login.php");
}
if(isset($_GET['action'])){
	unset($_SESSION['admin']);
	echo "<script>location.href='index.php';</script>";
}
echo "后台首页，欢迎：<strong style='color:green'>".$_SESSION['admin']."</strong>登录,<a href='?action=logout'>注销</a><br>";
echo "<form action='' method='post'>";
while($data=mysql_fetch_array($result)){
	echo $data['username']."<a href='edit.php?id=".$data[id]."'>修改</a>|<a href='delete.php?id=".$data[id]."'>删除</a><input type='checkbox' name='dels[]' value='".$data['id']."'><br>";
}
echo "<input type='submit' value='批量删除' name='send'></form><hr>";
$url="3.jpg";
echo "<img src='".$url."'/><br>";
echo "<a href='add.php'>添加数据</a>";
?>
