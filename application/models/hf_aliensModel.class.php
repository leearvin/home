<?php
class hf_aliensModel extends Model {
	private $id;
	private $limit;
	private $firstName;
	private $lastName;
	private $whenItHappened;
	private $howLong;
	private $howMany;
	private $aliensDescription;
	private $whatTheyDid;
	private $fangSpotted;
	private $other;
	private $email;
	private $kind;
	public function __set($_key, $_value) {
		$this->$_key = $_value;
	}
	public function __get($_key) {
		return $this->$_key;
	}

	public function getALLAlienAbduction() {
		
		$_sql = "select * from aliendatabase.aliens_abduction order by first_name desc " . $this->limit;
		
		
		return parent::getAllData ( $_sql );
	}
	/**
	 * 获得所有计算机记录的记录总数
	 */
	public function getALLAlienAbductionTotal() {

		$_sql = "select * from aliendatabase.aliens_abduction";
		return parent::getTotal ( $_sql );
	}

	/**
	 * 获得一条符合要求的计算机信息
	 */
	public function getOneAlienAbduction() {
		$_sql = "select * from aliendatabase.aliens_abduction where id=" . $this->id;
		// 		echo $_sql;
		return parent::getOne ( $_sql );
	}
	public function deleteAlienAbduction() {
		$_sql = "delete from aliendatabase.aliens_abduction where id=" . $this->id;
				
		return parent::cud ( $_sql );
	}
	public function addAlienAbduction() {
		
		$_sql = "insert into aliendatabase.aliens_abduction(
			ID, 
			first_name, 
			last_name,
			when_it_happened, 
			how_long, 
			how_many, 
			alien_description, 
			what_they_did, 
			fang_spotted, 
			other, 
			email
		)values(
			null,  
			'" . $this->firstName . "',
			'" . $this->lastName . "',
			'" . $this->whenItHappened . "',
			'" . $this->howLong . "',
			'" . $this->howMany . "',
			'" . $this->aliensDescription . "',
			'" . $this->whatTheyDid . "',
			'" . $this->fangSpotted . "',
			'" . $this->other . "',
			'" . $this->email . "'			
		)";
		
		
		
		return parent::cud ( $_sql );
	}
	public function updateAlienAbduction() {
		$_sql = "update aliendatabase.aliens_abduction set
				first_name='".$this->firstName."',
				last_name='".$this->lastName."',
				when_it_happened='".$this->whenItHappened."',
				how_long='".$this->howLong."',
				how_many='".$this->howMany."',
				alien_description='".$this->aliensDescription."',
				what_they_did='".$this->whatTheyDid."',
				fang_spotted='".$this->fangSpotted."',
				other='".$this->other."',
				email='".$this->email."' 				
		where ID='".$this->id."'";
		
		
		return parent::cud ( $_sql );
	}
}