<?php
/**
*
*/
include 'DB.class.php';
include 'Tools.class.php';
include 'UploadFile.class.php';
$db=new DB("localhost", "root", "", "php2", "member");
$upload=new UploadFile("pic");
$icon=$upload->getFileNewName();
if(isset($_POST['send'])){
	if(!$upload->upload()){
		echo $upload->getErrorMsg();
	}else{
		$result=$db->checkReg($_POST['username']);
		if($result){
			Tools::Error("用户名已存在，请重新注册");
		}else{
			if($db->add($_POST['username'], $_POST['email'],$icon)){
				Tools::Success("数据添加成功", "index.php");
			}else{
				Tools::Error("数据添加失败");
			}
		}
	}		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<form method="post" action="" enctype='multipart/form-data'>
	<input type="text" name="username"><br>
	<input type="text" name="email"><br>
	<input type="file" name="pic"><br>
	<input type="submit" name="send" value="提交">
</form>
</body>
</html>