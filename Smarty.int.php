<?php
/**
*初始化Smarty
*@version 2.0
*
*$_SERVER['HTTP_REFERER']
*/
session_start();
//定义网站根目录

error_reporting(1);
// error_reporting(E_ALL);


define('ROOT_PATH',dirname(__FILE__)."/"); 
//echo ROOT_PATH;
//从网站根目录下导入smarty
include ROOT_PATH.'libs/Smarty.class.php';
//导入配置文件
include ROOT_PATH.'application/config/config.php';
//实例化smarty
$smarty=new Smarty();
//自动加载
spl_autoload_register('myautoload');
function myautoload($_className){
	if(substr($_className,-6)=="Action"){
		include 'application/controllers/'.$_className.".class.php";
	}else if(substr($_className,-5)=="Model"){
		include 'application/models/'.$_className.".class.php";
	}else{
		include 'application/includes/'.$_className.".class.php";
	}
}
//var_dump($smarty);
//定义smarty的模板文件夹路径
$smarty->template_dir=ROOT_PATH.'application/views';

//定义smarty编译文件夹路径
$smarty->compile_dir=ROOT_PATH.'templates_c';
//定义smarty缓存文件夹路径
$smarty->cache_dir=ROOT_PATH.'cache';

//echo DEMO;
//var_dump(DB::connectDB());
?>