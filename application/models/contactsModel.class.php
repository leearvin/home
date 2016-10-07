<?php

class contactsModel extends Model{
	
	private $id;
	private $limit;
	private $name;
	private $sex;
	private $birthday;
	private $company;
	private $mobile;
	private $phone;
	private $address;
	private $email;
	private $onlineSoft;
	private $account;
	private $type;
	private $level;
	private $description;
	private $photo;
	public function __set($_key, $_value) {
		$this->$_key = $_value;
	}
	public function __get($_key) {
		return $this->$_key;
	}
	public function getAllContacts() {
		$_sql = "select * from wire.contacts order by name desc " . $this->limit;
		return parent::getAllData ( $_sql );
	}
	public function getAllContactsTotal() {
		$_sql = "select * from wire.contacts";
		return parent::getTotal ( $_sql );
	}
	
	public function getOneContact(){
		$_sql = "select * from wire.contacts where id =".$this->id;
		return parent::getOne($_sql);
	}

	
	
}