<?php
/**
*模型的父类
*/
class Model{
	/**
	 * 执行多条sql语句
	 * @param string $_sql  */
	protected function multiQuery($_sql){
		$db=DB::connectDB();
		$db->multi_query($_sql);
		DB::unDB($_result=null, $db);
		return true;
	}
	/**
	 * 获取总记录数
	 * @param string $_sql  */
	protected function getTotal($_sql){
		
		$db=DB::connectDB();
		
		$result=$db->query($_sql);
		
		return $result->num_rows;
	}
	/**
	 * 获取一条数据
	 * @param string $_sql
	 * @return object;
	 *   */
	protected function getOne($_sql){
		$db=DB::connectDB();
		$result=$db->query($_sql);
		$objData=$result->fetch_object();
		DB::unDB($result, $db);
		//return Tools::filter($objData);
		return $objData;
	}
	/**
	 * 获取所有的数据	 
	 * @string $_sql
	 * @return array $data:对象组成的数组
	 *   */
	protected function getAllData($_sql){
		$db=DB::connectDB();
		$result=$db->query($_sql);
		
		$data=array();
		
		while($arr=$result->fetch_object()){
			
			$data[]=$arr;
		}
		
		DB::unDB($result, $db);
		
		return $data;
	}
	/**
	 * 执行cud方法
	 * @param string $_sql
	 * @return int $affected_rows:影响的行数
	 *   */
	protected function cud($_sql){
		$db=DB::connectDB();
		$db->query($_sql);
		$affected_rows=$db->affected_rows;
		DB::unDB($result=null, $db);
		return $affected_rows;
	}
	/**
	 * 获取表的下一条数据的id；
	 * @param string $_table
	 * @return int;
	 *  */
	protected function nextDataId($_table){
		$_sql="show table status like '".$_table."'";
		$data=$this->getOne($_sql);
		return $data->Auto_increment;
	}
}
?>