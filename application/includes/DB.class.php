<?php
/**
*数据库连接类
*
*@todo:下一步把配置产量导入；
*@method getDB:连接数据库
*@unDB:释放结果集，关闭连接资源;
*/
class DB{
	static public function connectDB(){
		$mysqli=new mysqli("localhost",'root','1234','');   //不指定具体数据库  数据库作为表单连接项使用。  
		if(mysqli_connect_errno()){
			exit("mysqli服务器访问错误，".mysqli_connect_error());			
		}
		$mysqli->set_charset("utf8");
		return $mysqli;
	}
	static public function unDB($_result,$_db){
		if(is_object($_result)){
			$_result->free();
			$_result=null;
		}
		if(is_object($_db)){
			$_db->close();
			$_db=null;
		}
	}
}
?>