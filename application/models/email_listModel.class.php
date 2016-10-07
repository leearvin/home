<?php
class email_listModel extends Model {
	private $id;
	private $limit;
	private $firstName;
	private $lastName;
	private $email;
	private $tiDelete=array();
	private $kind;
	public function __set($_key, $_value) {
		$this->$_key = $_value;
	}
	public function __get($_key) {
		return $this->$_key;
	}
	
	public function removeEmailById(){
		$_sql = "delete from elvis_store.email_list where id=" .$this->id;
		
		return parent::cud ( $_sql );
	}

	public function getALLEmailList() {

		$_sql = "select * from elvis_store.email_list order by first_name desc " . $this->limit;


		return parent::getAllData ( $_sql );
	}
	/**
	 * 获得所有计算机记录的记录总数
	 */
	public function getALLEmailListTotal() {

		$_sql = "select * from elvis_store.email_list";
		return parent::getTotal ( $_sql );
	}

	/**
	 * 获得一条符合要求的计算机信息
	 */
	public function getOneEmailList() {
		$_sql = "select * from elvis_store.email_list where id=" . $this->id;
		// 		echo $_sql;
		return parent::getOne ( $_sql );
	}
	public function deleteEmailList() {
		$_sql = "delete from elvis_store.email_list where id=" . $this->id;

		return parent::cud ( $_sql );
	}
	
	public function deleteOneEmailByEmail(){
		//echo $email;
		//exit;
		$_sql = "delete from elvis_store.email_list where email='" . $this->email."'";
		
		
		return parent::cud ( $_sql );
	}
	public function addEmailList() {

		$_sql = "insert into elvis_store.email_list(
			id,
			first_name,
			last_name,
			email
		)values(
			null,
			'" . $this->firstName . "',
			'" . $this->lastName . "',
			'" . $this->email . "'
		)";



		return parent::cud ( $_sql );
	}
	public function updateEmailList() {
		$_sql = "update elvis_store.email_list set
				first_name='".$this->firstName."',
				last_name='".$this->lastName."',
				email='".$this->email."'
		where id='".$this->id."'";


		return parent::cud ( $_sql );
	}
// 	$from = '5002549@qq.com';  //单引号
// 	$subject = $_POST['subject'];      //邮件标题
// 	$elvisMail = $_POST['elvisMail'];  //邮件正文
// 	$data = $this->model->getALLEmailList();   //获得数据库表单内所有数据
	
	public function getALLEmailFromEmailListTable(){
		$_sql = "select email from elvis_store.email_list where 1";
		
		
		return parent::getAllData ( $_sql );
	}
}