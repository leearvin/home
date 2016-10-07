<?php
/**
*
*/
include 'DB.class.php';
include 'Tools.class.php';
$db=new DB("localhost", "root", "", "php2", "member");
if($db->delete($_GET['id'])){
	Tools::Success("删除成功", "admin.php");
}else{
	Tools::Error("删除失败");
}
?>