<?php
/**
*数据库类
*
*@var string $host:mysql服务器的主机名
*@var string $user:mysql服务器的用户名
*@var string $dbname:数据库名；
*@var string $tableName:表名
*@var resource $result:结果集
*@var resouce  $conn:数据库连接资源；
*/
class DB{
	private $host;
	private $user;
	private $pwd;
	private $dbname;
	private $tableName;
	private $result;
	private $conn;
	/**
	 * 构造方法
	 * @param string  $_host:要传进来的主机名
	 * @param string  $_user：要传进来的用户名
	 * @param string  $_pwd：要传进来的密码
	 * @param string  $_dbname：要传进来的数据库名
	 * @param string  $_tableName：要传进来的表名
	 **/
	public function __construct($_host,$_user,$_pwd,$_dbname,$_tableName){		
		$this->host=$_host;
		$this->user=$_user;
		$this->pwd=$_pwd;
		$this->dbname=$_dbname;
		$this->tableName=$_tableName;
		$this->conn=mysql_connect($this->host,$this->user,$this->pwd)or die("数据库连接不成功".mysql_error());
		mysql_select_db($this->dbname)or die("数据库不存在".mysql_error());
		mysql_query("set names utf8");
	}	
	public function query($_sql){		
		$this->result=mysql_query($_sql);
		return $this->result;
	}
	/**
	 * 获取总记录数
	 * @return int;
	 **/
	public function getTotal(){
		$sql="select * from ".$this->tableName;
		$this->result=mysql_query($sql);
		$data=mysql_num_rows($this->result);
		return $data;
	}
	/**
	 *获取表中所有的数据 
	 * @method select();  
	 * @access public:外部可以调用
	 * @return resource:结果集;  
	 *   */
	public function select(){
		//select * from table limit 0,3;
		//0:当前页第一条数据的索引值，3是显示的数据的个数
		$sql="select * from ".$this->tableName." order by id desc";
		$this->result=mysql_query($sql);
		return $this->result;
	}
	public function delete($_id){
		$sql="delete from ".$this->tableName." where id=".$_id;
		//echo $sql;
		$this->result=mysql_query($sql);
		return $this->result;
	}
	/**
	 * 获取表单提交的数据，保存到数据库中；
	 * @param string $_username
	 * @param string $_email  */
	public function add($_username,$_email,$_icon){
		$sql="insert into ".$this->tableName."(username,email,icon)values('".$_username."','".$_email."','".$_icon."')";
		$this->result=mysql_query($sql);
		return $this->result;
	}
	/**
	 * 获取一条数据
	 * @param int $_id
	 * @return resource  */
	public function getOne($_id){
		$sql="select * from ".$this->tableName." where id=".$_id;
		//echo $sql;
		$this->result=mysql_query($sql);
		return $this->result;
	}
	/**
	 * 根据传进来的用户名和密码判断是否登录
	 * @param string $_username
	 * @param string $_pwd  */
	public function checkLogin($_username,$_pwd){
		$sql="select * from ".$this->tableName." where username='".$_username."' and pwd='".$_pwd."'";
		$this->result=mysql_query($sql);
		$data=mysql_fetch_array($this->result);
		return $data;
	}
	/**
	 * 验证用户是否存在;
	 * @param string $_username
	 * @return boolean;
	 *   */
	public function checkReg($_username){
		$sql="select * from ".$this->tableName." where username='".$_username."'";		
		$this->result=mysql_query($sql);
		//var_dump($this->result);
		$data=mysql_fetch_array($this->result);
		//var_dump($data);
		return $data;
	}
	/**
	 *修改数据 
	 * @param string $_username
	 * @param string $_email
	 * @param string $_id  */
	public function update($_username,$_email,$_id){
		$sql="update ".$this->tableName." set username='".$_username."',email='".$_email."' where id=".$_id;
		$this->result=mysql_query($sql);
		return $this->result;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>